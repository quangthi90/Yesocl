<?php
use Document\Stock\Stock;

class ModelStockStock extends Model {
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

		return $this->dm->getRepository('Document\Stock\Stock')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['order'] => $aData['sort']) );
	}

	public function importStock( $file ){
		$this->load->model('tool/excel');
		$this->load->model('stock/market');
		$aStocks = $this->model_tool_excel->getActiveSheet( $file['tmp_name'] );
		array_shift($aStocks);

		foreach ( $aStocks as $aStock ) {
			if ( !$oMarket = $this->model_stock_market->getMarket(array('code' => $aStock['B'])) ){
				continue;
			}
			if ( !$oStock = $this->getStock(array('code' => $aStock['A'])) ){
				$oStock = new Stock();
			}
			// var_dump($oMarket->getId()); exit;
			$oStock->setName( strtoupper(trim($aStock['A'])) );
			$oStock->setCode( strtoupper(trim($aStock['A'])) );
			$oStock->setMarket( $oMarket );
			if ( !$oStock->getId() ){
				$this->dm->persist( $oStock );
			}
		}

		$this->dm->flush();

		return true;
	}
}
?>