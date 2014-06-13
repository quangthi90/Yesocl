<?php
class ControllerApiUser extends Controller {
    private $limit = 5;

	public function makeFriend() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('user/user');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'error' => 'user slug is empty'
		        )));
           	}

           	$sUserSlug = $this->request->get['user_slug'];

           	$result = $this->model_user_user->editUser( $sUserSlug, array('request_friend' => $this->customer->getId()) );

           	if ( $result ){
				return $this->response->setOutput(json_encode(array(
		            'success' => 'ok',
		            'status' => 3
		        )));
			}
    	}

    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => 'send request have error'
        )));
	}

	public function cancelRequest() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('user/user');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'error' => 'user slug is empty'
		        )));
           	}

           	$sUserSlug = $this->request->get['user_slug'];

           	$result = $this->model_user_user->editUser( $sUserSlug, array('request_friend' => $this->customer->getId()) );

           	if ( $result ){
				return $this->response->setOutput(json_encode(array(
		            'success' => 'ok',
		            'status' => 4
		        )));
			}
    	}

    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => 'cancel request have error'
        )));
	}

	public function confirm(){
		$this->load->model('user/user');
		$this->load->model('friend/friend');

       	if ( empty($this->request->get['user_slug']) ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'user slug is empty'
	        )));
       	}

       	$aUserB = $this->model_user_user->getUser( $this->request->get['user_slug'] );

       	if ( !$aUserB ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'user slug "' . $this->request->get['user_slug'] . '" is not exist'
	        )));
       	}

       	$idUserA = $this->customer->getId();
       	$idUserB = $aUserB['id'];

       	if ( $this->model_friend_friend->makeFriend($idUserA, $idUserB) ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'ok',
	            'status' => 2
	        )));
       	}

    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => 'confirm make friend have error'
        )));
	}

	public function ignore(){
		$this->load->model('user/user');

       	if ( empty($this->request->get['user_slug']) ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'user slug is empty'
	        )));
       	}

       	$oUserFriend = $this->model_user_user->getUser(array(
       		'user_slug' => $this->request->get['user_slug']
       	));

       	if ( !$oUserFriend ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'user slug "' . $this->request->get['user_slug'] . '" is not exist'
	        )));
       	}

       	$sUserSlug = $this->customer->getSlug();

       	$result = $this->model_user_user->editUser(
       		$sUserSlug,
       		array(
       			'request_friend' => $oUserFriend->getId()
       		)
       	);

       	if ( !$result ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'ignore request make friend have error'
	        )));
       	}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'status' => 4
        )));
	}

	public function unFriend(){
		$this->load->model('friend/friend');
		$this->load->model('user/user');

       	if ( empty($this->request->get['user_slug']) ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'user slug is empty'
	        )));
       	}

       	$sUserSlug = $this->request->get['user_slug'];

       	$aUser = $this->model_user_user->getUser( $sUserSlug );

       	if ( !$aUser ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'user slug "' . $sUserSlug . '" not found'
	        )));
       	}

       	$result = $this->model_friend_friend->unFriend(
       		$aUser['id'], // User A
       		$this->customer->getId() // User B
       	);

       	if ( !$result ){
       		return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'unfriend have error'
	        )));
       	}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'status' => 4
        )));
	}

    public function getAllFriends() {
        $this->load->model('tool/image');
        $this->load->model('tool/object');
        $this->load->model('friend/friend');

        $oCurrUser = $this->customer->getUser();

        $aFriends = array();

        $oFriends = $this->model_friend_friend->getFriends( $oCurrUser->getId() );
        if ( $oFriends ){
            $lFriends = $oFriends->getFriends();
        }else{
            $lFriends = array();
        }

        foreach ( $lFriends as $oFriend ) {
            $oUser = $oFriend->getUser();

            $aUser = $oUser->formatToCache();

            // Mapping to return for tag js
            // Check again when change libs tag js
            $aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
            $aUser['name'] = $aUser['username'];
            $aUser['id'] = $aUser['slug'];
            $aUser['type'] = 'contact';
            $aUser['wall'] = $this->model_tool_object->path('WallPage', array('user_slug' => $aUser['slug']));

            $aFriends[$aUser['slug']] = $aUser;
        }

        return $this->response->setOutput( json_encode(array(
            'success' => 'ok',
            'friends' => count($aFriends) == 0 ? array() : array_values($aFriends)
        )));
    }

    public function addFollower(){
    	$this->load->model('friend/follower');
        $this->load->model('user/user');

        if ( empty($this->request->get['user_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
        }

        $sUserSlug = $this->request->get['user_slug'];

        $aUser = $this->model_user_user->getUser( $sUserSlug );

        if ( !$aUser ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug "' . $sUserSlug . '" not found'
            )));
        }

        $result = $this->model_friend_follower->makeFollow(
            $this->customer->getId(), // User A
            $aUser['id'] // User B
        );

        if ( !$result ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'add follower have error'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'status' => 2
        )));
    }

    public function removeFollower(){
    	$this->load->model('friend/follower');
        $this->load->model('user/user');

        if ( empty($this->request->get['user_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
        }

        $sUserSlug = $this->request->get['user_slug'];

        $aUser = $this->model_user_user->getUser( $sUserSlug );

        if ( !$aUser ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug "' . $sUserSlug . '" not found'
            )));
        }

        $result = $this->model_friend_follower->unFollow(
            $this->customer->getId(), // User A
            $aUser['id'] // User B
        );

        if ( !$result ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'remove follower have error'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'status' => 3
        )));
    }

    public function getPosts(){
        if ( empty($this->request->get['user_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
        }

        if ( !empty($this->request->post['limit']) ){
            $limit = $this->request->post['limit'];
        }else{
            $limit = $this->limit;
        }

        if ( !empty($this->request->get['page']) ){
            $page = $this->request->get['page'];
        }else{
            $page = 1;
        }

        $sUserSlug = $this->request->get['user_slug'];

        $this->load->model('user/user');
        $oUser = $this->model_user_user->getUserFull( array('user_slug' => $sUserSlug) );

        if ( !$oUser ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user with slug ' . $sUserSlug . ' is not exist'
            )));
        }

        $oPosts = $oUser->getPostData();

        $aPosts = array();
        $bCanLoadMore = false;
        if ( $oPosts ){
            $iPostCount = $oPosts->getPosts(false)->count();
            $lPosts = $oPosts->getPosts(false)->slice( ($page - 1) * $limit, $limit );

            $this->load->model('tool/object');
            $aPosts = $this->model_tool_object->formatPosts( $lPosts, false );

            if ( ($page - 1) * $limit + $limit < $iPostCount ){
                $bCanLoadMore = true;
            }
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'posts' => $aPosts,
            'canLoadMore' => $bCanLoadMore
        )));
    }

    public function getFollowPosts() {
      // GET DATA FOR TEST
      if ( !empty($this->request->post['limit']) ){
        $limit = $this->request->post['limit'];
      }else{
        $limit = $this->limit;
      }

      if ( !empty($this->request->get['page']) ){
        $page = $this->request->get['page'];
      }else{
        $page = 1;
      }

      $aPosts = array();
      $this->load->model('branch/post');
      $lPosts = $this->model_branch_post->getPosts( array(
        'branch_id' => '51d39ba5d87459c40a000017',
        'limit' => $limit,
        'start' => ($page - 1) * $limit,
        ) );

      $bCanLoadMore = false;
      if ( $lPosts ){
        $this->load->model('tool/object');
        $aPosts = $this->model_tool_object->formatPosts( $lPosts, false );
        if ( ($page - 1) * $limit + $limit < $lPosts->count() ){
          $bCanLoadMore = true;
        }
      }

      return $this->response->setOutput(json_encode(array(
        'success' => 'ok',
        'posts' => $aPosts,
        'canLoadMore' => $bCanLoadMore
        )));
      // GET DATA FOR TEST

      // PARAMS FOR TEST
      $test_params = 'whatsnews';
      $defaultDisplaySettings = array($this->config->get('post')['cache']['user']);

      // Get current user
      $oCurrUser = $this->customer->getUser();
      if (!$oCurrUser) {
        return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
      }

      // Get User Settings
      $this->load->model( 'user/setting' );
      $oSettings = $this->model_user_setting->getSettingByUser($oCurrUser->getId());
      if ($oSettings) {
        $oDisplaySettings = $oSettings->getDisplaySettings();
        if (is_array($oDisplaySettings) && isset($oDisplaySettings[$test_params])) {
          $oDisplaySettings = $oDisplaySettings[$test_params];
        }else {
          $oDisplaySettings = null;
        }
      }

      // Set Default Settings
      if (!isset($oDisplaySettings)) {
        $oDisplaySettings = $defaultDisplaySettings;
      }

      // $this->model_user_setting->TestAddSettings($oCurrUser->getId());
      // $setting = $this->model_user_setting->getSettingByUser($oCurrUser->getId());
      // $displaySettings = $setting->getDisplaySettings();
      // return $this->response->setOutput(json_encode(array(
      //           'success' => 'not ok',
      //           'error' => $displaySettings['whatsnew'][0],
      //       )));

      // Limit & page
      if ( !empty($this->request->post['limit']) ){
        $limit = $this->request->post['limit'];
      }else{
        $limit = $this->limit;
      }

      if ( !empty($this->request->get['page']) ){
        $page = $this->request->get['page'];
      }else{
        $page = 1;
      }

      $type_ids = array();

      if (in_array($this->config->get('post')['cache']['user'], $oDisplaySettings)) {
        $type_ids[] = $oCurrUser->getId();

        // Get list friends
        $this->load->model( 'friend/friend' );
        $oFriends = $this->model_friend_friend->getFriends( $oCurrUser->getId() );
        if ( $oFriends ){
          $lFriends = $oFriends->getFriends();
        }else{
          $lFriends = array();
        }
        foreach ( $lFriends as $oFriend ) {
          $oUser = $oFriend->getUser();
          $type_ids[] = $oUser->getId();
        }
      }

      // Get branchs
      if (in_array($this->config->get('post')['cache']['branch'], $oDisplaySettings)) {
        $this->load->model( 'branch/branch' );
        $aBranches = $this->model_branch_branch->getAllBranches()->toArray();
        $type_ids = array_merge(array_keys($aBranches));
      }

      if (in_array($this->config->get('post')['cache']['stock'], $oDisplaySettings)) {

      }

      // Get posts
      $this->load->model( 'cache/post' );
      $aPosts = $this->model_cache_post->getPosts(array(
        'limit' => $limit,
        'start' => ($page - 1)*$limit,
        'sort' => 'created',
        'type_ids' => $type_ids,
      ));

      if (count($aPosts) < $limit) {
        $bCanLoadMore = false;
      }else {
        $bCanLoadMore = true;
      }

      // Format Posts
      $this->load->model( 'tool/image' );
      foreach ($aPosts as $i => $aPost) {
        // thumb
        if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
          $aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250, true );
        }else{
          $aPost['image'] = null;
        }

        if ( in_array($this->customer->getId(), $aPost['liker_ids']) ){
          $aPost['isUserLiked'] = true;
        }else{
          $aPost['isUserLiked'] = false;
        }
      }

      return $this->response->setOutput(json_encode(array(
        'success' => 'ok',
        'posts' => $aPosts,
        'canLoadMore' => $bCanLoadMore
        )));
    }
}
?>