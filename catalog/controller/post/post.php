<?php 
class ControllerPostPost extends Controller {
	private $error = array();

	public function addStatus(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('user/post');

            $data = array(
                'content' => $this->request->post['content'],
                'user_id' => $this->customer->getId(),
                'author_slug' => $this->request->get['user_slug']
            );

            $post = $this->model_user_post->addPost( $data );

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
	}

    public function validate(){
        if ( empty( $this->request->post['content']) ) {
            $this->error['error_content'] = $this->language->get( 'error_content' );
        }

        if ( !empty( $this->request->files['thumb'] ) && $this->request->files['thumb']['size'] > 0 ) {
            $this->load->model('tool/image');
            if ( !$this->model_tool_image->isValidImage( $this->request->files['thumb'] ) ) {
                $this->error['error_thumb'] = $this->language->get( 'error_thumb');
            }
        }

        if ( $this->error ) {
            return false;
        }else {
            return true;
        }
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