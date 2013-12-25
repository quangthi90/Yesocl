<?php
namespace Document\Localisation;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
* @MongoDB\Document(db="yesocl", collection="city")
* @SOLR\Document(collection="location")
*/
Class City {
	/** 
	* @MongoDB\Id
	* @SOLR\Field(type="id")
	*/
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\ReferenceOne(targetDocument="Country", inversedBy="cities") */
    private $country;
    
    /** @MongoDB\ReferenceMany(targetDocument="District", mappedBy="city") */
	private $districts = array();

	public function getId(){
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
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

	/**
	* @SOLR\Field(type="text")
	*/
	private $location;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
        $this->setDataLocation();
    }

    /** @MongoDB\PreUpdate */
    public function preUpdate()
    {
        $this->setDataLocation();
    }

	public function setDataLocation(){
		try{
			$this->location = $this->name . ', ' . $this->country->getName();
		}
		catch(Exception $e){
			throw new Exception( 'Country is empty!<br>City must be added with Country.', 0, $e);
		}
	}

	public function setLocation( $location ){
		$this->location = $location;
	}

	public function getLocation(){
		return $this->location;
	}
}