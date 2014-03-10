<?php 
use DateTime;

class ControllerFriendFollow extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->load->model('user/user');
		$this->load->model('friend/follower');
		$this->load->model('friend/friend');
		$this->load->model('tool/image');

		if ( empty($this->request->get['user_slug']) ){
			$sUserSlug = $this->customer->getSlug();
		}else{
			$sUserSlug = $this->request->get['user_slug'];
		}

		$oLoggedUser = $this->customer->getUser();
		if ( $sUserSlug == $oLoggedUser->getSlug() ){
			$oCurrUser = $oLoggedUser;
		}else{
			$oCurrUser = $this->model_user_user->getUserFull( array('user_slug' => $sUserSlug) );
			if ( !$oCurrUser ){
				$oCurrUser = $oLoggedUser;
			}
		}

		// List follow users
		$oFollowers = $this->model_friend_follower->getFollowers( $oCurrUser->getId() );
		$lFollowings = $oFollowers->getFollowings();
		$aUsers = array();
		$aFollowingIds = array();

		foreach ( $lFollowings as $oFollower ) {
			$oUser = $oFollower->getUser();
			if ( empty($aUsers[$oUser->getId()]) ){
				$aUser = $oUser->formatToCache();
				
				$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
				$aUser['fr_status'] = $this->model_friend_friend->checkStatus( $oCurrUser->getId(), $oUser->getId() );
				$aUser['fl_status'] = $this->model_friend_follower->checkStatus( $oCurrUser->getId(), $oUser->getId() );

				$aUsers[$aUser['id']] = $aUser;
			}
			$aFollowingIds[] = $oUser->getId();
		}

		$lFolloweds = $oFollowers->getFolloweds();
		$aFollowedIds = array();
		foreach ( $lFolloweds as $oFollower ) {
			$oUser = $oFollower->getUser();
			if ( empty($aUsers[$oUser->getId()]) ){
				$aUser = $oUser->formatToCache();
				
				$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
				$aUser['fr_status'] = $this->model_friend_friend->checkStatus( $oCurrUser->getId(), $oUser->getId() );
				$aUser['fl_status'] = $this->model_friend_follower->checkStatus( $oCurrUser->getId(), $oUser->getId() );

				$aUsers[$aUser['id']] = $aUser;
			}
			$aFollowedIds[] = $oUser->getId();
		}

		// Current user by slug
		if ( empty($aUsers[$oCurrUser->getId()]) ){
			$aCurrUser = $oCurrUser->formatToCache();
			$aCurrUser['avatar'] = $this->model_tool_image->getAvatarUser( $aCurrUser['avatar'], $aCurrUser['email'] );
			$this->data['curr_user'] = $aCurrUser;
			$aUsers[$aCurrUser['id']] = $aCurrUser;
		}

		$this->data['following_ids'] = $aFollowingIds;
		$this->data['followed_ids'] = $aFollowedIds; 
		$this->data['current_user_id'] = $aCurrUser['id'];
		$this->data['users'] = $aUsers;
		
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		// set selected menu
		$this->session->setFlash( 'menu', 'follow' );

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/friend/follow.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/friend/follow.tpl';
		} else {
			$this->template = 'default/template/friend/follow.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>