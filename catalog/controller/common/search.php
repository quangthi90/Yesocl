<?php 
class ControllerCommonSearch extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');
		$this->load->model('friend/friend');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$sKeyword = $this->request->get['keyword'];

		if ( empty($sKeyword) ){
			return false;
		}

		$lSearchUsers = $this->model_user_user->searchUserByKeyword( array('keyword' => $sKeyword) );

		$aUserIds = array();
		foreach ($lSearchUsers as $oSearchUser) {
			$aUserIds[$oSearchUser->getId()] = $oSearchUser->getId();
		}

		$lQueryUsers = $this->model_user_user->getUsers( array('user_ids' => $aUserIds) );

		$aUsers = array();
		$oCurrUser = $this->customer->getUser();
		$this->data['search_user_ids'] = array();

		foreach ( $lQueryUsers as $oQueryUser ) {
			if ( $oQueryUser->getId() == $oCurrUser->getId() ){
				continue;
			}

			$aUser = $oQueryUser->formatToCache();

			$aUser['fr_status'] = $this->model_friend_friend->checkFriendStatus( $oQueryUser, $oCurrUser );
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUser['gender'] = $oQueryUser->getMeta()->getSex();

			$aUsers[$aUser['id']] = $aUser;
			$this->data['search_user_ids'][] = $aUser['id'];
		}
		
		$this->data['users'] = $aUsers;
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/search.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/search.tpl';
		} else {
			$this->template = 'default/template/common/search.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function FriendTypeahead() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$sKeyword = $this->request->get['keyword'];

		if ( empty($sKeyword) ){
			return false;
		}

		$aUsers = $this->model_user_user->searchUserByKeyword( array('keyword' => $sKeyword) );

		foreach ($aUsers as $oUser) {
			$aUserIds[$oUser->getId()] = $oUser->getId();
		}

		$aUsers = $this->model_user_user->getUsers( array('user_ids' => $aUserIds) );

		$this->data['users'] = array();

		foreach ( $aUsers as $oUser ) {
			if ( $oUser->getId() == $this->customer->getId() ){
				continue;
			}

			$aUser = $oUser->formatToCache();

			$aUser['category'] = 'Friend';

			$aUser['metaInfo'] = array();
			if ( $oUser->getMeta() && $oUser->getMeta()->getLocation() ){
				$aUser['metaInfo'] = $oUser->getMeta()->getLocation()->getLocation();
			}
			
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUser['href'] = $this->extension->path('WallPage', array('user_slug' => $aUser['slug']));

			$this->data['users'][$aUser['id']] = $aUser;
		}	
		return $this->response->setOutput(json_encode(
			$this->data['users']
        ));
	}
}
?>