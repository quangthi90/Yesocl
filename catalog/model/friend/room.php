<?php
use Document\Friend\MessageRoom,
	Document\Friend\Message;

class ModelFriendRoom extends Model {
	/**
	 * Edit Room
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Object MongoID Room
	 *	- Array data
	 * 		- Object MongoID User Send
	 *		- Array String Slug Users Receipt
	 * 		- String content message
	 * @return: Boolean
	 */
	public function edit( $idRoom, $aData = array() ){
		$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );
		
		// check is exist
		if ( !$oRoom ) return false;

		// check is author
		if ( $oRoom->getAuthor()->getId() != $this->customer->getId() ) return false;

		if ( !empty($aData['name']) )
			$oRoom->setName( $aData['name'] );

		$this->dm->flush();

		return true;
	}
}
?>