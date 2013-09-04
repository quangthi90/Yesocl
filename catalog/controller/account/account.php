<?php 
class ControllerAccountAccount extends Controller { 
	private $limit = 20;

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		$this->load->model('tool/image');
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		$this->data['heading_title'] = $this->config->get('config_title');

		$this->data['posts'] = array();
		$i = 0;
		
		

		if ( $this->customer->getAvatar() ){
			$avatar = $this->model_tool_image->resize( $this->customer->getAvatar(), 180, 180 );
		}else{
			$avatar = $this->model_tool_image->getGavatar( $this->customer->getEmail(), 180 );
		}

		$this->data['user_info'] = array(
			'avatar'	=> $avatar,
			'username'	=> $this->customer->getUsername()
		);

		$this->data['action']['comment'] = $this->url->link('post/comment/addComment', '', 'SSL');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/account.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/account.tpl';
		} else {
			$this->template = 'default/template/account/account.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',			
			// 'common/content_top',
			// 'common/content_bottom',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>