<?php
use Document\Stock\Exchange;

class ModelStockExchange extends Model {
	public function addStock( $aData = array() ) {
		// name is required & isn't exist
		if ( !empty($aData['name']) ) {
			$this->data['name'] = strtoupper( trim($aData['name']) );
		}else {
			return false;
		}

		// code is required
		if ( isset( $aData['code'] ) && !$this->getStock(array('code' => $aData['code'])) ) {
			$this->data['code'] = strtoupper( trim($aData['code']) );
		}else {
			return false;
		}

		// market is required
		$oMarket = $this->dm->getRepository('Document\Stock\Market')->find( $aData['market_id'] );
		if ( !$oMarket ){
			return false;
		}

		// status
		if ( !isset( $aData['status'] ) ) {
			$aData['status'] = 0;
		}

		$oStock = new Stock();
		$oStock->setName( $aData['name'] );
		$oStock->setCode( $aData['code'] );
		$oStock->setMarket( $oMarket );
		$oStock->setStatus( $aData['status'] );

		$this->dm->persist( $oStock );
		$this->dm->flush();

		return true;
	}

	public function editStock( $idStock, $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = strtoupper( trim($aData['name']) );
		}else {
			return false;
		}

		// status
		if ( !isset($aData['status'] ) ) {
			$aData['status'] = false;
		}

		$oStock = $this->dm->getRepository('Document\Stock\Stock')->find( $idStock );
		if ( !$oStock ) {
			return false;
		}

		// name is exist
		if ( $oStock->getName() != $aData['name'] ) {
			$oStock->setName( $aData['name'] );
		}
		if ( $oStock->getMarket()->getId() != $aData['market_id'] ){
			$oMarket = $this->dm->getRepository('Document\Stock\Market')->find( $aData['market_id'] );
			
			if ( $oMarket ){
				$oStock->setMarket( $oMarket );
			}
		}
		$oStock->setStatus( $aData['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteStocks( $aData = array() ) {
		if ( isset( $aData['id'] ) ) {
			foreach ($aData['id'] as $id) {
				$oStock = $this->dm->getRepository( 'Document\Stock\Stock' )->find( $id );

				if ( !empty( $oStock ) ) {
					$this->dm->remove( $oStock );
				}
			}
		}

		$this->dm->flush();
	}

	public function getStock( $aData = array() ){
		if ( !empty($aData['id']) ){
			return $this->dm->getRepository('Document\Stock\Stock')->find( $aData['id'] );
		}elseif ( !empty($aData['code']) ){
			return $this->dm->getRepository('Document\Stock\Stock')->findOneByCode( strtoupper(trim($aData['code'])) );
		}

		return null;
	}

	public function getStocks( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		if ( empty($aData['sort']) ){
			$aData['order'] = 'name';
			$aData['sort'] = 1;
		}

		$aQuery = array();
		if ( !empty($aData['filter_name']) ){
			$aQuery['name'] = new \MongoRegex('/i*' . strtoupper(trim($aData['filter_name'])) . '.*/i');
		}

		if ( !empty($aData['filter_code']) ){
			$aQuery['code'] = new \MongoRegex('/' . strtoupper(trim($aData['filter_code'])) . '.*/i');
		}

		if ( !empty($aData['filter_market']) ){
			$aQuery['market.id'] = $aData['filter_market'];
		}

		if ( !empty($aData['filter_status']) ){
			$aQuery['status'] = (boolean)$aData['filter_status'];
		}

		return $this->dm->getRepository('Document\Stock\Stock')
			->findBy( $aQuery )
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['order'] => $aData['sort']) );
	}

	public function importExchange( $files ){
		$this->load->model('tool/excel');
		$this->load->model('stock/stock');
		
		$link_files = $files['tmp_name'];
		foreach ($link_files as $file) {
			$aExchanges = $this->model_tool_excel->getActiveSheet( $file, 'B' );
			array_shift($aExchanges);
			
			foreach ( $aExchanges as $aExchange ) {
				if ( !$oStock = $this->model_stock_stock->getStock(array('code' => strtoupper(trim($aExchange['A'])))) ){
					continue;
				}
				
				$created = date_create_from_format('m-d-y', $aExchange['B']);

				// if ( $oStock->getExchangeByCreated($created) ){
				// 	continue;
				// }

				$oExchange = new Exchange();

				$oExchange->setOpenPrice( $aExchange['C'] );
				$oExchange->setHighPrice( $aExchange['D'] );
				$oExchange->setLowPrice( $aExchange['E'] );
				$oExchange->setClosePrice( $aExchange['F'] );
				$oExchange->setVolume( $aExchange['G'] );
				$oExchange->setCreated( $created );
				
				$oStock->addExchange( $oExchange );
			}
		}

		$this->dm->flush();

		return true;
	}
}
?>