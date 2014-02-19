<?php
use Document\Friend\Friends,
	Document\Friend\Friend;

class ModelFriendFriend extends Model {
	/**
	 * Get list friends by user id
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoID User ID
	 * @return: list object Friends
	 */
	public function getFriends( $idUser ){
		$oFriends = $this->dm->getRepository('Document\Friend\Friends')->findOneBy(array(
			'user.id' => $idUser
		));

		return $oFriends;
	}

	/**
	 * Check status of 2 users
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoId User A
	 * 	MongoId User B
	 * @return: array
	 *	- int status
	 *		1: me
	 *		2: friend
	 *		3: sent request make friend
	 *		4: not relationship
	 *		-1: not found User B
	 *	- string href to get action: send request, cancel request, unfriend
	 */
	public function checkFriendStatus( $idUserA, $idUserB ){
		// me
		if ( $idUserA == $idUserB ){
            return array(
            	'status' => 1,
            	'href' => null
            );
        
        }

        $oFriendAs = $this->dm->getRepository('Document\Friend\Friends')->findOneBy(array(
			'user.id' => $idUserA
		));

        $oUserB = $this->dm->getRepository('Document\User\User')->find( $idUserB );

        if ( !$oUserB ){
        	return -1;
        }

		if ( !$oFriendAs ){
			'status' => 4,
        	'href' => $this->extension->path('MakeFriend', array(
                'user_slug' => $oUserB->getSlug()
            ));
		}

        if ( $oFriendAs->getFriendByUserId($idUserB) ){
            return array(
            	'status' => 2,
            	'href' => $this->extension->path('UnFriend', array(
	                'user_slug' => $oUserB->getSlug()
	            ))
           	); 
        
        }

        if ( !$oUserB ){
        	'status' => 4,
        	'href' => $this->extension->path('MakeFriend', array(
                'user_slug' => $oUserB->getSlug()
            ));
        }

        if ( $oUserB->getFriendRequests() && in_array($idUserA, $oUserB->getFriendRequests()) ){
            return array(
            	'status' => 3,
            	'href' => $this->extension->path('MakeFriend', array(
                	'user_slug' => $oUserB->getSlug()
                ))
            );
        
        }

    	return array(
        	'status' => 4,
        	'href' => $this->extension->path('MakeFriend', array(
                'user_slug' => $oUserB->getSlug()
            ))
        );
	}

	public function unFriend( $user1, $user2 ){
		if ( !empty($user1['id']) ){
			$user1 = $this->dm->getRepository('Document\User\User')->find( $user1['id'] );
		}elseif ( !empty($user1['slug']) ){
			$user1 = $this->dm->getRepository('Document\User\User')->findOneBySlug( $user1['slug'] );
		}else{
			return false;
		}
		
		if ( !empty($user2['id']) ){
			$user2 = $this->dm->getRepository('Document\User\User')->find( $user2['id'] );
		}elseif ( !empty($user2['slug']) ){
			$user2 = $this->dm->getRepository('Document\User\User')->findOneBySlug( $user2['slug'] );
		}else{
			return false;
		}

		foreach ( $user1->getFriends() as $friend ) {
			if ( $friend->getUser()->getId() == $user2->getId() ){
				$user1->getFriends()->removeElement( $friend );
				break;
			}
		}

		foreach ( $user2->getFriends() as $friend ) {
			if ( $friend->getUser()->getId() == $user1->getId() ){
				$user2->getFriends()->removeElement( $friend );
				break;
			}
		}

		$this->dm->flush();

		return true;
	}

	/**
	 * Make Friend
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoID User A ID
	 * 	MongoID User B ID
	 * @return: boolean
	 */
	public function makeFriend( $idUserA, $idUserB ){
		// Get User Info
		$oUserA = $this->dm->getRepository('Document\User\User')->find( $idUserA );
		if ( !$oUserA ){
			return false;
		}

		$oUserB = $this->dm->getRepository('Document\User\User')->find( $idUserB );
		if ( !$oUserB ){
			return false;
		}

		// Get Friend info of User A
		$oFriendAs = $this->dm->getRepository('Document\Friend\Friends')->findOneBy(array(
			'user.id' => $idUserA
		));
		if ( !$oFriendAs ){
			$oFriendAs = new Friends();
			$oFriendAs->setUser( $oUserA );
			$this->dm->persist( $oFriendAs );
		}
		$oFriendB = new Friend();
		$oFriendB->setUser( $oUserB );
		$this->dm->persist( $oFriendB );
		$oFriendAs->addFriend( $oFriendB );

		// Get Friend info of User B
		$oFriendBs = $this->dm->getRepository('Document\Friend\Friends')->findOneBy(array(
			'user.id' => $idUserB
		));

		if ( !$oFriendBs ){
			$oFriendBs = new Friends();
			$oFriendBs->setUser( $oUserB );
			$this->dm->persist( $oFriendBs );
		}
		$oFriendA = new Friend();
		$oFriendA->setUser( $oUserA );
		$oFriendBs->addFriend( $oFriendA );

		// Remove request from user B to user A
		$aRequestAs = $oUserA->getFriendRequests();
		$iIndex = array_search( $idUserB, $aRequestAs );
		if ( $aRequestAs && $iIndex != false ){
			unset($aRequestAs[$iIndex]);
			$oUserA->setFriendRequests( $aRequestAs );
		}

		// Remove request from user A to user B
		$aRequestBs = $oUserB->getFriendRequests();
		$iIndex = array_search( $idUserA, $aRequestBs );
		if ( $aRequestBs && $iIndex != false ){
			unset($aRequestBs[$iIndex]);
			$oUserB->setFriendRequests( $aRequestBs );
		}

		$this->dm->flush();

		return true;
	}
}
?>