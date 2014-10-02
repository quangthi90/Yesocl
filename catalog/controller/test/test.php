<?php
Class ControllerTestTest extends Controller {
	private $error = array();

	private $limit = 10000;

	public function index() {
		$this->load->model('test/test');
		// $this->model_test_test->getMongoDBSpeed(110000);
		$this->model_test_test->getUserByUserName('user_10903');
	}

	public function updatePostCache() {
		// GET BEFORE QUERY INF
		$query_inf = array();
		if (isset($this->request->get['type']) && in_array($this->request->get['type'], $this->config->get('post')['type'])) {
			$query_inf['type'] = $this->request->get['type'];
		}
		if (isset($this->request->get['start'])) {
			$query_inf['start'] = $this->request->get['start'];
		}
		if (isset($this->request->get['limit'])) {
			$query_inf['limit'] = $this->request->get['limit'];
		}else {
			$query_inf['limit'] = $this->limit;
		}

		// DO: UPDATE TO CACHE POST
		$this->load->model('cache/post');
		$result = $this->model_cache_post->updateCachePosts( $query_inf );

		// SET NEW QUERY INF
		if ($result['isDone'] == 1) {
			echo 'Update cache posts completed !';
			exit();
		}

		// RELOAD
		$url = $this->url->link('test/test/updatePostCache');
		foreach ($result as $key => $value) {
			$url .= '&' . $key . '=' . $value;
		}
		$this->redirect($url);
	}

	public function createMessage() {
		$oLoggedUser = $this->customer->getUser();

		$this->load->model('friend/message');

		$sUserToSlug = "user2";

		$this->model_friend_message->add(
			null,
			$oLoggedUser->getId(),
			array( $sUserToSlug ),
			'test message 4'
		);

		print("add message success!");
		exit;
	}

	//Make friend with all user in database
	public function makeFriend(){

		//Send request
		$this->load->model('user/user');

       	$sUserSlug = $this->request->get['user_slug'];

       	$result = $this->model_user_user->editUser( $sUserSlug, array('request_friend' => $this->customer->getId()) );

       	if ( $result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
		}

		//Confirm
		$this->load->model('user/user');
		$this->load->model('friend/friend');
		
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