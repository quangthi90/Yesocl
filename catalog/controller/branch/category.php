<?php  
class ControllerBranchCategory extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');

		$this->load->model( 'branch/category' );
		$this->load->model( 'branch/post' );
		$this->load->model('tool/image');
		$this->load->model('tool/cache');

		$category = $this->model_branch_category->getCategory( $this->request->get );
		
		$this->data['category'] = array(
			'id' => $category->getId(),
			'name' => $category->getName()
		);
		$this->data['all_posts'] = array();

		$posts = $this->model_branch_post->getPosts(array(
			'category_id' => $category->getId()
		));

		$post_count = $posts->count(true);
		$count = 1;
		$list_posts = array();

		foreach ($posts as $i => $post) {
			$post = $post->formatToCache();

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
			$post['href_post'] = $this->url->link('post/detail', 'post_slug=' . $post['slug'], 'SSL');
			$post['href_status'] = $this->url->link('post/post/getComments', 'type_slug=' . $branch_slug, 'SSL');

			$list_posts[] = $post;
			
			if ( $count % 6 == 0 || $count == $post_count ){
				$this->data['all_posts'][] = $list_posts;
				$list_posts = array();
			}

			$count++;
		}
		
		$this->data['date_format'] = $this->language->get('date_format_short');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/post/addComment', '', 'SSL');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/post/Category.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/post/Category.tpl';
		} else {
			$this->template = 'default/template/post/Category.tpl';
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