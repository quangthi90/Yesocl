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

		// user_ids is add user
		if ( !empty($aData['user_ids']) ) {
			$lUsers = $this->dm->getRepository('Document\User\User')->findBy(array(
				'id' => array('$in' => $aData['user_ids'])
			));
			foreach ( $lUsers as $oUser ) {
				if ( !isset($oRoom->getUnReads()[$oUser->getId()]) ) {
					$oRoom->addUnRead( $oUser->getId(), 0 );
					$oRoom->addUser( $oUser );
				}
			}
		}

		// user_id is remove user
		if ( !empty($aData['user_id']) ) {
			if ( $oRoom->getCreator()->getId() == $aData['user_id'] || $oRoom->getUsers()->count() == 2 ) {
				$this->delete( $oRoom->getId() );
				return null;
			}

			$oUser = $this->dm->getRepository('Document\User\User')->find( $aData['user_id'] );
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

		$oRoom->addUnRead( $this->customer->getId(), 0 );

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

		if ( !empty($aData['room_ids']) ) {
			$lRooms = $this->dm->getRepository('Document\Friend\MessageRoom')->findBy(array(
				'users.id' => $idUserAuthor, 'id' => array( '$in' => $aData['room_ids'] )
			))
				->skip($aData['start'])
				->limit($aData['limit'])
				->sort(array($aData['sort'] => $aData['order']));
		} else {
			$lRooms = $this->dm->getRepository('Document\Friend\MessageRoom')->findBy(array('users.id' => $idUserAuthor))
				->skip($aData['start'])
				->limit($aData['limit'])
				->sort(array($aData['sort'] => $aData['order']));
		}

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
}
?>