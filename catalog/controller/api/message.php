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
				$aRoomMessages[] = $this->model_tool_object->formatMessages( $oRoomMessage );
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

		$lRoomMessages = $this->model_friend_message->getLastUsersByAuthor($oLoggedUser->getId(), array(
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
				$aRoomMessages[] = $this->model_tool_object->formatMessages( $oRoomMessage );
			}
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'rooms' => $aRoomMessages,
            'total_room' => $iTotalRoomMessage,
            'canLoadMore' => $bCanLoadMore
        )));
	}
}
?>