<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use DateTimeZone;

/** @MongoDB\EmbeddedDocument */
Class Notification {
	/** 
	 * @MongoDB\Id
	 */
	private $id;

	/** @MongoDB\String */
	private $action;

	/** @MongoDB\ReferenceOne(targetDocument="User", inversedBy="notifications") */
	private $actor;

	/** @MongoDB\String */
	private $type;

	/** @MongoDB\String */
	private $object;

	/** @MongoDB\String */
	private $objectId;

	/** @MongoDB\String */
	private $slug;	

	/** @MongoDB\Boolean */
	private $read;

	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->created = new \DateTime('now', new DateTimeZone('Asia/Bangkok'));
		$this->read = false;
		$this->status = true;
	}

	public function getId(){
		return $this->id;
	}

	public function setAction( $action ){
		$this->action = $action;
	}

	public function getAction(){
		return $this->action;
	}

	public function setActor( $actor ){
		$this->actor = $actor;
	}

	public function getActor(){
		return $this->actor;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

	public function setObject( $object ){
		$this->object = $object;
	}

	public function getObject(){
		return $this->object;
	}

	public function setObjectId( $objectId ){
		$this->objectId = $objectId;
	}

	public function getObjectId(){
		return $this->objectId;
	}

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function setRead( $read ){
		$this->read = $read;
	}

	public function getRead(){
		return $this->read;
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
}