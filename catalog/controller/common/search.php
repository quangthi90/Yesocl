<?php 
class ControllerCommonSearch extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->load->model('tool/image');
		$this->load->model('tool/search');
		$this->load->model('tool/object');
		$this->load->model('user/user');
		$this->load->model('branch/post');

		$sKeyword = $this->request->get['keyword'];
		if ( empty($sKeyword) ){
			return false;
		}
		// Search with Solr
		$lSearchUsers = $this->model_tool_search->searchUserByKeyword( array('keyword' => $sKeyword) );
		$lSearchPosts = $this->model_tool_search->searchPostByKeyword( array('keyword' => $sKeyword) );
		$lSearchStocks = $this->model_tool_search->searchStockByKeyword( array('keyword' => $sKeyword) );

		// Get list Users
		$aUserIds = array();
		foreach ($lSearchUsers as $oSearchUser) {
			$aUserIds[$oSearchUser->getId()] = $oSearchUser->getId();
		}
		$lQueryUsers = $this->model_user_user->getUsers( array('user_ids' => $aUserIds) );
		$aUsers = array();
		foreach ( $lQueryUsers as $oQueryUser ) {
			if ( $oQueryUser->getId() == $this->customer->getId() ){
				continue;
			}
			$aUser = $oQueryUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUser['metaInfo'] = '';
			if ( $oQueryUser->getMeta() && $oQueryUser->getMeta()->getLocation() ){
				$aUser['metaInfo'] = $oQueryUser->getMeta()->getLocation()->getLocation();
			}
			$aUsers[] = $aUser;
		}

		// Get list posts of branch
		$aBranchPostIds = array();
		foreach ( $lSearchPosts as $oPost ) {
			$aBranchPostIds[$oPost->getId()] = $oPost->getId();
		}
		$lBranchPosts = $this->model_branch_post->getPosts( array('post_ids' => $aBranchPostIds) );
		$aPosts = $this->model_tool_object->formatPosts( $lBranchPosts, false );

		// Get list stocks
		$aStocks = array();
		foreach ( $lSearchStocks as $oStock ) {
			$aStocks[$oStock->getCode()] = array(
				'code' => $oStock->getCode(),
				'name' => $oStock->getName()
			);
		}

		$this->data['users'] = $aUsers;
		$this->data['posts'] = $aPosts;
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/search.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/search.tpl';
		} else {
			$this->template = 'default/template/common/search.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function friendTypeahead() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');
		$this->load->model('tool/search');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$sKeyword = $this->request->get['keyword'];

		if ( empty($sKeyword) ){
			return false;
		}

		$aUsers = $this->model_tool_search->searchUserByKeyword( array('keyword' => $sKeyword) );

		$aUserIds = array();
		foreach ($aUsers as $oUser) {
			$aUserIds[$oUser->getId()] = $oUser->getId();
		}

		$lUsers = $this->model_user_user->getUsers( array('user_ids' => $aUserIds) );

		$this->data['users'] = array();

		foreach ( $lUsers as $oUser ) {
			if ( $oUser->getId() == $this->customer->getId() ){
				continue;
			}

			$aUser = $oUser->formatToCache();

			$aUser['category'] = 'Friend';

			$aUser['metaInfo'] = '';
			if ( $oUser->getMeta() && $oUser->getMeta()->getLocation() ){
				$aUser['metaInfo'] = $oUser->getMeta()->getLocation()->getLocation();
			}
			
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUser['href'] = $this->extension->path('WallPage', array('user_slug' => $aUser['slug']));

			$this->data['users'][$aUser['id']] = $aUser;
		}	
		return $this->response->setOutput(json_encode(
			$this->data['users']
        ));
	}

	public function postTypeahead() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->load->model('tool/image');
		$this->load->model('tool/search');
		$this->load->model('branch/post');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$sKeyword = $this->request->get['keyword'];

		if ( empty($sKeyword) ){
			return false;
		}

		$aPosts = $this->model_tool_search->searchPostByKeyword( array('keyword' => $sKeyword) );

		$aBranchPostIds = array();
		foreach ( $aPosts as $oPost ) {
			switch ( $oPost->getType() ) {
				case $this->config->get('post')['cache']['branch']:
					$aBranchPostIds[$oPost->getId()] = $oPost->getId();
					break;
			}
		}
		
		$lBranchPosts = $this->model_branch_post->getPosts( array('post_ids' => $aBranchPostIds) );

		$this->data['posts'] = array();

		foreach ( $lBranchPosts as $oPost ) {
			if ( $oPost->getId() == $this->customer->getId() ){
				continue;
			}

			$aPost = $oPost->formatToCache();

			$aPost['category'] = 'Post';

			$aPost['metaInfo'] = $aPost['like_count'] . ' likes - ' . $aPost['comment_count'] . ' comments - ' . $aPost['count_viewer'] . ' views';
			
			if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
				$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 100, 100 );
			}else{
				$aPost['image'] = null;
			}

			$aPost['href'] = $this->extension->path('PostPage', array(
				'post_slug' => $aPost['slug'],
				'post_type' => $this->config->get('post')['type']['branch']
			));

			$this->data['posts'][$aPost['id']] = $aPost;
		}
		return $this->response->setOutput(json_encode(
			$this->data['posts']
        ));
	}
}
?>