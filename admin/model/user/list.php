<?php
use Document\User\UserList;

class ModelUserList extends Model {
	public function addUserList( $aData = array() ) {
		// name is required
		if ( !isset($aData['name']) ) {
			return false;
		}else {
			$aData['name'] = trim($aData['name']);
		}

		// code is required
		if ( !isset($aData['code']) ) {
			return false;
		}else {
			$aData['code'] = trim($aData['code']);
		}

		// status
		if ( !isset($aData['status']) ) {
			$aData['status'] = true;
		}else {
			$aData['status'] = (int)$aData['status'];
		}

		// users is required
		if ( empty($aData['users']) ) {
			$aData['users'] = array();
		}

		$users = array();
		foreach ($aData['users'] as $key => $value) {
			$users[$value] = $value;
		}

		$oUserList = new UserList();
		$oUserList->setName( $aData['name'] );
		$oUserList->setCode( $aData['code'] );
		$oUserList->setStatus( $aData['status'] );
		$oUserList->setUsers( $users );

		$this->dm->persist( $oUserList );
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

		$functions = array();
		foreach ($aData['functions'] as $key => $value) {
			$functions[$value['name']] = $value['id'];
		}

		$oReport = $this->dm->getRepository('Document\Finance\Report')->find( $id );
		if ( !$oReport ){
			return false;
		}

		$oReport->setName( $aData['name'] );
		$oReport->setDates( $aData['dates'] );
		$oReport->setFunctions( $functions );

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

	public function getUserLists( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		return $this->dm->getRepository('Document\User\UserList')->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] );
	}

	public function getAllReports(){
		return $this->dm->getRepository('Document\Finance\Report')->findAll();
	}

	public function getReport( $id ){
		return $this->dm->getRepository('Document\Finance\Report')->find( $id );
	}

	public function getDetailFunction( $aFunction ) {
		$this->load->model('finance/function');

		$result = array();
		foreach ($aFunction as $key => $value) {
			$oFunction = $this->model_finance_function->getFunction( $value );

			if ($oFunction) {
				$result[] = array(
					'name' => $key,
					'function' => $oFunction->getName(),
					'function_id' => $oFunction->getId(),
					);
			}
		}

		return $result;
	}
}
?>