<?php 
class ControllerFriendRequest extends Controller {
	public function makeFriend(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('user/user');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug is empty'
		        )));
           	}

           	$sUserSlug = $this->request->get['user_slug'];

           	$result = $this->model_user_user->editUser( $sUserSlug, array('request_friend' => $this->customer->getId()) );

           	if ( $result ){
				return $this->response->setOutput(json_encode(array(
		            'success' => 'ok'
		        )));
			}
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'warning' => 'send request have error'
        )));
	}

	public function confirm(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('user/user');
			$this->load->model('friend/friend');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug is empty'
		        )));
           	}

           	$aUserB = $this->model_user_user->getUser( $this->request->get['user_slug'] );
           	
           	if ( !$aUserB ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug "' . $this->request->get['user_slug'] . '" is not exist'
		        )));
           	}

           	$idUserA = $this->customer->getId();
           	$idUserB = $aUserB['id'];

           	if ( $this->model_friend_friend->makeFriend($idUserA, $idUserB) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'ok'
		        )));
           	}
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'warning' => 'send request have error'
        )));
	}

	public function ignore(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('user/user');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug is empty'
		        )));
           	}

           	$friend = $this->model_user_user->getUserFull( $this->request->get );

           	if ( !$friend ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'friend is empty'
		        )));
           	}

           	$sUserSlug = $this->customer->getSlug();

           	$result = $this->model_user_user->editUser( 
           		$sUserSlug,
           		array(
           			'request_friend' => $friend->getId()
           		) 
           	);

           	if ( !$result ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'send request have error'
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

	public function unFriend(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('friend/friend');
			$this->load->model('user/user');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug is empty'
		        )));
           	}

           	$sUserSlug = $this->request->get['user_slug'];

           	$aUser = $this->model_user_user->getUser( $sUserSlug );

           	if ( !$aUser ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug "' . $sUserSlug . '" not found'
		        )));
           	}

           	$result = $this->model_friend_friend->unFriend( 
           		$aUser['id'], // User A
           		$this->customer->getId() // User B
           	);

           	if ( !$result ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'send request have error'
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