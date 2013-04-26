<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Career {
	/** @MongoDB\Id */
	private $id;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $joined;

	/** @MongoDB\Date */
	private $updated;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="careers") */
    private $user;
	
	/** @MongoDB\ReferenceOne(targetDocument="Position", inversedBy="careers") */
    private $position;

	public function getId(){
		return $this->id;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setJoined( $joined ){
		$this->joined = $joined;
	}

	public function getJoined(){
		return $this->joined;
	}

	public function setUpdated( $updated ){
		$this->updated = $updated;
	}

	public function getUpdated(){
		return $this->updated;
	}

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->joined = new \DateTime();
		$this->updated = new \DateTime();
	}

	/** @MongoDB\PreUpdate */
	public function prePersist(){
		$this->updated = new \DateTime();
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

	public function setPosition( $position ){
		$this->position = $position;
	}

	public function getPosition(){
		return $this->position;
	}
}