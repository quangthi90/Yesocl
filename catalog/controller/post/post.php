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
        $data = array();

        if ( isset($this->request->post['post_id']) && !empty($this->request->post['post_id']) ){
            $data['post_id'] = $this->request->post['post_id'];
        }elseif ( isset($this->request->get['post_id']) && !empty($this->request->get['post_id']) ){
            $data['post_id'] = $this->request->get['post_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post id empty'
            )));
        }

        if ( isset($this->request->post['post_type']) && !empty($this->request->post['post_type']) ){
            $data['post_type'] = $this->request->post['post_type'];
        }elseif ( isset($this->request->get['post_type']) && !empty($this->request->get['post_type']) ){
            $data['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }

        if ( isset($this->request->get['type_id']) && !empty($this->request->get['type_id']) ){
            $data['type_id'] = $this->request->get['type_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: type id empty'
            )));
        }

        if ( isset($this->request->post['start']) && !empty($this->request->post['start']) ){
            $data['start'] = $this->request->post['start'];
        }

        if ( isset($this->request->post['limit']) && !empty($this->request->post['limit']) ){
            $data['limit'] = $this->request->post['limit'];
        }
        
        $paging = 1;
        if ( isset($this->request->post['paging']) && !empty($this->request->post['paging']) ){
          $paging = $this->request->post['paging'];
        }
        
        switch ($data['post_type']) {
            case 'branch':
                $this->load->model('branch/comment');
                $data['branch_id'] = $data['type_id'];
                $comments = $this->model_branch_comment->getComments( $data );
                break;
            
            default:
                $comments = array();
                break;
        }

        $this->load->model('account/customer');
        $this->load->model('tool/image');

        foreach ( $comments as $key => $comment ) {echo '<pre>';var_dump($comments);exit();
            $user = $this->model_account_customer->getCustomer( $comment['user_id'] );

            if ( $user && $user['avatar'] ){
                $avatar = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
            }elseif ( $user && $user['email'] ){
                $avatar = $this->model_tool_image->getGavatar( $user['email'], 180 );
            }else{
                $avatar = $this->model_tool_image->getGavatar( $comment['email'], 180 );
            }

            if ( $user && $user['username'] ){
                $comments[$key]['author'] = $user['username'];
            }else{
                $comments[$key]['author'] = $comment['author'];
            }

            $comments[$key]['avatar'] = $avatar;
            $comments[$key]['href_user'] = $this->url->link('account/edit', 'user_slug=' . $user['slug'], 'SSL');
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'post' => $comments
        )));
    }
}
?>