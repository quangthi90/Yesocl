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

	public function getListFriends( $data = array() ) {
		$results = array();

		if ( $this->customer->isLogged() ) {
			$user = $this->dm->getRepository( 'Document\User\User' )->find( $this->customer->getId() );

			if ( $user ) {
				$this->load->model('tool/image');
				foreach ($user->getFriends() as $friend) {
					$friend = $friend->getUser();

					if ( strlen( $friend->getAvatar() ) > 0 ){
						$avatar = $this->model_tool_image->resize( $friend->getAvatar(), 40, 40 );
					}elseif ( strlen( $friend->getPrimaryEmail()->getEmail() ) > 0 ){
			            $avatar = $this->model_tool_image->getGavatar( $friend->getPrimaryEmail()->getEmail(), 40 );
			        }else{
			        	$avatar = $this->model_tool_image->resize( 'no_user_avatar.png', 40, 40 );
					}

					$results[] = array(
						'id' => $friend->getId(),
						'image' => $avatar,
						'name' => $friend->getFullname(),
						'url' => $this->url->link( 'wall-page/' . $friend->getSlug(), '', 'SSL' ),
						'numFriend' => count( $friend->getFriends() ),
						);
				}
			}
		}

		return $results;
	}
}
?>