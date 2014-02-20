<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="user_friend")
 */
Class Friends {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $user;

    /** @MongoDB\EmbedMany(targetDocument="Friend") */
	private $friends = array();

	/** @MongoDB\EmbedMany(targetDocument="Group") */
	private $friendGroups = array();

	public function getFriendByUserId( $idUser ){
		foreach ( $this->friends as $oFriend ) {
			if ( $oFriend->getUser()->getId() == $idUser ){
				return $oFriend;
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

	public function addFriend( Friend $_oFriend ){
		$idUserInput = $_oFriend->getUser()->getId();
		foreach ( $this->friends as $oFriend ) {
			if ( $oFriend->getUser()->getId() == $idUserInput ){
				return true;
			}
		}

		$this->friends[] = $_oFriend;
	}

	public function setFriends( $friends ){
		$this->friends = $friends;
	}

	public function getFriends(){
		return $this->friends;
	}

	public function addFriendGroup( Group $friendGroup ){
		$this->friendGroups[] = $friendGroup;
	}

	public function setFriendGroups( $friendGroups ){
		$this->friendGroups = $friendGroups;
	}

	public function getFriendGroups(){
		return $this->friendGroups;
	}
}