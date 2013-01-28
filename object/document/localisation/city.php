<?php
namespace Document\Localisation;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="city") */
Class City {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\ReferenceOne(targetDocument="country", inversedBy="cities") */
    private $country;
    
    /** @MongoDB\ReferenceMany(targetDocument="district", mappedBy="city") */
	private $districts = array();

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setCountry( $country ){
		$this->country = $country;
	}

	public function getCountry(){
		return $this->country;
	}

	public function addDistrict( district $district ){
		$this->districts[] = $district;
	}

	public function setDistricts( $districts ){
		$this->districts = $districts;
	}

	public function getDistricts(){
		return $this->districts;
	}
}