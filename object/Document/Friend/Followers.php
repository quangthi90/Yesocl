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
	private $followers = array();

	public function getFollowerByUserId( $idUser ){
		foreach ( $this->followers as $oFollower ) {
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

	public function addFollower( Follower $_oFollower ){
		$idUserInput = $_oFollower->getUser()->getId();
		foreach ( $this->followers as $oFollower ) {
			if ( $oFollower->getUser()->getId() == $idUserInput ){
				return true;
			}
		}

		$this->followers[] = $_oFollower;
	}

	public function setFollowers( $followers ){
		$this->followers = $followers;
	}

	public function getFollowers(){
		return $this->followers;
	}
}