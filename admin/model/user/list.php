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

		// description
		if ( !isset($aData['description']) ) {
			$aData['description'] = '';
		}

		// status
		if ( !isset($aData['status']) ) {
			$aData['status'] = true;
		}else {
			$aData['status'] = (int)$aData['status'];
		}

		// users
		if ( empty($aData['users']) ) {
			$aData['users'] = array();
		}

		$users = array();
		foreach ($aData['users'] as $key => $value) {
			$users[$value['id']] = $value['id'];
		}

		$oUserList = new UserList();
		$oUserList->setName( $aData['name'] );
		$oUserList->setCode( $aData['code'] );
		$oUserList->setDescription( $aData['description'] );
		$oUserList->setStatus( $aData['status'] );
		$oUserList->setUsers( $users );

		$this->dm->persist( $oUserList );
		$this->dm->flush();

		return true;
	}

	public function editUserList( $id, $aData = array() ) {
		// name is required
		if ( !isset($aData['name']) ) {
			return false;
		}else {
			$aData['name'] = trim($aData['name']);
		}

		// description
		if ( !isset($aData['description']) ) {
			$aData['description'] = '';
		}

		// status
		if ( !isset($aData['status']) ) {
			$aData['status'] = true;
		}else {
			$aData['status'] = (int)$aData['status'];
		}

		// users
		if ( empty($aData['users']) ) {
			$aData['users'] = array();
		}

		$users = array();
		foreach ($aData['users'] as $key => $value) {
			$users[$value['id']] = $value['id'];
		}

		$oUserList = $this->dm->getRepository('Document\User\UserList')->find( $id );
		if ( !$oUserList ){
			return false;
		}

		$oUserList->setName( $aData['name'] );
		$oUserList->setDescription( $aData['description'] );
		$oUserList->setStatus( $aData['status'] );
		$oUserList->setUsers( $users );

		$this->dm->persist( $oUserList );
		$this->dm->flush();

		return true;
	}

	public function deleteUserLists( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oUserList = $this->dm->getRepository('Document\User\UserList')->find( $id );

				if ( $oUserList ) {
					$this->dm->remove($oUserList);
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

	public function getAllUserLists(){
		return $this->dm->getRepository('Document\User\UserList')->findAll();
	}

	public function getUserList( $id ){
		return $this->dm->getRepository('Document\User\UserList')->find( $id );
	}

	public function getDetailUsers( $aUsers ) {
		$this->load->model('user/user');

		$result = array();
		foreach ($aUsers as $key => $value) {
			$oUser = $this->model_user_user->getUser( array( 'user_id' => $value ) );

			if ($oUser) {
				$primary = ( $oUser->getUsername()) ? $oUser->getUsername() : '';
				$primary .= ' (' . $oUser->getPrimaryEmail()->getEmail() . ')';

				$result[] = array(
					'name' => $primary,
					'id' => $oUser->getId(),
					);
			}
		}

		return $result;
	}
}
?>