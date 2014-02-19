<?php 
class ControllerAccountWall extends Controller { 
	private $iLimit = 20;

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		$this->data['heading_title'] = $this->config->get('config_title');

		if ( !empty($this->request->get['user_slug']) ){
			$sUserSlug = $this->request->get['user_slug'];
		}elseif ( $this->customer->isLogged() ){
			$sUserSlug = $this->customer->getSlug();
		}else{
			$this->redirect( $this->extension->path('HomePage') );
		}

		$this->load->model('user/user');
		$this->load->model('tool/image');
		$this->load->model('friend/friend');

		$oLoggedUser = $this->customer->getUser();
		$oCurrUser = $this->model_user_user->getUserFull( array('user_slug' => $sUserSlug) );

		if ( !$oCurrUser ){
			return false;
		}

		$aUser = $oCurrUser->formatToCache();

		$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'], 150, 150 );
		$aUser['fr_status'] = $this->model_friend_friend->checkFriendStatus( $this->customer->getId(), $oCurrUser->getId() );
		$this->data['users'] = array( $aUser['id'] => $aUser );

		$this->data['current_user_id'] = $oCurrUser->getId();

		$this->data['posts'] = array();
		if ( $oCurrUser->getPostData() ){
			$lPosts = $oCurrUser->getPostData()->getPosts();
		}else{
			$lPosts = array();
		}
		$iStart = 0;
		$iCountPost = 1;

		foreach ( $lPosts as $iKey => $oPost ) {
			if ( $iKey < $iStart ){
				continue;
			}

			if ( $iCountPost > $this->iLimit ){
				break;
			}

			$aPost = $oPost->formatToCache();

			if ( in_array($this->customer->getId(), $oPost->getLikerIds()) ){
				$aPost['isUserLiked'] = true;
			}else{
				$aPost['isUserLiked'] = false;
			}

			$oUser = $oPost->getUser();

			if ( $oCurrUser->getId() == $oLoggedUser->getId() || $oLoggedUser->getId() == $oUser->getId() ){
				$aPost['is_del'] = true;
			}else{
				$aPost['is_del'] = false;
			}

			if ( $this->customer->getId() == $aPost['user_id'] ){
				$aPost['is_edit'] = true;
			}else{
				$aPost['is_edit'] = false;
			}

			if ( !array_key_exists($oUser->getId(), $this->data['users']) ){
				$aUser = $oUser->formatToCache();

				$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

				$this->data['users'][$aUser['id']] = $aUser;
			}

			if ( isset($aPost['thumb']) && !empty($aPost['thumb']) ){
				$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
			}else{
				$aPost['image'] = null;
			}

			$this->data['posts'][] = $aPost;
			
			$iCountPost++;
		}

		$this->data['post_type'] = $this->config->get('common')['type']['user'];

		// set selected menu
		$this->session->setFlash( 'menu', 'wall' );
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/wal.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/wall.tpl';
		} else {
			$this->template = 'default/template/account/wall.tpl';
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