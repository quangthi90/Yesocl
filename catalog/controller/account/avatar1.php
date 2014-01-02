<?php
class ControllerAccountAvatar1 extends Controller {
	private $error = array();
	     
  	public function index() {
    	
    	$this->document->setTitle($this->language->get('heading_title'));

		$this->data['img_default'] = HTTP_IMAGE . 'no_image.jpg';


		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/avatar1.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/avatar1.tpl';
		} else {
			$this->template = 'default/template/account/avatar1.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->twig_render());			
  	}
}
?>
