<?php
namespace Document\Information\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Address {
	/** @MongoDB\Id */
	private $id;
	
	/** @MongoDB\String */
	private $address;
	
	/**
     * @MongoDB\ReferenceOne(targetDocument="Document\Localisation\Country")
     */
	private $country;
	
	/** @MongoDB\String */
	private $city;
	
	/** @MongoDB\String */
	private $district;
	
	/** @MongoDB\String */
	private $ward;
	
	/** @MongoDB\String */
	private $street;

	public function getId() {
		return $this->id;
	}
	
	// Address
	public function setAddress( $address ) {
		$this->address = $address;
	}

	public function getAddress() {
		return $this->address;
	}
	
	// City
	public function setCity( $city ) {
		$this->city = $city;
	}

	public function getCity() {
		return $this->city;
	}
	
	// District
	public function setDistrict( $district ) {
		$this->district = $district;
	}

	public function getDistrict() {
		return $this->district;
	}
	
	// Ward
	public function setWard( $ward ) {
		$this->ward = $ward;
	}

	public function getWard() {
		return $this->ward;
	}
	
	// Street
	public function setStreet( $street ) {
		$this->street = $street;
	}

	public function getStreet() {
		return $this->street;
	}
}