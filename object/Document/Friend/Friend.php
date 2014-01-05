<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use DateTimeZone;

/** @MongoDB\EmbeddedDocument */
Class Friend {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** 
	 * @MongoDB\String
	 */
	private $group_id;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $user;

    /** @MongoDB\Date */
	private $created;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime('now', new DateTimeZone('Asia/Bangkok'));
    }

	public function getId() {
		return $this->id;
	}

	public function setGroupId( $group_id ){
		$this->group_id = $group_id;
	}

	public function getGroupId(){
		return $this->group_id;
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}
}