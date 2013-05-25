<?php 
class ControllerAccountLogin extends Controller {
	private $error = array();
	
	public function index() {
		$this->load->model('account/customer');		
		
		if ($this->customer->isLogged()) {
      		$this->redirect($this->url->link('common/home', '', 'SSL'));
    	}
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/login.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/login.tpl';
		} else {
			$this->template = 'default/template/account/login.tpl';
		}

		$this->children = array(
			'welcome/footer',
			'welcome/header'
		);
					
		$this->response->setOutput($this->twig_render());
  	}

  	public function login() {
		$this->load->model('account/customer');
	
    	$this->language->load('account/login');
								
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			unset($this->session->data['guest']);
							
			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}  
		
      	if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
						
		return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
  	}
  
  	private function validate() {
    	if (!$this->customer->login($this->request->post['email'], $this->request->post['password'])) {
      		$this->error['warning'] = $this->language->get('error_login');
    	}	
		
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}  	
  	}
}
?>