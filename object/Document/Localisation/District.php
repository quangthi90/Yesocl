<?php
namespace Document\Localisation;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="district") */
Class District {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\ReferenceOne(targetDocument="city", inversedBy="districts") */
    private $city;
    
    /** @MongoDB\ReferenceMany(targetDocument="ward", mappedBy="district") */
	private $wards = array();
	
	/** @MongoDB\ReferenceMany(targetDocument="street", mappedBy="district") */
	private $streets = array();

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

	public function setCity( $city ){
		$this->city = $city;
	}

	public function getCity(){
		return $this->city;
	}

	public function addWard( ward $ward ){
		$this->wards[] = $ward;
	}

	public function setWards( $wards ){
		$this->wards = $wards;
	}

	public function getWards(){
		return $this->wards;
	}

	public function addStreet( street $street ){
		$this->streets[] = $street;
	}

	public function setStreets( $streets ){
		$this->streets = $streets;
	}

	public function getStreets(){
		return $this->streets;
	}
}