<?php
use Document\Finance\Finance;

class ModelFinanceFinance extends Model {
	public function addFinance( $aData = array() ) {
		// name is required
		if ( isset($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		// group is required
		if ( isset($aData['group']) ) {
			$oFiGroup = $this->dm->getRepository('Document\Finance\Group')->find( $aData['group'] );
			if ( !$oFiGroup ) return false;
		}else {
			return false;
		}

		// parent is required
		if ( isset($aData['parent_id']) ) {
			$oFiParent = $this->dm->getRepository('Document\Finance\Finance')->find( $aData['parent_id'] );
		}

		// order is required
		if ( isset($aData['order']) ) {
			$aData['order'] = trim($aData['order']);
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		// Slug
		$sSlug = $this->url->create_slug( $aData['name'] );
		$lFinances = $this->dm->getRepository('Document\Finance\Finance')->findBySlug( new MongoRegex("/^$sSlug/i") );
		$aSlugs = array_map(function($oFinance){
			return $oFinance->getSlug();
		}, $lFinances->toArray());

		$this->load->model( 'tool/slug' );
		$sSlug = $this->model_tool_slug->getSlug( $sSlug, $aSlugs );

		$oFinance = new Finance();
		$oFinance->setName( $aData['name'] );
		$oFinance->setSlug( $sSlug );
		$oFinance->setOrder( $aData['order'] );
		$oFinance->setGroup( $oFiGroup );
		if ( $oFiParent ){
			$oFinance->setParentFinance( $oFiParent );
		}
		$oFinance->setStatus( $aData['status'] );

		$this->dm->persist( $oFinance );
		$this->dm->flush();

		return $oFinance;
	}

	public function editFinance( $id, $aData = array() ) {
		// name is required
		if ( isset($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		// group is required
		if ( isset($aData['group']) ) {
			$aData['group'] = trim($aData['group']);
			$oFiGroup = $this->dm->getRepository('Document\Finance\Group')->find( $aData['group'] );
			if ( !$oFiGroup ) return false;
		}else {
			return false;
		}

		// parent is required
		if ( isset($aData['parent_id']) ) {
			$oFiParent = $this->dm->getRepository('Document\Finance\Finance')->find( $aData['parent_id'] );
		}

		// order is required
		if ( isset($aData['order']) ) {
			$aData['order'] = trim($aData['order']);
		}else {
			return false;
		}

		$oFinance = $this->dm->getRepository('Document\Finance\Finance')->find( $id );
		if ( !$oFinance ){
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		// Slug
		// if ( $data['name'] != $oFinance->getName() ){
			$sSlug = $this->url->create_slug( $aData['name'] );
			$lFinances = $this->dm->getRepository('Document\Finance\Finance')->findBySlug( new MongoRegex("/^$sSlug/i") );
			$aSlugs = array_map(function($oFinance){
				return $oFinance->getSlug();
			}, $lFinances->toArray());
			$this->load->model( 'tool/slug' );
			$sSlug = $this->model_tool_slug->getSlug( $sSlug, $aSlugs );
			$oFinance->setSlug( $sSlug );
		// }

		$oFinance->setName( $aData['name'] );
		$oFinance->setGroup( $oFiGroup );
		$oFinance->setOrder( $aData['order'] );
		if ( $oFiParent ){
			$oFinance->setParentFinance( $oFiParent );
		}
		$oFinance->setStatus( $aData['status'] );

		$this->dm->flush();

		return true;
	}

	public function deleteFinances( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oFinance = $this->dm->getRepository('Document\Finance\Finance')->find( $id );

				if ( $oFinance ) {
					$this->dm->remove( $oFinance );
				}
			}
		}

		$this->dm->flush();
	}

	public function getFinances( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		if ( empty($aData['order']) ){
			$aData['order'] = 1;
		}

		if ( empty($aData['sort']) ){
			$aData['sort'] = 'order';
		}

		return $this->dm->getRepository('Document\Finance\Finance')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['sort'] => $aData['order']) );
	}

	public function getFinance( $id ){
		return $this->dm->getRepository('Document\Finance\Finance')->find( $id );
	}

	public function getFinanceByName( $sFiName ){
		return $this->dm->getRepository('Document\Finance\Finance')->findOneByName( $sFiName );
	}

	public function import( $files ){
		$this->load->model('finance/group');
		$this->load->model('finance/finance');
		$this->load->model('finance/date');
		$this->load->model('stock/finance');
		$this->load->model('stock/stock');
		
		$link_files = $files['tmp_name'];
		foreach ($link_files as $file) {
			$string = file_get_contents( $file );
			$aJson = json_decode( $string, true );

			$sStockCode = $aJson['StockCode'];
			$oStock = $this->model_stock_stock->getStock( array('code' => $sStockCode) );
			if ( !$oStock ){
				continue;
			}
			$aGroups = $aJson['Groups'];
			$aTimes = array();

			foreach ( $aGroups as $aGroup ) {
				$sGroupName = $aGroup['Name'];
				$aFinances = $aGroup['DataNames'];

				$oFiGroup = $this->model_finance_group->getGroupByName( $sGroupName );
				if ( !$oFiGroup ){
					$oFiGroup = $this->model_finance_group->addGroup(array(
						'name' => $sGroupName,
						'order' => 0, // set as default, update after
						'status' => true
					));
				}

				foreach ( $aFinances as $aFinance ) {
					$sFiName = $aFinance['Name'];
					$aFiValues = $aFinance['Values'];

					$oFinance = $this->getFinanceByName( $sFiName );
					if ( !$oFinance ){
						$oFinance = $this->addFinance(array(
							'name' => $sFiName,
							'group' => $oFiGroup->getId(),
							'order' => 0, // set as default, update after
							'status' => true
						));
					}

					$aFiResultValues = array();
					foreach ( $aFiValues as $aFiValue ) {
						$aFiResultValues[$aFiValue['Time']] = $aFiValue['Value'];
						$aTimes[$aFiValue['Time']] = $aFiValue['Time'];
					}

					$oStockFinances = $this->model_stock_finance->getFinances( $oStock->getId() );
					if ( $oStockFinances ){
						$oStockFinance = $oStockFinances->getFinanceById( $oFinance->getId() );
					}
					if ( !$oStockFinances || !$oStockFinance ){
						$this->model_stock_finance->addFinance( $oStock->getId(), array(
							'finance_id' => $oFinance->getId(),
							'status' => true,
							'values' => $aFiResultValues
						));
					}else{
						$this->model_stock_finance->editFinance( $oStock->getId(), $oStockFinances->getId(), array(
							'finance_id' => $oFinance->getId(),
							'status' => true,
							'values' => $aFiResultValues
						));
					}
				}
			}

			foreach ( $aTimes as $aTime ) {
				$aTimeParts = explode( '-', $aTime );
				if ( count($aTimeParts) < 2 ) continue;
				$oDate = $this->model_finance_date->getDateByTime( $aTimeParts[1], $aTimeParts[0] );
				if ( !$oDate ){
					$this->model_finance_date->addDate(array(
						'year' => $aTimeParts[0],
						'quarter' => $aTimeParts[1],
						'status' => true
					));
				}
			}
		}

		$this->dm->flush();

		return true;
	}

	public function searchFinanceByKeyword( $data = array() ) {
		return $this->dm->getRepository('Document\Finance\Finance')->findBy(array(
			'deleted' => false,
			'name' => new MongoRegex("/^" . trim($data['filter_name']) . "*/i")
		));
	}
}
?>