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

		$user = $this->model_user_user->getUserFull( $this->request->get );

		if ( !$user ){
			return false;
		}
		$this->data['current_user_id'] = $user->getId();

		$this->data['posts'] = array();
		$posts = $user->getPostData()->getPosts();
		$start = 0;
		$count_post = 1;
		$this->data['users'] = array();

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
			
			$post = $post->formatToCache();

			if ( isset($post['thumb']) && !empty($post['thumb']) ){
				$image = $this->model_tool_image->resize( $post['thumb'], 400, 250 );
			}else{
				$image = null;
			}

			$post['image'] = $image;
			$post['isUserLiked'] = $liked;

			$this->data['posts'][] = $post;

			if ( !array_key_exists($post['user_id'], $this->data['users']) ){
				$user = $this->model_user_user->getUser( $post['user_slug'] );

				if ( !empty($user['avatar']) ){
					$user['avatar'] = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
				}elseif ( !empty($user['email']) ){
		            $user['avatar'] = $this->model_tool_image->getGavatar( $user['email'], 180 );
		        }else{
		        	$user['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
				}

				$this->data['users'][$post['user_id']] = $user;
			}
			
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