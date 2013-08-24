<?php  
class ControllerBranchCategories extends Controller {
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
		$this->load->model( 'branch/category' );
		$this->load->model( 'branch/post' );
		$this->load->model('tool/image');

		$branch = $this->model_branch_branch->getBranch( array('branch_slug' => $this->request->get['branch_slug']) );

		if ( !$branch ){
			return false;
		}

		$categories = $this->model_branch_category->getAllCategories( $branch->getId() );
		
		$this->data['categories'] = array();
		$this->data['all_posts'] = array();
		foreach ( $categories as $category ) {
			$posts = $this->model_branch_post->getLastPostByCategory( 
				$branch->getId(),
				$category->getId()
			);
			
			if ( count($posts) == 0 ){
				continue;
			}

			if ( $category->getChildren()->count() > 0 ){
				$href = $this->url->link('branch/categories', 'category_slug=' . $category->getSlug(), 'SSL');
			}else{
				$href = $this->url->link('branch/category', 'category_slug=' . $category->getSlug(), 'SSL');
			}

			$this->data['categories'][$category->getId()] = array(
				'id' => $category->getId(),
				'name' => $category->getName(),
				'href' => $href
			);
			
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

				$posts[$i]['image'] = $image;
				// $posts[$i]['avatar'] = $avatar;
				
				$posts[$i]['href_user'] = $this->url->link('account/edit', 'user_slug=' . $post['user']['slug'], 'SSL');
				$posts[$i]['href_post'] = $this->url->link('post/detail', 'post_slug=' . $post['slug'], 'SSL');
				$posts[$i]['href_status'] = $this->url->link('post/post/getComments', 'type_slug=' . $branch_slug, 'SSL');
			}
			$this->data['all_posts'][$category->getId()] = $posts;
		}

		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		$this->data['action']['comment'] = $this->url->link('post/post/addComment', '', 'SSL');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/post/categories.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/post/categories.tpl';
		} else {
			$this->template = 'default/template/post/categories.tpl';
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