<?php
Class ControllerTestTest extends Controller {
	private $error = array();
	
	public function index() {
		$this->load->model('test/test');
		// $this->model_test_test->getMongoDBSpeed(110000);
		$this->model_test_test->getUserByUserName('user_10903');
	}
}