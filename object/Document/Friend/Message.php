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

    /** @MongoDB\Collection */
	private $stockTags = array();

    /** @MongoDB\Collection */
	private $userTags = array();

    /** @MongoDB\Date */
	private $created;

	public function formatToCache( $idUser = 0, $bIsTimestamp = true ) {
		if ( $bIsTimestamp ) {
			$created = $this->getCreated()->getTimestamp();
		} else {
			$created = $this->getCreated();
		}
		return array(
			'id' => $this->getId(),
			'content' => $this->getContent(),
			'created' => $created,
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

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	public function addStockTag( $stockTag ){
		$this->stockTags[] = $stockTag;
	}

	public function setStockTags( $stockTags ){
		$this->stockTags = $stockTags;
	}

	public function getStockTags(){
		return $this->stockTags;
	}

	public function addUserTag( $userTag ){
		$this->userTags[] = $userTag;
	}

	public function setUserTags( $userTags ){
		$this->userTags = $userTags;
	}

	public function getUserTags(){
		return $this->userTags;
	}
}