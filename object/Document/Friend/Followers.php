<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="user_follower")
 */
Class Followers {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $user;

    /** @MongoDB\EmbedMany(targetDocument="Follower") */
	private $followeds = array();

	/** @MongoDB\EmbedMany(targetDocument="Follower") */
	private $followings = array();

	public function getFollowedByUserId( $idUser ){
		foreach ( $this->followeds as $oFollower ) {
			if ( $oFollower->getUser()->getId() == $idUser ){
				return $oFollower;
			}
		}

		return null;
	}

	public function getFollowingByUserId( $idUser ){
		foreach ( $this->followings as $oFollower ) {
			if ( $oFollower->getUser()->getId() == $idUser ){
				return $oFollower;
			}
		}

		return null;
	}

	public function getId() {
		return $this->id;
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

	public function addFollowed( Follower $_oFollower ){
		$idUserInput = $_oFollower->getUser()->getId();
		foreach ( $this->followeds as $oFollower ) {
			if ( $oFollower->getUser()->getId() == $idUserInput ){
				return true;
			}
		}

		$this->followeds[] = $_oFollower;
	}

	public function setFolloweds( $followers ){
		$this->followeds = $followers;
	}

	public function getFolloweds(){
		return $this->followeds;
	}

	public function addFollowing( Follower $_oFollower ){
		$idUserInput = $_oFollower->getUser()->getId();
		foreach ( $this->followings as $oFollower ) {
			if ( $oFollower->getUser()->getId() == $idUserInput ){
				return true;
			}
		}

		$this->followings[] = $_oFollower;
	}

	public function setFollowings( $followers ){
		$this->followings = $followers;
	}

	public function getFollowings(){
		return $this->followings;
	}
}