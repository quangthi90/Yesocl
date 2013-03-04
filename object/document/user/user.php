<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="user")
 */
Class User {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $username;

	/** @MongoDB\String */
	private $password;

	/** @MongoDB\EmbedMany(targetDocument="Email") */
	private $emails = array();

	/** @MongoDB\EmbedMany(targetDocument="Im") */
	private $ims = array();

	/** @MongoDB\EmbedMany(targetDocument="Phone") */
	private $phones = array();

	/** @MongoDB\EmbedMany(targetDocument="Address") */
	private $addresses = array();

	/** @MongoDB\EmbedMany(targetDocument="Website") */
	private $websites = array();

	/** @MongoDB\EmbedOne(targetDocument="Meta") */
    private $meta;

    /** @MongoDB\ReferenceOne(targetDocument="Background", inversedBy="user") */
    private $background;

	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="users") */
    private $groupUser;

    /** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="author") */
	private $groups = array();
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;

	public function getId() {
		return $this->id;
	}

	public function setUsername( $username ){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword( $password ){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}

	public function addEmail( Email $email ){
		$this->emails[] = $email;
	}

	public function setEmails( $emails ){
		$this->emails = $emails;
	}

	public function getEmails(){
		return $this->emails;
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

	public function addAddress( Address $address ){
		$this->addresses[] = $address;
	}

	public function setAddresss( $addresses ){
		$this->addresses = $addresses;
	}

	public function getAddresss(){
		return $this->addresses;
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

	public function setMeta( $meta ){
		$this->meta = $meta;
	}

	public function getMeta(){
		return $this->meta;
	}

	public function setBackground( $background ){
		$this->background = $background;
	}

	public function getBackground(){
		return $this->background;
	}

	public function setGroupUser( $groupUser ){
		$this->groupUser = $groupUser;
	}

	public function getGroupUser(){
		return $this->groupUser;
	}

	public function addGroup( \Document\Group\Group $group ){
		$this->groups[] = $group;
	}

	public function setGroups( $groups ){
		$this->groups = $groups;
	}

	public function getGroups(){
		return $this->groups;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->created = new \DateTime();
	}
}