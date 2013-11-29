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

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$keyword = $this->request->get['keyword'];

		if ( empty($keyword) ){
			return false;
		}

		$users = $this->model_user_user->searchUserByKeyword( array('keyword' => $keyword) );

		foreach ($users as $user) {
			$user_ids[$user->getId()] = $user->getId();
		}

		$users = $this->model_user_user->getUsers( array('user_ids' => $user_ids) );

		$this->data['users'] = array();

		foreach ( $users as $user ) {
			if ( $user->getId() == $this->customer->getId() ){
				continue;
			}

			if ( $user->getFriendRequests() && in_array($this->customer->getId(), $user->getFriendRequests()) ){
				$friend_status = 2;
			}elseif ( $this->customer->getUser()->getFriendById($user->getId()) ){
				$friend_status = 1;
			}else{
				$friend_status = 0;
			}
			
			if ( $user->getMeta() ){
				$meta = $user->getMeta()->formatToCache();
			}else{
				$meta = array();
			}

			$user = $user->formatToCache();

			$user['meta'] = $meta;
			$user['status'] = $friend_status;

			if ( !array_key_exists($user['id'], $this->data['users']) ){
				$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

				$this->data['users'][$user['id']] = $user;
			}
		}
		
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

	public function autoComplete() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$keyword = $this->request->get['keyword'];

		if ( empty($keyword) ){
			return false;
		}

		$users = $this->model_user_user->searchUserByKeyword( array('keyword' => $keyword) );

		foreach ($users as $user) {
			$user_ids[$user->getId()] = $user->getId();
		}

		$users = $this->model_user_user->getUsers( array('user_ids' => $user_ids) );

		$this->data['users'] = array();

		foreach ( $users as $user ) {
			if ( $user->getId() == $this->customer->getId() ){
				continue;
			}

			// if ( $user->getFriendRequests() && in_array($this->customer->getId(), $user->getFriendRequests()) ){
			// 	$friend_status = 2;
			// }elseif ( $this->customer->getUser()->getFriendById($user->getId()) ){
			// 	$friend_status = 1;
			// }else{
			// 	$friend_status = 0;
			// }
			
			// if ( $user->getMeta() ){
			// 	$meta = $user->getMeta()->formatToCache();
			// }else{
			// 	$meta = array();
			// }

			$data = $user->formatToCache();

			// $data['meta'] = $meta;
			// $data['status'] = $friend_status;
			$data['category'] = 'Friend';

			$data['metaInfo'] = array();
			if ( $user->getMeta() && $user->getMeta()->getLocation() ){
				$data['metaInfo'] = $user->getMeta()->getLocation()->getLocation();
			}
			
			$data['avatar'] = $this->model_tool_image->getAvatarUser( $data['avatar'], $data['email'] );

			$this->data['users'][$data['id']] = $data;
		}

		return $this->response->setOutput(json_encode(
			$this->data['users']
        ));
	}
}
?>