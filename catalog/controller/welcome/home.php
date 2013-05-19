<?php  
class ControllerWelcomeHome extends Controller {
	public function index() {
		/*if ($this->customer->isLogged()) {
	  		$this->redirect($this->url->link('common/home', '', 'SSL'));
    	}*/

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/welcome/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/welcome/home.tpl';
		} else {
			$this->template = 'default/template/welcome/home.tpl';
		}
		
		$this->children = array(
			'welcome/footer',
			'welcome/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>