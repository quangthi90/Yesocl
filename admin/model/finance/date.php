<?php
use Document\Finance\Date;

class ModelFinanceDate extends Model {
	public function addDate( $aData = array() ) {
		// quarter is required
		if ( isset($aData['quarter']) ) {
			$aData['quarter'] = trim($aData['quarter']);
		}else {
			return false;
		}

		// year is required
		if ( !empty($aData['year']) ) {
			$aData['year'] = trim($aData['year']);
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oDate = new Date();
		$oDate->setQuarter( $aData['quarter'] );
		$oDate->setYear( $aData['year'] );
		$oDate->setStatus( $aData['status'] );

		$this->dm->persist( $oDate );
		$this->dm->flush();

		return true;
	}

	public function editDate( $id, $aData = array() ) {
		// quarter is required
		if ( isset($aData['quarter']) ) {
			$aData['quarter'] = trim($aData['quarter']);
		}else {
			return false;
		}

		// year is required
		if ( !empty($aData['year']) ) {
			$aData['year'] = trim($aData['year']);
		}else {
			return false;
		}

		$oDate = $this->dm->getRepository('Document\Finance\Date')->find( $id );
		if ( !$oDate ){
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oDate->setQuarter( $aData['quarter'] );
		$oDate->setYear( $aData['year'] );
		$oDate->setStatus( $aData['status'] );

		$this->dm->flush();

		return true;
	}

	public function deleteDates( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oDate = $this->dm->getRepository('Document\Finance\Date')->find( $id );

				if ( $oDate ) {
					$this->dm->remove( $oDate );
				}
			}
		}

		$this->dm->flush();
	}

	public function getDates( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		return $this->dm->getRepository('Document\Finance\Date')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array('year' => -1, 'quarter' => 1) );
	}

	public function getAllDates(){
		return $this->dm->getRepository('Document\Finance\Date')->findAll();
	}

	public function getDate( $id ){
		return $this->dm->getRepository('Document\Finance\Date')->find( $id );
	}

	public function getDateByTime( $quarter, $year ){
		return $this->dm->getRepository('Document\Finance\Date')->findOneBy(array(
			'quarter' => $quarter,
			'year' => $year
		));
	}

	public function getDetailDates( $strDates ) {
		if ( trim($strDates) == '' ) {
			return array();
		}

		$aDates = explode( ',', $strDates );

		$result = array();
		foreach ($aDates as $key => $value) {
			$arr1 = explode( '(', str_replace(')', '(', trim($value)) );
			if ( !empty($arr1) ) {
				$result[] = array(
					'label' => trim($arr1[1]),
					'value' => trim($arr1[0]),
					);
			}
		}

		return $result;
	}

	public function isValidateDates( $dates ) {
		if ( !is_array($dates) ) {
			$dates = $this->getDetailDates( $dates );
		}

		foreach ($dates as $key => $value) {
			$tmp = explode('-', $value['value']);

			$tmpDate = $this->getDateByTime( (int)$tmp[1], (int)$tmp[0] );

			if ( !$tmpDate ) {
				return false;
			}
		}

		return true;
	}
}
?>