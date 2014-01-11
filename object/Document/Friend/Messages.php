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

	/** @MongoDB\EmbedMany(targetDocument="Message") */
	private $lastMessages = array();

	/** 
	 * @MongoDB\Int
	 */
	private $unRead;

	public function getLastMessageByUserId( $idUser ){
		foreach ( $this->lastMessages as $oMessage ) {
			if ( $oMessage->getObject()->getId() == $idUser ){
				return $oMessage;
			}
		}

		return null;
	}

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->unRead = 0;
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
		if ( $oMessage = $this->getLastMessageByUserId($message->getObject()->getId()) ){
			$this->lastMessages->removeElement( $oMessage );
		}

		$this->lastMessages[] = $message;
		$this->messages[] = $message;

		if ( $message->getRead() == false ){
			$this->unRead++;
		}
	}

	public function setMessages( $messages ){
		$this->messages = $messages;
	}

	public function getMessages(){
		return $this->messages;
	}

	public function addLastMessage( Message $lastMessage ){
		$this->lastMessages[] = $lastMessage;
	}

	public function setLastMessages( $lastMessages ){
		$this->lastMessages = $lastMessages;
	}

	public function getLastMessages(){
		$this->unRead = 0;
		return $this->lastMessages;
	}

	public function setUnRead( $unRead ){
		$this->unRead = $unRead;
	}

	public function getUnRead(){
		return $this->unRead;
	}
}