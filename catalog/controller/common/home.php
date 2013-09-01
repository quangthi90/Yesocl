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
		$this->load->model('tool/image');

		$branchs = $this->model_branch_branch->getAllBranchs();

		$this->data['all_posts'] = array();
		$this->data['branchs'] = array();

		foreach ( $branchs as $key => $branch ) {
			$branch = $branch->formatToCache();
			$branch_slug = $branch['slug'];

			$posts = $this->model_branch_post->getPosts(array(
				'branch_id' => $branch['id'],
				'limit' => 6
			));
			
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
				// $posts[$i]['avatar'] = $avatar;
				
				$post['href_user'] = $this->url->link('account/edit', 'user_slug=' . $post['user']['slug'], 'SSL');
				$post['href_post'] = $this->url->link('post/detail', 'post_slug=' . $post['slug'] . '&post_type=' . $this->config->get('common')['type']['branch'], 'SSL');
				$post['href_status'] = $this->url->link('post/comment/getComments', 'type_slug=' . $branch_slug, 'SSL');

				$this->data['all_posts'][$branch_slug][] = $post;
			}

			$this->data['branchs'][] = $branch;
		}

		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/comment/addComment', '', 'SSL');
		
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