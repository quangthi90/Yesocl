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

	/** @MongoDB\EmbedOne(targetDocument="Meta") */
    private $meta;

    /** @MongoDB\EmbedOne(targetDocument="Background") */
    private $background;

	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="users") */
    private $groupUser;

    /** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="author") */
	private $groups = array();
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;
	}

	public function getId() {
		return $this->id;
	}

	public function setUsername( $username ){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setMeta( $meta ){
		$this->meta = $meta;
	}

	public function getMeta(){
		return $this->meta;
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