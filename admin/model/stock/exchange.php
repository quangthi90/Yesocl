<?php
use Document\Stock\Exchange;

class ModelStockExchange extends Model {
	public function addExchange( $idStock, $aData = array() ) {
		$oStock = $this->dm->getRepository('Document\Stock\Stock')->find( $idStock );
		if ( !$oStock ){
			return false;
		}

		// created is required
		if ( !empty($aData['created']) ) {
			$aData['created'] = date_create_from_format('m/d/Y', $aData['created']);
		}else {
			return false;
		}

		if ( !$oExchange = $oStock->getExchangeByCreated($aData['created']) ){
			$oExchange = new Exchange();
		}

		// high is required
		if ( empty($aData['high']) ) {
			return false;
		}

		// low is required
		if ( empty($aData['low']) ) {
			return false;
		}

		// open is required
		if ( empty($aData['open']) ) {
			return false;
		}

		// close is required
		if ( empty($aData['close']) ) {
			return false;
		}

		// volume is required
		if ( empty($aData['volume']) ) {
			return false;
		}

		$oExchange->setHighPrice( $aData['high'] );
		$oExchange->setLowPrice( $aData['low'] );
		$oExchange->setOpenPrice( $aData['open'] );
		$oExchange->setClosePrice( $aData['close'] );
		$oExchange->setVolume( $aData['volume'] );
		$oExchange->setCreated( $aData['created'] );

		if ( !$oExchange->getId() ){
			$oStock->addExchange( $oExchange );
		}
		
		$this->dm->flush();

		return true;
	}

	public function editExchange( $idExchange, $aData = array() ) {
		$oStock = $this->dm->getRepository('Document\Stock\Stock')->findOneBy( array(
			'exchanges.id' => $idExchange
		));
		if ( !$oStock ){
			return false;
		}

		if ( !$oExchange = $oStock->getExchangeById($idExchange) ){
			return false;
		}

		// created
		if ( !empty($aData['created']) ) {
			$aData['created'] = date_create_from_format('m/d/Y', $aData['created']);
			$oExchange->setCreated( $aData['created'] );
		}

		// high price
		if ( !empty($aData['high']) ) {
			$oExchange->setHighPrice( $aData['high'] );
		}

		// low price
		if ( !empty($aData['low']) ) {
			$oExchange->setLowPrice( $aData['low'] );
		}

		// open price
		if ( !empty($aData['open']) ) {
			$oExchange->setOpenPrice( $aData['open'] );
		}

		// close price
		if ( !empty($aData['close']) ) {
			$oExchange->setClosePrice( $aData['close'] );
		}

		// volume
		if ( !empty($aData['volume']) ) {
			$oExchange->setVolume( $aData['volume'] );
		}
		
		$this->dm->flush();

		return true;
	}

	public function deleteExchanges( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			$oStock = $this->dm->getRepository('Document\Stock\Stock')->findOneBy( array('exchanges.id' => $aData['id'][0]) );
			if ( !$oStock ){
				return false;
			}
			foreach ($aData['id'] as $id) {
				$oExchange = $oStock->getExchangeById( $id );

				if ( $oExchange ) {
					$oStock->getExchanges()->removeElement( $oExchange );
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