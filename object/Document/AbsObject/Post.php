<?php
namespace Document\AbsObject;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;
use DateTimeZone;

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
	 * @SOLR\Field(type="id")
	 */
	private $id;

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
	 */
	private $title;

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
	 */
	private $description;

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
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
	 * @SOLR\Field(type="text")
	 */
	private $type;

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

	/**
	* Format array to save to Cache
	* 05/26/2013
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array Post
	*/
	public function formatToCache(){
		$limit = 200;

		$post_data = array(
			'id'			=> $this->getId(),
			'author' 		=> $this->getAuthor(),
			'title' 		=> $this->getTitle(),
			'description'	=> $this->getDescription(),
			'content' 		=> html_entity_decode($this->getContent()),
			'created'		=> $this->getCreated(),
			'user_id'		=> $this->getUser()->getId(),
			'user_slug'		=> $this->getUser()->getSlug(),
			'thumb'			=> $this->getThumb(),
			'slug'			=> $this->getSlug(),
			'status'		=> $this->getStatus(),
			'email'			=> $this->getEmail(),
			'comment_count' => $this->getComments()->count(),
			'like_count'	=> count($this->getLikerIds()),
			'liker_ids'		=> $this->getLikerIds(),
			'like_count'	=> count($this->getLikerIds()),
			'count_viewer'	=> $this->getCountViewer()
		);

		return $post_data;
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

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
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
		$this->created = new \DateTime('now', new DateTimeZone('Asia/Bangkok'));
		$this->updated = new \DateTime('now', new DateTimeZone('Asia/Bangkok'));
		$this->deleted = false;
	}

	/** @MongoDB\PreUpdate */
	public function preUpdate(){
		$this->updated = new \DateTime('now', new DateTimeZone('Asia/Bangkok'));
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
		$this->comments[] = $comment;
	}

	public function setComments( $comments ){
		$this->comments = $comments;
	}

	public function getComments(){
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

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}
}