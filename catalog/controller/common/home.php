<?php
class ControllerCommonHome extends Controller {
	private $limit = 6;

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');

		$this->load->model( 'branch/branch' );
		$this->load->model( 'branch/post' );
		$this->load->model( 'tool/image' );
		$this->load->model( 'user/user' );
		$this->load->model( 'cache/post' );
		$this->load->model( 'friend/follower' );

		$oLoggedUser = $this->customer->getUser();

		// Branch post
		$lBranches = $this->model_branch_branch->getAllBranches();

		$this->data['all_posts'] = array();
		$this->data['branches'] = array();

		$aUsers = array();

		foreach ( $lBranches as $key => $oBranch ) {
			$aBranch = $oBranch->formatToCache();
			$sBrancheSlug = $aBranch['slug'];

			$lPosts = $this->model_branch_post->getPosts(array(
				'branch_id' => $aBranch['id'],
				'limit' => 6
			));

			foreach ($lPosts as $oPost) {
				$aPost = $oPost->formatToCache();

				$aPostLikerIds = $oPost->getLikerIds();
				if ( !empty($aPostLikerIds) && in_array($this->customer->getId(), $aPostLikerIds) ){
					$aPost['isUserLiked'] = true;
				}else{
					$aPost['isUserLiked'] = false;
				}

				// thumb
				if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
				}else{
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
				}

				$this->data['all_posts'][$sBrancheSlug][] = $aPost;

				if ( empty($aUsers[$aPost['user_id']]) ){
					$oUser = $oPost->getUser();

					$aUser = $oUser->formatToCache();

					$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

					$aUsers[$aUser['id']] = $aUser;
				}
			}

			$this->data['branches'][] = $aBranch;
		}

		// Follow post
		if ( $oLoggedUser ){
			$oFollowers = $this->model_friend_follower->getFollowers( $oLoggedUser->getId() );

			$aUserIds = array();

			if ( $oFollowers ){
				$lFollowings = $oFollowers->getFollowings();

				foreach ( $lFollowings as $oFollower ) {
					$oUser = $oFollower->getUser();
					$aUserIds[] = $oUser->getId();
				}
			}

			$aPosts = $this->model_cache_post->getPosts(array(
				'sort' => 'created',
				'type_ids' => $aUserIds,
				'limit' => 6
			));

			if ( !$aPosts ){
				$aPosts = array();
			}

			$this->data['fl_posts'] = array();
			foreach ($aPosts as $oPost) {
				$aPost = $oPost->formatToCache();

				// thumb
				if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
				}else{
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
				}

				if ( in_array($this->customer->getId(), $aPost['liker_ids']) ){
					$aPost['isUserLiked'] = true;
				}else{
					$aPost['isUserLiked'] = false;
				}

				$aPost['description'] = $aPost['content'];

				$this->data['fl_posts'][] = $aPost;

				if ( empty($aUsers[$aPost['user_id']]) ){
					$aUser = $this->model_user_user->getUser( $aPost['user_slug'] );
					if ( !$aUser ){
						continue;
					}
					$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
					$aUsers[$aUser['id']] = $aUser;
				}
			}

			$this->data['users'] = $aUsers;
		}

		$this->data['branch_type'] = $this->config->get('common')['type']['branch'];
		$this->data['user_type'] = $this->config->get('common')['type']['user'];

		// set selected menu
		$this->session->setFlash( 'menu', 'home' );

		// Check current account is actived
		if ( $this->config->get('user')['checking']['active'] ) {
			$date = new DateTime();
			if ( $oLoggedUser && $oLoggedUser->getToken() != '' && $oLoggedUser->getTokenTime() >= $date ){
				$this->data['warning_active'] = 'An active link has been sent to your email, please active your account before ' . $oLoggedUser->getTokenTime()->format('d/m/Y') . ' (your account will be DELETED if you do not active before this time)';
			}
		}

		// Facebook config
		$this->data['fb_app_id'] = FB_API_ID;

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
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