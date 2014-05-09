<?php
use Document\Stock\Stock,
	Document\Stock\Meta,
	Document\Company\Company;

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

		if ( !empty($aData['funds']) ){
			$oMeta = new Meta();
			$oMeta->setStock( $oStock );
			$oMeta->setFunds( $aData['funds'] );
			$this->dm->persist( $oMeta );
		}

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

		// Funds
		if ( !empty($aData['funds']) ){
			if ( !$oMeta = $oStock->getMeta() ){
				$oMeta = new Meta();
				$oMeta->setStock( $oStock );
				$this->dm->persist( $oMeta );
			}
			$oMeta->setFunds( $aData['funds'] );
		}
		
		$this->dm->flush();

		return true;
	}

	public function deleteStocks( $aData = array() ) {
		if ( isset( $aData['id'] ) ) {
			foreach ($aData['id'] as $id) {
				$oStock = $this->dm->getRepository( 'Document\Stock\Stock' )->find( $id );

				if ( !empty($oStock) ) {
					$oStock->setDeleted( true );
				}
			}
		}

		$this->dm->flush();
	}
	/*public function deleteStocks( $aData = array() ) {
		if ( isset( $aData['id'] ) ) {
			foreach ($aData['id'] as $id) {
				$oStock = $this->dm->getRepository( 'Document\Stock\Stock' )->find( $id );

				if ( !empty( $oStock ) ) {
					$this->dm->remove( $oStock );
				}
			}
		}

		$this->dm->flush();
	}*/

	public function getStock( $aData = array() ){
		$query = array('deleted' => false);

		if ( !empty($aData['id']) ){
			$query['id'] = $aData['id'];
		}elseif ( !empty($aData['code']) ){
			$query['code'] = strtoupper(trim($aData['code']));
		}else{
			return null;
		}

		return $this->dm->getRepository('Document\Stock\Stock')->findOneBy( $query );
	}

	public function getStocks( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		if ( empty($aData['sort']) ){
			$aData['order'] = 'code';
			$aData['sort'] = 1;
		}

		$aQuery = array('deleted' => false);
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
			
			if ( !$oCompany = $oStock->getCompany() ){
				$oCompany = new Company();
			}

			$oCompany->setName( trim($aStock['W']) );
			$oCompany->setAddress( trim($aStock['Y']) );
			$oCompany->setPhone( trim($aStock['Z']) );
			$oCompany->setFax( trim($aStock['AA']) );
			$oCompany->setWebsite( trim($aStock['AB']) );

			$oStock->setName( trim($aStock['W']) );
			$oStock->setCode( strtoupper(trim($aStock['A'])) );
			$oStock->setMarket( $oMarket );

			if ( !$oStock->getId() || !$oMeta = $this->dm->getRepository('Document\Stock\Meta')->findOneBy(array('stock.id' => $oStock->getId())) ){
				$oMeta = new Meta();
				$oMeta->setStock( $oStock );
			}
			$oMeta->setCurrentPrice( trim($aStock['C']) );
			$oMeta->setBookPrice( trim($aStock['D']) );
			$oMeta->setPb( trim($aStock['E']) );
			$oMeta->setEps( trim($aStock['H']) );
			$oMeta->setPe( trim($aStock['I']) );
			$oMeta->setRoa( trim($aStock['J']) );
			$oMeta->setRoe( trim($aStock['K']) );
			$oMeta->setBeta( trim($aStock['L']) );
			$oMeta->setOutStandingVolume( trim($aStock['M']) );
			$oMeta->setListedVolume( trim($aStock['N']) );
			$oMeta->setTreasuryStock( trim($aStock['O']) );
			$oMeta->setForeignOwnership( trim($aStock['P']) );
			$oMeta->setCapitalMarket( trim($aStock['Q']) );
			$oMeta->setSales( trim($aStock['R']) );
			$oMeta->setProfitAfterTax( trim($aStock['S']) );
			$oMeta->setOwnerEquity( trim($aStock['T']) );
			$oMeta->setLiability( trim($aStock['U']) );
			$oMeta->setAsset( trim($aStock['V']) );
			
			if ( !$oMeta->getId() ){
				$this->dm->persist( $oMeta );
			}

			if ( !$oCompany->getId() ){
				$oStock->setCompany( $oCompany );
				$this->dm->persist( $oCompany );
			}

			if ( !$oStock->getId() ){
				$this->dm->persist( $oStock );
			}
		}
		// exit;
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