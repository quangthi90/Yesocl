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

        $comment = $comment->formatToCache();

        $this->load->model('user/user');
        $this->load->model('tool/image');

        $user = $this->model_user_user->getUser( $comment['user_slug'] );

        $comment['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

        if ( $user && $user['username'] ){
            $comment['author'] = $user['username'];
        }

        $comment['href_user'] = $this->extension->path('WallPage', array(
            'user_slug' => $user['slug']
        ));
        $comment['href_like'] = $this->extension->path('CommentLike', array(
            'post_slug' => $data['post_slug'],
            'post_type' => $data['post_type'],
            'comment_id' => $comment['id']
        ));
        $comment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
            'post_slug' => $data['post_slug'],
            'post_type' => $data['post_type'],
            'comment_id' => $comment['id']
        ));
        $comment['created'] = $comment['created']->format( $this->language->get('date_format_full') );
        $comment['is_liked'] = false;

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
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $query_comments = $this->model_branch_comment->getComments( $data );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $query_comments = $this->model_user_comment->getComments( $data );
                break;
            
            default:
                $query_comments = array();
                break;
        }

        $this->load->model('user/user');
        $this->load->model('tool/image');

        $comments = array();
        foreach ( $query_comments as $comment ) {
            if ( in_array($this->customer->getId(), $comment->getLikerIds()) ){
                $liked = true;
            }else{
                $liked = false;
            }

            $comment = $comment->formatToCache();

            $user = $this->model_user_user->getUser( $comment['user_slug'] );
            
            $comment['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

            if ( $user && $user['username'] ){
                $comment['author'] = $user['username'];
            }else{
                $comment['author'] = $comment['author'];
            }

            $comment['href_user'] = $this->extension->path('WallPage', array(
                'user_slug' => $user['slug']
            ));
            $comment['href_like'] = $this->extension->path('CommentLike', array(
                'post_slug' => $data['post_slug'],
                'post_type' => $data['post_type'],
                'comment_id' => $comment['id']
            ));
            $comment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
                'post_slug' => $data['post_slug'],
                'post_type' => $data['post_type'],
                'comment_id' => $comment['id']
            ));
            $comment['created'] = $comment['created']->format( $this->language->get('date_format_full') );
            $comment['is_liked'] = $liked;

            $comments[] = $comment;
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comments' => $comments
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

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $comment = $this->model_user_comment->editComment( $data['comment_id'], $data );
                break;
            
            default:
                break;
        }

        if ( $comment == false ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'like_count' => count($comment->getLikerIds())
        )));
    }

    public function getLikers(){
        $data = array();

        if ( !empty($this->request->get['comment_id']) ){
            $data['comment_id'] = $this->request->get['comment_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: comment id empty'
            )));
        }

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
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $comment = $this->model_branch_comment->getComment( $data );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $comment = $this->model_user_comment->getComment( $data );
                break;
            
            default:
                $comment = null;
                break;
        }

        $this->load->model('user/user');
        $this->load->model('friend/friend');
        $this->load->model('tool/image');

        $users = array();

        if ( $comment ){
            $query_users = $this->model_user_user->getUsers( array(
                'user_ids' => $comment->getLikerIds()
            ));

            if ( $query_users ){
                foreach ( $query_users as $user ) {
                    $fr_status = $this->model_friend_friend->checkFriendStatus( $this->customer, $user );

                    $user = $user->formatToCache();

                    $user['fr_status'] = $fr_status['status'];
                    $user['fr_href'] = $fr_status['href'];

                    $user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );
                    $user['href_user'] = $this->extension->path( 'WallPage', array('user_slug' => $user['slug']) );

                    $users[] = $user;
                }
            }
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'users' => $users
        )));
    }
}
?>