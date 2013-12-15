<?php 
class ControllerCommonNotification extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/notification.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/notification.tpl';
		} else {
			$this->template = 'default/template/common/notification.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function readAll(){
		$this->load->model('user/notification');

		$result = $this->model_user_notification->readAll( $this->customer->getId() );

		if ( $result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
	}
}
?>