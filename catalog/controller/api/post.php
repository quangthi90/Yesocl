<?php
class ControllerApiPost extends Controller {
    private $error = array();

    public function add(){
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            if ( empty($this->request->get['slug']) ){
                return $this->response->setOutput(json_encode(array(
                    'success' => 'not ok',
                    'error' => gettext('slug is empty')
                )));
            }

            if ( empty($this->request->get['post_type']) ){
                return $this->response->setOutput(json_encode(array(
                    'success' => 'not ok',
                    'error' => gettext('post type is empty!')
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
                'author_id'     => $this->customer->getId(),
                'image_link'    => $sImageLink,
                'extension'     => $sExtension,
                'stockTags'     => $this->request->post['stockTags'],
                'userTags'      => $this->request->post['userTags']
            );

            switch ( $this->request->get['post_type'] ) {
                case $this->config->get('common')['type']['user']:
                    $aData = array_merge($aData, array(
                        'user_slug'     => $this->request->get['slug']
                    ));
                    break;

                case $this->config->get('common')['type']['branch']:
                    $aData = array_merge($aData, array(
                        'description'   => $this->request->post['description'],
                        'cat_slug'      => $this->request->get['slug'],
                    ));
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
                    'success' => 'not ok',
                    'error' => gettext('Save Post have error')
                )));
            }

            $aAuthor = $oPost->getUser()->formatToCache();

            $this->load->model('tool/object');
            $aPost = $this->model_tool_object->formatPost( $oPost );

            // Add notification
            $this->load->model('user/notification');
            
            if ( $this->customer->getSlug() != $this->request->get['slug'] ){
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

            // if ( $this->request->get['post_type'] == $this->config->get('common')['type']['user'] ){
                
            // }

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
                'post' => $aPost
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
                    'error' => gettext('post slug is empty')
                )));
            }

            if ( empty($this->request->get['post_type']) ){
				return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'error' => gettext('post type is empty!')
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
                    'error' => gettext('edit post has error')
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

    public function delete(){
        $aData = array();

        if ( empty($this->request->get['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => gettext('post slug is empty')
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => gettext('post type is empty!')
            )));
        }

        $sModel = $this->request->get['post_type'] . '/post';
        $this->load->model($sModel);

        $sModelLink = 'model_' . $this->request->get['post_type'] . '_post';
        $bResult = $this->$sModelLink->deletePost( 
            $this->request->get['post_slug']
        );

        if ( $bResult == false ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok'
            )));
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
    }

	public function like() {
		if ( empty($this->request->get['post_slug']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => gettext('post slug is empty!')
	        )));
		}

		if ( empty($this->request->get['post_type']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => gettext('post type is empty!')
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
            'error' => gettext('like post has error')
        )));
	}

    public function getLikers() {
        $aData = array();

        if ( empty($this->request->get['post_slug']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => gettext('post slug is empty!')
            )));
        }

        if ( empty($this->request->get['post_type']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => gettext('post type is empty!')
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

                    $aUsers[$aUser['id']] = $aUser;
                }
            }
        }

        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'users' => $aUsers
        )));
    }

	private function validate(){
        if ( empty($this->request->post['content']) || strlen($this->request->post['content']) == 0 ) {
            $this->error['warning'] = gettext( 'content is empty' );
        
        }elseif ( !empty($this->request->files['thumb']) && $this->request->files['thumb']['size'] > 0 ) {
            $this->load->model('tool/image');
            if ( !$this->model_tool_image->isValidImage( $this->request->files['thumb'] ) ) {
                $this->error['warning'] = gettext( 'image is too large' );
            }
        
        }elseif ( isset($this->request->get['user_slug']) && empty($this->request->get['user_slug']) ){
            $this->error['warning'] = gettext( 'user slug is empty' );
        
        }elseif ( $this->request->get['post_type'] == $this->config->get('common')['type']['branch'] ){
            if ( empty($this->request->post['description']) || strlen($this->request->post['description']) == 0 ){
                $this->error['warning'] = gettext( 'description is empty' );
            
            }elseif ( empty($this->request->post['category']) ){
                $this->error['warning'] = gettext( 'category is empty' );
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