<?php 
class ControllerPostPost extends Controller {
	private $error = array();

	public function postStatus(){
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

    public function addComment(){
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate() && isset($this->request->post['post_id']) ) {
            $this->load->model('company/comment');

            $comment = $this->model_company_comment->addComment( $this->request->post );

            if ( $comment == null ){
                return $this->response->setOutput(json_encode(array(
                    'success' => 'not ok'
                )));
            }

            $comment = $comment->formatToCache();
            $comment['author'] = $this->customer->getUsername();

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok',
                'comment' => $comment
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

        if ( !isset($post['user_id']) || empty($post['user_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }

        $this->load->model('account/customer');
        $this->load->model('tool/image');

        foreach ( $post['comments'] as $key => $comment ) {
            $user = $this->model_account_customer->getCustomer( $comment['user_id'] );

            if ( $user && $user['avatar'] ){
                $avatar = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
            }else{
                $avatar = $this->model_tool_image->getGavatar( $post['email'], 180 );
            }

            if ( $user && $user['username'] ){
                $post['comments'][$key]['author'] = $user['username'];
            }else{
                $post['comments'][$key]['author'] = $comment['author'];
            }

            $post['comments'][$key]['avatar'] = $avatar;
            $post['comments'][$key]['user_href'] = $this->url->link('account/edit', 'user_slug=' . $user['slug'], 'SSL');
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'post' => $post
        )));
    }
}
?>