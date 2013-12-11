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
	private $company_id;

	/** @MongoDB\String */
	private $title;

	/** @MongoDB\EmbedOne(targetDocument="Location") */
    private $location;

	/** @MongoDB\Date */
	private $started;

	/** @MongoDB\Date */
	private $ended;

	/** @MongoDB\Boolean */
	private $selfEmployed;

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

	public function setCompanyId( $company_id ){
		$this->company_id = $company_id;
	}

	public function getCompanyId(){
		return $this->company_id;
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

	public function setSelfEmployed( $selfEmployed ){
		$this->selfEmployed = $selfEmployed;

	}

	public function getSelfEmployed(){
		return $this->selfEmployed;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}
}