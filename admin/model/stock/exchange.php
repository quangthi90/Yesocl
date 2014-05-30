<?php
use Document\Stock\Exchange,
	Document\Stock\Exchanges;

class ModelStockExchange extends Model {
	public function addExchange( $idStock, $aData = array() ) {
		$oStockExchanges = $this->dm->getRepository('Document\Stock\Exchanges')->findOneBy(
			array('stock.id' => $idStock)
		);
		if ( !$oStockExchanges ){
			return false;
		}

		// created is required
		if ( !empty($aData['created']) ) {
			$aData['created'] = date_create_from_format('m/d/Y', $aData['created']);
		}else {
			return false;
		}

		if ( !$oExchange = $oStockExchanges->getExchangeByCreated($aData['created']) ){
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
			$oStockExchanges->addExchange( $oExchange );
		}
		
		$this->dm->flush();

		return true;
	}

	public function editExchange( $idStock, $idExchange, $aData = array() ) {
		$oStockExchanges = $this->dm->getRepository('Document\Stock\Exchanges')->findOneBy( array(
			'stock.id' => $idStock
		));
		if ( !$oStockExchanges ){
			return false;
		}
		$aExchanges = $oStockExchanges->getExchanges();

		if ( !$aExchange = $aExchanges[$idExchange] ){
			return false;
		}

		// created
		if ( !empty($aData['created']) ) {
			$aData['created'] = date_create_from_format('m/d/Y', $aData['created'])->format('ymd');
			$aExchange['created'] = $aData['created'];
		}

		// high price
		if ( !empty($aData['high']) ) {
			$aExchange['high_price'] = $aData['high'];
		}

		// low price
		if ( !empty($aData['low']) ) {
			$aExchange['low_price'] = $aData['low'];
		}

		// open price
		if ( !empty($aData['open']) ) {
			$aExchange['open_price'] = $aData['open'];
		}

		// close price
		if ( !empty($aData['close']) ) {
			$aExchange['close_price'] = $aData['close'];
		}

		// volume
		if ( !empty($aData['volume']) ) {
			$aExchange['volume'] = $aData['volume'];
		}

		$aExchanges[$idExchange] = $aExchange;
		$oStockExchanges->setExchanges( $aExchanges );
		
		$this->dm->flush();

		return true;
	}

	public function deleteExchanges( $idStock, $aData = array() ) {
		if ( !empty($aData['id']) ) {
			$oStockExchanges = $this->dm->getRepository('Document\Stock\Exchanges')->findOneBy( array('stock.id' => $idStock) );
			if ( !$oStockExchanges ){
				return false;
			}
			$aExchanges = $oStockExchanges->getExchanges();
			foreach ($aData['id'] as $id) {
				unset( $aExchanges[$id] );
			}
			$oStockExchanges->setExchanges( $aExchanges );
		}

		$this->dm->flush();
	}

	public function getExchange( $aData = array() ){
		$query = array();
		if ( !empty($aData['exchange_id']) ){
			$query['exchanges.id'] = $aData['exchange_id'];
		}elseif ( !empty($aData['stock_id']) ){
			$query['stock.id'] = $aData['stock_id'];
		}else{
			return null;
		}

		return $this->dm->getRepository('Document\Stock\Exchanges')->findOneBy( $query );
	}

	public function getExchanges( $aData = array() ){
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

		if ( !empty($aData['stock_id']) ){
			$aQuery['stock.id'] = $aData['stock_id'];
		
		}elseif ( !empty($aData['stock_code']) ){
			$oStock = $this->getRepository('Document\Stock\Stock')->findByCode( $aData['stock_code'] );
			if ( $oStock ){
				$aQuery['stock.id'] = $oStock->getId();
			}
		}

		return $this->dm->getRepository('Document\Stock\Exchanges')
			->findBy( $aQuery )
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['order'] => $aData['sort']) );
	}

	public function importExchange( $files ){
		$this->load->model('tool/excel');
		
		$link_files = $files['tmp_name'];
		foreach ($link_files as $file) {
			$aExchanges = $this->model_tool_excel->getActiveSheet( $file, 'B' );
			array_shift($aExchanges);
			
			foreach ( $aExchanges as $aExchange ) {
				if ( !$oStock = $this->dm->getRepository('Document\Stock\Stock')->findOneByCode(strtoupper(trim($aExchange['A']))) ){
					continue;
				}
				
				$created = date_create_from_format('m-d-y', $aExchange['B']);

				$oExchange = new Exchange();

				$oExchange->setOpenPrice( $aExchange['C'] );
				$oExchange->setHighPrice( $aExchange['D'] );
				$oExchange->setLowPrice( $aExchange['E'] );
				$oExchange->setClosePrice( $aExchange['F'] );
				$oExchange->setVolume( $aExchange['G'] );
				$oExchange->setCreated( $created );

				if ( !$oStockExchanges = $this->getExchange(array('stock_id' => $oStock->getId())) ){
					$oStockExchanges = new Exchanges();
					$oStockExchanges->setStock( $oStock );
					$this->dm->persist( $oStockExchanges );
					$this->dm->flush();
				}
				
				$oStockExchanges->addExchange( $oExchange );

				$this->dm->flush();
			}
		}

		return true;
	}
}
?>