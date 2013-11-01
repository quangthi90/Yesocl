<?php  
class ControllerCommonRefresh extends Controller {
	private $limit = 6;

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		$this->data['heading_title'] = $this->config->get('config_title');

		$this->load->model( 'branch/branch' );
		$this->load->model( 'cache/post' );
		$this->load->model( 'tool/image' );
		$this->load->model( 'user/user' );

		$branchs = $this->model_branch_branch->getAllBranchs()->toArray();

		$this->data['all_posts'] = array();

		$branch_ids = array_keys($branchs);
		$user_ids = array( $this->customer->getId() );

		$posts = $this->model_cache_post->getPosts(array(
			'sort' => 'created',
			'type_ids' => array_merge($branch_ids, $user_ids),
		));
		
		// ***** Bommer remove
		/*$post_count = count($posts);
		$count = 1;*/
		$list_posts = array();
		$user_ids = array();

		foreach ($posts as $i => $post) {
			// thumb
			if ( isset($post['thumb']) && !empty($post['thumb']) ){
				$image = $this->model_tool_image->resize( $post['thumb'], 400, 250 );
			}else{
				$image = null;
			}

			$post['image'] = $image;
			
			$post['href_user'] = $this->url->link('account/edit', 'user_slug=' . $post['user']['slug'], 'SSL');
			$post['href_post'] = $this->url->link('post/detail', 'post_slug=' . $post['slug'] . '&post_type=' . $this->config->get('common')['type']['branch'], 'SSL');
			$post['href_status'] = $this->url->link('post/comment/getComments', 'type_slug=' . $branch_slug, 'SSL');

			$this->data['posts'][] = $post;
			
			// ***** Bommer remove
			// Disable for update template
			// Remove this code when approve new template
			/*if ( $count % 6 == 0 || $count == $post_count ){
				$this->data['posts'][] = $list_posts;
				$list_posts = array();
			}

			$count++;*/

			$user_id = $post['user_id'];

			if ( in_array($user_id, $user_ids) ){
				$user_ids[] = $user_id;
			}
		}

		$this->data['users'] = array();
		$users = $this->model_user_user->getUsers( array('user_ids' => $user_ids) );

		if ( $users ){
			foreach ( $users as $user ) {
				$user = $user->formatToCache();

				if ( !empty($user['avatar']) ){
					$user['avatar'] = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
				}elseif ( !empty($user['email']) ){
		            $user['avatar'] = $this->model_tool_image->getGavatar( $user['email'], 180 );
		        }else{
		        	$user['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
				}

				$this->data['users'][$user['id']] = $user;
			}
		}
		
		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/comment/addComment', '', 'SSL');
		
		// set selected menu
		$this->session->setFlash( 'menu', 'refresh' );

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/refresh.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/refresh.tpl';
		} else {
			$this->template = 'default/template/common/refresh.tpl';
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