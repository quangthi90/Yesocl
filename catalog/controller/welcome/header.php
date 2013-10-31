<?php   
class ControllerWelcomeHeader extends Controller {
	protected function index() {
		$this->data['title'] = $this->document->getTitle();
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->data['action'] = array(
			'login' 		=> $this->url->link('account/login/login', '', 'SSL'),
			'home'			=> $this->url->link('common/home', '', 'SSL'),
			'login_page' 	=> $this->url->link('account/login', '', 'SSL'),
			'forgot_pass'	=> $this->url->link('account/forgotten', '', 'SSL'),
			'connect_face'	=> $this->facebook->getLoginUrl( array( 
				'scope' => 'publish_stream, email',
				'redirect_uri' => HTTP_SERVER . 'facebookcnt/',
				) 
			)
		);
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/welcome/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/welcome/header.tpl';
		} else {
			$this->template = 'default/template/welcome/header.tpl';
		}
		
    	$this->twig_render();
	} 	
}
?>