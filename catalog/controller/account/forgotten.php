<?php
class ControllerAccountForgotten extends Controller {
	private $error = array();

	public function index() {
		if ($this->customer->isLogged()) {
			$this->redirect($this->url->link('account/account', '', 'SSL'));
		}

		$this->language->load('account/forgotten');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('account/customer');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->language->load('mail/forgotten');
			
			$password = substr(md5(mt_rand()), 0, 10);
			
			$this->model_account_customer->editPassword($this->request->post['email'], $password);
			
			$subject = sprintf($this->language->get('text_subject'), 'Admin');
			
			$message  = sprintf($this->language->get('text_greeting'), 'Admin') . "\n\n";
			$message .= $this->language->get('text_password') . "\n\n";
			$message .= $password;

			$mail = new Mail();
			$mail->protocol = 'smtp';
			// $mail->parameter = $this->config->get('config_mail_parameter');
			$mail->hostname = 'ssl://smtp.gmail.com';
			$mail->username = 'bommerdesign@gmail.com';
			$mail->password = '13081990';
			$mail->port = '465';
			// $mail->timeout = $this->config->get('config_smtp_timeout');				
			$mail->setTo($this->request->post['email']);
			$mail->setFrom('admin@yesocl.com');
			$mail->setSender('Admin Yesocl');
			$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
			$mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
			$mail->send();
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('account/forgotten', '', 'SSL'));
		}

      	$this->data['breadcrumbs'] = array();

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),        	
        	'separator' => false
      	); 

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_account'),
			'href'      => $this->url->link('account/account', '', 'SSL'),     	
        	'separator' => $this->language->get('text_separator')
      	);
		
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_forgotten'),
			'href'      => $this->url->link('account/forgotten', '', 'SSL'),       	
        	'separator' => $this->language->get('text_separator')
      	);
		
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
		
		$this->data['action']['forgotten'] = $this->url->link('account/forgotten', '', 'SSL');
		$this->data['action']['home'] = $this->url->link('welcome/home', '', 'SSL');
		
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
		} elseif ($this->model_account_customer->getTotalCustomersByEmail($this->request->post['email']) == 0) {
			$this->error['warning'] = $this->language->get('error_email');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>