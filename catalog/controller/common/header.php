<?php   
class ControllerCommonHeader extends Controller {
	protected function index() {
		$this->load->model('tool/image');

		$avatar = $this->customer->getAvatar();
		
		if( !empty($avatar) && file_exists(DIR_IMAGE . $avatar) ){
			$avatar = $this->model_tool_image->resize( $avatar, 180, 180, true );
		}else{
			$avatar = $this->model_tool_image->getGavatar( $this->customer->getEmail(), 180 );
		}
		
		$this->data['user_info'] = array(
			'avatar' => $avatar,
			'username' => $this->customer->getUsername()
		);

		if ( !$this->customer->isLogged() ){
			$this->data['action'] = array(
				'connect_face'	=> $this->facebook->getLoginUrl( array( 
					'scope' => 'publish_stream, email',
					'redirect_uri' => HTTP_SERVER . 'facebookcnt/',
					) 
				)
			);
		}else{
			$user = $this->customer->getUser();

			$notifications = $user->getNotifications();
			$experie_time = new DateTime('now');
			date_sub($experie_time, date_interval_create_from_date_string('7 days'));

			$this->data['users'] = array();
			$this->data['notifications'] = array();
			foreach ( $notifications as $notification ) {
				if ( $notification->getRead() == true || 
					($notification->getCreated() < $experie_time 
						&& $notification->getRead() == true) ||
					$notification->getStatus() == false ){
					continue;
				}

				$actor = $notification->getActor();

				if ( !array_key_exists($actor->getId(), $users) ){
					$user = $actor->formatToCache();

					$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

					$this->data['users'][$actor->getId()] = $user;
				}

				$this->data['notifications'][] = array(
					'actor_id' => $actor->getId(),
					'action' => $notification->getAction(),
					'object_id' => $notification->getObjectId(),
					'created' => $notification->getCreated()
				);
			}
			
			$this->data['date_format'] = $this->language->get('date_format_full');
		}
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/header.tpl';
		} else {
			$this->template = 'default/template/common/header.tpl';
		}
		
    	$this->twig_render();
	} 	
}
?>