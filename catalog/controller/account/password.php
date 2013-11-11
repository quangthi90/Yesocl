<?php
class ControllerAccountPassword extends Controller {
	private $error = array();
	     
  	public function index() {	
    	//if (!$this->customer->isLogged()) {
      	//	$this->session->data['redirect'] = $this->url->link('account/password', '', 'SSL');

      	//	$this->redirect($this->url->link('account/login', '', 'SSL'));
    	//}

		$this->language->load('account/password');

    	$this->document->setTitle($this->language->get('heading_title'));
			  
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('account/customer');
			
			$this->model_account_customer->editPassword($this->customer->getEmail(), $this->request->post['password']);
 
      		$this->session->data['success'] = $this->language->get('text_success');
	  
	  		$this->redirect($this->url->link('account/password', '', 'SSL'));
    	}
			
    	$this->data['heading_title'] = $this->language->get('heading_title');

    	$this->data['text_password'] = $this->language->get('text_password');

    	$this->data['entry_password'] = $this->language->get('entry_password');
    	$this->data['entry_confirm'] = $this->language->get('entry_confirm');

    	$this->data['button_continue'] = $this->language->get('button_continue');

    	if (isset($this->session->data['success'])){
    		$this->data['success'] = $this->session->data['success'];
    		unset($this->session->data['success']);
    	}elseif (isset($this->error['warning'])) { 
			$this->data['warning'] = $this->error['warning'];
		}
		
		if (isset($this->request->post['password'])) {
    		$this->data['password'] = $this->request->post['password'];
		} else {
			$this->data['password'] = '';
		}

		if (isset($this->request->post['confirm'])) {
    		$this->data['confirm'] = $this->request->post['confirm'];
		} else {
			$this->data['confirm'] = '';
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/password.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/password.tpl';
		} else {
			$this->template = 'default/template/account/password.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->twig_render());			
  	}
  
  	private function validate() {
    	if ((utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 20)) {
      		$this->error['warning'] = $this->language->get('error_password');
    	}elseif ($this->request->post['confirm'] != $this->request->post['password']) {
      		$this->error['warning'] = $this->language->get('error_confirm');
    	}
	
		if (!$this->error) {
	  		return true;
		} else {
	  		return false;
		}
  	}
}
?>
