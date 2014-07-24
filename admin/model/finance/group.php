<?php
use Document\Finance\Group;

class ModelFinanceGroup extends Model {
	public function addGroup( $aData = array() ) {
		// name is required
		if ( isset($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
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

		$oGroup = new Group();
		$oGroup->setName( $aData['name'] );
		$oGroup->setOrder( $aData['order'] );
		$oGroup->setStatus( $aData['status'] );

		$this->dm->persist( $oGroup );
		$this->dm->flush();

		return $oGroup;
	}

	public function editGroup( $id, $aData = array() ) {
		// name is required
		if ( isset($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		// order is required
		if ( isset($aData['order']) ) {
			$aData['order'] = trim($aData['order']);
		}else {
			return false;
		}

		$oGroup = $this->dm->getRepository('Document\Finance\Group')->find( $id );
		if ( !$oGroup ){
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oGroup->setName( $aData['name'] );
		$oGroup->setOrder( $aData['order'] );
		$oGroup->setStatus( $aData['status'] );

		$this->dm->flush();

		return true;
	}

	public function deleteGroups( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oGroup = $this->dm->getRepository('Document\Finance\Group')->find( $id );

				if ( $oGroup ) {
					$this->dm->remove( $oGroup );
				}
			}
		}

		$this->dm->flush();
	}

	public function getGroups( $aData = array() ){
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

		return $this->dm->getRepository('Document\Finance\Group')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['sort'] => $aData['order']) );
	}

	public function getAllGroups( $aData = array() ){
		if ( empty($aData['order']) ){
			$aData['order'] = 1;
		}

		if ( empty($aData['sort']) ){
			$aData['sort'] = 'order';
		}

		return $this->dm->getRepository('Document\Finance\Group')
			->findAll()
			->sort( array($aData['sort'] => $aData['order']) );
	}

	public function getGroup( $id ){
		return $this->dm->getRepository('Document\Finance\Group')->find( $id );
	}

	public function getGroupByName( $sGroupName ){
		return $this->dm->getRepository('Document\Finance\Group')->findOneByName( $sGroupName );
	}
}
?>