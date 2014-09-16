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

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->unRead = 0;
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
		if ( $oMessage = $this->getLastMessageByUserId($message->getObject()->getId()) ){
			$this->lastMessages->removeElement( $oMessage );
		}

		$this->lastMessages[] = $message;
		$this->messages[] = $message;

		if ( $message->getRead() == false ){
			$iUnread = 0;
			foreach ( $this->lastMessages as $oMessage ) {
				if ( !$oMessage->getRead() ){
					$iUnread++;
				}
			}
			$this->user->setUnRead( $iUnread );
		}
	}

	public function setMessages( $messages ){
		$this->messages = $messages;
	}

	public function getMessages(){
		return $this->messages;
	}
}