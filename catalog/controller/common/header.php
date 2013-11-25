<?php   
class ControllerCommonHeader extends Controller {
	protected function index() {
		$this->load->model('tool/image');

		$avatar = $this->customer->getAvatar();
		
		if( !empty($avatar) && file_exists(DIR_IMAGE . $avatar) ){
			$avatar = $this->model_tool_image->resize( $avatar, 180, 180, true );
		}else{
			$avatar = $this->model_tool_image->getGavatar( $this->customer->getEmail(), 180 );
		}
		
		$this->data['user_info'] = array(
			'avatar' => $avatar,
			'username' => $this->customer->getUsername()
		);

		if ( !$this->customer->isLogged() ){
			$this->data['action'] = array(
				'connect_face'	=> $this->facebook->getLoginUrl( array( 
					'scope' => 'publish_stream, email',
					'redirect_uri' => HTTP_SERVER . 'facebookcnt/',
					) 
				)
			);
		}
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/header.tpl';
		} else {
			$this->template = 'default/template/common/header.tpl';
		}
		
    	$this->twig_render();
	} 	
}
?>