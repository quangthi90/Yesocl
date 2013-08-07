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
		$this->data['branchs'] = $branchs;
		foreach ( $branchs as $branch_id => $branch ) {
			$posts = $this->model_branch_post->getPosts(array(
				'branch_id' => $branch_id
			));
			
			foreach ($posts as $i => $post) {
				// avatar
				if ( isset($post['user']) && isset($post['user']['avatar']) ){
					$avatar = $this->model_tool_image->resize( $post['user']['avatar'], 180, 180 );
				}elseif ( isset($post['user']) && isset($post['user']['email']) ){
	                $avatar = $this->model_tool_image->getGavatar( $post['user']['email'], 180 );
	            }else{
					$avatar = $this->model_tool_image->getGavatar( $post['email'], 180 );
				}

				// thumb
				if ( isset($post['thumb']) && !empty($post['thumb']) ){
					$image = $this->model_tool_image->resize( $post['thumb'], 400, 250 );
				}else{
					$image = null;
				}

				$posts[$i]['image'] = $image;
				$posts[$i]['avatar'] = $avatar;

				$this->data['all_posts'][$branch_id] = $posts;
				// $posts[$i]['avatar'] = $avatar;
				// $posts[$i]['href_user'] = $image;
				// $posts[$i]['href_post'] = $image;
				// $posts[$i]['href_status'] = $image;

				/*$this->data['all_posts'][$branch->getId()][] = array(
					'id'			=> $post->getId(),
					'author' 		=> $post->getAuthor(),
					'avatar' 		=> $avatar,
					'image'			=> $image,
					'title' 		=> $post->getTitle(),
					'content' 		=> html_entity_decode($post->getDescription()),
					'created'		=> $post->getCreated(),
					'comment_count' => $comment_count,
					'type'			=> 'company',
					'href_user'		=> $this->url->link('account/edit', 'user_slug=' . $post->getUser()->getSlug(), 'SSL'),
					'href_post'		=> $this->url->link('post/detail', 'post_slug=' . $post->getSlug(), 'SSL'),
					'href_status'	=> $this->url->link('post/post/getCommentByPost', '', 'SSL')
				);*/
			}
		}

		$this->data['date_format'] = $this->language->get('date_format_short');
		$this->data['action']['comment'] = $this->url->link('post/post/addComment', '', 'SSL');
		
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