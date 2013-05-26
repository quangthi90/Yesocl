<?php 
class ControllerPostPost extends Controller {
	private $error = array();

	public function postStatus(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateStatus()) {
			$this->load->model('post/post');

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
	}

  	private function validateStatus() {
    	if ((utf8_strlen($this->request->post['content']) < 1)) {
      		$this->error['content'] = $this->language->get('error_content');
    	}
		
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
  	}

    public function getCommentByPost(){
        $post_id = $this->request->post['post_id'];
        
        $post = $this->cache->get( $post_id );

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'post' => $post
        )));
    }
}
?>