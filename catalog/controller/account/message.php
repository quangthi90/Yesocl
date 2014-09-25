<?php  
class ControllerAccountMessage extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->load->model('friend/message');
		$this->load->model('tool/image');
		$idCurrentUser = $this->customer->getId();
		$lMessages = $this->model_friend_message->getLastMessages( $idCurrentUser );

		$this->data['users'] = array();
		$this->data['messages'] = array();
		foreach ( $lMessages as $key => $oMessage ) {
			$this->data['messages'][] = array(
				'content' 		=> $oMessage->getContent(),
				'object_id' 	=> $oMessage->getObject()->getId(),
				'is_sender'		=> $oMessage->getIsSender(),
				'created' 		=> $oMessage->getCreated(),
				'read'			=> $oMessage->getRead()
			);

			$oUser = $oMessage->getObject();
			$aUser = $oUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'], 100, 100 );
			$this->data['users'][$aUser['id']] = $aUser;
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/message.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/message.tpl';
		} else {
			$this->template = 'default/template/account/message.tpl';
		}
		
		$this->children = array(
			'layout/basic/leftsidebar',
			'layout/basic/rightsidebar',
			'layout/basic/navbar',
			'layout/basic/footer',
			'widget/account/user'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function send(){
		if ( empty($this->request->post['user_slugs']) ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
		}

		if ( empty($this->request->post['content']) ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'content is empty'
            )));
		}

		$aSlugs = $this->request->post['user_slugs'];
		$sContent = $this->request->post['content'];

		$this->load->model('friend/message');
		$result = $this->model_friend_message->send( $this->customer->getId(), $aSlugs, $sContent );

		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'send message not success'
            )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'time' => $this->extension->dateFormat(),
            'user' => $this->extension->getCurrentUser()
        )));
	}

	public function getMessageListByUser(){
		if ( empty($this->request->get['user_slug']) ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
		}

		$this->load->model('friend/message');
		$this->load->model('user/user');
		$this->load->model('tool/image');

		$sObjectSlug = $this->request->get['user_slug'];
		$aObjectUser = $this->model_user_user->getUser( $sObjectSlug );
		if ( !$aObjectUser ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user have slug: ' . $sObjectSlug . ' not exist'
            )));
		}
		$idCurrUser = $this->customer->getId();
		$idObjectUser = $aObjectUser['id'];

		// Array Object User info
		$aObjectUser['avatar'] = $this->model_tool_image->getAvatarUser( $aObjectUser['avatar'], $aObjectUser['email'], 100, 100 );
		$aObjectUser['href'] = $this->extension->path('WallPage', array('user_slug' => $aObjectUser['slug']));
		
		// Array Current User info
		$aCurrUser = $this->extension->getCurrentUser( 100, 100 );
		$aCurrUser['href'] = $this->extension->path('WallPage', array('user_slug' => $aCurrUser['slug']));

		$aMessages = $this->model_friend_message->getMessagesByUser( $idCurrUser, $idObjectUser );

		$aReturnMessages = array();
		foreach ( $aMessages as $oMessage ) {
			$aReturnMessages[] = array(
				'id' => $oMessage->getId(),
				'content' => $oMessage->getContent(),
				'created' => $this->extension->dateFormat( $oMessage->getCreated() ),
				'user' => $oMessage->getIsSender() == true ? $aCurrUser : $aObjectUser
			);
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'messages' => $aReturnMessages,
            'user' => $aObjectUser
        )));
	}

	public function getLastMessages(){
		$this->load->model('friend/message');
        $this->load->model('tool/image');

        $lMessages = $this->model_friend_message->getLastMessages( $this->customer->getId() );
        // $aQueryMessages = $lMessages->toArray();
        // $aQueryMessages = array_reverse($aQueryMessages);

        $aMessages = array();
        $aUsers = array();
        foreach ( $lMessages as $oMessage ) {
        	if ( empty($aUsers[$oMessage->getObject()->getId()]) ){
        		$oUser = $oMessage->getObject();
				$aUser = $oUser->formatToCache();
				$aUser['avatar'] = $this->model_tool_image->getAvatarUser( 
					$aUser['avatar'], 
					$aUser['email'], 
					50, 
					50 
				);
				$aUsers[$aUser['id']] = $aUser;
        	}

			$aMessages[] = array(
				'content' 		=> $oMessage->getContent(),
				'object_id' 	=> $oMessage->getObject()->getId(),
				'is_sender'		=> $oMessage->getIsSender(),
				'created' 		=> $this->extension->dateFormat( $oMessage->getCreated() ),
				'read'			=> $oMessage->getRead(),
				'user'			=> $aUsers[$oMessage->getObject()->getId()]
			);
		}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'messages' => $aMessages
        )));
	}

	public function deleteUserMessages(){
		if ( empty($this->request->get['user_slug']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok: user slug is empty',
	        )));
		}

		$this->load->model('friend/message');
		$this->load->model('user/user');

		$aObjectUser = $this->model_user_user->getUser( $this->request->get['user_slug'] );

		if ( !$aObjectUser ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok: user not found with user slug: ' . $this->request->get['user_slug'],
	        )));
		}

		$result = $this->model_friend_message->deleteUserMessages( $this->customer->getId(), $aObjectUser['id'] );

		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok: you not have authentication',
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
        )));
	}

	public function deleteMessage(){
		if ( empty($this->request->get['message_id']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok: message id is empty',
	        )));
		}

		$this->load->model('friend/message');

		$result = $this->model_friend_message->deleteMessage( $this->customer->getId(), $this->request->get['message_id'] );

		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok: you not have authentication',
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
        )));
	}
}
?>