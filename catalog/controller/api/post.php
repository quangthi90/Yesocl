<?php
class ControllerApiPost extends Controller {
    private $error = array();

    public function addPost(){
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
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

            $sModel = $this->request->get['post_type'] . '/post';
            $this->load->model($sModel);
            $this->load->model('tool/image');

            $sImageLink = null;
            $sExtension = null;
            if ( !empty($this->request->post['thumb']) ){
                $aParts = explode('/', $this->request->post['thumb'] );
                $sFilename = $aParts[count($aParts) - 1];
                $sImageLink = DIR_IMAGE . $this->config->get('common')['image']['upload_cache'] . $sFilename;
                $sExtension = explode('.', $sFilename)[1];
            }

            switch ( $this->request->get['post_type'] ) {
                case $this->config->get('common')['type']['user']:
                    $aDatas = array(
                        'content'       => $this->request->post['content'],
                        'title'         => $this->request->post['title'],
                        'user_slug'     => $this->request->get['user_slug'],
                        'author_id'     => $this->customer->getId(),
                        'image_link'    => $sImageLink,
                        'extension'     => $sExtension
                    );
                    break;

                case $this->config->get('common')['type']['branch']:
                    $aDatas = array(
                        'content'       => $this->request->post['content'],
                        'title'         => $this->request->post['title'],
                        'description'   => $this->request->post['description'],
                        'category'      => $this->request->post['category'],
                        'user_slug'     => $this->customer->getSlug(),
                        'image_link'    => $sImageLink,
                        'extension'     => $sExtension
                    );
                    break;
                
                default:
                    $aData = array();
                    break;
            }

            if ( count($aData) > 0 ){
                $sModelLink = 'model_' . $this->request->get['post_type'] . '_post';
                $oPost = $this->$sModelLink->addPost( $aData );
            }else{
                $oPost = null;
            }

            if ( !$oPost ){
                return $this->response->setOutput(json_encode(array(
                    'success' => 'not ok: Save Post have error',
                )));
            }

            $aAuthor = $oPost->getUser()->formatToCache();

            // avatar
            $sAvatar = $this->model_tool_image->getAvatarUser( $aAuthor['avatar'], $aAuthor['email'] );

            // thumb
            $sThumb = $oPost->getThumb();
            if ( !empty($sThumb) ){
                $sImage = $this->model_tool_image->resize( $sThumb, 400, 250 );
            }else{
                $sImage = null;
            }

            // href
            $aData_post_infos = array(
                'post_type' => $sPostType,
                'post_slug' => $oPost->getSlug()
            );
            $aHref = array(
                'comment_list' => $this->extension->path( "CommentList", $aData_post_infos ),
                'comment_add' => $this->extension->path( "CommentAdd", $aData_post_infos ),
                'post_like' => $this->extension->path( "PostLike", $aData_post_infos ),
                'post_detail' => $this->extension->path( "PostPage", $aData_post_infos ),
                'user_info' => $this->extension->path( "WallPage", array('user_slug' => $aAuthor['slug']) ),
                'post_get_liked' => $this->extension->path( "PostGetLiker", $aData_post_infos )
            );

            $bIsSeeMore = false;

            $aReturnData = array(
                'post' => array(
                    'user' => array(
                        'avatar' => $sAvatar,
                        'username' => $oPost->getAuthor()
                    ),
                    'created' => $this->extension->dateFormat( $oPost->getCreated() ),
                    'image' => $sImage,
                    'thumb' => $sThumb,
                    'title' => $oPost->getTitle(),
                    'content' => html_entity_decode($oPost->getContent()),
                    'see_more' => $bIsSeeMore,
                    'slug' => $oPost->getSlug()
                ),
                'post_type' => $sPostType,
                'href' => $aHref,
                'is_owner' => true
            );

            // Check owner
            // If post of wall & owner = false ==> user A post on all of user B
            // If post of branch ==> user A post on any Branch
            switch ( $sPostType ) {
                case $this->config->get('common')['type']['user']:
                    if ( $aAuthor['id'] != $oPost->getOwnerId() ){
                        $this->load->model('user/user');

                        $aOwner = $this->model_user_user->getUser( $this->request->get['user_slug'] );
                        if ( $aOwner ){
                            $aReturnData['is_owner'] = false;
                            $aReturnData['owner'] = array(
                                'username' => $aOwner['username'],
                                'href' => $this->extension->path( "WallPage", array('user_slug' => $aOwner['slug']) )
                            );
                        }
                    }
                    break;

                case $this->config->get('common')['type']['branch']:
                    $oCategory = $oPost->getCategory();

                    $aReturnData['is_owner'] = false;
                    $aReturnData['owner'] = array(
                        'username' => $oCategory->getName(),
                        'href' => $this->extension->path("BranchCategory", array('branch_slug' => $oCategory->getSlug()) )
                    );
                    break;
                
                default:
                    $oPost = null;
                    break;
            }

            // Add notification
            $this->load->model('user/notification');
            
            if ( $this->customer->getSlug() != $this->request->get['user_slug'] ){
                $this->model_user_notification->addNotification(
                    $this->request->get['user_slug'],
                    $this->customer->getUser(),
                    $this->config->get('common')['action']['post'],
                    $oPost->getId(),
                    $oPost->getSlug(),
                    $sPostType,
                    $this->config->get('common')['object']['wall']
                );
            }

            if ( !empty($this->request->post['tags']) ){
                $aUserSlugs = $this->request->post['tags'];

                foreach ( $aUserSlugs as $sUserSlug ) {
                    $this->model_user_notification->addNotification(
                        $sUserSlug,
                        $this->customer->getUser(),
                        $this->config->get('common')['action']['tag'],
                        $oPost->getId(),
                        $oPost->getSlug(),
                        $sPostType,
                        $this->config->get('common')['object']['post']
                    );
                }
            }

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok',
                'post' => $aReturnData
            )));
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => $this->error['warning']
        )));
    }

	public function edit(){
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
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

			$sModel = $this->request->get['post_type'] . '/post';
			$this->load->model($sModel);
            $this->load->model('tool/image');

            $sImageLink = null;
            $sExtension = null;
            if ( !empty($this->request->post['thumb']) ){
                $aParts = explode('/', $this->request->post['thumb'] );
                $sFilename = $aParts[count($aParts) - 1];
                $sImageLink = DIR_IMAGE . $this->config->get('common')['image']['upload_cache'] . $sFilename;
                $sExtension = explode('.', $sFilename)[1];
            }

            $aData = array(
                'content'       => $this->request->post['content'],
                'title'         => $this->request->post['title'],
                'description'   => $this->request->post['description'],
                'category'      => $this->request->post['category'],
                'image_link'    => $sImageLink,
                'extension'     => $sExtension
            );

			$sModelLink = 'model_' . $this->request->get['post_type'] . '_post';
			$oPost = $this->$sModelLink->editPost( 
				$this->request->get['post_slug'],
				$aData
			);

            if ( !$oPost ){
                return $this->response->setOutput(json_encode(array(
                    'success' => 'not ok',
                    'error' => 'edit post has error'
                )));
            }

            $aPost = $oPost->formatToCache();

            // thumb
            if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
                $aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
            }else{
                $aPost['image'] = null;
                $aPost['thumb'] = null;
            }

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok',
                'post' => $aPost
            )));
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => $this->error['warning']
        )));
    }

	public function like() {
		if ( empty($this->request->get['post_slug']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'post slug is empty!'
	        )));
		}

		if ( empty($this->request->get['post_type']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'post type is empty!'
	        )));
		}

		$sModel = $this->request->get['post_type'] . '/post';
		$this->load->model($sModel);

		$sModelLink = 'model_' . $this->request->get['post_type'] . '_post';
		$oPost = $this->$sModelLink->editPost( 
			$this->request->get['post_slug'],
			array('likerId' => $this->customer->getId())
		);

		if ( $oPost ){
			// Update notification
            if ( $oPost->getUser()->getId() != $this->customer->getId() ){
                $this->load->model('user/notification');
                
                if ( in_array($this->customer->getId(), $oPost->getLikerIds()) ){
                    $this->model_user_notification->addNotification(
                        $oPost->getUser()->getSlug(),
                        $this->customer->getUser(),
                        $this->config->get('common')['action']['like'],
                        $oPost->getId(),
                        $oPost->getSlug(),
                        $aData['post_type'],
                        $this->config->get('common')['object']['post']
                    );
                }else{
                    $this->model_user_notification->deleteNotification(
                        $oPost->getUser()->getId(),
                        $this->customer->getId(),
                        $oPost->getId(),
                        $this->config->get('common')['action']['like']
                    );
                }
            }

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok',
                'like_count' => count($oPost->getLikerIds())
            )));
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => 'like post has error'
        )));
	}

    public function getLikers() {
        $aDatas = array();

        if ( empty($this->request->get['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post slug is empty!'
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'post type is empty!'
            )));
        }

        $sModel = $this->request->get['post_type'] . '/post';
        $this->load->model($sModel);

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_post';
        $oPost = $this->$sModelLink->getPost(
            array('post_slug' => $this->request->get['post_slug'])
        );

        $aUsers = array();

        if ( $oPost ){
            $this->load->model('user/user');
            $this->load->model('friend/friend');
            $this->load->model('friend/follower');
            $this->load->model('tool/image');

            $lUsers = $this->model_user_user->getUsers(array(
                'user_ids' => $oPost->getLikerIds()
            ));
            
            if ( $lUsers ){
                foreach ( $lUsers as $oUser ) {
                    $aUser = $oUser->formatToCache();
                    
                    $aUser['fr_status'] = $this->model_friend_friend->checkStatus( $this->customer->getId(), $oUser->getId() );
                    $aUser['fl_status'] = $this->model_friend_follower->checkStatus( $this->customer->getId(), $oUser->getId() );
                    $aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );

                    $aUsers[] = $aUser;
                }
            }
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'users' => $aUsers
        )));
    }

	private function validate(){
        if ( empty($this->request->post['content']) ) {
            $this->error['warning'] = $this->language->get( 'error_content' );
        
        }elseif ( !empty($this->request->files['thumb']) && $this->request->files['thumb']['size'] > 0 ) {
            $this->load->model('tool/image');
            if ( !$this->model_tool_image->isValidImage( $this->request->files['thumb'] ) ) {
                $this->error['warning'] = $this->language->get( 'error_thumb');
            }
        
        }elseif ( isset($this->request->get['user_slug']) && empty($this->request->get['user_slug']) ){
            $this->error['warning'] = 'user slug is empty';
        
        }elseif ( $this->request->get['post_type'] == $this->config->get('common')['type']['branch'] ){
            if ( empty($this->request->post['description']) ){
                $this->error['warning'] = 'description is empty';
            
            }elseif ( empty($this->request->post['category']) ){
                $this->error['warning'] = 'category is empty';
            }
        }

        if ( $this->error ) {
            return false;
        }else {
            return true;
        }
    }
}
?>