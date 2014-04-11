<?php 
class ControllerCommonNotification extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->load->model('branch/post');
		$this->load->model('user/post');
		$this->load->model('tool/image');
		
		$oLoggedUser = $this->customer->getUser();

		if ( !$aNotifications = $oLoggedUser->getNotifications() ){
			$aNotifications = array();
			$iNotiCount = 0;
		}else{
			$aNotifications = $aNotifications;
			$iNotiCount = $aNotifications->count();
		}
		
		$expire_time = new DateTime('now');
		date_sub($expire_time, date_interval_create_from_date_string('7 days'));

		$now = new DateTime('now');

		$this->data['users'] = array();
		$this->data['notifications'] = array();
		$aObjects = array();

		$this->data['times'] = array();

		$aPosts = array();
		for ( $i = $iNotiCount - 1; $i >= 0; $i-- ) {
			$oNotification = $aNotifications[$i];
			if ( $oNotification->getCreated() < $expire_time ){
				continue;
			}

			$actor = $oNotification->getActor();

			if ( empty($users[$actor->getId()]) ){
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
				$aPosts[$oPost->getSlug()] = $oPost;

				if ( $oNotification->getObjectId() != $oPost->getId() ){
					$oComment = $oPost->getCommentById( $oNotification->getObjectId() );
					$sTitle = html_entity_decode($oComment->getContent());
				}else{
					if ( $oPost->getTitle() == null ){
						$sTitle = html_entity_decode($oPost->getContent());
					}else{
						$sTitle = $oPost->getTitle();
					}
				}

				$created = $oNotification->getCreated();

				$time = $created->format('Y/m/d');

				if ( empty($this->data['times'][$time]) ){
					$iDay = $now->format('d') - $created->format('d');
					if ( $iDay == 0 ){
						$this->data['times'][$time] = gettext('Today');
					}elseif ( $iDay == 1 ){
						$this->data['times'][$time] = gettext('Yesterday');
					}else{
						$this->data['times'][$time] = $created->format('d F');
					}
				}

				$this->data['notifications'][$time][] = array(
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
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/notification.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/notification.tpl';
		} else {
			$this->template = 'default/template/common/notification.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}

	public function readAll(){
		$this->load->model('user/notification');

		$result = $this->model_user_notification->readAll( $this->customer->getId() );

		if ( $result ){
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