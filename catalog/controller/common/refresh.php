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
		$this->load->model('tool/image');

		$branchs = $this->model_branch_branch->getAllBranchs()->toArray();

		$this->data['all_posts'] = array();

		$branch_ids = array_keys($branchs);

		$posts = $this->model_cache_post->getPosts(array(
			'sort' => 'created',
			'type_ids' => $branch_ids,
		));

		$post_count = count($posts);
		$count = 1;
		$list_posts = array();

		foreach ($posts as $i => $post) {
			// avatar
			/*if ( isset($post['user']) && isset($post['user']['avatar']) ){
				$avatar = $this->model_tool_image->resize( $post['user']['avatar'], 180, 180 );
			}elseif ( isset($post['user']) && isset($post['user']['email']) ){
                $avatar = $this->model_tool_image->getGavatar( $post['user']['email'], 180 );
            }else{
				$avatar = $this->model_tool_image->getGavatar( $post['email'], 180 );
			}*/

			// thumb
			if ( isset($post['thumb']) && !empty($post['thumb']) ){
				$image = $this->model_tool_image->resize( $post['thumb'], 400, 250 );
			}else{
				$image = null;
			}

			$post['image'] = $image;
			// $post['avatar'] = $avatar;
			
			$post['href_user'] = $this->url->link('account/edit', 'user_slug=' . $post['user']['slug'], 'SSL');
			$post['href_post'] = $this->url->link('post/detail', 'post_slug=' . $post['slug'] . '&post_type=' . $this->config->get('common')['type']['branch'], 'SSL');
			$post['href_status'] = $this->url->link('post/post/getComments', 'type_slug=' . $branch_slug, 'SSL');

			$list_posts[] = $post;
			
			if ( $count % 6 == 0 || $count == $post_count ){
				$this->data['all_posts'][] = $list_posts;
				$list_posts = array();
			}

			$count++;
		}
		
		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/post/addComment', '', 'SSL');
		
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