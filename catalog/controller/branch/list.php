<?php
class ControllerBranchList extends Controller {
	public function index() {
  		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->load->model('tool/image');

		$oCurrentUser = $this->customer->getUser();

		$lBranch = $oCurrentUser->getBranches();

		$this->data['branches'] = array();
		foreach ( $lBranch as $oBranch ) {
			$aBranch = $oBranch->formatToCache();

			// thumb
			if ( !empty($aBranch['logo']) ){
				$aBranch['logo'] = $this->model_tool_image->resize( $aBranch['logo'], 130, 130 );
			}else{
				$aBranch['logo'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 130, 130 );
			}

			$this->data['branches'][] = $aBranch;
		}

		// set selected menu
		$this->session->setFlash( 'menu', 'branch' );

    	$this->document->setTitle($this->language->get('heading_title'));

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/branch/list.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/branch/list.tpl';
		} else {
			$this->template = 'default/template/account/branch/list.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
				
		$this->response->setOutput($this->twig_render());			
	}
}