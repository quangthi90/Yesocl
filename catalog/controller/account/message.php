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
		$aMessages = $this->model_friend_message->getLastMessages( $this->customer->getSlug() );

		$this->data['users'] = array();
		$this->data['messages'] = array();
		$idCurrentUser = $this->customer->getId();
		foreach ( $aMessages as $key => $oMessage ) {
			$this->data['messages'][] = array(
				'content' 		=> $oMessage->getContent(),
				'object_id' 	=> $oMessage->getObject()->getId(),
				'is_sender'		=> $oMessage->getIsSender(),
				'created' 		=> $oMessage->getCreated()
			);

			$oUser = $oMessage->getObject();
			$aUser = $oUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$this->data['users'][$aUser['id']] = $aUser;
		}

		$this->data['curr_messages'] = array();
		if ( count($aMessages) > 0 ){
			$oMessage = $aMessages[0];
			$this->data['object_id'] = $oMessage->getObject()->getId();

			$aMessages = $this->model_friend_message->getMessagesByUser( $idCurrentUser, $this->data['object_id'] );
			foreach ( $aMessages as $oMessage ) {
				$this->data['curr_messages'][] = array(
					'content' 		=> $oMessage->getContent(),
					'object_id' 	=> $oMessage->getObject()->getId(),
					'is_sender'		=> $oMessage->getIsSender(),
					'created' 		=> $oMessage->getCreated()
				);
			}
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/message.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/message.tpl';
		} else {
			$this->template = 'default/template/account/message.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
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
            'success' => 'ok'
        )));
	}
}
?>