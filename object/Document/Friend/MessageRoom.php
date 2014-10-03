<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(db="yesocl", collection="user_message")
 */
Class MessageRoom {
	/**
	 * @MongoDB\Id
	 */
	private $id;

    /** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $creator;

	/**
	 * @MongoDB\String
	 */
	private $name;

    /** @MongoDB\ReferenceMany(targetDocument="Document\User\User") */
    private $users = array();

	/** @MongoDB\EmbedMany(targetDocument="Message") */
	private $messages = array();

    /** @MongoDB\Date */
	private $created;

    /** @MongoDB\Date */
	private $updated;

	public function formatToCache( $oLoggedUser, $bIsTimestamp = true ) {
		if ( $bIsTimestamp ) {
			$created = $this->getCreated()->getTimestamp();
			$updated = $this->getUpdated()->getTimestamp();
		} else {
			$created = $this->getCreated();
			$updated = $this->getUpdated();
		}
		return array(
			'id' => $this->getId(),
			'name' => $this->getRoomName( $oLoggedUser ),
			'updated' => $updated,
			'created' => $created
		);
	}

	/**
	 * 10/01/2014
	 * Get room name
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: null
	 * @return: string room name
	 */
	public function getRoomName( $oLoggedUser ) {
		if ( $this->getName() != null ) {
			return $this->getName();
		}

		if ( $this->getUsers()->count() == 1 ) {
			return $this->getUsers()->first()->getUsername();
		}

		$aUsernames = array();
		foreach ( $this->getUsers() as $oUser ) {
			if ( $oUser->getId() == $oLoggedUser->getId() ) continue;
			$aUsernames[] = $oUser->getUsername();
		}
		return implode( ', ', $aUsernames );
	}

	/**
	 * 10/01/2014
	 * Get last user is not logged user
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: null
	 * @return: string room name
	 */
	public function getLastUser( $oLoggedUser ) {
		foreach ( $this->getUsers() as $oUser ) {
			if ( $oUser->getId() != $oLoggedUser->getId() ) return $oUser;
		}

		return $oUser;
	}

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->updated = new \DateTime();
    }

	public function getId() {
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
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

	public function setCreator( User $user ){
		$this->creator = $user;
	}

	public function getCreator(){
		return $this->creator;
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