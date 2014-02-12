<?php
class ControllerBranchList extends Controller {
	public function index() {
  		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$oCurrentUser = $this->customer->getUser();

		$lBranch = $oCurrentUser->getBranchs();

		$this->data['branchs'] = array();
		foreach ( $lBranch as $oBranch ) {
			$aBranch = $oBranch->formatToCache();

			$this->data['branchs'][] = $aBranch;
		}

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