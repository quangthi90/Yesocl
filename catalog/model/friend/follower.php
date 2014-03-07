<?php
use Document\Friend\Followers,
	Document\Friend\Follower;

class ModelFriendFollower extends Model {
	/**
	 * Get list Followers by user id
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoID User ID
	 * @return: list object Followers
	 */
	public function getFollowers( $idUser ){
		$oFollowers = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
			'user.id' => $idUser
		));

		return $oFollowers;
	}

	/**
	 * Check User A has follow User B
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoId User A
	 * 	MongoId User B
	 * @return: int
	 *		1: me
	 *		2: Follower
	 *		3: not relationship
	 *		-1: not found User B
	 */
	public function checkStatus( $idUserA, $idUserB ){
		// me
		if ( $idUserA == $idUserB ){
            return 1;
        }

        $oUserB = $this->dm->getRepository('Document\User\User')->find( $idUserB );

        if ( !$oUserB ){
        	return -1;
        }

        $oFollowerAs = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
			'user.id' => $idUserA
		));

		if ( !$oFollowerAs ){
			return 3;
		}

        if ( $oFollowerAs->getFollowerByUserId($idUserB) ){
            return 2;
        
        }

    	return 3;
	}

	public function unFollow( $idUserA, $idUserB ){
		$oFollowerAs = $this->dm->getRepository('Document\Follower\Followers')->findOneBy(array(
			'user.id' => $idUserA
		));

		if ( $oFollowerAs ){
			$oFollowerB = $oFollowerAs->getFollowerByUserId( $idUserB );

			if ( $oFollowerB ){
				$oFollowerAs->getFollowers()->removeElement( $oFollowerB );
			}
		}

		$oFollowerBs = $this->dm->getRepository('Document\Follower\Followers')->findOneBy(array(
			'user.id' => $idUserB
		));

		if ( $oFollowerBs ){
			$oFollowerA = $oFollowerBs->getFollowerByUserId( $idUserA );

			if ( $oFollowerA ){
				$oFollowerBs->getFollowers()->removeElement( $oFollowerA );
			}
		}

		$this->dm->flush();

		return true;
	}

	/**
	 * Make Follower
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoID User A ID
	 * 	MongoID User B ID
	 * @return: boolean
	 */
	public function makeFollow( $idUserA, $idUserB ){
		// Get User Info
		$oUserA = $this->dm->getRepository('Document\User\User')->find( $idUserA );
		if ( !$oUserA ){
			return false;
		}

		$oUserB = $this->dm->getRepository('Document\User\User')->find( $idUserB );
		if ( !$oUserB ){
			return false;
		}

		// Get Follower info of User A
		$oFollowerAs = $this->dm->getRepository('Document\Follower\Followers')->findOneBy(array(
			'user.id' => $idUserA
		));
		if ( !$oFollowerAs ){
			$oFollowerAs = new Followers();
			$oFollowerAs->setUser( $oUserA );
			$this->dm->persist( $oFollowerAs );
		}
		$oFollowerB = new Follower();
		$oFollowerB->setUser( $oUserB );
		$this->dm->persist( $oFollowerB );
		$oFollowerAs->addFollower( $oFollowerB );

		// Get Follower info of User B
		$oFollowerBs = $this->dm->getRepository('Document\Follower\Followers')->findOneBy(array(
			'user.id' => $idUserB
		));

		if ( !$oFollowerBs ){
			$oFollowerBs = new Followers();
			$oFollowerBs->setUser( $oUserB );
			$this->dm->persist( $oFollowerBs );
		}
		$oFollowerA = new Follower();
		$oFollowerA->setUser( $oUserA );
		$oFollowerBs->addFollower( $oFollowerA );

		// Remove request from user B to user A
		$aRequestAs = $oUserA->getFollowerRequests();
		$iIndex = array_search( $idUserB, $aRequestAs );
		
		if ( $aRequestAs && $iIndex !== false ){
			unset($aRequestAs[$iIndex]);
			$oUserA->setFollowerRequests( $aRequestAs );
		}

		// Remove request from user A to user B
		$aRequestBs = $oUserB->getFollowerRequests();
		$iIndex = array_search( $idUserA, $aRequestBs );
		if ( $aRequestBs && $iIndex !== false ){
			unset($aRequestBs[$iIndex]);
			$oUserB->setFollowerRequests( $aRequestBs );
		}
		
		$this->dm->flush();

		return true;
	}
}
?>