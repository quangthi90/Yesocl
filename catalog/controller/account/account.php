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

		if ( !empty($this->request->get['user_slug']) ){
			$user_slug = $this->request->get['user_slug'];
		}elseif ( $this->customer->isLogged() ){
			$user_slug = $this->customer->getSlug();
		}else{
			$this->redirect( $this->extension->path('HomePage') );
		}

		$this->load->model('user/user');
		$user = $this->model_user_user->getUserFull( $this->request->get );

		if ( !$user ){
			return false;
		}

		$this->data['posts'] = array();
		$posts = $user->getPosts();

		foreach ( $posts as $post ) {
			$post = $post->formatToCache();
			if ( isset($post['user']) && isset($post['user']['avatar']) ){
				$avatar = $this->model_tool_image->resize( $post['user']['avatar'], 180, 180 );
			}elseif ( isset($post['user']) && isset($post['user']['email']) ){
                $avatar = $this->model_tool_image->getGavatar( $post['user']['email'], 180 );
            }else{
				$avatar = $this->model_tool_image->getGavatar( $post['email'], 180 );
			}
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/account.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/account.tpl';
		} else {
			$this->template = 'default/template/account/account.tpl';
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