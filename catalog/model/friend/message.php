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
		} elseif ( count($aData['user_to_ids']) == 1 ) {
			$oUserTo = $this->dm->getRepository('Document\User\User')->find( $aData['user_to_ids'][0] );
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
			$lUserTos = $this->dm->getRepository('Document\User\User')->findBy(array(
				'id' => array('$in' => $aData['user_to_ids'])
			));
			$oRoom->addUser( $oUserFrom );
			foreach ( $lUserTos as $oUser ) {
				$oRoom->addUser( $oUser );
			}
			$this->dm->persist( $oRoom );
		} else {
			if ( !isset($oRoom->getUnReads()[$oUserFrom->getId()]) ) {
				return false;
			}
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
}
?>