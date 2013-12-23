<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="user_notification") */
Class Notifications {
	/** 
	 * @MongoDB\Id
	 */
	private $id;

	/** @MongoDB\ReferenceOne(targetDocument="User", inversedBy="notifications") */
	private $user;

	/** @MongoDB\EmbedMany(targetDocument="Notification") */
	private $notifications = array();

	/**
	 * Get Notification By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object notification
	 * 		- null if not found
	 */
	public function getNotificationById( $notification_id ){
		foreach ( $this->notifications as $notification ){
			if ( $notification->getId() === $notification_id ){
				return $notification;
			}
		}
		
		return null;
	}

	public function getId() {
		return $this->id;
	}

	public function setUser( User $user) {
		return $this->user = $user;
	}

	public function getUser() {
		return $this->user;
	}

	public function addNotification( Notification $notification ){
		$this->notifications[] = $notification;
	}

	public function setNotifications( $notifications ){
		$this->notifications = $notifications;
	}

	public function getNotifications(){
		return $this->notifications;
	}
}