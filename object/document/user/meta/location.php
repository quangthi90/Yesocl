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

	/** @MongoDB\String */
	private $city;

	public function getId(){
		return $this->id;
	}

	public function setLoaction( $loaction ){
		$this->loaction = $loaction;
	}

	public function getLoaction(){
		return $this->loaction;
	}

	public function setCityId( $cityId ){
		$this->cityId = $cityId;
	}

	public function getCityId(){
		return $this->cityId;
	}
}