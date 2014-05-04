<?php
class ControllerApiUser extends Controller {
	public function makeFriend() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

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
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

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
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

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
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

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
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

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

    public function addFollower(){
        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
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
                    'error' => 'send request have error'
                )));
            }

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok'
            )));
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
    }

    public function removeFollower(){
        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
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
                    'error' => 'send request have error'
                )));
            }

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok'
            )));
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
    }
}
?>