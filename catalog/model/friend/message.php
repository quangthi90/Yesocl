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
		$oUser = $this->dm->getRepository('Document/User/User')->findOneBySlug( $sUserSlug );

		if ( !$oUser ){
			return null;
		}

		$oMessages = $this->dm->getRepository('Document/Friend/Messages')->findOneBy(array(
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
			$oMessage = $aMessages[$i];
			$idSender = $oMessage->getSender()->getId();
			$idReceipter = $oMessage->getReceipter()->getId();
			if ( !empty($aMessageUsers[$idSender]) || !empty($aMessageUsers[$idReceipter]) ){
				continue;
			}
			if ( $iIndex < $iStart || count($aMessageUsers) == $iLimit ){
				continue;
			}



			$iIndex++;
		}
	}
}
?>