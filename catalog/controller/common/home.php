<?php  
class ControllerCommonHome extends Controller {
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
		$this->load->model( 'branch/post' );
		$this->load->model( 'tool/image' );
		$this->load->model( 'user/user' );

		$branchs = $this->model_branch_branch->getAllBranchs();

		$this->data['all_posts'] = array();
		$this->data['branchs'] = array();

		$user_ids = array();

		foreach ( $branchs as $key => $branch ) {
			$branch = $branch->formatToCache();
			$branch_slug = $branch['slug'];

			$posts = $this->model_branch_post->getPosts(array(
				'branch_id' => $branch['id'],
				'limit' => 6
			));
			
			foreach ($posts as $i => $post) {
				if ( in_array($this->customer->getId(), $post->getLikerIds()) ){
					$liked = true;
				}else{
					$liked = false;
				}

				$post = $post->formatToCache();

				// thumb
				if ( isset($post['thumb']) && !empty($post['thumb']) ){
					$image = $this->model_tool_image->resize( $post['thumb'], 400, 250, true );
				}else{
					$image = null;
				}

				$post['image'] = $image;
				
				$post['isUserLiked'] = $liked;

				$this->data['all_posts'][$branch_slug][] = $post;

				if ( !in_array($post['user_id'], $user_ids) ){
					$user_ids[] = $post['user_id'];
				}
			}

			$this->data['branchs'][] = $branch;
		}

		$users = $this->model_user_user->getUsers( array('user_ids' => $user_ids) );

		$this->data['users'] = array();
		foreach ( $users as $user ) {
			$user = $user->formatToCache();

			$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

			$this->data['users'][$user['id']] = $user;
		}

		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/comment/addComment', '', 'SSL');
		
		// set selected menu
		$this->session->setFlash( 'menu', 'home' );

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
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