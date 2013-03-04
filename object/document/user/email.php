<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Email {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $email;
	
	/** @MongoDB\Boolean */
	private $primary;

	/**
	 * @MongoDB\String
	 */
	private $visible;

	public function getId(){
		return $this->id;
	}

	public function setEmail( $email ){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPrimary( $primary ){
		$this->primary = $primary;
	}

	public function getPrimary(){
		return $this->primary;
	}

	public function setVisible( $visible ){
		$this->visible = $visible;
	}

	public function getVisible(){
		return $this->visible;
	}
}