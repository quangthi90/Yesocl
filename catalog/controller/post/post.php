<?php 
class ControllerPostPost extends Controller {
	private $error = array();

	public function status(){
		$this->load->model('post/status');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_account_customer->addCustomer($this->request->post);
			
			$this->customer->login($this->request->post['email'], $this->request->post['password']);
			
			unset($this->session->data['guest']);

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
		
	}

  	private function validate() {
    	if ((utf8_strlen($this->request->post['content']) < 1)) {
      		$this->error['content'] = $this->language->get('error_content');
    	}
		
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
  	}
}
?>