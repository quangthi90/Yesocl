<?php
namespace Document\User\Meta;
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

	public function setCountryId( $countryId ){
		$this->countryId = $countryId;
	}

	public function getCountryId(){
		return $this->countryId;
	}

	public function setCity( $city ){
		$this->city = $city;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCityId( $cityId ){
		$this->cityId = $cityId;
	}

	public function getCityId(){
		return $this->cityId;
	}
}