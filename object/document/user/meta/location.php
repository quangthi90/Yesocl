<?php
namespace Document\User\Meta;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Location {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $location;

	/** @MongoDB\String */
	private $cityId;

	public function getId(){
		return $this->id;
	}

	public function setLocation( $location ){
		$this->location = $location;
	}

	public function getLocation(){
		return $this->location;
	}

	public function setCityId( $cityId ){
		$this->cityId = $cityId;
	}

	public function getCityId(){
		return $this->cityId;
	}
}