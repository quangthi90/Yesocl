<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Experience {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $companyName;

	/** @MongoDB\String */
	private $title;

	/** @MongoDB\String */
	private $localtion;

	/** @MongoDB\String */
	private $started;

	/** @MongoDB\String */
	private $ended;

	/** @MongoDB\Boolean */
	private $current;

	/** @MongoDB\String */
	private $description;

	public function getId(){
		return $this->id;
	}

	public function setCompanyName( $companyName ){
		$this->companyName = $companyName;
	}

	public function getCompanyName(){
		return $this->companyName;
	}

	public function setTitle( $title ){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setLocaltion( $localtion ){
		$this->localtion = $localtion;
	}

	public function getLocaltion(){
		return $this->localtion;
	}

	public function setStarted( $started ){
		$this->started = $started;
	}

	public function getStarted(){
		return $this->started;
	}

	public function setEnded( $ended ){
		$this->ended = $ended;
	}

	public function getEnded(){
		return $this->ended;
	}

	public function setCurrent( $current ){
		$this->current = $current;
	}

	public function getCurrent(){
		return $this->current;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}
}