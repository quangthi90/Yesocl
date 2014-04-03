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
                $aResult = $this->model_branch_comment->addComment( $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $aResult = $this->model_user_comment->addComment( $aDatas );
                break;
            
            default:
                $aResult = null;
                break;
        }

        if ( !$aResult ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: add comment have error'
            )));
        }

        $oComment = $aResult['comment'];
        $oPost = $aResult['post'];

        $this->load->model('tool/object');

        $aComment = $this->model_tool_object->formatCommentOfPost(
            $oComment,
            $aDatas['post_slug'],
            $aDatas['post_type']
        );

        // Add notification
        $this->load->model('user/notification');
        
        if ( $this->customer->getSlug() != $oPost->getUser()->getSlug() ){
            $this->model_user_notification->addNotification(
                $oPost->getUser()->getSlug(),
                $this->customer->getUser(),
                $this->config->get('common')['action']['comment'],
                $oComment->getId(),
                $oPost->getSlug(),
                $aDatas['post_type'],
                $this->config->get('common')['object']['post']
            );
        }

        if ( !empty($this->request->post['tags']) ){
            $aUserSlugs = $this->request->post['tags'];

            foreach ( $aUserSlugs as $sUserSlug ) {
                $this->model_user_notification->addNotification(
                    $sUserSlug,
                    $this->customer->getUser(),
                    $this->config->get('common')['action']['tag'],
                    $oComment->getId(),
                    $oPost->getSlug(),
                    $aDatas['post_type'],
                    $this->config->get('common')['object']['comment']
                );
            }
        }

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

        $aComment = $this->model_tool_object->formatCommentOfPost(
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
                $bResult = $this->model_branch_comment->deleteComment( $aDatas['comment_id'], $this->customer->getId() );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $bResult = $this->model_user_comment->deleteComment( $aDatas['comment_id'], $aDatas, $this->customer->getId() );
                break;
            
            default:
                $bResult = null;
                break;
        }
        
        if ( !$bResult ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: you not have authentication for this comment'
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
                $lComments = $this->model_branch_comment->getComments( $aDatas );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/comment');
                $lComments = $this->model_user_comment->getComments( $aDatas );
                break;
            
            default:
                $lComments = null;
                break;
        }

        if ( !$lComments ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }

        $this->load->model('user/user');
        $this->load->model('tool/image');
        $this->load->model('friend/friend');
        $this->load->model('friend/follower');

        $aUsers = array();
        $aComments = array();
        $idLoggedUser = $this->customer->getId();

        foreach ( $lComments as $oComment ) {
            $aComment = $oComment->formatToCache();

            if ( in_array($idLoggedUser, $oComment->getLikerIds()) ){
                $aComment['is_liked'] = true;
            }else{
                $aComment['is_liked'] = false;
            }

            if ( $aComment['user_id'] == $idLoggedUser 
                || $aComment['post_owner_id'] == $idLoggedUser
                || $aComment['post_author_id'] == $idLoggedUser ){
                $aComment['is_del'] = true;
            }else{
                $aComment['is_del'] = false;
            }

            if ( $aComment['user_id'] == $idLoggedUser ){
                $aComment['is_edit'] = true;
            }else{
                $aComment['is_edit'] = false;
            }

            $aComments[] = $aComment;

            if ( empty($aUsers[$aComment['user_id']]) ){
                $oUser = $oComment->getUser();
                $aUser = $oUser->formatToCache();

                $aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
                $aUser['fr_status'] = $this->model_friend_friend->checkStatus( $idLoggedUser, $oUser->getId() );
                $aUser['fl_status'] = $this->model_friend_follower->checkStatus( $idLoggedUser, $oUser->getId() );

                $aUsers[$aUser['id']] = $aUser;
            }
        }
        
        return $this->response->setOutput(json_encode(array(
            'success'   => 'ok',
            'comments'  => $aComments,
            'users'     => $aUsers
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

        if ( $oComment->getUser()->getId() != $this->customer->getId() ){
            $this->load->model('user/notification');

            if ( in_array($this->customer->getId(), $oComment->getLikerIds()) ){
                $this->model_user_notification->addNotification(
                    $oComment->getUser()->getSlug(),
                    $this->customer->getUser(),
                    $this->config->get('common')['action']['like'],
                    $oComment->getId(),
                    $aDatas['post_slug'],
                    $aDatas['post_type'],
                    $this->config->get('common')['object']['comment']
                );
            }else{
                $this->model_user_notification->deleteNotification(
                    $oComment->getUser()->getId(),
                    $this->customer->getId(),
                    $oComment->getId(),
                    $this->config->get('common')['action']['like']
                );
            }
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'liker_ids' => $oComment->getLikerIds()
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
        $this->load->model('friend/follower');
        $this->load->model('tool/image');

        $aUsers = array();

        if ( $oComment ){
            $lQueryUsers = $this->model_user_user->getUsers( array(
                'user_ids' => $oComment->getLikerIds()
            ));

            if ( $lQueryUsers ){
                foreach ( $lQueryUsers as $oUser ) {
                    $aUser = $oUser->formatToCache();

                    $aUser['fr_status'] = $this->model_friend_friend->checkStatus( $this->customer->getId(), $oUser->getId() );
                    $aUser['fl_status'] = $this->model_friend_follower->checkStatus( $this->customer->getId(), $oUser->getId() );
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