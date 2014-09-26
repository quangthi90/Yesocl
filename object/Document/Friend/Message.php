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
    private $author;

    /** @MongoDB\ReferenceMany(targetDocument="Document\User\User") */
    private $readers = array();

    /** @MongoDB\Date */
	private $created;

	public function formatToCache( $idUser = 0 ) {
		return array(
			'id' => $this->getId(),
			'content' => $this->getContent(),
			'created' => $this->getCreated(),
			'is_read' => $this->checkIsRead( $idUser )
		);
	}

	private function checkIsRead( $idUser ) {
		$lReaders = $this->getReaders();
		foreach ( $lReaders as $oUser ) {
			if ( $idUser == $oUser->getId() ) {
				return true;
			}
		}
		return false;
	}

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

	public function setAuthor( $user ){
		$this->author = $user;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function addReader( User $user ){
		$this->readers[] = $user;
	}

	public function setReaders( $users ){
		$this->readers = $users;
	}

	public function getReaders(){
		return $this->readers;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}
}