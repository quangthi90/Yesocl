<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Post {
	/** @MongoDB\Id */
	private $id;

	/** @MongoDB\String */
	private $title;

	/** @MongoDB\String */
	private $content;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;
	
	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="posts") */
    private $user;

	/** @MongoDB\EmbedMany(targetDocument="Comment") */
	private $comments = array();

	/**
	 * Get Comment By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Comment
	 * 		- null if not found
	 */
	public function getCommentById( $comment_id ){
		foreach ( $this->comments as $comment ){
			if ( $comment->getId() === $comment_id ){
				return  $comment;
			}
		}
		
		return null;
	}

	public function getId(){
		return $this->id;
	}
	
	public function setTitle( $title ){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setContent( $content ){
		$this->content = $content;
	}

	public function getContent(){
		return $this->content;
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

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->created = new \DateTime();
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

	public function addComment( Comment $comment ){
		$this->comments[] = $comment;
	}

	public function setComments( $comments ){
		$this->comments = $comments;
	}

	public function getComments(){
		return $this->comments;
	}
}