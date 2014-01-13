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

		$lBranchs = $this->model_branch_branch->getAllBranchs();

		$this->data['all_posts'] = array();
		$this->data['branchs'] = array();

		$aUsers = array();

		foreach ( $lBranchs as $key => $oBranch ) {
			$aBranch = $oBranch->formatToCache();
			$sBranchSlug = $aBranch['slug'];

			$lPosts = $this->model_branch_post->getPosts(array(
				'branch_id' => $aBranch['id'],
				'limit' => 6
			));
			
			foreach ($lPosts as $i => $oPost) {
				$aPost = $oPost->formatToCache();

				if ( in_array($this->customer->getId(), $oPost->getLikerIds()) ){
					$aPost['isUserLiked'] = true;
				}else{
					$aPost['isUserLiked'] = false;
				}

				// thumb
				if ( isset($aPost['thumb']) && !empty($aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
				}else{
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
				}

				$this->data['all_posts'][$sBranchSlug][] = $aPost;

				if ( empty($aUsers[$aPost['user_id']]) ){
					$oUser = $oPost->getUser();

					$aUser = $oUser->formatToCache();

					$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

					$aUsers[$aUser['id']] = $aUser;
				}
			}

			$this->data['branchs'][] = $aBranch;
		}

		$this->data['users'] = $aUsers;

		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		
		// set selected menu
		$this->session->setFlash( 'menu', 'home' );

		// Check current account is actived
		$date = new DateTime();
		$oLoggedUser = $this->customer->getUser();
		if ( $oLoggedUser->getToken() != '' && $oLoggedUser->getTokenTime() >= $date ){
			$this->data['warning_active'] = 'An active link has been sent to your email, please active your account before ' . $oLoggedUser->getTokenTime()->format('d/m/Y') . ' (your account will be DELETED if you do not active before this time)';
		}

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