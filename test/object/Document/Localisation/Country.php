<?php
namespace Document\Localisation;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="country") */
Class Country {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\ReferenceMany(targetDocument="city", mappedBy="country") */
	private $cities = array();

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

	public function addCitie( City $citie ){
		$this->cities[] = $citie;
	}

	public function setCities( $cities ){
		$this->cities = $cities;
	}

	public function getCities(){
		return $this->cities;
	}
}