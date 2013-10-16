<?php 
class ControllerAccountRegister extends Controller {
	private $error = array();

	public function register(){
		$this->language->load('account/register');

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_account_customer->addCustomer($this->request->post);
			
			$this->customer->login($this->request->post['email'], $this->request->post['password']);
			
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
            'success' => 'not ok',
            'warning' => $this->data['error_warning']
        )));
		
	}
	      
  	public function index() {  		

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/register/register.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/register/register.tpl';
		} else {
			$this->template = 'default/template/account/register/register.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->twig_render());
  	}

  	private function validate() {
    	if ((utf8_strlen($this->request->post['firstname']) < 1) || (utf8_strlen($this->request->post['firstname']) > 32)) {
      		$this->error['warning'] = $this->language->get('error_firstname');
    	
    	}elseif ((utf8_strlen($this->request->post['lastname']) < 1) || (utf8_strlen($this->request->post['lastname']) > 32)) {
      		$this->error['warning'] = $this->language->get('error_lastname');
    	
    	}elseif ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['email'])) {
      		$this->error['warning'] = $this->language->get('error_email');
    	
    	}elseif ($this->model_account_customer->getCustomerByEmail($this->request->post['email'])) {
      		$this->error['warning'] = $this->language->get('error_exists');
    	}else{
    		$this->load->library('recaptcha');
			$captcha = new Recaptcha();

			$resp = $captcha->recaptcha_check_answer($_SERVER["REMOTE_ADDR"], 
				$this->request->post['recaptcha_challenge_field'],
				$this->request->post['recaptcha_response_field']
			);

			if (!$resp->is_valid) {
	        	$this->error['warning'] = "Security code wasn't entered correctly";
	        }
	    }
        

    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
  	}	
}
?>