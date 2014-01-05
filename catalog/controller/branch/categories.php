<?php  
class ControllerBranchCategories extends Controller {
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
		$this->load->model( 'branch/category' );
		$this->load->model( 'branch/post' );
		$this->load->model( 'user/user' );
		$this->load->model( 'tool/image' );

		$oBranch = $this->model_branch_branch->getBranch( array('branch_slug' => $this->request->get['branch_slug']) );

		if ( !$oBranch ){
			return false;
		}

		$lCategories = $this->model_branch_category->getAllCategories( $oBranch->getId() );
		
		$this->data['categories'] = array();
		$this->data['all_posts'] = array();
		$aUserIds = array();

		foreach ( $lCategories as $oCategory ) {
			$aPosts = $this->model_branch_post->getLastPostByCategory( 
				$oBranch->getId(),
				$oCategory->getId()
			);
			
			if ( count($aPosts) == 0 ){
				continue;
			}

			$this->data['categories'][$oCategory->getId()] = array(
				'id' => $oCategory->getId(),
				'name' => $oCategory->getName(),
				'slug' => $oCategory->getSlug()
			);
			
			foreach ($aPosts as $i => $aPost) {
				if ( in_array($this->customer->getId(), $aPost['liker_ids']) ){
					$aPosts[$i]['isUserLiked'] = true;
				}else{
					$aPosts[$i]['isUserLiked'] = false;
				}

				// thumb
				if ( isset($aPost['thumb']) && !empty($aPost['thumb']) ){
					$aPosts[$i]['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
				}else{
					$aPosts[$i]['image'] = null;
				}

				$aUserIds[$aPost['user_id']] = $aPost['user_id'];
			}

			$this->data['all_posts'][$oCategory->getId()] = $aPosts;
		}

		$this->data['users'] = array();

		$lUsers = $this->model_user_user->getUsers( array('user_ids' => $aUserIds) );

		foreach ( $lUsers as $oUser ) {
			$aUser = $oUser->formatToCache();

			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

			$this->data['users'][$aUser['id']] = $aUser;
		}

		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/post/categories.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/post/categories.tpl';
		} else {
			$this->template = 'default/template/post/categories.tpl';
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