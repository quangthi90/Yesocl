<?php 
use DateTime;

class ControllerFriendFriend extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');
		$this->load->model('friend/friend');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		if ( $this->customer->getSlug() != $this->request->get['user_slug'] ){
			$oCurrUser = $this->model_user_user->getUserFull( $this->request->get );
		}else{
			$oCurrUser = $this->customer->getUser();
		}

		if ( !$oCurrUser ){
			return false;
		}

		$oLoggedUser = $this->customer->getUser();

		$aCurrUser = $oCurrUser->formatToCache();

		$aCurrUser['avatar'] = $this->model_tool_image->getAvatarUser( $aCurrUser['avatar'], $aCurrUser['email'], 180, 180 );
		$aCurrUser['fr_status'] = $this->model_friend_friend->checkFriendStatus( $oLoggedUser->getId(), $oCurrUser->getId() );
		$this->data['users'] = array($aCurrUser['id'] => $aCurrUser);

		$this->data['current_user_id'] = $oCurrUser->getId();

		$oFriends = $this->model_friend_friend->getFriends( $oCurrUser->getId() );
		if ( $oFriends ){
			$lFriends = $oFriends->getFriends();
		}else{
			$lFriends = array();
		}

		$this->data['friend_ids'] = array();
		
		foreach ( $lFriends as $oFriend ) {
			$oUser = $oFriend->getUser();

			$aUser = $oUser->formatToCache();

			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'], 65, 65 );
			$aUser['fr_status'] = $this->model_friend_friend->checkFriendStatus( $oLoggedUser->getId(), $oUser->getId() );
			$aUser['added'] = $oFriend->getCreated();

			$this->data['users'][$aUser['id']] = $aUser;
			$this->data['friend_ids'][$oUser->getId()] = $oUser->getId();
		}

		$this->data['groups'] = array();

		if ( $oFriends ){
			$lFriendGroups = $oFriends->getFriendGroups();
		}else{
			$lFriendGroups = array();
		}

		foreach ( $lFriendGroups as $oFriendGroup ) {
			$this->data['groups'][$oFriendGroup->getId()] = array(
				'id' => $oFriendGroup->getId(),
				'name' => $oFriendGroup->getName()
			);
		}

		// set selected menu
		$this->session->setFlash( 'menu', 'friend' );

		$this->data['filter_type'] = $this->config->get('friend')['filter']['type'];

		$sRecentTime = new DateTime('now');
		date_sub($sRecentTime, date_interval_create_from_date_string('7 days'));
		$this->data['recent_time'] = $sRecentTime;

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

	public function getAllFriends() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: not login',
            )));
		}

		$this->load->model('tool/image');

		$aFriends = array();

		$lFriends = $this->customer->getUser()->getFriends();

		if ( $lFriends ){
			foreach ( $lFriends as $oFriend ) {
				$oUser = $oFriend->getUser();

				$aUser = $oUser->formatToCache();

				// Mapping to return for tag js
				// Check again when change libs tag js
				$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
				$aUser['name'] = $aUser['username'];
				$aUser['id'] = $aUser['slug'];
				$aUser['type'] = 'contact';
				$aUser['wall'] = $this->extension->path('WallPage', array('user_slug' => $aUser['slug']));

				$aFriends[$aUser['slug']] = $aUser;
			}
		}

		return $this->response->setOutput( json_encode(array(
			'success' => 'ok',
			'friends' => $aFriends
		)));
	}
}
?>