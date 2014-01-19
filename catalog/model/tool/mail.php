<?php
class ModelToolMail extends Model {
	public function sendMail($sMailTo, $sSubject, $sMessage) {
		$oMail = new Mail();
		$oMail->protocol = $this->config->get('email')['protocol'];
		// $oMail->parameter = $this->config->get('config_mail_parameter');
		$oMail->hostname = $this->config->get('email')['hostname'];
		$oMail->username = $this->config->get('email')['username'];
		$oMail->password = $this->config->get('email')['password'];
		$oMail->port = $this->config->get('email')['port'];
		// $oMail->timeout = $this->config->get('config_smtp_timeout');				
		$oMail->setTo($sMailTo);
		$oMail->setFrom('admin@yesocl.com');
		$oMail->setSender('Admin Yesocl');
		$oMail->setSubject(html_entity_decode($sSubject, ENT_QUOTES, 'UTF-8'));
		$oMail->setText(html_entity_decode($sMessage, ENT_QUOTES, 'UTF-8'));
		$oMail->send();
	}
}
?>