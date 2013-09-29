<?php  
class ControllerCommonSidebarControl extends Controller {
	public function index() {
		$this->load->model('tool/image');

		$avatar = $this->customer->getAvatar();
		
		if( !empty($avatar) && file_exists(DIR_IMAGE . $avatar) ){
			$avatar = $this->model_tool_image->resize( $avatar, 180, 180 );
		}else{
			$avatar = $this->model_tool_image->getGavatar( $this->customer->getEmail(), 180 );
		}
		
		$this->data['user_info'] = array(
			'avatar' => $avatar,
			'username' => $this->customer->getUsername()
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