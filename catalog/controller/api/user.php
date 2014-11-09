<?php
class ControllerApiUser extends Controller {
    private $limit = 5;
    private $iFriendLimit = 20;

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

    public function getAllTags() {
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

            $aUser = $this->model_tool_object->formatUser( $oUser );

            $aFriends[$aUser['id']] = $aUser;
        }

        return $this->response->setOutput( json_encode(array(
            'success' => 'ok',
            'friends' => count($aFriends) == 0 ? array() : array_values($aFriends)
        )));
    }

    /**
     * 09/30/2014
     * API return list all friends of Logged User
     * @author: Bommer <lqthi.khtn@gmail.com>
     * @param:
     *  - int page: required
     *  - int limit: can null
     * @return: list object friends via Json format
     */
    public function getFriends() {
        // Check param page
        if ( empty($this->request->get['page']) ) {
            $iPage = 1;
        } else {
            $iPage = $this->request->get['page'];
        }

        // Check param limit
        if ( empty($this->request->post['limit']) ) {
            $iLimit = $this->iFriendLimit;
        } else {
            $iLimit = $this->request->post['limit'];
        }

        $this->load->model('tool/object');
        $this->load->model('friend/friend');

        $oLoggedUser = $this->customer->getUser();

        $oFriends = $this->model_friend_friend->getFriends( $oLoggedUser->getId() );

        $iTotalFriend = 0;
        $aFriends = array();
        $bCanLoadMore = false;
        
        if ( $oFriends ){
            $iTotalFriend = $oFriends->getFriends()->count();
            $lFriends = $oFriends->getFriends()->slice($iPage - 1, $iLimit);
        }else{
            $lFriends = null;
        }

        if ( $lFriends ) {
            if ( $iTotalFriend > $iPage * $iLimit ) {
                $bCanLoadMore = true;
            }
            foreach ( $lFriends as $oFriend ) {
                $oUser = $oFriend->getUser();

                $aUser = $this->model_tool_object->formatUser( $oUser, 100, 100 );

                $aFriends[$aUser['slug']] = $aUser;
            }
        }

        return $this->response->setOutput( json_encode(array(
            'success' => 'ok',
            'friends' => count($aFriends) == 0 ? array() : array_values($aFriends),
            'canLoadMore' => $bCanLoadMore
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

            if ( $page * $limit < $iPostCount ){
                $bCanLoadMore = true;
            }
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'posts' => $aPosts,
            'canLoadMore' => $bCanLoadMore
        )));
    }

    public function setPrivateOption() {
      // Get current user
      $oCurrUser = $this->customer->getUser();
      if (!$oCurrUser) {
        return $this->response->setOutput(json_encode(array(
          'success' => 'not ok',
          'error' => 'user slug is empty'
          )));
      }

      if (isset($this->request->post['option_value']) && isset($this->request->post['option_key'])) {
        $this->load->model( 'user/setting' );
        if ($this->model_user_setting->setPrivateSetting($oCurrUser->getId(), array($this->request->post['option_key'] => $this->request->post['option_value'])) !== FALSE) {
          return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            )));
        }
      }

      return $this->response->setOutput(json_encode(array(
        'success' => 'not ok',
        'error' => 'there are error occur'
        )));
    }

    public function getDisplayOption() {
      // Get User Settings
      $oLoggedUser = $this->customer->getUser();

      $aWhatSNewOptions = array();
      if ($oLoggedUser) {
        $this->load->model( 'user/setting' );
        $oSettings = $this->model_user_setting->getSettingByUser($oLoggedUser->getId());
        if ($oSettings) {
          $sWhatSNewOption = $oSettings->getPrivateByKey('config_display_whatsnew');
        }

        foreach ($this->config->get('whatsnew')['option'] as $option) {
          $aWhatSNewOptions[] = array(
            'title' => htmlspecialchars($this->config->get('whatsnew')['option_title'][$option], ENT_QUOTES),
            'option' => $option,
            'enabled' => (($option == $sWhatSNewOption) || ($option == $this->config->get('whatsnew')['option']['all'] && $sWhatSNewOption == NULL)),
            );
        }
      }else {
        foreach ($this->config->get('whatsnew')['option'] as $option) {
          $aWhatSNewOptions[] = array(
            'title' => htmlspecialchars($this->config->get('whatsnew')['option_title'][$option], ENT_QUOTES),
            'option' => $option,
            'enabled' => false,
            );
        }
      }

      return $this->response->setOutput(json_encode(array(
          'success' => 'ok',
          'items' => $aWhatSNewOptions,
          )));
    }
}
?>