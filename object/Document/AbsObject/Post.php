<?php
namespace Document\AbsObject;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/**
 * @MongoDB\MappedSuperclass
 * @MongoDB\InheritanceType("COLLECTION_PER_CLASS")
 * @MongoDB\DiscriminatorMap({
 *     "BranchPost"="\Document\Branch\Post"
 * })
 * @SOLR\Document(collection="post")
 */
Abstract Class Post {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** 
	 * @MongoDB\String
	 */
	private $title;

	/** 
	 * @MongoDB\String
	 */
	private $content;
	
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

    /** 
	 * @SOLR\Field(type="id")
	 */
	private $solrId;

	/** 
	 * @SOLR\Field(type="text")
	 */
	private $solrTitle;

	/** 
	 * @SOLR\Field(type="text")
	 */
	private $solrContent;

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
	
	public function setId( $id ) {
		$this->id = $id;
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

	public function updateSolrData(){
    	$this->solrId = $this->getId();
    	$this->solrTitle = $this->getTitle();
    	$this->solrContent = $this->getContent();
    }

	public function setSorlId( $sorlId ){
		$this->sorlId = $sorlId;
	}

	public function getSorlId(){
		return $this->sorlId;
	}

	public function setSorlTitle( $sorlTitle ){
		$this->sorlTitle = $sorlTitle;
	}

	public function getSorlTitle(){
		return $this->sorlTitle;
	}

	public function setSorlContent( $sorlContent ){
		$this->sorlContent = $sorlContent;
	}

	public function getSorlContent(){
		return $this->sorlContent;
	}
}