<?php
class ControllerBranchDetail extends Controller {
	public function index() {
  		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

    	$this->document->setTitle($this->language->get('heading_title'));

    	if ( empty($this->request->get['branch_slug']) ){
    		print("Branch slug is empty");
    		return false;
    	}

    	$this->data['branch_slug'] = $this->request->get['branch_slug'];

    	$oLoggedUser = $this->customer->getUser();

    	$oBranch = $oLoggedUser->getBranchBySlug( $this->data['branch_slug'] );
    	if ( !$oBranch ){
    		print("You not have authentication");
    		return false;
    	}

    	$this->load->model('tool/image');
    	$this->load->model('user/user');

    	// Current User
		$oCurrUser = $this->model_user_user->getUserFull( array('user_slug' => $oLoggedUser->getSlug() ) );
		if ( !$oCurrUser ){
			return false;
		}

		$aCurrUser = $oCurrUser->formatToCache();
		$aCurrUser['avatar'] = $this->model_tool_image->getAvatarUser( $aCurrUser['avatar'], $aCurrUser['email'], 150, 150 );
		$this->data['current_user'] = $aCurrUser;

    	// Branch
    	$aBranch = $oBranch->formatToCache();
    	if ( !empty($aBranch['logo']) ){
			$aBranch['logo'] = $this->model_tool_image->resize( $aBranch['logo'], 360, 360 );
		}else{
			$aBranch['logo'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 360, 360 );
		}
		$this->data['branch'] = $aBranch;

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