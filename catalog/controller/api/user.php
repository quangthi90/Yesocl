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
}
?>