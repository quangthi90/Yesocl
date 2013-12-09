<?php 
class ControllerPostComment extends Controller {
    private $error = array();

    public function addComment(){
        if ( $this->customer->isLogged() ) {
            $aDatas['user_id'] = $this->customer->getId();
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
            $aDatas['post_slug'] = $this->request->get['post_slug'];
            $aDatas['post_type'] = $this->request->get['post_type'];
            $aDatas['content'] = $this->request->post['content'];
        }else {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: validate false'
            )));
        }
        
        switch ($aDatas['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $oComment = $this->model_branch_comment->addComment( $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $oComment = $this->model_user_comment->addComment( $aDatas );
                break;
            
            default:
                $oComment = null;
                break;
        }
        
        if ( !$oComment ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: add comment have error'
            )));
        }

        $aComment = $oComment->formatToCache();

        $this->load->model('user/user');
        $this->load->model('tool/image');

        $aUser = $this->model_user_user->getUser( $aComment['user_slug'] );

        $aComment['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

        if ( $aUser && $aUser['username'] ){
            $aComment['author'] = $aUser['username'];
        }

        $aComment['href_user'] = $this->extension->path('WallPage', array(
            'user_slug' => $aUser['slug']
        ));
        $aComment['href_like'] = $this->extension->path('CommentLike', array(
            'post_slug' => $aDatas['post_slug'],
            'post_type' => $aDatas['post_type'],
            'comment_id' => $aComment['id']
        ));
        $aComment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
            'post_slug' => $aDatas['post_slug'],
            'post_type' => $aDatas['post_type'],
            'comment_id' => $aComment['id']
        ));
        $aComment['created'] = $aComment['created']->format( $this->language->get('date_format_full') );
        $aComment['is_liked'] = false;
        $aComment['is_owner'] = true;

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comment' => $aComment
        )));
    }

    public function editComment(){
        if ( !$this->customer->isLogged() ) {
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

        if ( empty($this->request->get['comment_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug is empty'
            )));
        }

        if ( $this->validate() ) {
            $aDatas['post_slug'] = $this->request->get['post_slug'];
            $aDatas['post_type'] = $this->request->get['post_type'];
            $aDatas['content'] = $this->request->post['content'];
        }else {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: validate false'
            )));
        }
        
        switch ($aDatas['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $oComment = $this->model_branch_comment->editComment( $this->request->get['comment_id'], $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $oComment = $this->model_user_comment->editComment( $this->request->get['comment_id'], $aDatas );
                break;
            
            default:
                $oComment = null;
                break;
        }
        
        if ( !$oComment ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: add comment have error'
            )));
        }

        $this->load->model('tool/object');

        $aComment = $this->model_tool_object->formatListCommentsOfPost(
            $oComment,
            $aDatas['post_slug'],
            $aDatas['post_type']
        );

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comment' => $aComment
        )));
    }    

    public function deleteComment(){
        if ( !$this->customer->isLogged() ) {
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

        if ( empty($this->request->get['comment_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug is empty'
            )));
        }

        $aDatas['post_slug'] = $this->request->get['post_slug'];
        $aDatas['post_type'] = $this->request->get['post_type'];
        $aDatas['comment_id'] = $this->request->get['comment_id'];
        
        switch ($aDatas['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $bResult = $this->model_branch_comment->deleteComment( $aDatas['comment_id'], $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $bResult = $this->model_user_comment->deleteComment( $aDatas['comment_id'], $aDatas );
                break;
            
            default:
                $bResult = null;
                break;
        }
        
        if ( !$bResult ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: delete comment have error'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
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
        $aDatas = array();

        if ( isset($this->request->get['post_slug']) && !empty($this->request->get['post_slug']) ){
            $aDatas['post_slug'] = $this->request->get['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( isset($this->request->get['post_type']) && !empty($this->request->get['post_type']) ){
            $aDatas['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }
        
        switch ($aDatas['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $lQueryComments = $this->model_branch_comment->getComments( $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $lQueryComments = $this->model_user_comment->getComments( $aDatas );
                break;
            
            default:
                $lQueryComments = null;
                break;
        }

        $this->load->model('user/user');
        $this->load->model('tool/image');
        $this->load->model('tool/object');

        $aUsers = array();
        $idCurrUserId = $this->customer->getId();

        if ( $lQueryComments != null ){
            $aQueryComments = $lQueryComments->toArray();
        }else{
            $aQueryComments = array();
        }

        $aComments = $this->model_tool_object->formatListCommentsOfPost(
            $aQueryComments,
            $aDatas['post_slug'],
            $aDatas['post_type']
        );
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comments' => $aComments
        )));
    }

    public function like(){
        $aDatas = array();

        if ( !empty($this->request->get['comment_id']) ){
            $aDatas['comment_id'] = $this->request->get['comment_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: comment id empty'
            )));
        }

        if ( !empty($this->request->get['post_slug']) ){
            $aDatas['post_slug'] = $this->request->get['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( !empty($this->request->get['post_type']) ){
            $aDatas['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }

        $aDatas['likerId'] = $this->customer->getId();
        
        switch ($aDatas['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $oComment = $this->model_branch_comment->editComment( $aDatas['comment_id'], $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $oComment = $this->model_user_comment->editComment( $aDatas['comment_id'], $aDatas );
                break;
            
            default:
                $oComment = null;
                break;
        }

        if ( !$oComment ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'like_count' => count($oComment->getLikerIds())
        )));
    }

    public function getLikers(){
        $aDatas = array();

        if ( !empty($this->request->get['comment_id']) ){
            $aDatas['comment_id'] = $this->request->get['comment_id'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: comment id empty'
            )));
        }

        if ( isset($this->request->get['post_slug']) && !empty($this->request->get['post_slug']) ){
            $aDatas['post_slug'] = $this->request->get['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( isset($this->request->get['post_type']) && !empty($this->request->get['post_type']) ){
            $aDatas['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }
        
        switch ($aDatas['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/comment');
                $oComment = $this->model_branch_comment->getComment( $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $oComment = $this->model_user_comment->getComment( $aDatas );
                break;
            
            default:
                $oComment = null;
                break;
        }

        $this->load->model('user/user');
        $this->load->model('friend/friend');
        $this->load->model('tool/image');

        $aUsers = array();

        if ( $oComment ){
            $lQueryUsers = $this->model_user_user->getUsers( array(
                'user_ids' => $oComment->getLikerIds()
            ));

            if ( $lQueryUsers ){
                foreach ( $lQueryUsers as $oUser ) {
                    $aFrStatus = $this->model_friend_friend->checkFriendStatus( $this->customer, $oUser );

                    $aUser = $oUser->formatToCache();

                    $aUser['fr_status'] = $aFrStatus['status'];
                    $aUser['fr_href'] = $aFrStatus['href'];

                    $aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
                    $aUser['href_user'] = $this->extension->path( 'WallPage', array('user_slug' => $aUser['slug']) );

                    $aUsers[] = $aUser;
                }
            }
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'users' => $aUsers
        )));
    }
}
?>