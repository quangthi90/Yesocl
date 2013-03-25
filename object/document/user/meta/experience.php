<?php
namespace Document\User\Meta;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Experience {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $company;

	/** @MongoDB\String */
	private $title;

	/** @MongoDB\String */
	private $location;

	/** @MongoDB\Date */
	private $started;

	/** @MongoDB\Date */
	private $ended;

	/** @MongoDB\Boolean */
	private $current;

	/** @MongoDB\String */
	private $description;

	public function getId(){
		return $this->id;
	}

	public function setCompany( $company ){
		$this->company = $company;
	}

	public function getCompany(){
		return $this->company;
	}

	public function setTitle( $title ){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setLocation( $location ){
		$this->location = $location;
	}

	public function getLocation(){
		return $this->location;
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