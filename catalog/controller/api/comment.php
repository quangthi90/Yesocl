<?php 
class ControllerApiComment extends Controller {
    private $error = array();

    public function add(){
        if ( !$this->customer->isLogged() ) {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user not login'
            )));
        }

        if ( empty($this->request->get['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post slug is empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }

        if ( empty($this->request->post['content']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'content is empty!'
            )));
        }
        
        $sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/image');
        $this->load->model('user/user');

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_comment';
        $oComment = $this->$sModelLink->addComment(array(
            'user_id' => $this->customer->getId(),
            'post_slug' => $this->request->get['post_type'],
            'content' => $this->request->get['content']
        ));

        if ( !$aResult ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: add comment have error'
            )));
        }

        $aComment = $oComment->formatToCache();

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comment' => $aComment
        )));
    }

    public function edit(){
        if ( !$this->customer->isLogged() ) {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user not login'
            )));
        }

        if ( empty($this->request->get['comment_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'comment id empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }

        if ( empty($this->request->post['content']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'content is empty!'
            )));
        }
        
        $sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/image');
        $this->load->model('user/user');

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_comment';
        $oComment = $this->$sModelLink->editComment(
            $this->request->get['comment_id'],
            array(
                'content' => $this->request->post['content'],
                'author_id' => $this->customer->getId()
            )
        );
        
        if ( !$oComment ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: add comment have error'
            )));
        }

        $aComment = $oComment->formatToCache();

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comment' => $aComment
        )));
    }    

    public function delete(){
        if ( !$this->customer->isLogged() ) {
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user not login'
            )));
        }

        if ( empty($this->request->get['comment_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'comment id empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }

        $sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/image');
        $this->load->model('user/user');

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_comment';
        $bResult = $this->$sModelLink->deleteComment(
            $this->request->get['comment_id'],
            $this->customer->getId()
        );
        
        if ( !$bResult ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'you not have authentication for this comment'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
    }

    public function getComments(){
        if ( empty($this->request->get['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post slug is empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }

        $sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/image');
        $this->load->model('user/user');

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_comment';
        $aComments = $this->$sModelLink->getComments( 
            array('post_slug' => $this->request->get['post_slug']),
            true
        );

        $aComments = array_map(function($oComment){
            return $oComment->formatToCache();
        }, $aComments);
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'comments' => $aComments
        )));
    }

    public function like(){
        $aDatas = array();

        if ( empty($this->request->get['comment_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'comment id empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }
        
        $sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/image');
        $this->load->model('user/user');

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_comment';
        $oComment = $this->$sModelLink->editComment(
            $this->request->get['comment_id'],
            array('likerId' => $this->customer->getId())
        );

        if ( !$oComment ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'Like comment has error'
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'like_count' => count($oComment->getLikerIds())
        )));
    }

    public function getLikers(){
        $aDatas = array();

        if ( empty($this->request->get['comment_id']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'comment id empty'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }
        
        $sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/image');
        $this->load->model('user/user');
        $this->load->model('friend/friend');
        $this->load->model('friend/follower');

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_comment';
        $oComment = $this->$sModelLink->getComment(
            'comment_id' => $this->request->get['comment_id']
        );

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

                    $aUsers[$aUser['id']] = $aUser;
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