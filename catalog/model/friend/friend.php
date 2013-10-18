<?php
class ModelFriendFriend extends Model {
	public function getListFriendIds( $data = array() ){
		$listfriendids = array();

		if ( !$this->customer->isLogged() ) {
			return $listfriendids;
		}

		$user = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );

		foreach ($user->getFriends() as $friend) {
			$friend = $friend->getUser();

			if ( $friend->getFriendRequests() && in_array($this->customer->getId(), $friend->getFriendRequests()) ){
				continue;
			}elseif ( $this->customer->getUser()->getFriendById($friend->getId()) ){
				$listfriendids[$friend->getId()] = $friend->getId();
			}else{
				continue;
			}
		}
		
		return $listfriendids;
	}
}
?>