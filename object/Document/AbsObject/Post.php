<?php
namespace Document\AbsObject;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\MappedSuperclass
 * @MongoDB\InheritanceType("COLLECTION_PER_CLASS")
 * @MongoDB\DiscriminatorMap({
 *     "BranchPost"="\Document\Branch\Post"
 * })
 */
Abstract Class Post {
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\Date */
	private $updated;

	/** @MongoDB\String */
	private $author;

	/** @MongoDB\String */
	private $email;
	
	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="posts") */
    private $user;

	/** @MongoDB\EmbedMany(targetDocument="Comment") */
	private $comments = array();

	/** @MongoDB\String */
	private $slug;

	/** @MongoDB\String */
	private $thumb;

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Collection */
    private $likerIds;

    /** @MongoDB\Int */
    private $countViewer = 0;

	/** @MongoDB\Collection */
	private $stockTags = array();

	/** @MongoDB\Collection */
	private $userTags = array();

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
		$this->updated = new \DateTime();
		$this->deleted = false;
	}

	/** @MongoDB\PreUpdate */
	public function preUpdate(){
		$this->updated = new \DateTime();
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setEmail( $email ){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setUser( $user ){
		$this->user = $user;
		$this->author = $user->getUsername();
		$this->email = $user->getPrimaryEmail()->getEmail();
	}

	public function getUser(){
		return $this->user;
	}

	public function addComment( Comment $comment ){
		$comments = $this->comments->toArray();
		array_unshift($comments, $comment);
		$this->comments = $comments;
	}

	public function setComments( $comments ){
		$this->comments = $comments;
	}

	public function getComments( $isReverse = false ){
		if ( $isReverse ){
			return array_reverse($this->comments->toArray());
		}
		return $this->comments;
	}

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function setThumb( $thumb ){
		$this->thumb = $thumb;
	}

	public function getThumb(){
		return $this->thumb;
	}

	public function setDeleted( $deleted ){
		$this->deleted = $deleted;
	}

	public function getDeleted(){
		return $this->deleted;
	}

	public function getLikerIds(){
		return $this->likerIds;
	}

	public function addLikerId( $likerId ){
		$this->likerIds[] = (string)$likerId;
	}

	public function setLikerIds( $likerIds ){
		$this->likerIds = $likerIds;
	}

	public function setCountViewer( $countViewer ){
		$this->countViewer = $countViewer;
	}

	public function getCountViewer(){
		return $this->countViewer;
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