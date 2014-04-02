<?php
class ControllerAjaxUser extends Controller {
	public function getUsers() {
		if ( empty($this->request->post['user_ids']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	        )));
		}

		$this->load->model('user/user');
		$this->load->model('friend/friend');
		$this->load->model('friend/follower');
		$this->load->model('tool/image');

		$lUsers = $this->model_user_user->getUsers( array('user_ids' => $this->request->post['user_ids']) );
		$aUsers = array();
		foreach ( $lUsers as $oUser ) {
			$aUser = $oUser->formatToCache();

			$aUser['fr_status'] = $this->model_friend_friend->checkStatus( $this->customer->getId(), $oUser->getId() );
            $aUser['fl_status'] = $this->model_friend_follower->checkStatus( $this->customer->getId(), $oUser->getId() );
            $aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
            $aUser['href_user'] = $this->extension->path( 'WallPage', array('user_slug' => $aUser['slug']) );

            $aUsers[] = $aUser;
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'users' => $aUsers
        )));
	}
}
?>