<?php
class ControllerAccountAvatar extends Controller {
	private $error = array();
	     
  	public function index() {	
    	//if (!$this->customer->isLogged()) {
      	//	$this->session->data['redirect'] = $this->url->link('account/avatar', '', 'SSL');

      	//	$this->redirect($this->url->link('account/login', '', 'SSL'));
    	//}

		$this->language->load('account/avatar');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		if ( isset($this->request->files['avatar']) ){
			$this->request->post['avatar'] = $this->request->files['avatar'];
		}

    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('account/customer');
			if ( $this->model_account_customer->editAvatar($this->request->post) ) {
	      		$this->session->data['success'] = $this->language->get('text_success');
		  
		  		$this->redirect($this->url->link('account/avatar', '', 'SSL'));
			}
			
 			$this->session->data['warning'] = $this->language->get('text_warning');
    	}

      	/*$this->data['breadcrumbs'] = array();

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
        	'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('account/avatar', '', 'SSL'),
        	'separator' => $this->language->get('text_separator')
      	);*/
			
    	$this->data['heading_title'] = $this->language->get('heading_title');

    	$this->data['text_select_image'] = $this->language->get('text_select_image');
    	$this->data['text_change'] = $this->language->get('text_change');
    	$this->data['text_remove'] = $this->language->get('text_remove');

    	if (isset($this->session->data['success'])){
    		$this->data['success'] = $this->session->data['success'];
    		unset($this->session->data['success']);
    	}elseif (isset($this->error['warning'])) { 
			$this->data['warning'] = $this->error['warning'];
		}
	
    	$this->data['action']['avatar'] = $this->url->link('account/avatar', '', 'SSL');
    	$this->data['action']['home'] = $this->url->link('common/home', '', 'SSL');

		$this->data['img_default'] = HTTP_IMAGE . 'no_image.jpg';

		if ( trim( $this->customer->getAvatar() ) != '' ) {
			$this->data['img_avatar'] = HTTP_IMAGE . $this->customer->getAvatar();
		}else {
			$this->data['img_avatar'] = $this->data['img_default'];
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/avatar.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/avatar.tpl';
		} else {
			$this->template = 'default/template/account/avatar.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->twig_render());			
  	}
  
  	private function validate() {
		if (!$this->error) {
	  		return true;
		} else {
	  		return false;
		}
  	}
}
?>
