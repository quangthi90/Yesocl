<?php
class ControllerApiMessage extends Controller {
	private $limit = 5;

	/**
	 * Return last rooms of logged user
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Post int limit
	 *	- Get int page
	 * @return: List object Rooms
	 */
	public function getRooms() {
		$oLoggedUser = $this->customer->getUser();

		// Limit & page
        if ( !empty($this->request->post['limit']) ) {
            $iLimit = (int)$this->request->post['limit'];
        }else{
            $iLimit = $this->limit;
        }

        if ( !empty($this->request->get['page']) ) {
            $iPage = (int)$this->request->get['page'];
        }else{
            $iPage = 1;
        }

		$this->load->model('tool/object');
		$this->load->model('friend/room');

		// Keyword
        if ( !empty($this->request->get['keyword']) ) {
        	$this->load->model('tool/search');
        	$lRoomResults = $this->model_tool_search->searchRoomMessageByKeyword($oLoggedUser->getId(), array(
        		'keyword' => $this->request->get['keyword'],
        		'limit' => $iLimit,
        		'start' => $iLimit * ($iPage - 1)
        	));
        	$aRoomIds = array();
        	foreach ( $lRoomResults as $oRoom ) {
        		$aRoomIds[$oRoom->getId()] = $oRoom->getId();
        	}
        	$lRoomMessages = $this->model_friend_room->getRooms($oLoggedUser->getId(), array(
        		'room_ids' => $aRoomIds,
				'limit' => $iLimit,
				'start' => $iLimit * ($iPage - 1)
			));
        } else {
        	$lRoomMessages = $this->model_friend_room->getRooms($oLoggedUser->getId(), array(
				'limit' => $iLimit,
				'start' => $iLimit * ($iPage - 1)
			));
        }

		$aRoomMessages = array();
		$bCanLoadMore = false;
		$iTotalRoomMessage = 0;
		if ( $lRoomMessages ) {
			$iTotalRoomMessage = $lRoomMessages->count();
			if ( $iPage * $iLimit < $iTotalRoomMessage ) {
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

	/**
	 * Get Last messages by Room ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Post int limit
	 *	- Get int page
	 *	- Get string Object Room ID
	 * @return: List object Messages
	 */
	public function getLastMessages() {
		// Room ID is required
		if ( !empty($this->request->get['room_id']) ) {
			$idRoom = $this->request->get['room_id'];
		} else {
			return false;
		}

		// Limit & page
        if ( !empty($this->request->post['limit']) ) {
            $iLimit = (int)$this->request->post['limit'];
        }else{
            $iLimit = $this->limit;
        }

        if ( !empty($this->request->get['page']) ) {
            $iPage = (int)$this->request->get['page'];
        }else{
            $iPage = 1;
        }

		$this->load->model('friend/room');
		$this->load->model('tool/object');

		$oRoom = $this->model_friend_room->getRoom( $idRoom );

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

	/**
	 * Send Message
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Post string Content
	 *	- Post string Object Room ID
	 *	- Post array string User's slugs
	 * @return: List object Rooms
	 */
	public function send() {
		// content is required
		if ( empty($this->request->post['content']) ) {
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

		if ( !$oRoom ) {
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
		if ( $idRoom == null ) {
			$aChannelNames = array();
			foreach ( $lUsers as $oUser ) {
				if ( $oUser->getId() != $this->customer->getId() ) {
					$aChannelNames[] = $oUser->getLiveToken();
				}
			}
		} else {
			$aChannelNames = array( $idRoom );
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

	/**
	 * Change Room Name
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Post string Room name
	 *	- Get string Object Room ID
	 * @return: Boolean Is success
	 */
	public function changeRoomName() {
		// name is required
		if ( empty($this->request->post['name']) ) {
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

		if ( !$bResult ) {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'Room ID not exist or this user is not creator'
            )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	/**
	 * Reset unread count of logged user to 0
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: Get string Object Room ID
	 * @return: Boolean is Success
	 */
	public function readRoomMessage() {
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

		$bResult = $this->model_friend_room->read( $idRoom );

		if ( !$bResult ) {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'read room message not success'
            )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	/**
	 * Get all users in Room
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: Get string Object Room ID
	 * @return: Array Object Users
	 */
	public function getRoomUsers() {
		// room ID
		if ( !empty($this->request->get['room_id']) ) {
			$idRoom = $this->request->get['room_id'];
		} else {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'room ID is empty'
            )));
		}

		$this->load->model('friend/room');
		$this->load->model('tool/object');

		$oRoom = $this->model_friend_room->getRoom( $idRoom );

		if ( !$oRoom ) {
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

	/**
	 * Add member to Room
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Get string Object Room ID
	 *	- Post array User's Slugs
	 * @return: Object Room
	 */
	public function addRoomUser() {
		// room ID
		if ( !empty($this->request->get['room_id']) ) {
			$idRoom = $this->request->get['room_id'];
		} else {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'room ID is empty'
            )));
		}

		if ( empty($this->request->post['user_slugs']) ) {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slugs is empty'
            )));
		}

		$this->load->model('friend/room');
		$this->load->model('tool/object');

		$oRoom = $this->model_friend_room->edit( $idRoom, $this->request->post );

		if ( !$oRoom ) {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'Room is not exist or permission deney'
            )));
		}

		$aRoom = $this->model_tool_object->formatRoom( $oRoom );

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'room' => $aRoom
        )));
	}

	/**
	 * Add member to Room
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Get string Object Room ID
	 *	- Post array User's Slugs
	 * @return: Object Room
	 */
	public function removeRoomUser() {
		// room ID
		if ( !empty($this->request->get['room_id']) ) {
			$idRoom = $this->request->get['room_id'];
		} else {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'room ID is empty'
            )));
		}

		if ( empty($this->request->post['user_slug']) ) {
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => 'user slug is empty'
            )));
		}

		$this->load->model('friend/room');
		$this->load->model('tool/object');
		$this->load->model('tool/chat');

		$oRoom = $this->model_friend_room->edit( $idRoom, $this->request->post );

		$aRoom = array();
		if ( $oRoom ) {
			$aRoom = $this->model_tool_object->formatRoom( $oRoom );
		}

		$sActivityType = $this->config->get('pusher')['message']['remove-user'];
		$this->model_tool_chat->pushMessage( 
			$idRoom, 
			$sActivityType,
			array(
				'room' => $aRoom,
				'user_slug' => $this->request->post['user_slug']
			)
		);

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'room' => $aRoom
        )));
	}
}
?>