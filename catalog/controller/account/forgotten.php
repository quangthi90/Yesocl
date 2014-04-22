<?php
class ControllerAccountForgotten extends Controller {
	private $error = array();

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
	      	$this->data['base'] = $this->config->get('config_ssl');
	    } else {
	      	$this->data['base'] = HTTP_SERVER;
	    }

		if ($this->customer->isLogged()) {
			$this->redirect($this->extension->path('HomePage'));
		}

		$this->language->load('account/forgotten');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('user/user');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->language->load('mail/forgotten');
			
			$password = $this->model_user_user->editPassword($this->request->post['email']);
			
			$subject = sprintf($this->language->get('text_subject'), 'Admin');
			
			$message  = sprintf($this->language->get('text_greeting'), 'Admin') . "\n\n";
			$message .= $this->language->get('text_password') . "\n\n";
			$message .= $password;

			$mail = new Mail();
			$mail->protocol = $this->config->get('email')['protocol'];
			// $mail->parameter = $this->config->get('config_mail_parameter');
			$mail->hostname = $this->config->get('email')['hostname'];
			$mail->username = $this->config->get('email')['username'];
			$mail->password = $this->config->get('email')['password'];
			$mail->port = $this->config->get('email')['port'];
			// $mail->timeout = $this->config->get('config_smtp_timeout');				
			$mail->setTo($this->request->post['email']);
			$mail->setFrom('admin@yesocl.com');
			$mail->setSender('Admin Yesocl');
			$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
			$mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
			$mail->send();
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->extension->path('LostPass'));
		}
		
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_your_email'] = $this->language->get('text_your_email');
		$this->data['text_email'] = $this->language->get('text_email');

		$this->data['entry_email'] = $this->language->get('entry_email');

		$this->data['button_continue'] = $this->language->get('button_continue');
		$this->data['button_back'] = $this->language->get('button_back');

		if (isset($this->session->data['success'])){
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		}elseif (isset($this->error['warning'])) {
			$this->data['warning'] = $this->error['warning'];
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/forgotten.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/forgotten.tpl';
		} else {
			$this->template = 'default/template/account/forgotten.tpl';
		}
		
		$this->children = array(
			'welcome/footer',
			'welcome/header'
		);
					
		$this->response->setOutput($this->twig_render());
	}

	private function validate() {
		if (!isset($this->request->post['email'])) {
			$this->error['warning'] = $this->language->get('error_email');
		} elseif ( !$oUser = $this->model_user_user->getUserFull(array('email' => $this->request->post['email'])) ) {
			$this->error['warning'] = $this->language->get('error_email');
		} elseif ( $oUser->getIsSocial() ) {
			$this->error['warning'] = $this->language->get('error_email_fb');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>