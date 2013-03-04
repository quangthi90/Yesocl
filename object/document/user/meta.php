<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Meta {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $firstname;
	
	/** 
	 * @MongoDB\String 
	 */
	private $lastname;

	/** 
	 * @MongoDB\String 
	 */
	private $headingLine;

	/** @MongoDB\EmbedOne(targetDocument="Location") */
    private $location;

	/** 
	 * @MongoDB\String 
	 */
	private $postalCode;

	/** 
	 * @MongoDB\String 
	 */
	private $industry;

	/** @MongoDB\EmbedMany(targetDocument="Former") */
	private $formers = array();

	public function getId(){
		return $this->id;
	}

	public function setFirstname( $firstname ){
		$this->firstname = $firstname;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function setLastname( $lastname ){
		$this->lastname = $lastname;
	}

	public function getLastname(){
		return $this->lastname;
	}

	public function setHeadingLine( $headingLine ){
		$this->headingLine = $headingLine;
	}

	public function getHeadingLine(){
		return $this->headingLine;
	}

	public function setLocation( $location ){
		$this->location = $location;
	}

	public function getLocation(){
		return $this->location;
	}

	public function setPostalCode( $postalCode ){
		$this->postalCode = $postalCode;
	}

	public function getPostalCode(){
		return $this->postalCode;
	}

	public function setIndustry( $industry ){
		$this->industry = $industry;
	}

	public function getIndustry(){
		return $this->industry;
	}

	public function addFormer( Former $former ){
		$this->formers[] = $former;
	}

	public function setFormers( $formers ){
		$this->formers = $formers;
	}

	public function getFormers(){
		return $this->formers;
	}
}