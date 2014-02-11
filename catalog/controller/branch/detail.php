<?php
class ControllerBranchDetail extends Controller {
	public function index() {
  		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

    	$this->document->setTitle($this->language->get('heading_title'));

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