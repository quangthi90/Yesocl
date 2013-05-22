<?php  
class ControllerCommonSidebarControl extends Controller {
	public function index() {
		$this->load->model('tool/image');

			if ($product_info['image']) {
				$this->data['popup'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
			} else {
				$this->data['popup'] = '';
			}
		$avatar = $this->customer->getAvatar();
		if( !empty($avatar) ){
			$avatar = $this->model_tool_image->resize( $avatar, 180, 180 );
		}else{
			$avatar = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
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