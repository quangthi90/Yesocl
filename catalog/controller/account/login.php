<?php 
class ControllerAccountLogin extends Controller {
	private $error = array();
	
	public function index() {
    if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
      $this->data['base'] = $this->config->get('config_ssl');
    } else {
      $this->data['base'] = HTTP_SERVER;
    }
    
		$this->load->model('account/customer');	

    if ( !$this->data['warning'] = $this->session->getFlash('warning_delete_account') ){
      if ( isset($this->session->data['warning']) ){
        $this->data['warning'] = $this->session->data['warning'];
        unset($this->session->data['warning']);
      }
    }
		
		if ($this->customer->isLogged()) {
      		$this->redirect( $this->extension->path('HomePage') );
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
    
    }elseif ( !isset( $this->request->post['password'] ) ) {
      $this->error['warning'] = $this->language->get('error_login');
    
    }elseif ( !isset( $this->request->post['remember'] ) ) {
      $this->request->post['remember'] = false;
    
    }elseif (!$this->customer->login($this->request->post['email'], $this->request->post['password'], $this->request->post['remember'])) {
        $this->error['warning'] = $this->language->get('error_login');
      }

    if (!$this->error) {
      return true;
    } else {
      return false;
    }
  }

  public function facebookConnect() {
    if ( empty($this->request->post['data']) ){
      return $this->response->setOutput(json_encode(array(
        'success' => 'not ok',
        'error' => 'Facebook Data is empty'
      )));
    }

    $aDatas = $this->request->post['data'];

    if ( empty($aDatas['email']) ){
      /*return $this->response->setOutput(json_encode(array(
        'success' => 'not ok',
        'error' => 'Your accout not have email, please update it in your facebook'
      ))); */
      $aDatas['email'] = $aDatas['username'] . '@facebook.com';
    }

    $this->load->language('account/login');
    $this->load->model('user/user');
    $this->load->model('user/background');

    $oUser = $this->model_user_user->getUserFull( array('email' => $aDatas['email']) );

    if ( $oUser ){
      if ( !$oUser->getIsSocial() ){
        return $this->response->setOutput(json_encode(array(
          'success' => 'not ok',
          'error' => 'Email already exists in the system'
        )));
      }

      $this->customer->login( $aDatas['email'], '', false, true );

      return $this->response->setOutput(json_encode(array(
        'success' => 'ok'
      )));
    }
    
    // get avatar
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $aDatas['id'] .'/picture?type=large&redirect=false');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = json_decode(curl_exec($ch));
    curl_close($ch);
    
    $sAvatarLink = DIR_IMAGE . 'data/upload/' . $aDatas['username'] . '.jpg';
    copy($response->data->url, $sAvatarLink);

    $oBirthday = new DateTime($aDatas['birthday']);

    $aUserData = array(
      'firstname' => $aDatas['first_name'],
      'lastname' => $aDatas['last_name'],
      'sex' => $aDatas['gender'] == 'female' ? '2' : '1',
      'email' => $aDatas['email'],
      'avatar' => $sAvatarLink,
      'location' => $aDatas['location'] ? $aDatas['location']['name'] : '',
      'day' => $oBirthday->format('d'),
      'month' => $oBirthday->format('m'),
      'year' => $oBirthday->format('Y')
    );

    // Create basic user
    $oUser = $this->model_user_user->addUser( $aUserData, true );

    // Add Education
    if ( !empty($aDatas['education']) ){
      foreach ( $aDatas['education'] as $aEducation ) {
        $aEducationData = array(
          'school' => $aEducation['school']['name'],
          'degree' => !empty($aEducation['degree']['name']) ? $aEducation['degree']['name'] : '',
          'ended' => !empty($aEducation['year']['name']) ? $aEducation['year']['name'] : ''
        );
        $this->model_user_background->addEducation( $oUser->getId(), $aEducationData, true );
      }
    }

    // Add Experience
    if ( !empty($aDatas['work']) ){
      foreach ( $aDatas['work'] as $aExperience ) {
        $current = false;
        if ( empty($aExperience['end_date']) ){
          $current = true;
        }
        $ended = null;
        if ( !empty($aExperience['end_date']) && $aExperience['end_date'] != '0000-00' ){
          $ended = new DateTime($aExperience['end_date']);
        }
        $started = null;
        if ( !empty($aExperience['start_date']) && $aExperience['start_date'] != '0000-00' ){
          $started = new DateTime($aExperience['start_date']);
        }
        $aExperienceData = array(
          'company' => $aExperience['employer']['name'],
          'current' => $current,
          'location' => $aExperience['location']['name'],
          'started_month' => $started ? $started->format('m') : null,
          'started_year' => $started ? $started->format('Y') : null,
          'ended_month' => $ended ? $ended->format('m') : null,
          'ended_year' => $ended ? $ended->format('Y') : null
        );
        $this->model_user_background->addExperience( $oUser->getId(), $aExperienceData, true );
      }
    }
    // exit;
    $this->customer->login( $aDatas['email'], '', false, true );

    return $this->response->setOutput(json_encode(array(
      'success' => 'ok'
    )));
  }
}
?>