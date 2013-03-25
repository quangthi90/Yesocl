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
	 * BmSolr
	 * @MongoDB\String 
	 */
	private $firstname;
	
	/** 
	 * BmSolr
	 * @MongoDB\String 
	 */
	private $lastname;

	/** 
	 * @MongoDB\String 
	 */
	private $headingLine;

	/** @MongoDB\EmbedOne(targetDocument="Document\User\Meta\Location") */
    private $location;

	/** 
	 * @MongoDB\String 
	 */
	private $postalCode;

	/** 
	 * @MongoDB\String 
	 */
	private $industry;

	/** @MongoDB\String */
	private $address;

	/** 
	 * @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Im") 
	 */
	private $ims = array();

	/** 
	 * @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Phone") 
	 */
	private $phones = array();

	/** @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Website") */
	private $websites = array();

	/** @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Former") */
	private $formers = array();

    /** @MongoDB\EmbedOne(targetDocument="Document\User\Background") */
    private $background;

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

	public function setAddress( $address ){
		$this->address = $address;
	}

	public function getAddress(){
		return $this->address;
	}

	public function addIm( Im $im ){
		$this->ims[] = $im;
	}

	public function setIms( $ims ){
		$this->ims = $ims;
	}

	public function getIms(){
		return $this->ims;
	}

	public function addPhone( Phone $phone ){
		$this->phones[] = $phone;
	}

	public function setPhones( $phones ){
		$this->phones = $phones;
	}

	public function getPhones(){
		return $this->phones;
	}

	public function addWebsite( Website $website ){
		$this->websites[] = $website;
	}

	public function setWebsites( $websites ){
		$this->websites = $websites;
	}

	public function getWebsites(){
		return $this->websites;
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

	public function setBackground( $background ){
		$this->background = $background;
	}

	public function getBackground(){
		return $this->background;
	}
}