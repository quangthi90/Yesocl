<?php
class ControllerAccountAvatar extends Controller {
	private $error = array();
	     
	public function index() {
  	if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

    $this->document->setTitle($this->language->get('heading_title'));

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/temp/avatar.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/temp/avatar.tpl';
		} else {
			$this->template = 'default/template/account/temp/avatar.tpl';
		}
		
		$this->children = array(
      'layout/basic/leftsidebar',
      'layout/basic/rightsidebar',
      'layout/basic/navbar',
      'layout/basic/footer',
      'widget/account/user'
    );
				
		$this->response->setOutput($this->twig_render());			
	}
}
?>
