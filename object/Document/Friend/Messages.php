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

    /** @MongoDB\ReferenceMany(targetDocument="Document\User\User") */
    private $users = array();

	/** @MongoDB\EmbedMany(targetDocument="Message") */
	private $messages = array();

    /** @MongoDB\Date */
	private $created;

    /** @MongoDB\Date */
	private $updated;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->updated = new \DateTime();
    }

	public function getId() {
		return $this->id;
	}

	public function addUser( User $user ){
		$this->users[] = $user;
	}

	public function setUsers( $users ){
		$this->users = $users;
	}

	public function getUsers(){
		return $this->users;
	}

	public function addMessage( Message $message ){
		$this->messages[] = $message;
    	$this->updated = new \DateTime();
	}

	public function setMessages( $messages ){
		$this->messages = $messages;
	}

	public function getMessages(){
		return $this->messages;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	public function setUpdated( $updated ){
		$this->updated = $updated;
	}

	public function getUpdated(){
		return $this->updated;
	}
}