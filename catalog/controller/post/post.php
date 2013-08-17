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
        if ( $this->customer->isLogged() ) {
            $data['user_id'] = $this->customer->getId();
        }else {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: user not login'
            )));
        }

        if ( empty($this->request->post['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug is empty'
            )));
        }

        if ( empty($this->request->post['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type is empty'
            )));
        }

        if ( empty($this->request->post['type_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: type slug is empty'
            )));
        }

        if ( empty($this->request->post['content']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: content is empty'
            )));
        }

        if ( $this->validate() ) {
            $data['post_slug'] = $this->request->post['post_slug'];
            $data['content'] = $this->request->post['content'];
            $data['post_type'] = $this->request->post['post_type'];
            $data['type_slug'] = $this->request->post['type_slug'];
        }else {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: validate false'
            )));
        }
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $data['branch_slug'] = $data['type_slug'];
                $comment = $this->model_branch_comment->addComment( $data );
                break;
            
            default:
                $comment = array();
                break;
        }
        
        if ( $comment == false ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: add comment have error'
            )));
        }

        $comment['created'] = $comment['created']->format( $this->language->get('date_format_long') );

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comment' => $comment
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

    public function getComments(){
        $data = array();

        if ( isset($this->request->post['post_slug']) && !empty($this->request->post['post_slug']) ){
            $data['post_slug'] = $this->request->post['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( isset($this->request->post['post_type']) && !empty($this->request->post['post_type']) ){
            $data['post_type'] = $this->request->post['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }

        if ( isset($this->request->get['type_slug']) && !empty($this->request->get['type_slug']) ){
            $data['type_slug'] = $this->request->get['type_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: type slug empty'
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

        if ( isset($this->request->post['page']) && !empty($this->request->post['page']) ){
            $data['page'] = $this->request->post['page'];
        }
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $data['branch_slug'] = $data['type_slug'];
                $comments = $this->model_branch_comment->getComments( $data );
                break;
            
            default:
                $comments = array();
                break;
        }

        $this->load->model('account/customer');
        $this->load->model('tool/image');

        foreach ( $comments as $key => $comment ) {
            $user = $this->model_tool_cache->getObject( $comment['user_slug'], $this->config->get('common')['type']['user'] );

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
            $comments[$key]['created'] = $comment['created']->format( $this->language->get('date_format_long') );
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comments' => empty($comments) ? array() : $comments
        )));
    }
}
?>