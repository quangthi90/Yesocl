<?php
use Document\Finance\Report;

class ModelFinanceReport extends Model {
	public function addReport( $aData = array() ) {
		// name is required
		if ( !isset($aData['name']) ) {
			return false;
		}else {
			$aData['name'] = trim($aData['name']);
		}

		// dates is required
		if ( !isset($aData['dates']) ) {
			return false;
		}else {
			$aData['dates'] = trim($aData['dates']);
		}

		// functions is required
		if ( empty($aData['functions']) ) {
			return false;
		}

		$oReport = new Report();
		$oReport->setName( $aData['name'] );
		$oReport->setDates( $aData['dates'] );
		$oReport->setFunctions( $aData['functions'] );

		$this->dm->persist( $oReport );
		$this->dm->flush();

		return true;
	}

	public function editReport( $id, $aData = array() ) {
		// name is required
		if ( !isset($aData['name']) ) {
			return false;
		}else {
			$aData['name'] = trim($aData['name']);
		}

		// dates is required
		if ( !isset($aData['dates']) ) {
			return false;
		}else {
			$aData['dates'] = trim($aData['dates']);
		}

		// functions is required
		if ( empty($aData['functions']) ) {
			return false;
		}

		$oReport = $this->dm->getRepository('Document\Finance\Report')->find( $id );
		if ( !$oReport ){
			return false;
		}

		$oReport->setName( $aData['name'] );
		$oReport->setDates( $aData['dates'] );
		$oReport->setFunctions( $aData['functions'] );

		$this->dm->persist( $oReport );
		$this->dm->flush();

		return true;
	}

	public function deleteReports( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oReport = $this->dm->getRepository('Document\Finance\Report')->find( $id );

				if ( $oReport ) {
					$oReport->setDeleted( true );
					$this->dm->flush();
				}
			}
		}
	}

	public function getReports( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		return $this->dm->getRepository('Document\Finance\Report')->findBy(array(
				'deleted' => false,
			))
			->skip( $aData['start'] )
			->limit( $aData['limit'] );
	}

	public function getAllReports(){
		return $this->dm->getRepository('Document\Finance\Report')->findAll();
	}

	public function getReport( $id ){
		return $this->dm->getRepository('Document\Finance\Report')->find( $id );
	}

	public function getDetailDates( $strDates ) {
		return array();
	}
}
?>