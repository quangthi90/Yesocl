<?php  
class ControllerCommonSidebarControl extends Controller {
	public function index() {
		$this->load->model('tool/image');

		$avatar = $this->customer->getAvatar();
		if( !empty($avatar) ){
			$avatar = $this->model_tool_image->resize( $avatar, 180, 180 );
		}else{
			$avatar = $this->model_tool_image->getGavatar( $this->customer->getEmail(), 180 );
		}

		$this->data['user_info'] = array(
			'avatar' => $avatar,
			'username' => $this->customer->getUsername(),
			'href' => $this->url->link('account/edit', 'user_slug=' . $this->customer->getSlug(), 'SSL')
		);

		$this->data['action'] = array(
			'home' => $this->url->link('common/home', '', 'SSL'),
			'profile' => $this->url->link('account/edit', '', 'SSL')
		);
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/sidebar_control.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/sidebar_control.tpl';
		} else {
			$this->template = 'default/template/common/sidebar_control.tpl';
		}
								
		$this->response->setOutput($this->twig_render());
	}
}
?>