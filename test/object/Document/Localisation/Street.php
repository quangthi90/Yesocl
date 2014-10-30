<?php
namespace Document\Localisation;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="street") */
Class Street {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\ReferenceOne(targetDocument="district", inversedBy="streets") */
    private $district;

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

	public function setDistrict( $district ){
		$this->district = $district;
	}

	public function getDistrict(){
		return $this->district;
	}
}