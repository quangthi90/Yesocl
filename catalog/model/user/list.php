<?php
use Document\User\UserList;

class ModelUserList extends Model {
	public function getUserListByCode( $code ) {
		return $this->dm->getRepository('Document\User\UserList')->findOneBy( array( 'code' => trim($code) ) );
	}
}
?>