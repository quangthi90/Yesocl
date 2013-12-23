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

    /** @MongoDB\Date */
	private $birthday;

    /** @MongoDB\Int */
	private $sex;

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

	/** 
	 * @MongoDB\String 
	 */
	private $industry_id;

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

    /** @MongoDB\EmbedOne(targetDocument="Document\User\Meta\Background") */
    private $background;

	public function getId(){
		return $this->id;
	}

	/**
	* Format array to save to Cache
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array meta
	*/
    public function formatToCache(){
		$data = array(
			'id'			=> $this->getId(),
			'firstname'		=> $this->getFirstname(),
			'lastname' 		=> $this->getLastname(),
			'birthday'		=> $this->getBirthday(),
			'sex'			=> $this->getSex(),
			'headingLine'	=> $this->getHeadingLine(),
			'postalCode'	=> $this->getPostalCode(),
			'industry'		=> $this->getIndustry(),
			'industry_id'	=> $this->getIndustryId(),
			'address'		=> $this->getAddress()
		);

		return $data;
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

	public function setBirthday( $birthday ){
		$this->birthday = $birthday;
	}

	public function getSex(){
		return $this->sex;
	}

	public function setSex( $sex ){
		$this->sex = $sex;
	}

	public function getBirthday(){
		return $this->birthday;
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

	public function setIndustryId( $industry_id ){
		$this->industry_id = $industry_id;
	}

	public function getIndustryId(){
		return $this->industry_id;
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