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
    		throw new Exception(gettext("Page not found!"));
    	}

    	$this->data['branch_slug'] = $this->request->get['branch_slug'];

    	$oLoggedUser = $this->customer->getUser();

    	$oBranch = $oLoggedUser->getBranchBySlug( $this->data['branch_slug'] );
    	if ( !$oBranch ){
    		throw new Exception(gettext("You don't have authentication to enter this Page!"));
    	}

    	$this->load->model('tool/image');

    	// Branch
    	$aBranch = $oBranch->formatToCache();
    	if ( !empty($aBranch['logo']) && is_file(DIR_IMAGE . $aBranch['logo']) ){
			$aBranch['logo'] = $this->model_tool_image->resize( $aBranch['logo'], 360, 360 );
		}else{
			$aBranch['logo'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['image'], 360, 360 );
		}
		$this->data['branch'] = $aBranch;

		// Categories
		$lCategories = $oBranch->getCategories();
		$aCategories = array();
		foreach ( $lCategories as $oCategory ) {
			$aCategories[] = array(
				'id' => $oCategory->getId(),
				'slug' => $oCategory->getSlug(),
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