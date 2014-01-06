<?php
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
	public function getLastMessages( $sUserSlug, $iStart = 0, $iLimit = 20 ){
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserSlug );
		if ( !$oUser ){
			return null;
		}

		$oMessages = $this->dm->getRepository('Document\Friend\Messages')->findOneBy(array(
			'user.id' => $oUser->getId()
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

			if ( $iIndex < $iStart ){
				continue;
			}

			$oMessage = $aMessages[$i];
			$idSender = $oMessage->getSender()->getId();
			$idReceipter = $oMessage->getReceipter()->getId();

			if ( empty($aMessageUsers[$idSender]) && $idSender != $oUser->getId() ){
				$aMessageUsers[$idSender] = $oMessage;
			}elseif ( empty($aMessageUsers[$idReceipter]) && $idReceipter != $oUser->getId() ){
				$aMessageUsers[$idReceipter] = $oMessage;
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
			$idSender = $oMessage->getSender()->getId();
			$idReceipter = $oMessage->getReceipter()->getId();

			if ( $iIndex < $iStart || ($idObjectUser != $idSender && $idObjectUser != $idReceipter) ){
				continue;
			}

			if ( empty($aMessageUsers[$idSender]) && $idSender != $oUser->getId() ){
				$aMessageUsers[$idSender] = $oMessage;
			}elseif ( empty($aMessageUsers[$idReceipter]) && $idReceipter != $oUser->getId() ){
				$aMessageUsers[$idReceipter] = $oMessage;
			}else{
				continue;
			}

			$iIndex++;
		}

		return $aMessageUsers;
	}

	/**
	 * Send Message
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	- Object MongoID Current User
	 *	- Object MongoID Object User
	 * 	- Int start
	 *	- Int Limit
	 * @return: array objects Message
	 */
	public function getMessagesByUser( $idUserFrom, $idUserTo, $sContent ){
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
			$idSender = $oMessage->getSender()->getId();
			$idReceipter = $oMessage->getReceipter()->getId();

			if ( $iIndex < $iStart || ($idObjectUser != $idSender && $idObjectUser != $idReceipter) ){
				continue;
			}

			if ( empty($aMessageUsers[$idSender]) && $idSender != $oUser->getId() ){
				$aMessageUsers[$idSender] = $oMessage;
			}elseif ( empty($aMessageUsers[$idReceipter]) && $idReceipter != $oUser->getId() ){
				$aMessageUsers[$idReceipter] = $oMessage;
			}else{
				continue;
			}

			$iIndex++;
		}

		return $aMessageUsers;
	}
}
?>