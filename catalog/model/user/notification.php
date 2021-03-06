<?php
use Document\User\Notification;

class ModelUserNotification extends Model {
	public function addNotification( $idUser, $actor, $sAction, $idObject, $sPostSlug, $sType, $sObject ){
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $idUser );

		if ( !$oUser ){
			$oUser = $this->dm->getRepository('Document\User\User')->find( $idUser );
			if ( !$oUser ) return false;
		}

		if ( !is_object($actor) ){
			$actor = $this->dm->getRepository('Document\User\User')->find( $actor );
			if ( !$actor ){
				return false;
			}
		}

		$oNotification = $oUser->getNotificationByData( $actor->getId(), $idObject, $sAction );

		if ( !$oNotification ){
			$oNotification = new Notification();
			$this->dm->persist( $oNotification );
			$oNotification->setActor( $actor );
			$oNotification->setAction( $sAction );
			$oNotification->setObjectId( $idObject );
			$oNotification->setSlug( $sPostSlug );
			$oNotification->setType( $sType );
			$oNotification->setObject( $sObject );

			$oUser->addNotification( $oNotification );
		}else{
			$oNotification->setStatus( true );
		}

		$this->dm->flush();

		// AUTO NOTIFICATION USER LIST: 'notification'
		if ( $this->config->get('userlist')['notification']['active'] ) {
			$this->load->model('user/list');
			$oUserList = $this->model_user_list->getUserListByCode( $this->config->get('userlist')['code']['notification'] );
			if ( $oUserList ) {
				foreach ($oUserList->getUsers() as $key => $value) {
					$oOtherUser = $this->dm->getRepository('Document\User\User')->find( $value );

					// SKIP IF User is Other User
					if ( $value == $oUser->getId() ) {
						continue;
					}

					if ( $oOtherUser ) {
						$oOtherNotification = $oOtherUser->getNotificationByData( $actor->getId(), $idObject, $sAction );

						if ( !$oOtherNotification ){
							$oOtherNotification = new Notification();
							$this->dm->persist( $oOtherNotification );
							$oOtherNotification->setActor( $actor );
							$oOtherNotification->setAction( $sAction );
							$oOtherNotification->setObjectId( $idObject );
							$oOtherNotification->setSlug( $sPostSlug );
							$oOtherNotification->setType( $sType );
							$oOtherNotification->setObject( $sObject );

							$oOtherUser->addNotification( $oOtherNotification );
						}else{
							$oOtherNotification->setStatus( true );
						}

						$this->dm->flush();
					}
				}
			}
		}

		return true;
	}

	public function deleteNotification( $idUser, $actor_id, $idObject, $sAction ){
		$oUser = $this->dm->getRepository('Document\User\User')->find( $idUser );

		if ( !$oUser ){
			return false;
		}

		$oNotification = $oUser->getNotificationByData( $actor_id, $idObject, $sAction );

		if ( !$oNotification ){
			return false;
		}

		$oNotification->setStatus( false );

		$this->dm->flush();

		return true;
	}

	public function deleteNotifications( $idUser, $aNotificationIds ){
		$oUser = $this->dm->getRepository('Document\User\User')->find( $idUser );

		if ( !$oUser ){
			return false;
		}

		foreach ( $aNotificationIds as $idNotification ) {
			$oNotification = $oUser->getNotificationById( $idNotification );

			if ( !$oNotification ){
				continue;
			}

			$oUser->getNotifications()->removeElement( $oNotification );
		}

		$this->dm->flush();

		return true;
	}

	public function disabledNotifications( $idObject ) {
		$lUsers = $this->dm->getRepository('Document\User\User')->findBy(array(
			'notifications.objectId' => $idObject,
			'notifications.status' => true
		));

		if ( !$lUsers ){
			return false;
		}

		foreach ( $lUsers as $oUser ) {
			$lNotifications = $oUser->getNotifications();

			foreach ( $lNotifications as $oNotification ) {
				if ( $oNotification->getObjectId() == $idObject ){
					$oNotification->setStatus( false );
				}
			}
		}

		$this->dm->flush();

		return true;
	}

	public function readAll( $idUser ){
		$oUser = $this->dm->getRepository('Document\User\User')->find( $idUser );

		if ( !$oUser ){
			return false;
		}

		$aNotifications = array();
		$lNotifications = $oUser->getNotifications();

		foreach ( $lNotifications as $oNotification ) {
			$oNotification->setRead( true );
			$aNotifications[] = $oNotification;
		}

		$oUser->setNotifications( $aNotifications );

		$this->dm->flush();

		return true;
	}
}
?>