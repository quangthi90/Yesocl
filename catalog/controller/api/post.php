<?php
class ControllerApiPost extends Controller {
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

            // thumb
            $sThumb = $oPost->getThumb();
            
            if ( !empty($sThumb) && is_file(DIR_IMAGE . $sThumb) ){
                $sImage = $this->model_tool_image->resize( $sThumb, 400, 250 );
            }else{
                $sImage = null;
                $sThumb = null;
            }

            $sPostType = $this->config->get('post')['type']['user'];

            $aPost = array(
                'image' => $sImage,
                'thumb' => $sThumb,
                'title' => html_entity_decode($oPost->getTitle()),
                'content' => html_entity_decode($oPost->getContent())
            );

            return $this->response->setOutput(json_encode(array(
                'success' => 'ok',
                'post' => $aPost
            )));
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => 'wrong method'
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