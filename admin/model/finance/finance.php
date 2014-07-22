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
			$aData['group'] = trim($aData['group']);
			$oFiGroup = $this->dm->getRepository('Document\Finance\Group')->find( $aData['group'] );
			if ( !$oFiGroup ) return false;
		}else {
			return false;
		}

		// parent is required
		if ( isset($aData['parent_id']) ) {
			$oFiParent = $this->dm->getRepository('Document\Finance\Finance')->find( $aData['parent_id'] );
		}else {
			return false;
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

		return true;
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
		}else {
			return false;
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

	public function searchFinanceByKeyword( $data = array() ) {
		return $this->dm->getRepository('Document\Finance\Finance')->findBy(array(
			'deleted' => false,
			'name' => new MongoRegex("/^" . trim($data['filter_name']) . "*/i")
		));
	}
}
?>