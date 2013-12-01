<?php  
class ControllerCommonHome extends Controller {
	private $limit = 6;

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
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
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250, true );
				}else{
					$aPost['image'] = null;
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

		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/comment/addComment', '', 'SSL');
		
		// set selected menu
		$this->session->setFlash( 'menu', 'home' );

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