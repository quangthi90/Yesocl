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
			$query = $this->client->createSelect(
	    		array(
					'mappedDocument' => 'Document\User\User',
					)
	    	);
	 
			$query_data = 'solrFriendList_t:*' . $this->customer->getId() . '*';

			if ( isset( $data['filter_name'] ) && is_string( $data['filter_name'] ) ) {
				$query_data .= ' AND solrUserContent_t:*' . trim( $data['filter_name'] ) . '*';
			}

			if ( isset( $data['filter_gender'] ) && is_string( $data['filter_gender'] ) ) {
				$query_data .= ' AND gender_t:' . (int) $data['filter_gender'];
			}

			if ( isset( $data['start'] ) ) {
				$data['start'] = (int)$data['start'];
			}else {
				$data['start'] = 0;
			}

			if ( isset( $data['limit'] ) ) {
				$data['limit'] = (int)$data['limit'];
			}else {
				$data['limit'] = 10;
			}

			$query->setQuery( $query_data );
			$query->setRows( $data['limit'] );
			$query->setStart( $data['start'] );
	 
			$this->load->model('tool/image');
			foreach ($this->client->execute( $query ) as $friend) {
				$friend = $this->dm->getRepository('Document\User\User')->find( $friend->getId() );

				if ( strlen( $friend->getAvatar() ) > 0 ){
					$avatar = $this->model_tool_image->resize( $friend->getAvatar(), 65, 65 );
				}elseif ( strlen( $friend->getPrimaryEmail()->getEmail() ) > 0 ){
			        $avatar = $this->model_tool_image->getGavatar( $friend->getPrimaryEmail()->getEmail(), 65 );
			    }else{
			        $avatar = $this->model_tool_image->resize( 'no_user_avatar.png', 65, 65 );
				}

				$multiFriend = $this->getTotalMultiFriends();

				$results[] = array(
					'id' => $friend->getId(),
					'username' => $friend->getUsername(),
					'image' => $avatar,
					'name' => $friend->getFullname(),
					'industry' => $friend->getMeta()->getIndustry(),
					'url' => $this->url->link( 'wall-page/' . $friend->getSlug(), '', 'SSL' ),
					'unFriend' => $this->url->link( 'friend/remove/' . $friend->getSlug(), '', 'SSL' ),
					'numFriend' => ( $multiFriend == 0 ) ? 'Not have multi friend' : $multiFriend,
					);
			}
		}

		return $results;
	}

	public function getMultiFriends( $data = array() ) {
		$results = array();

		if ( $this->customer->isLogged() && isset( $data['friendId'] ) ) {
			$query = $this->client->createSelect(
	    		array(
					'mappedDocument' => 'Document\User\User',
					)
	    	);
	 
			$query_data = 'solrFriendList_t:*' . $this->customer->getId() . '* AND solrFriendList_t:*' . $data['friendId'] . '*';

			if ( isset( $data['filter_name'] ) && is_string( $data['filter_name'] ) ) {
				$query_data .= ' AND solrUserContent_t:*' . trim( $data['filter_name'] ) . '*';
			}

			if ( isset( $data['filter_gender'] ) && is_string( $data['filter_gender'] ) ) {
				$query_data .= ' AND gender_t:' . (int) $data['filter_gender'];
			}

			if ( isset( $data['start'] ) ) {
				$data['start'] = (int)$data['start'];
			}else {
				$data['start'] = 0;
			}

			if ( isset( $data['limit'] ) ) {
				$data['limit'] = (int)$data['limit'];
			}else {
				$data['limit'] = 10;
			}

			$query->setQuery( $query_data );
			$query->setRows( $data['limit'] );
			$query->setStart( $data['start'] );
	 
			$this->load->model('tool/image');
			foreach ($this->client->execute( $query ) as $friend) {
				$friend = $this->dm->getRepository('Document\User\User')->find( $friend->getId() );

				if ( strlen( $friend->getAvatar() ) > 0 ){
					$avatar = $this->model_tool_image->resize( $friend->getAvatar(), 65, 65 );
				}elseif ( strlen( $friend->getPrimaryEmail()->getEmail() ) > 0 ){
			        $avatar = $this->model_tool_image->getGavatar( $friend->getPrimaryEmail()->getEmail(), 65 );
			    }else{
			        $avatar = $this->model_tool_image->resize( 'no_user_avatar.png', 65, 65 );
				}

				$results[] = array(
					'id' => $friend->getId(),
					'username' => $friend->getUsername(),
					'image' => $avatar,
					'name' => $friend->getFullname(),
					'industry' => $friend->getMeta()->getIndustry(),
					'url' => $this->url->link( 'wall-page/' . $friend->getSlug(), '', 'SSL' ),
					'unFriend' => $this->url->link( 'friend/remove/' . $friend->getSlug(), '', 'SSL' ),
					);
			}
		}

		return $results;
	}

	public function getTotalMultiFriends( $data = array() ) {
		$results = array();

		if ( $this->customer->isLogged() && isset( $data['friendId'] ) ) {
			$query = $this->client->createSelect(
	    		array(
					'mappedDocument' => 'Document\User\User',
					)
	    	);
	 
			$query_data = 'solrFriendList_t:*' . $this->customer->getId() . '* AND solrFriendList_t:*' . $data['friendId'] . '*';

			if ( isset( $data['filter_name'] ) && is_string( $data['filter_name'] ) ) {
				$query_data .= ' AND solrUserContent_t:*' . trim( $data['filter_name'] ) . '*';
			}

			if ( isset( $data['filter_gender'] ) && is_string( $data['filter_gender'] ) ) {
				$query_data .= ' AND gender_t:' . (int) $data['filter_gender'];
			}

			$query->setQuery( $query_data );
			$query->setRows( 10000000 );
			$query->setStart( 0 );
	 
			$results = $this->client->execute( $query );
		}

		return count( $results );
	}
}
?>