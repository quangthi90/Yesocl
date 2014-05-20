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
            'status' => 3
        )));
	}

    public function getAllFriends() {
        $this->load->model('tool/image');
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
            $aUser['wall'] = $this->extension->path('WallPage', array('user_slug' => $aUser['slug']));

            $aFriends[$aUser['slug']] = $aUser;
        }

        return $this->response->setOutput( json_encode(array(
            'success' => 'ok',
            'friends' => $aFriends
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
}
?>