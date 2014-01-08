<?php
use Document\Friend\Messages,
	Document\Friend\Message;

class ModelFriendMessage extends Model {
	/**
	 * Get last 20 users have new message
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	String User Slug
	 * 	Int Start
	 *	Int Limit
	 * @return: array objects Message
	 */
	public function getLastMessages( $idUser, $iStart = 0, $iLimit = 20 ){
		$oMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $idUser
		));

		if ( !$oMessages ){
			return null;
		}
		
		$aMessages = $oMessages->getMessages()->toArray();
		$iCountMessages = count( $aMessages );
		$iIndex = 1;
		$aMessageUsers = array();
		$aUserIds = array();

		for ( $i = $iCountMessages - 1; $i >= 0; $i-- ) { 
			if ( count($aMessageUsers) == $iLimit ){
				break;
			}

			if ( $iIndex < $iStart ){
				continue;
			}

			$oMessage = $aMessages[$i];
			$idObjectUser = $oMessage->getObject()->getId();

			if ( empty($aUserIds[$idObjectUser]) ){
				$aMessageUsers[] = $oMessage;
				$aUserIds[$idObjectUser] = $idObjectUser;
			}else{
				continue;
			}

			$iIndex++;
		}

		return $aMessageUsers;
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
	public function getMessagesByUser( $idCurrUser, $idObjectUser, $iStart = 0, $iLimit = 20 ){
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
		}

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
}
?>