<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Meta {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $firstname;
	
	/** @MongoDB\String */
	private $lastname;

	public function getId(){
		return $this->id;
	}

	public function setFirstname( $firstname ){
		$this->firstname = $firstname;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function setLastname( $lastname ){
		$this->lastname = $lastname;
	}

	public function getLastname(){
		return $this->lastname;
	}
}