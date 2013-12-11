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

		if ( empty($this->request->get['post_type']) ){
			print("post type is empty!"); exit;
		}

		if ( empty($this->request->get['post_slug']) ){
			print("post slug is empty!"); exit;
		}

		$is_user = false;

		switch ($this->request->get['post_type']) {
			case $this->config->get('post')['type']['branch']:
				$this->load->model('branch/post');
				$post = $this->model_branch_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['branch'];
				break;

			case $this->config->get('post')['type']['user']:
				$is_user = true;
				$this->load->model('user/post');
				$post = $this->model_user_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['user'];
				break;
			
			default:
				$post = null;
				break;
		}

		if ( !$post ){
			print("not found post!"); exit;
		}

		$this->load->model('tool/image');
		$this->load->model('tool/object');

		$avatar = $this->model_tool_image->getAvatarUser( $post->getUser()->getAvatar(), $post->getUser()->getPrimaryEmail()->getEmail() );
		
		$comment_count = $post->getComments()->count();

		if ( in_array($this->customer->getId(), $post->getLikerIds()) ){
			$liked = true;
		}else{
			$liked = false;
		}

		$this->data['post'] = array(
			'id'			=> $post->getId(),
			'author' 		=> $post->getAuthor(),
			'avatar' 		=> $avatar,
			'title' 		=> $post->getTitle(),
			'content' 		=> html_entity_decode($post->getContent()),
			'created'		=> $post->getCreated(),
			'comment_count' => $comment_count,
			'category'		=> !$is_user ? $post->getCategory()->getName() : null,
			'slug'			=> $post->getSlug(),
			'like_count'	=> count($post->getLikerIds()),
			'isUserLiked'	=> $liked,
			'user_slug'		=> $post->getUser()->getSlug(),
			'count_viewer'	=> $post->getCountViewer()
		);

		$this->data['comments'] = $this->model_tool_object->formatCommentOfPost( $post->getComments()->toArray(), $post->getSlug(), $this->data['post_type'] );
		
		$this->data['date_format'] = $this->language->get('date_format_full');
		$this->data['is_user'] = $is_user;
		
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