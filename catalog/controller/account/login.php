<?php 
class ControllerAccountLogin extends Controller {
	private $error = array();
	
	public function index() {
		$this->load->model('account/customer');	

		if ( isset($this->session->data['warning']) ){
			$this->data['warning'] = $this->session->data['warning'];
			unset($this->session->data['warning']);
		}	
		
		if ($this->customer->isLogged()) {
      		$this->redirect($this->url->link('common/home', '', 'SSL'));
    	}
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/login.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/login.tpl';
		} else {
			$this->template = 'default/template/account/login.tpl';
		}

		$this->data['action'] = array(
			'login' 		=> $this->url->link('account/login/login', '', 'SSL'),
			'home'			=> $this->url->link('common/home', '', 'SSL'),
			'login_page' 	=> $this->url->link('account/login', '', 'SSL')
		);

		$this->children = array(
			'welcome/footer',
			'welcome/header'
		);
					
		$this->response->setOutput($this->twig_render());
  	}

  	public function login() {
		$this->load->model('account/customer');
	
    	$this->language->load('account/login');

    	if ( $this->customer->isLogged() ){
    		return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
								
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			unset($this->session->data['guest']);

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}  
		
      	if (isset($this->error['warning'])) {
			$this->session->data['warning'] = $this->error['warning'];
		}
						
		return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
  	}
  
  	private function validate() {
    	if (!$this->customer->login($this->request->post['email'], $this->request->post['password'], false, (isset($this->request->post['remember']) && $this->request->post['remember'])?true:false)) {
      		$this->error['warning'] = $this->language->get('error_login');
    	}	
		
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}  	
  	}

  	public function facebookConnect() {
  		if ( $this->facebook->getUser() ) {
  			$customer_data = $this->facebook->api('/me');
  			$email = $customer_data['email'];

  			$this->load->model('account/customer');
  			$customer = $this->model_account_customer->getCustomerByEmail( $email );

			if ( !$customer->getId() || empty( $customer ) ) {
				$data = array();
				$data['email'] = $email;
				if ( isset( $customer_data['first_name'] ) ) {
					$data['firstname'] = $customer_data['first_name'];
				}
				if ( isset( $customer_data['last_name'] ) ) {
					$data['lastname'] = $customer_data['last_name'];
				}
				if ( isset( $customer_data['gender'] ) ) {
					$data['sex'] = ($customer_data['gender'] == 'male') ? 1 : 0;
				}

	  			$this->model_account_customer->addCustomer( $data );
			}
  		}

  		if ( isset( $this->session->data['redirect'] ) ) {
  			$redirect_url = $this->url->link( $this->session->data['redirect'] );
  			unset( $this->session->data['redirect'] );
  		}else {
  			$redirect_url = $this->url->link( 'common/home' );
  		}
  		
  		$this->redirect( $redirect_url );
  	}
}
?>