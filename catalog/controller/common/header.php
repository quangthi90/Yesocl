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
			$this->load->model('user/post');
			$this->load->model('branch/post');

			$user = $this->customer->getUser();

			$notifications = $user->getNotifications();
			$expire_time = new DateTime('now');
			date_sub($expire_time, date_interval_create_from_date_string('7 days'));

			$this->data['users'] = array();
			$this->data['notifications'] = array();
			$aObjects = array();

			$this->data['notification_count'] = 0;
			$aExpireNotiIds = array();
			$aPosts = array();
			for ( $i = $notifications->count() - 1; $i >= 0; $i-- ) {
				$notification = $notifications[$i];
				if ( $notification->getCreated() < $expire_time ){
					$aExpireNotiIds[] = $notification->getId();
					continue;
				}

				$actor = $notification->getActor();

				if ( !array_key_exists($actor->getId(), $users) ){
					$user = $actor->formatToCache();

					$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] );

					$this->data['users'][$actor->getId()] = $user;
				}

				$action = $this->config->get('notify')['action'][$notification->getAction() . '-' . $notification->getObject()];

				if ( empty($aPosts[$notification->getObjectId()]) ){
					switch ( $notification->getType() ) {
						case $this->config->get('post')['type']['branch']:
			                $this->load->model('branch/post');
			                $oPost = $this->model_branch_post->getPostBySlug( $notification->getSlug() );
			                break;

			            case $this->config->get('post')['type']['user']:
			                $this->load->model('user/post');
			                $oPost = $this->model_user_post->getPostBySlug( $notification->getSlug() );
			                break;
			            
			            default:
			                $oPost = null;
			                break;
					}
				}else{
					$oPost = $aPosts[$notification->getSlug()];
				}
				
				if ( $oPost ){
					if ( $notification->getRead() == false ){
						$this->data['notification_count']++;
					}
				
					$aPosts[$oPost->getSlug()] = $oPost;

					if ( $notification->getObjectId() != $oPost->getId() ){
						$oComment = $oPost->getCommentById( $notification->getObjectId() );
						$sTitle = html_entity_decode($oComment->getContent());
					}else{
						if ( $oPost->getTitle() == null ){
							$sTitle = html_entity_decode($oPost->getContent());
						}else{
							$sTitle = $oPost->getTitle();
						}
					}

					$this->data['notifications'][] = array(
						'actor_id' 	=> $actor->getId(),
						'action' 	=> $action,
						'object_id' => $notification->getObjectId(),
						'created' 	=> $notification->getCreated(),
						'slug'		=> $notification->getSlug(),
						'type'		=> $notification->getType(),
						'read'		=> $notification->getRead(),
						'title'		=> $sTitle
					);
				}
			}
			
			if ( count($aExpireNotiIds) > 0 ){
				$this->load->model('user/notification');
				$this->model_user_notification->deleteNotifications( $this->customer->getId(), $aExpireNotiIds );
			}
			
			$this->data['date_format'] = $this->language->get('date_format_full');
		}

		// Return list routings for js
		$this->data['routing'] = $this->config->get('routing');
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/header.tpl';
		} else {
			$this->template = 'default/template/common/header.tpl';
		}
		
    	$this->twig_render();
	} 	
}
?>