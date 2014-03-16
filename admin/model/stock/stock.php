<?php
use Document\Stock\Stock;

class ModelStockStock extends Model {
	public function addStock( $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = strtoupper( trim($aData['name']) );
		}else {
			return false;
		}

		// code is required
		if ( isset( $aData['code'] ) && !$this->getStock(array('code' => $aData['code'])) ) {
			$aData['code'] = strtoupper( trim($aData['code']) );
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

		$lStock = $this->dm->getRepository('Document\Stock\Stock')
			->findBy( $aQuery )
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['order'] => $aData['sort']) );

		// Remove all security trading data in Stocks
		// foreach ($lStock as $key => $oStock) {
		// 	$oStock->setExchanges(array());
		// }
		// $this->dm->flush();

		return $lStock;
	}

	public function importStock( $file ){
		$this->load->model('tool/excel');
		$this->load->model('stock/market');
		$aStocks = $this->model_tool_excel->getActiveSheet( $file['tmp_name'] );
		array_shift($aStocks);

		foreach ( $aStocks as $aStock ) {
			if ( !$oMarket = $this->model_stock_market->getMarket(array('code' => strtoupper(trim($aStock['B'])))) ){
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

	public function searchStock( $aData = array() ) {
		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\Stock\Stock',
			)
    	);

    	if ( !empty($aData['name']) ) {
    		$query->addFilterQuery( 
    			array(
				    'key' => 'fq1',
				    'tag' => array('filter_name'),
				    'query' => 'name_t:*' . strtoupper( trim($aData['name']) ) . '*',
					)
    			);
    	}

    	if ( !empty($aData['code']) ) {
    		$query->addFilterQuery( 
    			array(
				    'key' => 'fq2',
				    'tag' => array('filter_code'),
				    'query' => 'code_t:' . strtoupper( trim($aData['code']) ) . '*',
					)
    			);
    	}

		if ( isset( $aData['start'] ) ) {
			$aData['start'] = (int)$aData['start'];
		}else {
			$aData['start'] = 0;
		}

		if ( isset( $aData['limit'] ) ) {
			$aData['limit'] = (int)$aData['limit'];
		}else {
			$aData['limit'] = 10;
		}

		$query->setRows( $aData['limit'] );
		$query->setStart( $aData['start'] );
 
		return $this->client->execute( $query );
	}
}
?>