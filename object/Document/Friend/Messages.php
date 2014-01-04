<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="user_message")
 */
Class Messages {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $user;

	/** @MongoDB\EmbedMany(targetDocument="Message") */
	private $messages = array();

	/** @MongoDB\Date */
	private $lastMessageCreated;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    }

	public function getId() {
		return $this->id;
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

	public function addMessage( Message $message ){
		$this->lastMessageCreated = new \DateTime();
		$this->messages[] = $message;
	}

	public function setMessages( $messages ){
		$this->messages = $messages;
	}

	public function getMessages(){
		return $this->messages;
	}

	public function setLastMessageCreated( $lastMessageCreated ){
		$this->lastMessageCreated = $lastMessageCreated;
	}

	public function getLastMessageCreated(){
		return $this->lastMessageCreated;
	}
}