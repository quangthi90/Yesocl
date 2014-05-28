<?php  
class ControllerPostDetail extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
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
				$oPost = $this->model_branch_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['branch'];
				break;

			case $this->config->get('post')['type']['user']:
				$is_user = true;
				$this->load->model('user/post');
				$oPost = $this->model_user_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['user'];
				break;
			
			default:
				$oPost = null;
				break;
		}

		if ( !$oPost ){
			print("not found post!"); exit;
		}

		$this->load->model('tool/image');
		$this->load->model('tool/object');

		$avatar = $this->model_tool_image->getAvatarUser( $oPost->getUser()->getAvatar(), $oPost->getUser()->getPrimaryEmail()->getEmail() );
		
		$comment_count = $oPost->getComments()->count();

		if ( in_array($this->customer->getId(), $oPost->getLikerIds()) ){
			$liked = true;
		}else{
			$liked = false;
		}

		$this->data['post'] = array(
			'id'			=> $oPost->getId(),
			'author' 		=> $oPost->getAuthor(),
			'avatar' 		=> $avatar,
			'title' 		=> $oPost->getTitle(),
			'content' 		=> html_entity_decode($oPost->getContent()),
			'created'		=> $oPost->getCreated(),
			'comment_count' => $comment_count,
			'category'		=> !$is_user ? $oPost->getCategory()->getName() : null,
			'slug'			=> $oPost->getSlug(),
			'like_count'	=> count($oPost->getLikerIds()),
			'isUserLiked'	=> $liked,
			'user_slug'		=> $oPost->getUser()->getSlug(),
			'count_viewer'	=> $oPost->getCountViewer()
		);

		$this->data['comments'] = array();
		$aComments = $oPost->getComments();
		foreach ( $aComments as $oComment ) {
			$this->data['comments'][] = $oComment->formatToCache();
		}
		
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