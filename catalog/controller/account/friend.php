<?php 
class ControllerAccountFriend extends Controller { 
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		$this->load->model('tool/image');
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/friend.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/friend.tpl';
		} else {
			$this->template = 'default/template/account/friend.tpl';
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