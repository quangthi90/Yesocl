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

        if ( $oFollowerAs->getFollowingByUserId($idUserB) ){
            return 2;
        
        }

    	return 3;
	}

	public function unFollow( $idUserA, $idUserB ){
		$oFollowerAs = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
			'user.id' => $idUserA
		));
		if ( $oFollowerAs ){
			$oFollowingB = $oFollowerAs->getFollowingByUserId( $idUserB );

			if ( $oFollowingB ){
				$oFollowerAs->getFollowings()->removeElement( $oFollowingB );
			}
		}

		$oFollowerBs = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
			'user.id' => $idUserB
		));
		if ( $oFollowerBs ){
			$oFollowedB = $oFollowerBs->getFollowedByUserId( $idUserA );

			if ( $oFollowedB ){
				$oFollowerBs->getFolloweds()->removeElement( $oFollowedB );
			}
		}

		$this->dm->flush();

		return true;
	}

	/**
	 * User A follow user B
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
		$oFollowerAs = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
			'user.id' => $idUserA
		));
		if ( !$oFollowerAs ){
			$oFollowerAs = new Followers();
			$oFollowerAs->setUser( $oUserA );
			$this->dm->persist( $oFollowerAs );
		}
		$oFollowingB = new Follower();
		$oFollowingB->setUser( $oUserB );
		$this->dm->persist( $oFollowingB );
		$oFollowerAs->addFollowing( $oFollowingB );

		// Get Follower info of User B
		$oFollowerBs = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
			'user.id' => $idUserB
		));
		if ( !$oFollowerBs ){
			$oFollowerBs = new Followers();
			$oFollowerBs->setUser( $oUserB );
			$this->dm->persist( $oFollowerBs );
		}
		$oFollowedA = new Follower();
		$oFollowedA->setUser( $oUserA );
		$this->dm->persist( $oFollowedA );
		$oFollowerBs->addFollowed( $oFollowedA );
		
		$this->dm->flush();

		return true;
	}
}
?>