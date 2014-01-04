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
				'sender_id' 	=> $oMessage->getSender()->getId(),
				'receipter_id' 	=> $oMessage->getReceipter()->getId(),
				'created' 		=> $oMessage->getCreated()
			);

			if ( $oMessage->getSender()->getId() != $idCurrentUser ){
				$oUser = $oMessage->getSender();
			}elseif ( $oMessage->getReceipter()->getId() != $idCurrentUser ){
				$oUser = $oMessage->getReceipter();
			}else{
				continue;
			}

			$aUser = $oUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$this->data['users'][$aUser['id']] = $aUser;
		}

		$this->data['curr_messages'] = array();
		if ( count($aMessages) > 0 ){
			$oMessage = $aMessages[0];
			if ( $oMessage->getSender()->getId() == $$idCurrentUser ){
				$oUser = $oMessage->getReceipter();
			}else{
				$oUser = $oMessage->getSender();
			}

			$aMessages = $this->model_friend_message->getMessagesByUser( $idCurrentUser, $oUser->getId() );
			foreach ( $aMessages as $oMessage ) {
				$this->data['curr_messages'][] = array(
					'content' 		=> $oMessage->getContent(),
					'sender_id' 	=> $oMessage->getSender()->getId(),
					'receipter_id' 	=> $oMessage->getReceipter()->getId(),
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
}
?>