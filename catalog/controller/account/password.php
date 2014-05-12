<?php
class ControllerAccountPassword extends Controller {
	private $error = array();
	     
  	public function index() {	
    	$this->language->load('account/password');

    	$this->document->setTitle($this->language->get('heading_title'));
			  
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('user/user');
			
			if ( !$this->model_user_user->editPassword(
				$this->customer->getEmail(),
				$this->request->post['oldPass'],
				$this->request->post['password']
			)){
				$this->error['warning'] = gettext('Warning: Old Password is not correct!');
			}
 
      		$this->session->setFlash( 'success', gettext('Success: Your password has been successfully updated!') );
	  
	  		$this->redirect( $this->extension->path('ChangePassword') );
    	}
			
    	$this->data['heading_title'] = $this->language->get('heading_title');

    	if ( $this->error['warning'] ) { 
			$this->session->setFlash( 'warning', $this->error['warning'] );
		}

		$this->data['show_old_pass'] = !$this->customer->getUser()->getPassword() ? false : true;

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
  		if ( $this->customer->getUser()->getPassword() && (utf8_strlen($this->request->post['oldPass']) < 4 || utf8_strlen($this->request->post['oldPass']) > 20) ) {
  			$this->error['warning'] = gettext('Old Password must be between 4 and 20 characters!');
    	
    	}elseif ( utf8_strlen($this->request->post['password']) < 4 || utf8_strlen($this->request->post['password']) > 20 ) {
      		$this->error['warning'] = gettext('New Password must be between 4 and 20 characters!');
    	
    	}elseif ( $this->request->post['confirm'] != $this->request->post['password'] ) {
      		$this->error['warning'] = gettext('Password confirmation does not match password!');
    	}
	
		if (!$this->error) {
	  		return true;
		} else {
	  		return false;
		}
  	}
}
?>
