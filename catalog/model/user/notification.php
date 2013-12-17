<?php
use Document\User\Notification;

class ModelUserNotification extends Model {
	public function addNotification( $user_id, $actor, $action, $object_id, $type ){
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ){
			return false;
		}

		$notification = $user->getNotificationByData( $actor->getId(), $object_id, $action );
		
		if ( !$notification ){
			$notification = new Notification();
			$this->dm->persist( $notification );
		}else{
			$notification->setStatus( true );
		}

		$notification->setActor( $actor );
		$notification->setAction( $action );
		$notification->setObjectId( $object_id );
		$notification->setType( $type );

		$user->addNotification( $notification );

		$this->dm->flush();

		return true;
	}

	public function deleteNotification( $user_id, $actor_id, $object_id, $action ){
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ){
			return false;
		}

		$notification = $user->getNotificationByData( $actor_id, $object_id, $action );

		if ( !$notification ){
			return false;
		}

		$notification->setStatus( false );

		$this->dm->flush();

		return true;
	}

	public function readAll( $user_id ){
		$oUser = $this->dm->getRepository('Document\User\User')->find( $user_id );

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