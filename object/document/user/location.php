<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Location {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $countryId;

	/** @MongoDB\String */
	private $country;

	/** @MongoDB\String */
	private $cityId;

	/** @MongoDB\String */
	private $city;

	public function getId(){
		return $this->id;
	}

	public function setCountry( $country ){
		$this->country = $country;
	}

	public function getCountry(){
		return $this->country;
	}

	public function setCountryId( $countryid ){
		$this->countryid = $countryid;
	}

	public function getCountryId(){
		return $this->countryid;
	}

	public function setCity( $city ){
		$this->city = $city;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCityId( $cityid ){
		$this->cityid = $cityid;
	}

	public function getCityId(){
		return $this->cityid;
	}
}