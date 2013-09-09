<?php 
class ControllerPostPost extends Controller {
	private $error = array();

	public function addStatus(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('post/post');

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
	}

    public function like(){
        $data = array();

        if ( !empty($this->request->get['post_slug']) ){
            $data['post_slug'] = $this->request->get['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( !empty($this->request->get['post_type']) ){
            $data['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }

        $data['likerId'] = $this->customer->getId();
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/post');
                $post = $this->model_branch_post->editPost( $data['post_slug'], $data );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/post');
                $post = $this->model_user_post->editPost( $data['post_slug'], $data );
                break;
            
            default:
                break;
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'like_count' => count($post->getLikerIds())
        )));
    }
}
?>