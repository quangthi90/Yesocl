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

	/**
	* Format array to save to Cache
	* 05/26/2013
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array Comments
	*/
	public function formatToCache(){
		$data_format = array(
			'id'			=> $this->getId(),
			'author' 		=> $this->getAuthor(),
			'content' 		=> html_entity_decode($this->getContent()),
			'created'		=> $this->getCreated(),
			'user_id'		=> $this->getUser()->getId(),
			'user_slug'		=> $this->getUser()->getSlug(),
			'status'		=> $this->getStatus(),
			'like_count'	=> count($this->getLikerIds())
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
}