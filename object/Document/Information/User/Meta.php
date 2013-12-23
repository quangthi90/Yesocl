<?php
namespace Document\Information\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Meta {
	/** @MongoDB\Id */
	private $id;
	
	/** @MongoDB\String */
	private $firstname;
	
	/** @MongoDB\String */
	private $lastname;
	
	/** @MongoDB\Date */
	private $birthday;

	public function getId() {
		return $this->id;
	}
	
	// Firstname
	public function setFirstname( $firstname ) {
		$this->firstname = $firstname;
	}

	public function getFristname() {
		return $this->firstname;
	}
	
	// Lastname
	public function setLastname( $lastname ) {
		$this->lastname = $lastname;
	}

	public function getLastname() {
		return $this->lastname;
	}
	
	// Birthday
	public function getBirthday(){
		return $this->birthday;
	}
	
	public function setBirthday( $birthday ){
		$this->birthday = $birthday;
	}
}