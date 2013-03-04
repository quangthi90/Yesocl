<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Address {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $address;

	/** @MongoDB\String */
    private $country;

	/** @MongoDB\String */
	private $city;

	/**
	 * @MongoDB\String
	 */
	private $visible;

	public function getId(){
		return $this->id;
	}

	public function setAddress( $address ){
		$this->address = $address;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setCountry( $country ){
		$this->country = $country;
	}

	public function getCountry(){
		return $this->country;
	}

	public function setCity( $city ){
		$this->city = $city;
	}

	public function getCity(){
		return $this->city;
	}

	public function setVisible( $visible ){
		$this->visible = $visible;
	}

	public function getVisible(){
		return $this->visible;
	}
}