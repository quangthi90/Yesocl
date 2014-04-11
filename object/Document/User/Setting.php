<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="user_setting")
 */
Class Setting {
	/** 
	 * @MongoDB\Id
	 */
	private $id; 

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $user;

	public function getId() {
		return $this->id;
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}
}