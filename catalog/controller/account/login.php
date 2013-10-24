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
    if ( !isset( $this->request->post['email'] ) ) {
      $this->error['warning'] = $this->language->get('error_login');
    }

    if ( !isset( $this->request->post['password'] ) ) {
      $this->error['warning'] = $this->language->get('error_login');
    }

    if ( !isset( $this->request->post['remember'] ) ) {
      $this->request->post['remember'] = false;
    }

    if (!$this->error) {   
      if (!$this->customer->login($this->request->post['email'], $this->request->post['password'], false, $this->request->post['remember'])) {
        $this->error['warning'] = $this->language->get('error_login');
      }
      return true;
    } else {
      return false;
    }
  }

  public function facebookConnect() {
    if ( isset($_GET['code']) ) {
      $code = $_GET['code'];
      $facebook_access_token_uri = 'https://graph.facebook.com/oauth/access_token?client_id=' . $this->facebook->getAppId() . '&redirect_uri=' . HTTP_SERVER . 'facebookcnt/' . '&client_secret=' . $this->facebook->getAppSecret() . '&code=' . $code;

      $ch = curl_init(); 
      curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
      $response = curl_exec($ch); 
      curl_close($ch);
   
      // Get access token
      $access_token = str_replace('access_token=', '', explode("&", $response)[0]);
    }

    if ( isset( $access_token ) ) {
      // Get user infomation
      $ch = curl_init(); 
      curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
      $response = curl_exec($ch); 
      curl_close($ch);
   
      $customer_data = json_decode($response);
    }

    if ( isset( $this->session->data['redirect'] ) ) {
      $redirect_url = $this->url->link( $this->session->data['redirect'] );
      unset( $this->session->data['redirect'] );
    }else {
      $redirect_url = $this->url->link( 'common/home', '', 'SSL' );
    }

    if ( isset( $customer_data ) ) {
      $this->load->model('account/customer');

      $customer = $this->model_account_customer->getCustomerByEmail( $customer_data->email );

      if ( $customer && $customer->getId() ) {
        if ( !$this->customer->login( $customer_data->email, $customer_data->id ) ) {
          echo '<script language="javascript" type="text/javascript">
            alert("This email have already used!");
          </script>';
          exit();
        }
      }else {
        $data = array();

        $data['email'] = $customer_data->email;

        if ( isset( $customer_data->first_name ) ) {
          $data['firstname'] = $customer_data->first_name;
        }

        if ( isset( $customer_data->last_name ) ) {
          $data['lastname'] = $customer_data->last_name;
        }

        if ( isset( $customer_data->gender ) ) {
          $data['sex'] = ($customer_data->gender == 'male') ? 1 : 0;
        }

        $data['password'] = $customer_data->id;

        $this->model_account_customer->addCustomer( $data );

        $this->customer->login( $data['email'], $data['password'] );
      }
      
      $this->redirect( HTTP_SERVER . $redirect_url );
    }
  }
}
?>