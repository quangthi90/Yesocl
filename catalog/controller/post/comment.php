<?php 
class ControllerPostComment extends Controller {
	private $error = array();

	public function addComment(){
        if ( $this->customer->isLogged() ) {
            $data['user_id'] = $this->customer->getId();
        }else {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: user not login'
            )));
        }

        if ( empty($this->request->get['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug is empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type is empty'
            )));
        }

        if ( empty($this->request->post['content']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: content is empty'
            )));
        }

        if ( $this->validate() ) {
            $data['post_slug'] = $this->request->get['post_slug'];
            $data['post_type'] = $this->request->get['post_type'];
            $data['content'] = $this->request->post['content'];
        }else {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: validate false'
            )));
        }
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $comment = $this->model_branch_comment->addComment( $data );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $comment = $this->model_user_comment->addComment( $data );
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

        $this->load->model('user/user');
        $user = $this->model_user_user->getUser( $comment['user_slug'] );

        $this->load->model('tool/image');
        
        if ( $user && $user['avatar'] && file_exists(DIR_IMAGE . $user['avatar']) ){
            $avatar = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
        }elseif ( $user && $user['email'] ){
            $avatar = $this->model_tool_image->getGavatar( $user['email'], 180 );
        }else{
            $avatar = $this->model_tool_image->getGavatar( $comment['email'], 180 );
        }

        if ( $user && $user['username'] ){
            $comment['author'] = $user['username'];
        }

        $comment['avatar'] = $avatar;
        $comment['href_user'] = $this->extension->path('WallPage', array('user_slug' => $user['slug']));
        $comment['href_like'] = $this->extension->path('CommentLike', array(
            'post_slug' => $data['post_slug'],
            'post_type' => $data['post_type'],
            'comment_id' => $comment['id']
        ));
        $comment['created'] = $comment['created']->format( $this->language->get('date_format_full') );

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

        if ( isset($this->request->get['post_slug']) && !empty($this->request->get['post_slug']) ){
            $data['post_slug'] = $this->request->get['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( isset($this->request->get['post_type']) && !empty($this->request->get['post_type']) ){
            $data['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }

        if ( isset($this->request->post['start']) && !empty($this->request->post['start']) ){
            $data['start'] = $this->request->post['start'];
        }

        if ( isset($this->request->post['limit']) && !empty($this->request->post['limit']) ){
            $data['limit'] = $this->request->post['limit'];
        }
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $comments = $this->model_branch_comment->getComments( $data );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $comments = $this->model_user_comment->getComments( $data );
                break;
            
            default:
                $comments = array();
                break;
        }

        $this->load->model('user/user');
        $this->load->model('tool/image');

        foreach ( $comments as $key => $comment ) {
            $user = $this->model_user_user->getUser( $comment['user_slug'] );
            
            if ( $user && $user['avatar'] && file_exists(DIR_IMAGE . $user['avatar']) ){
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
            $comments[$key]['href_like'] = $this->extension->path('CommentLike', array(
                'post_slug' => $data['post_slug'],
                'post_type' => $data['post_type'],
                'comment_id' => $comments[$key]['id']
            ));
            $comments[$key]['created'] = $comment['created']->format( $this->language->get('date_format_full') );
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comments' => empty($comments) ? array() : $comments
        )));
    }

    public function like(){
        $data = array();

        if ( !empty($this->request->get['comment_id']) ){
            $data['comment_id'] = $this->request->get['comment_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: comment id empty'
            )));
        }

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
                $this->load->model('branch/comment');
                $comment = $this->model_branch_comment->editComment( $data['comment_id'], $data );
                break;
            
            default:
                break;
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'like_count' => count($comment->getLikerIds())
        )));
    }
}
?>