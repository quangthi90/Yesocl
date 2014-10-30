<?php
use Document\Friend\MessageRoom,
	Document\Friend\Message;

class ModelFriendMessage extends Model {
	/**
	 * Add Message
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Object MongoID Room -- can null
	 * 	- Object MongoID User Send
	 *	- Array String Slug Users Receipt
	 * 	- String content message
	 * @return: Boolean
	 */
	public function add( $idRoom = null, $aData = array() ){
		$oRoom = null;

		// Get exist room
		if ( $idRoom != null ) {
			$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );

		// Check exist room if 1 - 1
		} elseif ( count($aData['user_to_slugs']) == 1 ) {
			$oUserTo = $this->dm->getRepository('Document\User\User')->findOneBySlug( $aData['user_to_slugs'][0] );
			if ( $oUserTo ) {
				$aUserIds = array( $aData['user_from_id'], $oUserTo->getId() );
				$lRooms = $this->dm->getRepository('Document\Friend\MessageRoom')->findBy(array(
					'users.id' => array( '$all' => $aUserIds )
				));
				foreach ( $lRooms as $oRoom ) {
					if ( $oRoom->getUsers()->count() <= 2 ) {
						break;
					}
					$oRoom = null;
				}
			}
		}

		$oUserFrom = $this->dm->getRepository('Document\User\User')->find( $aData['user_from_id'] );
		// Create room if new room
		if ( !$oRoom ) {
			$oRoom = new MessageRoom();
			$oRoom->setCreator( $oUserFrom );
			$oRoom->addUser( $oUserFrom );
			foreach ( $aData['user_to_slugs'] as $sUserToSlug ) {
				$oUserTo = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserToSlug );
				$oRoom->addUser( $oUserTo );
			}

			$this->dm->persist( $oRoom );
		}

		// Add unread message for users in room
		foreach ( $oRoom->getUsers() as $oUser ) {
			if ( $oUser->getId() != $this->customer->getId() )
				$iUnRead = $oRoom->getUnReads()[$oUser->getId()] ? $oRoom->getUnReads()[$oUser->getId()] + 1 : 1;
			else
				$iUnRead = 0;
			$oRoom->addUnRead( $oUser->getId(), $iUnRead );
		}

		$oMessage = new Message();
		$oMessage->setAuthor( $oUserFrom );
		$oMessage->setContent( $aData['content'] );
		$oMessage->setUserTags( $aData['userTags'] );
		$oMessage->setStockTags( $aData['stockTags'] );
		$oRoom->addMessage( $oMessage );

		$this->dm->flush();

		return $oRoom;
	}

	/**
	 * Get last 20 users have new message
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	String User Slug
	 * 	Int Start
	 *	Int Limit
	 * @return: array objects Message
	 */
	public function getRooms( $idUserAuthor, $aData = array() ){
		// Limit & start
		if (  empty($aData['start']) ){
			$aData['start'] = 0;
		}
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		// Sort & order
		if ( empty($aData['sort']) ){
			$aData['sort'] = 'updated';
		}

		if ( empty($aData['order']) ){
			$aData['order'] = -1;
		}

		$lRooms = $this->dm->getRepository('Document\Friend\MessageRoom')->findBy(array('users.id' => $idUserAuthor))
			->skip($aData['start'])
			->limit($aData['limit'])
			->sort(array($aData['sort'] => $aData['order']));

		foreach ( $lRooms as $oRoom ) {
			$oRoom->addUnRead( $this->customer->getId(), 0 );
		}
		$this->dm->flush();

		return $lRooms;
	}

	/**
	 * 10/02/2014
	 * Get Room by Room ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: Object MongoID
	 * @return: Object Room
	 */
	public function getRoom( $idRoom ) {
		$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );

		$oRoom->addUnRead( $this->customer->getId(), 0 );
		$this->dm->flush();

		return $oRoom;
	}
}
?>