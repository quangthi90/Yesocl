<?php
class ControllerApiMessage extends Controller {
	private $limit = 5;

	public function getLastRooms() {
		$oLoggedUser = $this->customer->getUser();

		// Limit & page
        if ( !empty($this->request->post['limit']) ){
            $iLimit = (int)$this->request->post['limit'];
        }else{
            $iLimit = $this->limit;
        }

        if ( !empty($this->request->get['page']) ){
            $iPage = (int)$this->request->get['page'];
        }else{
            $iPage = 1;
        }

		$this->load->model('friend/message');
		$this->load->model('tool/object');

		$lRoomMessages = $this->model_friend_message->getRooms($oLoggedUser->getId(), array(
			'limit' => $iLimit,
			'start' => $iLimit * ($iPage - 1)
		));

		$aRoomMessages = array();
		$bCanLoadMore = false;
		$iTotalRoomMessage = 0;
		if ( $lRoomMessages ){
			$iTotalRoomMessage = $lRoomMessages->count();
			if ( $iPage * $iLimit < $iTotalRoomMessage ){
                $bCanLoadMore = true;
            }
			foreach ( $lRoomMessages as $oRoomMessage ) {
				$aRoomMessages[] = $this->model_tool_object->formatRoom( $oRoomMessage, 65, 65 );
			}
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'rooms' => $aRoomMessages,
            'total_room' => $iTotalRoomMessage,
            'canLoadMore' => $bCanLoadMore
        )));
	}

	public function getLastMessages() {
		// Room ID is required
		if ( !empty($this->request->get['room_id']) ) {
			$idRoom = $this->request->get['room_id'];
		} else {
			return false;
		}

		// Limit & page
        if ( !empty($this->request->post['limit']) ){
            $iLimit = (int)$this->request->post['limit'];
        }else{
            $iLimit = $this->limit;
        }

        if ( !empty($this->request->get['page']) ){
            $iPage = (int)$this->request->get['page'];
        }else{
            $iPage = 1;
        }

		$this->load->model('friend/message');
		$this->load->model('tool/object');

		$oRoom = $this->model_friend_message->getRoom( $idRoom );

		$aMessages = array();
		$bCanLoadMore = false;
		$iTotalMessages = 0;

		if ( $oRoom ) {
			$lMessages = $oRoom->getMessages();
			$iTotalMessages = $lMessages->count();
			$iStart = $iTotalMessages - ($iPage * $iLimit) < 0 ? 0 : $iTotalMessages - ($iPage * $iLimit);
			$aResultMessages = $lMessages->slice( $iStart, $iLimit );
			if ( $iPage * $iLimit < $iTotalMessages ) {
				$bCanLoadMore = true;
			}
			$aMessages = $this->model_tool_object->formatMessages( $aResultMessages );
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'messages' => $aMessages,
            'total_message' => $iTotalMessages,
            'canLoadMore' => $bCanLoadMore
        )));
	}

	public function send(){
		// content is required
		if ( empty($this->request->post['content']) ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'content is empty'
            )));
		}
		$sContent = $this->request->post['content'];

		// room ID
		if ( !empty($this->request->post['room_id']) ) {
			$idRoom = $this->request->post['room_id'];
		} else {
			$idRoom = null;
		}

		// array User To Slugs
		if ( !empty($this->request->post['user_slugs']) ) {
			$aUserToSlugs = $this->request->post['user_slugs'];
		} else {
			$aUserToSlugs = array();
		}

		$this->load->model('friend/message');
		$this->load->model('tool/object');
		$this->load->model('tool/chat');

		$oRoom = $this->model_friend_message->add($idRoom, array(
			'user_from_id' => $this->customer->getId(), 
			'user_to_slugs' => $aUserToSlugs, 
			'content' => $sContent,
			'userTags' => empty($this->request->post['userTags']) ? array() : $this->request->post['userTags'],
			'stockTags' => empty($this->request->post['stockTags']) ? array() : $this->request->post['stockTags']
		));

		if ( !$oRoom ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'send message not success'
            )));
		}

		$aRoom = $this->model_tool_object->formatRoom( $oRoom );
		$oMessage = $oRoom->getMessages()->last();
		$aMessage = $this->model_tool_object->formatMessage( $oMessage );

		// Push message
		$lUsers = $oRoom->getUsers();
		$aChannelNames = array();
		foreach ( $lUsers as $oUser ) {
			if ( $oUser->getId() != $this->customer->getId() ) {
				$aChannelNames[] = $oUser->getLiveToken();
			}
		}
		$sActivityType = $this->config->get('pusher')['message']['new-message'];
		$this->model_tool_chat->pushMessage( 
			$aChannelNames, 
			$sActivityType,
			array(
				'room' => $aRoom,
				'message' => $aMessage
			)
		);

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'room' => $aRoom,
            'message' => $aMessage
        )));
	}

	public function changeRoomName(){
		// name is required
		if ( empty($this->request->post['name']) ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'name is empty'
            )));
		}
		$sName = $this->request->post['name'];

		// room ID
		if ( !empty($this->request->get['room_id']) ) {
			$idRoom = $this->request->get['room_id'];
		} else {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'room ID is not empty'
            )));
		}

		$this->load->model('friend/room');

		$bResult = $this->model_friend_room->edit( $idRoom, array('name' => $sName) );

		if ( !$bResult ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'Room ID not exist or this user is not creator'
            )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	public function readRoomMessage(){
		// room ID
		if ( !empty($this->request->post['room_id']) ) {
			$idRoom = $this->request->post['room_id'];
		} else {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'room ID is not empty'
            )));
		}

		$this->load->model('friend/room');

		$bResult = $this->model_friend_room->read( $idRoom );

		if ( !$bResult ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'read room message not success'
            )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	public function getRoomUsers(){
		// room ID
		if ( !empty($this->request->post['room_id']) ) {
			$idRoom = $this->request->post['room_id'];
		} else {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'room ID is not empty'
            )));
		}

		$this->load->model('friend/room');
		$this->load->model('tool/object');

		$oRoom = $this->model_friend_room->getRoom( $idRoom );

		if ( !$oRoom ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'Room\'id ' . $idRoom . ' is not exist'
            )));
		}

		$aUsers = array();
		$lUsers = $oRoom->getUsers();
		foreach ( $lUsers as $oUser ) {
			$aUsers[] = $this->model_tool_object->formatUser( $oUser );
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'users' => $aUsers
        )));
	}
}
?>