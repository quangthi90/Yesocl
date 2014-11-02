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
		if ( $oRoom->getCreator()->getId() != $this->customer->getId() ) return false;

		if ( !empty($aData['name']) )
			$oRoom->setName( $aData['name'] );

		// user_slugs is add user
		if ( !empty($aData['user_slugs']) ) {
			foreach ( $aData['user_slugs'] as $sUserSlug ) {
				$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserSlug );
				if ( !$oUser ) continue;

				if ( !isset($oRoom->getUnReads()[$oUser->getId()]) ) {
					$oRoom->addUnRead( $oUser->getId(), 0 );
					$oRoom->addUser( $oUser );
				}
			}
		}

		// user_slug is remove user
		if ( !empty($aData['user_slug']) ) {
			if ( $oRoom->getCreator()->getSlug() == $aData['user_slug'] ) {
				$this->delete( $oRoom->getId() );
				return null;
			}

			$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $aData['user_slug'] );
			$oRoom->getUsers()->removeElement( $oUser );
			$aUnReads = $oRoom->getUnReads();
			unset($aUnReads[$oUser->getId()]);
			$oRoom->setUnReads( $aUnReads );
		}

		$this->dm->flush();

		return $oRoom;
	}

	/**
	 * Delete Room
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Object MongoID Room
	 * @return: Boolean
	 */
	public function delete( $idRoom ) {
		$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );
		$this->dm->remove( $oRoom );
		$this->dm->flush();
	}

	/**
	 * Reset number count unread of logged user to 0
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Object MongoID Room
	 * @return: Boolean
	 */
	public function read( $idRoom ) {
		$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );
		
		// check is exist
		if ( !$oRoom ) return false;

		// check is author
		if ( $oRoom->getCreator()->getId() != $this->customer->getId() ) return false;

		$oRoom->addUnRead( $this->customer->getId(), 0 );

		$this->dm->flush();

		return true;
	}

	/**
	 * Get Room By Room ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *	- Object MongoID Room
	 * @return: Object Room
	 */
	public function getRoom( $idRoom ){
		$oRoom = $this->dm->getRepository('Document\Friend\MessageRoom')->find( $idRoom );

		return $oRoom;
	}
}
?>