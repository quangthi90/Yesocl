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
        if ( isset($this->request->post['post_id']) && !empty($this->request->post['post_id']) ){
            $post_id = $this->request->post['post_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }

        if ( isset($this->request->post['post_type']) && !empty($this->request->post['post_type']) ){
            $post_type = $this->request->post['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }

        $paging = 1;
        if ( isset($this->request->post['paging']) && !empty($this->request->post['paging']) ){
          $paging = $this->request->post['paging'];
        }
        
        switch ($post_type) {
            case 'company':
                $this->load->model('company/post');
                $post = $this->model_company_post->getPost( $post_id, $paging );
                break;
            
            default:
                $post = null;
                break;
        }

        // To do:
        // Get User & create cache User

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'post' => $post
        )));
    }
}
?>