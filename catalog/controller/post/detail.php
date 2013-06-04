<?php  
class ControllerPostDetail extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');

		if ( isset($this->request->get['post_slug']) && !empty($this->request->get['post_slug']) ){
			$post_slug = $this->request->get['post_slug'];
		}else{
			print("not found post!"); exit;
		}

		$this->load->model('company/post');
		$post = $this->model_company_post->getPostBySlug( $post_slug );

		if ( !$post ){
			print("not found post!"); exit;
		}

		$this->load->model('tool/image');

		if ( $post->getUser() && $post->getUser()->getAvatar() ){
			$avatar = $this->model_tool_image->resize( $post->getUser()->getAvatar(), 180, 180 );
		}elseif ( $post->getUser() && $post->getUser()->getPrimaryEmail()->getEmail() ){
            $avatar = $this->model_tool_image->getGavatar( $post->getUser()->getPrimaryEmail()->getEmail(), 180 );
        }else{
			$avatar = $this->model_tool_image->getGavatar( $post->getEmail(), 180 );
		}

		$comment_count = $post->getComments()->count();

		$this->data['post'] = array(
			'id'			=> $post->getId(),
			'author' 		=> $post->getAuthor(),
			'avatar' 		=> $avatar,
			'title' 		=> $post->getTitle(),
			'content' 		=> html_entity_decode($post->getContent()),
			'created'		=> $post->getCreated(),
			'comment_count' => $comment_count,
			'category'		=> $post->getCategory()->getName(),
			'type'			=> 'company',
			'href_user'		=> $this->url->link('account/edit', 'user_slug=' . $post->getUser()->getSlug(), 'SSL'),
			'href_status'	=> $this->url->link('post/post/getCommentByPost', '', 'SSL')
		);

		$this->data['post']['comments'] = array();

		foreach ( $post->getComments() as $comment ) {
			if ( $comment->getUser() && $comment->getUser()->getAvatar() ){
                $avatar = $this->model_tool_image->resize( $comment->getUser()->getAvatar(), 180, 180 );
            }elseif ( $comment->getUser() && $comment->getUser()->getPrimaryEmail()->getEmail() ){
                $avatar = $this->model_tool_image->getGavatar( $comment->getUser()->getPrimaryEmail()->getEmail(), 180 );
            }else{
                $avatar = $this->model_tool_image->getGavatar( $comment->getEmail(), 180 );
            }

            if ( $comment->getUser() && $comment->getUser()->getUsername() ){
                $author = $comment->getUser()->getUsername();
            }else{
                $author = $comment->getAuthor();
            }

			$this->data['post']['comments'][$comment->getId()] = array(
				'id'			=> $comment->getId(),
				'author' 		=> $author,
				'avatar' 		=> $avatar,
				'content' 		=> html_entity_decode($comment->getContent()),
				'created'		=> $comment->getCreated(),
				'href_user'		=> $this->url->link('account/edit', 'user_slug=' . $comment->getUser()->getSlug(), 'SSL')
			);
		}

		$this->data['action']['comment'] = $this->url->link('post/post/addComment', '', 'SSL');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/post/detail.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/post/detail.tpl';
		} else {
			$this->template = 'default/template/post/detail.tpl';
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