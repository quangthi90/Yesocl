<?php 
class ControllerFriendFriend extends Controller { 
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');
		$this->load->model('friend/friend');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		if ( $this->customer->getSlug() != $this->request->get['user_slug'] ){
			$user = $this->model_user_user->getUserFull( $this->request->get );
		}else{
			$user = $this->customer->getUser();
		}

		if ( !$user ){
			return false;
		}

		$this->data['link_filter_friends'] = $this->url->link( 'friend/friend/getListFriends', '', 'SSL' );

		$this->data['data_filter_all'] = '{ "filter_request": "1" }';
		$this->data['data_filter_recent_added'] = '{}';
		$this->data['data_filter_male'] = '{ "filter_gender": "1" }';
		$this->data['data_filter_female'] = '{ "filter_gender": "2" }';

		$user_temp = $user->formatToCache();

		if ( !empty($user_temp['avatar']) ){
			$user_temp['avatar'] = $this->model_tool_image->resize( $user_temp['avatar'], 180, 180 );
		}elseif ( !empty($user_temp['email']) ){
            $user_temp['avatar'] = $this->model_tool_image->getGavatar( $user_temp['email'], 180 );
        }else{
        	$user_temp['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
		}

		$this->data['users'] = array( $user_temp['id'] => $user_temp );

		$this->data['current_user_id'] = $user->getId();

		$this->data['friends'] = $this->model_friend_friend->getListFriends( array(
			'filter_request' => 1,
			) 
		);

		/*$this->data['friends'] = array();

		foreach ( $this->user->getFriends() as $friend ) {
			$friend = $friend->getUser();

			if ( $friend->getFriendRequests() && in_array($this->customer->getId(), $friend->getFriendRequests()) ){
				$friend_status = 2;
			}elseif ( $this->customer->getUser()->getFriendById($friend->getId()) ){
				$friend_status = 1;
			}else{
				$friend_status = 0;
			}

			if ( $friend->getMeta() ){
				$meta = $friend->getMeta()->formatToCache();
			}else{
				$meta = array();
			}

			$friend = $friend->formatToCache();

			$friend['meta'] = $meta;
			$friend['fr_status'] = $friend_status;
			$friend['numFriend'] = ( $this->model_friend_friend->getTotalMultiFriends( array( 'friendId' => $friend['id'] ) ) == 0 ) ? 'Not have multi friend' : $this->model_friend_friend->getTotalMultiFriends( array( 'friendId' => $friend['id'] ) );

			if ( !array_key_exists($friend['id'], $this->data['users']) ){
				if ( !empty($friend['avatar']) ){
					$friend['avatar'] = $this->model_tool_image->resize( $friend['avatar'], 180, 180 );
				}elseif ( !empty($friend['email']) ){
		            $friend['avatar'] = $this->model_tool_image->getGavatar( $friend['email'], 180 );
		        }else{
		        	$friend['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
				}

				$this->data['users'][$friend['id']] = $friend;
				$this->data['friends'][$friend['id']] = $friend;
			}
		}*/

		$this->data['group'] = array();

		foreach ( $user->getFriendGroups() as $group ) {
			$this->data['group'][$group->getId()] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/friend/friend.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/friend/friend.tpl';
		} else {
			$this->template = 'default/template/friend/friend.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function getListFriends() {
		$json = array();

		if ( $this->customer->isLogged() ) {
			$data = array();

			if ( isset( $this->request->post['filter_name'] ) && (strlen( $this->request->post['filter_name'] ) > 0) ) {
				$data['filter_name'] = $this->request->post['filter_name'];
			}

			if ( isset( $this->request->post['filter_gender'] ) ) {
				$data['filter_gender'] = $this->request->post['filter_gender'];
			}

			if ( isset( $this->request->post['filter_request'] ) ) {
				$data['filter_request'] = $this->request->post['filter_request'];
			}

			$data['limit'] = 20;
			$data['start'] = 0;

			if ( count( $data ) > 0 ) {
				$this->load->model( 'friend/friend' );

				$json['success'] = 'ok';
				$json['friends'] = $this->model_friend_friend->getListFriends( $data );
			} 
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>