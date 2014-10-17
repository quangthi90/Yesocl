<?php
class ControllerApiMessage extends Controller {
	private $limit = 20;

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
			if ( ($page - 1) * $limit + $limit < $iTotalRoomMessage ){
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
			$aResultMessages = $lMessages->slice( ($iPage - 1) * $iLimit, $iLimit );
			$iTotalMessages = $lMessages->count();
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

		$oRoom = $this->model_friend_message->add( 
			$idRoom,
			$this->customer->getId(), 
			$aUserToSlugs, 
			$sContent 
		);

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
		$this->model_tool_chat->pushMessage( $oRoom->getId(), $aMessage['user']['username'], $aMessage['content'], $aMessage['user']['avatar'] );

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'room' => $aRoom,
            'message' => $aMessage
        )));
	}
}
?>