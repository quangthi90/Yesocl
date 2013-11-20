<?php 
class ControllerAccountAccount extends Controller { 
	private $limit = 20;

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
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
		$this->load->model('tool/image');
		$this->load->model('friend/friend');

		$user = $this->model_user_user->getUserFull( $this->request->get );

		if ( !$user ){
			return false;
		}

		$user_temp = $user->formatToCache();

		$user_temp['avatar'] = $this->model_tool_image->getAvatarUser( $user_temp['avatar'], $user_temp['email'] );

		$user_temp['fr_status'] = $this->model_friend_friend->checkFriendStatus( $this->customer, $user );
		// var_dump($user_temp['fr_status']); exit;
		$this->data['users'] = array( $user_temp['id'] => $user_temp );

		$this->data['current_user_id'] = $user->getId();

		$this->data['posts'] = array();
		if ( $user->getPostData() ){
			$posts = $user->getPostData()->getPosts();
		}else{
			$posts = array();
		}
		$start = 0;
		$count_post = 1;

		foreach ( $posts as $key => $post ) {
			if ( $key < $start ){
				continue;
			}

			if ( $count_post > $this->limit ){
				break;
			}

			if ( in_array($this->customer->getId(), $post->getLikerIds()) ){
				$liked = true;
			}else{
				$liked = false;
			}

			$user = $post->getUser();

			if ( !array_key_exists($user->getId(), $this->data['users']) ){
				$user = $user->formatToCache();

				$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

				$this->data['users'][$user['id']] = $user;
			}
			
			$post = $post->formatToCache();

			if ( isset($post['thumb']) && !empty($post['thumb']) ){
				$image = $this->model_tool_image->resize( $post['thumb'], 400, 250, true );
			}else{
				$image = null;
			}

			$post['image'] = $image;
			$post['isUserLiked'] = $liked;

			$this->data['posts'][] = $post;
			
			$count_post++;
		}

		$this->data['post_type'] = $this->config->get('common')['type']['user'];
		$this->data['date_format'] = $this->language->get('date_format_full');

		// set selected menu
		$this->session->setFlash( 'menu', 'wall' );
		
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