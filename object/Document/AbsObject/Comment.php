<?php
namespace Document\AbsObject;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Comment {
	/** @MongoDB\Id */
	private $id;

	/** @MongoDB\String */
	private $content;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\Date */
	private $updated;
	
	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="comment") */
    private $user;

    /** @MongoDB\String */
	private $author;

	/** @MongoDB\String */
	private $email;

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Collection */
    private $likerIds;

    private $canDelete;

    private $canEdit;

	/** @MongoDB\Collection */
	private $userTags = array();

	/**
	* Format array to save to Cache
	* 05/26/2013
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array Comments
	*/
	public function formatToCache( $isTimestamp = true ){
		if ( $isTimestamp == true ){
			$created = $this->created->getTimestamp();
		}else{
			$created = $this->created;
		}

		$data_format = array(
			'id'			=> $this->getId(),
			'author' 		=> $this->getAuthor(),
			'content' 		=> html_entity_decode($this->getContent()),
			'created'		=> $created,
			'user_id'		=> $this->getUser()->getId(),
			'user_slug'		=> $this->getUser()->getSlug(),
			'status'		=> $this->getStatus(),
			'like_count'	=> count($this->getLikerIds()),
			'can_delete'	=> $this->getCanDelete(),
			'can_edit'		=> $this->getCanEdit()
		);

		return $data_format;
	}

	public function getId(){
		return $this->id;
	}

	public function setContent( $content ){
		$this->content = $content;
	}

	public function getContent(){
		return $this->content;
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
		$this->deleted = false;
	}

	/** @MongoDB\PreUpdate */
	public function preUpdate(){
		$this->updated = new \DateTime();
	}

	public function setUser( $user ){
		$this->user = $user;
		$this->author = $user->getUsername();
		$this->email = $user->getPrimaryEmail()->getEmail();
	}

	public function getUser(){
		return $this->user;
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setEmail( $email ){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setDeleted( $deleted ){
		$this->deleted = $deleted;
	}

	public function getDeleted(){
		return $this->deleted;
	}

	public function getLikerIds(){
		return $this->likerIds;
	}

	public function addLikerId( $likerId ){
		$this->likerIds[] = (string)$likerId;
	}

	public function setLikerIds( $likerIds ){
		$this->likerIds = $likerIds;
	}

	public function setCanDelete( $canDelete ){
		$this->canDelete = $canDelete;
	}

	public function getCanDelete(){
		return $this->canDelete;
	}

	public function setCanEdit( $canEdit ){
		$this->canEdit = $canEdit;
	}

	public function getCanEdit(){
		return $this->canEdit;
	}

	public function addUserTag( $userTag ){
		$this->userTags[] = $userTag;
	}

	public function setUserTags( $userTags ){
		$this->userTags = $userTags;
	}

	public function getUserTags(){
		return $this->userTags;
	}
}