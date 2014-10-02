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
	public function add( $idRoom = null, $idUserFrom, $aUserToSlugs, $sContent ){
		$oRoom = null;
		if ( $idRoom != null ) {
			$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );
		} elseif ( count($aUserToSlugs) == 1 ) {
			$oUserTo = $this->dm->getRepository('Document\User\User')->findOneBySlug( $aUserToSlugs[0] );
			if ( !$oUserTo ) return false;
			$aUserIds = array( $idUserFrom, $oUserTo->getId() );
			$lRooms = $this->dm->getRepository('Document\Friend\MessageRoom')->findBy(array(
				'users.id' => array( '$all' => $aUserIds )
			));
			foreach ( $lRooms as $oRoom ) {
				if ( $oRoom->getUsers()->count() == 2 ) {
					break;
				}
			}
		}

		$oUserFrom = $this->dm->getRepository('Document\User\User')->find( $idUserFrom );
		if ( $oRoom == null ) {
			$oRoom = new MessageRoom();
			$oRoom->setCreator( $oUserFrom );
			$oRoom->addUser( $oUserFrom );
			foreach ( $aUserToSlugs as $sUserToSlug ) {
				$oUserTo = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserToSlug );
				$oRoom->addUser( $oUserTo );
			}

			$this->dm->persist( $oRoom );
		}

		$oMessage = new Message();
		$oMessage->setAuthor( $oUserFrom );
		$oMessage->setContent( $sContent );
		$oMessage->addReader( $oUserFrom );
		$oRoom->addMessage( $oMessage );
		
		$this->dm->flush();

		return true;
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

		$lUserMessages = $this->dm->getRepository('Document\Friend\MessageRoom')->findBy(array('users.id' => $idUserAuthor))
			->skip($aData['start'])
			->limit($aData['limit'])
			->sort(array($aData['sort'] => $aData['order']));

		return $lUserMessages;
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
	public function deleteUserMessages( $idCurrUser, $idObjectUser ){
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