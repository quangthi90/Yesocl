<?php
class ControllerApiMessage extends Controller {
	private $limit = 10;

	public function getLastUsers() {
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

		$lUserMessages = $this->model_friend_message->getLastUsersByAuthor($oLoggedUser->getId(), array(
			'limit' => $iLimit,
			'start' => $iLimit * ($iPage - 1)
		));

		$aUserMessages = array();
		$bCanLoadMore = false;
		if ( $lUserMessages ){
			$iUserMessageCount = $lUserMessages->count();
			if ( ($page - 1) * $limit + $limit < $iUserMessageCount ){
                $bCanLoadMore = true;
            }
			foreach ( $lUserMessages as $oUserMessage ) {
				$aUserMessages[] = $this->model_tool_object->formatUserMessage( $oUserMessage );
			}
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'user_messages' => $aUserMessages,
            'canLoadMore' => $bCanLoadMore
        )));
	}
}
?>