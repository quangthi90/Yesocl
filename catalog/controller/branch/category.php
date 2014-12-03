<?php  
class ControllerBranchCategory extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		if ( empty($this->request->get['category_slug']) ){
			print("Category slug is empty");
			return false;
		}

		$sSlug = $this->request->get['category_slug'];

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');

		$this->load->model( 'branch/category' );
		$this->load->model( 'branch/post' );
		$this->load->model('tool/image');
		$this->load->model('tool/cache');

		$oCategory = $this->model_branch_category->getCategory( array('category_slug' => $sSlug) );

		if ( !$oCategory ){
			print("This category is not exist");
			return false;
		}
		
		$this->data['category'] = array(
			'id' => $oCategory->getId(),
			'name' => $oCategory->getName(),
			'slug' => $oCategory->getSlug()
		);
		$this->data['all_posts'] = array();

		$lPosts = $this->model_branch_post->getPosts(array(
			'category_id' => $oCategory->getId(),
			'limit' => 100
		));

		$iPostCount = $lPosts->count(true);
		$iCount = 1;
		$aPosts = array();
		$aUsers = array();
		
		foreach ($lPosts as $i => $oPost) {
			$aPost = $oPost->formatToCache();

			if ( empty($aUsers[$aPost['user_id']]) ){
				$oUser = $oPost->getUser();

				$aUser = $oUser->formatToCache();

				$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

				$aUsers[$aPost['user_id']] = $aUser;
			}

			if ( in_array($this->customer->getId(), $aPost['liker_ids']) ){
				$aPost['isUserLiked'] = true;
			}else{
				$aPost['isUserLiked'] = false;
			}

			// thumb
			if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
				$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 800, 500);
			}else{
				$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
			}

			$aPosts[] = $aPost;
			
			if ( $iCount % 6 == 0 || $iCount == $iPostCount ){
				$this->data['all_posts'][] = $aPosts;
				$aPosts = array();
			}

			$iCount++;
		}

		$this->data['users'] = $aUsers;
		$this->data['post_type'] = $this->config->get('common')['type']['branch'];
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/post/category.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/post/category.tpl';
		} else {
			$this->template = 'default/template/post/category.tpl';
		}
		
		$this->children = array(
			'layout/basic/leftsidebar',
			'layout/basic/rightsidebar',
			'layout/basic/navbar',
			'layout/basic/footer',
			'widget/account/user'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>