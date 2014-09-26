<?php
class ControllerApiMessage extends Controller {
	public function getLastUsers() {
		$oLoggedUser = $this->customer->getUser();

		$this->load->model('friend/message');

		$lUserMessages = $this->model_friend_message->getLastUsersByAuthor( $oLoggedUser->getId() );
	}
}
?>