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
}
?>