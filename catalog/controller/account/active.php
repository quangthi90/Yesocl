<?php 
class ControllerAccountActive extends Controller {
	public function index() {
		if ( empty($this->request->get['token']) ){
			$this->redirect($this->extension->path('WelcomePage'));
		}

		$token = $this->request->get['token'];

		$this->load->model('user/user');

		if ( !$user = $this->model_user_user->active($token) ){
			$this->redirect($this->extension->path('WelcomePage'));
		}

		$this->customer->loginByToken( $user->getPrimaryEmail()->getEmail() );

		unset($this->session->data['guest']);

		$this->redirect($this->extension->path('HomePage'));
  	}

  	public function resendActiveLink() {
		$oLoggedUser = $this->customer->getUser();
		
		if ( !$sToken = $oLoggedUser->getToken() ){
			$this->redirect($this->extension->path('HomePage'));
		}

		$this->load->model('tool/mail');

		$this->language->load('mail/user');

		$sSubject = sprintf($this->language->get('text_subject'), $this->config->get('config_name'));		
		$sMessage = sprintf($this->language->get('text_welcome'), $this->config->get('config_name')) . "\n\n";
		$sMessage .= $this->language->get('text_approval') . "\n" ;
		$sMessage .= $this->extension->path('ActiveAccount', array('token' => $sToken)) . "\n\n";
		$sMessage .= $this->language->get('text_services') . "\n\n";
		$sMessage .= $this->language->get('text_thanks') . "\n";
		$sMessage .= $this->config->get('config_name');
		
		$this->model_tool_mail->sendMail( $oLoggedUser->getPrimaryEmail()->getEmail(), $sSubject, $sMessage );

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
        )));
  	}
}
?>