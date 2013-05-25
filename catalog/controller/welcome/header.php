<?php   
class ControllerWelcomeHeader extends Controller {
	protected function index() {
		$this->data['title'] = $this->document->getTitle();
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->data['action'] = $this->url->link('account/login/login', '', 'SSL');
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/welcome/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/welcome/header.tpl';
		} else {
			$this->template = 'default/template/welcome/header.tpl';
		}
		
    	$this->twig_render();
	} 	
}
?>