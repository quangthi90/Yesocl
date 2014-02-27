<?php
class ControllerBranchDetail extends Controller {
	public function index() {
  		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

    	$this->document->setTitle($this->language->get('heading_title'));

    	$oLoggedUser = $this->customer->getUser();

    	if ( empty($this->request->get['branch_slug']) ){
    		print("Branch slug is empty");
    		return false;
    	}

    	$sBranchSlug = $this->request->get['branch_slug'];
    	$oBranch = $oLoggedUser->getBranchBySlug( $sBranchSlug );

    	if ( !$oBranch ){
    		print("You not have authentication");
    		return false;
    	}

    	$oLoggedUser = $this->customer->getUser();

    	$this->load->model('branch/post');
    	$this->load->model('tool/image');

    	$lPosts = $this->model_branch_post->getPosts( array('branch_id' => $oBranch->getId()) );
    	$aUsers = array();
    	$aPosts = array();

    	foreach ( $lPosts as $oPost ) {
    		$aPost = $oPost->formatToCache();
    		$oUser = $oPost->getUser();

    		if ( empty($aUsers[$oUser->getId()]) ){
    			$aUser = $oUser->formatToCache();
    			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
    			$aUsers[$oUser->getId()] = $aUser;
    		}

    		if ( in_array($this->customer->getId(), $oPost->getLikerIds()) ){
				$aPost['isUserLiked'] = true;
			}else{
				$aPost['isUserLiked'] = false;
			}

			$oUser = $oPost->getUser();

			if ( $oUser->getId() == $oLoggedUser->getId() ){
				$aPost['is_del'] = true;
			}else{
				$aPost['is_del'] = false;
			}

			if ( $this->customer->getId() == $aPost['user_id'] ){
				$aPost['is_edit'] = true;
			}else{
				$aPost['is_edit'] = false;
			}

			if ( isset($aPost['thumb']) && !empty($aPost['thumb']) ){
				$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
			}else{
				$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
			}

    		$aPosts[] = $aPost;
    	}

    	$this->data['users'] = $aUsers;
    	$this->data['posts'] = $aPosts;
    	$this->data['post_type'] = $this->config->get('common')['type']['branch'];

    	// Branch
    	$aBranch = $oBranch->formatToCache();
    	if ( !empty($aBranch['logo']) ){
			$aBranch['logo'] = $this->model_tool_image->resize( $aBranch['logo'], 360, 360 );
		}else{
			$aBranch['logo'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 360, 360 );
		}
		$this->data['branch'] = $aBranch;

		// Categories
		$lCategories = $oBranch->getCategories();
		$aCategories = array();
		foreach ( $lCategories as $oCategory ) {
			$aCategories[] = array(
				'id' => $oCategory->getId(),
				'name' => $oCategory->getName()
			);
		}
		$this->data['categories'] = $aCategories;

		$this->session->setFlash( 'menu', 'branch' );
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/branch/detail.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/branch/detail.tpl';
		} else {
			$this->template = 'default/template/account/branch/detail.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
				
		$this->response->setOutput($this->twig_render());			
	}
}