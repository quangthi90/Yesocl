<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use DateTimeZone;

/** @MongoDB\EmbeddedDocument */
Class Message {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** 
	 * @MongoDB\String
	 */
	private $content;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $object;

    /** @MongoDB\Boolean */ // true if user is sender
    private $isSender;

    /** @MongoDB\Boolean */
	private $read; // true if message is read

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

	public function setContent( $content ){
		$this->content = $content;
	}

	public function getContent(){
		return $this->content;
	}

	public function setobject( $object ){
		$this->object = $object;
	}

	public function getObject(){
		return $this->object;
	}

	public function setIsSender( $isSender ){
		$this->isSender = $isSender;
	}

	public function getIsSender(){
		return $this->isSender;
	}

	public function setRead( $read ){
		$this->read = $read;
	}

	public function getRead(){
		return $this->read;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}
}