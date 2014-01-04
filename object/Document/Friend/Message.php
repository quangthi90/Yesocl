<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;

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
    private $sender;

    /** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $receipter;

    /** @MongoDB\Boolean */
	private $read; // true if message is read

    /** @MongoDB\Date */
	private $created;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
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

	public function setSender( $sender ){
		$this->sender = $sender;
	}

	public function getSender(){
		return $this->sender;
	}

	public function setReceipter( $receipter ){
		$this->receipter = $receipter;
	}

	public function getReceipter(){
		return $this->receipter;
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