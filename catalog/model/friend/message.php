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

		return $oRoom;
	}

	/**
	 * Get Messages by User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	- Object MongoID Current User
	 *	- Object MongoID Object User
	 * 	- Int start
	 *	- Int Limit
	 * @return: array objects Message
	 */
	public function getMessagesByUser( $idCurrUser, $idObjectUser, $bIsRead = true, $iStart = 0, $iLimit = 100 ){
		$oMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $idCurrUser
		));

		if ( !$oMessages ){
			return null;
		}
		
		$aMessages = $oMessages->getMessages()->toArray();
		$iCountMessages = count( $aMessages );
		$iIndex = 1;
		$aMessageUsers = array();

		for ( $i = $iCountMessages - 1; $i >= 0; $i-- ) { 
			if ( count($aMessageUsers) == $iLimit ){
				break;
			}

			$oMessage = $aMessages[$i];

			if ( $iIndex < $iStart || $idObjectUser != $oMessage->getObject()->getId() ){
				continue;
			}

			$aMessageUsers[] = $oMessage;

			$iIndex++;

			if ( $bIsRead == true ){
				$oMessage->setRead( true );
			}
		}

		$oMessage = $oMessages->getLastMessageByUserId( $idObjectUser );

		if ( $oMessage ){
			$oMessage->setRead( true );
		}

		$this->dm->flush();

		return $aMessageUsers;
	}

	/**
	 * Send Message
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	- Object MongoID User Send
	 *	- Array String Slug Users Receipt
	 * 	- Int start
	 *	- Int Limit
	 * @return: Boolean
	 */
	public function send( $idUserFrom, $aUserToSlugs, $sContent ){
		$oFromMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $idUserFrom
		));

		if ( !$oFromMessages ){
			$oFromMessages = new Messages();
			$oUserFrom = $this->dm->getRepository('Document\User\User')->find( $idUserFrom );
			$oFromMessages->setUser( $oUserFrom );
			$this->dm->persist( $oFromMessages );
		}else{
			$oUserFrom = $oFromMessages->getUser();
		}

		if ( !$oUserFrom ){
			return false;
		}
		
		foreach ( $aUserToSlugs as $sUserToSlug ) {
			$oUserTo = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserToSlug );
			if ( !$oUserTo ){
				continue;
			}
			
			$oMessage = new Message();
			$oMessage->setObject( $oUserTo );
			$oMessage->setIsSender( true );
			$oMessage->setContent( $sContent );
			$oMessage->setRead( true );
			$oFromMessages->addMessage( $oMessage );

			$oToMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
				'user.id' => $oUserTo->getId()
			));
			
			if ( !$oToMessages ){
				$oToMessages = new Messages();
				$oToMessages->setUser( $oUserTo );
				$this->dm->persist( $oToMessages );
			}
			$oMessage = new Message();
			$oMessage->setObject( $oUserFrom );
			$oMessage->setIsSender( false );
			$oMessage->setContent( $sContent );
			$oMessage->setRead( false );
			$oToMessages->addMessage( $oMessage );
		}

		$this->dm->flush();

		return true;
	}

	/**
	 * Get Messages Object
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	- Object MongoID User
	 * @return: object Messages
	 */
	public function getMessagesObject( $idUser ){
		$oMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $idUser
		));

		return $oMessages;
	}

	/**
	 * Delete all messages by user
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	- Object MongoID Current User
	 * 	- Object MongoID Object User
	 * @return: boolean
	 */
	public function deleteRooms( $idCurrUser, $idObjectUser ){
		$oMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $idCurrUser
		));

		if ( !$oMessages ){
			return false;
		}
		
		$lMessages = $oMessages->getMessages();

		foreach ( $lMessages as $oMessage ) { 
			if ( $idObjectUser == $oMessage->getObject()->getId() ){
				$lMessages->removeElement( $oMessage );
				break;
			}
		}

		$oMessage = $oMessages->getLastMessageByUserId( $idObjectUser );
		$oMessages->getLastMessages()->removeElement( $oMessage );

		$this->dm->flush();

		return true;
	}

	/**
	 * Delete 1 message by message id
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	- Object MongoID Owner
	 * 	- Object MongoID Message
	 * @return: boolean
	 */
	public function deleteMessage( $idOwner, $idMessage ){
		$oMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $idOwner
		));

		if ( !$oMessages ){
			return false;
		}
		
		$lMessages = $oMessages->getMessages();

		foreach ( $lMessages as $oMessage ) { 
			if ( $idMessage == $oMessage->getId() ){
				$lMessages->removeElement( $oMessage );
				break;
			}
		}

		if ( $lMessages->count() == 0 ){
			$oMessage = $oMessages->getLastMessageByUserId( $oMessage->getObject()->getId() );
			$oMessages->getLastMessages()->removeElement( $oMessage );
		}

		$this->dm->flush();

		return true;
	}
}
?>