<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Career {
	/** @MongoDB\Id */
	private $id;

	/** @MongoDB\String */
	private $title;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $joined;

	/** @MongoDB\Date */
	private $updated;
	
	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="career") */
    private $user;

	public function getId(){
		return $this->id;
	}
	
	public function setTitle( $title ){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
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

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}
}