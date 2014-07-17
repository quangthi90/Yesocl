<?php
use Document\Finance\DateGroup;

class ModelFinanceDateGroup extends Model {
	public function addGroup( $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		// format is required
		if ( !empty($aData['format']) ) {
			$aData['format'] = trim($aData['format']);
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oDateGroup = new DateGroup();
		$oDateGroup->setName( $aData['name'] );
		$oDateGroup->setFormat( $aData['format'] );
		$oDateGroup->setStatus( $aData['status'] );

		$this->dm->persist( $oDateGroup );
		$this->dm->flush();

		return true;
	}

	public function editGroup( $id, $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		// format is required
		if ( !empty($aData['format']) ) {
			$aData['format'] = trim($aData['format']);
		}else {
			return false;
		}

		$oDateGroup = $this->dm->getRepository('Document\Finance\DateGroup')->find( $id );
		if ( !$oDateGroup ){
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oDateGroup->setName( $aData['name'] );
		$oDateGroup->setFormat( $aData['format'] );
		$oDateGroup->setStatus( $aData['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteGroups( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oDateGroup = $this->dm->getRepository('Document\Finance\DateGroup')->find( $id );

				if ( $oDateGroup ) {
					$this->dm->remove( $oDateGroup );
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

		return $this->dm->getRepository('Document\Finance\DateGroup')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] );
	}

	public function getGroup( $id ){
		return $this->dm->getRepository('Document\Finance\DateGroup')->find( $id );
	}
}
?>