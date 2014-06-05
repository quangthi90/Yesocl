<?php   
class ControllerCommonHeader extends Controller {
	protected function index() {
		$this->load->model('tool/image');

		if ( !$this->customer->isLogged() ){
			// $this->data['action'] = array(
			// 	'connect_face'	=> $this->facebook->getLoginUrl( array( 
			// 		'scope' => 'publish_stream, email',
			// 		'redirect_uri' => HTTP_SERVER . 'facebookcnt/',
			// 		) 
			// 	)
			// );
		}else{
			$this->load->model('user/post');
			$this->load->model('branch/post');
			$this->load->model('friend/message');

			$oLoggedUser = $this->customer->getUser();

			// -- Notifications --
			if ( !$aNotifications = $oLoggedUser->getNotifications() ){
				$aNotifications = array();
				$iNotiCount = 0;
			}else{
				$aNotifications = $aNotifications;
				$iNotiCount = $aNotifications->count();
			}
			
			$expire_time = new DateTime('now');
			date_sub($expire_time, date_interval_create_from_date_string('7 days'));

			$this->data['users'] = array();
			$this->data['notifications'] = array();
			$aObjects = array();

			$this->data['notification_count'] = 0;
			$aExpireNotiIds = array();
			$aPosts = array();
			for ( $i = $iNotiCount - 1; $i >= 0; $i-- ) {
				$oNotification = $aNotifications[$i];
				if ( $oNotification->getCreated() < $expire_time ){
					$aExpireNotiIds[] = $oNotification->getId();
					continue;
				}

				if ( !$oNotification->getStatus() ){
					continue;
				}

				$actor = $oNotification->getActor();

				if ( !array_key_exists($actor->getId(), $this->data['users']) ){
					$user = $actor->formatToCache();

					$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'], 100, 100 );

					$this->data['users'][$actor->getId()] = $user;
				}

				$action = gettext( $this->config->get('notify')['action'][$oNotification->getAction() . '-' . $oNotification->getObject()] );
				
				if ( empty($aPosts[$oNotification->getObjectId()]) ){
					switch ( $oNotification->getType() ) {
						case $this->config->get('post')['type']['branch']:
			                $oPost = $this->model_branch_post->getPostBySlug( $oNotification->getSlug() );
			                break;

			            case $this->config->get('post')['type']['user']:
			                $oPost = $this->model_user_post->getPostBySlug( $oNotification->getSlug() );
			                break;
			            
			            default:
			                $oPost = null;
			                break;
					}
				}else{
					$oPost = $aPosts[$oNotification->getSlug()];
				}
				
				if ( $oPost ){
					if ( $oNotification->getRead() == false ){
						$this->data['notification_count']++;
					}
				
					$aPosts[$oPost->getSlug()] = $oPost;

					if ( $oNotification->getObjectId() != $oPost->getId() ){
						$oComment = $oPost->getCommentById( $oNotification->getObjectId() );
						if ( $oComment ){
							$sTitle = html_entity_decode($oComment->getContent());
						}else{
							if ( $oPost->getTitle() == null ){
								$sTitle = html_entity_decode($oPost->getContent());
							}else{
								$sTitle = $oPost->getTitle();
							}
						}
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
						'object_id' => $oNotification->getObjectId(),
						'created' 	=> $oNotification->getCreated(),
						'slug'		=> $oNotification->getSlug(),
						'type'		=> $oNotification->getType(),
						'read'		=> $oNotification->getRead(),
						'title'		=> $sTitle
					);
				}
			}
			
			if ( count($aExpireNotiIds) > 0 ){
				$this->load->model('user/notification');
				$this->model_user_notification->deleteNotifications( $this->customer->getId(), $aExpireNotiIds );
			}
			// -- End Notifications --

			$this->data['mess_unread'] = $oLoggedUser->getUnRead();
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