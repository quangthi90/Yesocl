<?php 
class ControllerFriendRequest extends Controller { 
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

		$user = $this->model_user_user->getUserFull( $this->request->get );

		if ( !$user ){
			return false;
		}

		$user_temp = $user->formatToCache();

		if ( !empty($user_temp['avatar']) ){
			$user_temp['avatar'] = $this->model_tool_image->resize( $user_temp['avatar'], 180, 180 );
		}elseif ( !empty($user_temp['email']) ){
            $user_temp['avatar'] = $this->model_tool_image->getGavatar( $user_temp['email'], 180 );
        }else{
        	$user_temp['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
		}

		$this->data['users'] = array( $user_temp['id'] => $user_temp );

		$this->data['current_user_id'] = $user->getId();

		$this->data['friends'] = array();

		foreach ( $user->getFriends() as $friend ) {
			$this->data['friends'][] = array(
				'id' => $friend->getId(),
				'group_id' => $friend->getGroupId() 
			);

			$user = $friend->getUser()->formatToCache();

			if ( !array_key_exists($user['id'], $this->data['users']) ){
				if ( !empty($user['avatar']) ){
					$user['avatar'] = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
				}elseif ( !empty($user['email']) ){
		            $user['avatar'] = $this->model_tool_image->getGavatar( $user['email'], 180 );
		        }else{
		        	$user['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
				}

				$this->data['users'][$user['id']] = $user;
			}
		}

		$this->data['group'] = array();

		foreach ( $user->getFriendGroups() as $group ) {
			$this->data['group'][$group->getId()] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/friend/friend.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/friend/friend.tpl';
		} else {
			$this->template = 'default/template/friend/friend.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function makeFriend(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->load->model('user/user');

           	if ( empty($this->request->get['user_slug']) ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'user slug is empty'
		        )));
           	}

           	$user_slug = $this->request->get['user_slug'];

           	$result = $this->model_user_user->editUser( $user_slug, array('request_friend' => $this->customer->getId()) );

           	if ( !$result ){
           		return $this->response->setOutput(json_encode(array(
		            'success' => 'not ok',
		            'warning' => 'send request have error'
		        )));
           	}

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok'
        )));
	}
}
?>