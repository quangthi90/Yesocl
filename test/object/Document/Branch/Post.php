<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(collection="branch_post")
 * @SOLR\Document(collection="post")
 */
Class Post extends AbstractPost {
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
	private $content;

	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Branch", inversedBy="posts") */
	private $branch;

	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Category", inversedBy="posts") */
	private $category;

	/** 
	 * @MongoDB\String 
	 */
	private $description;

	/**
	* Format array to save to Cache
	* 2014/02/27
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array User
	*/
	public function formatToCache( $isTimestamp = true ){
		$limit = 200;

		if ( $isTimestamp == true ){
			$created = $this->getCreated()->getTimestamp();
		}else{
			$created = $this->getCreated();
		}

		$post_data = array(
			'id'			=> $this->getId(),
			'author' 		=> $this->getAuthor(),
			'title' 		=> html_entity_decode($this->getTitle()),
			'description'	=> html_entity_decode($this->getDescription()),
			'content' 		=> html_entity_decode($this->getContent()),
			'created'		=> $created,
			'user_id'		=> $this->getUser()->getId(),
			'user_slug'		=> $this->getUser()->getSlug(),
			'thumb'			=> is_file(DIR_IMAGE . $this->getThumb()) ? $this->getThumb() : null,
			'slug'			=> $this->getSlug(),
			'status'		=> $this->getStatus(),
			'email'			=> $this->getEmail(),
			'comment_count' => $this->getComments()->count(),
			'like_count'	=> count($this->getLikerIds()),
			'liker_ids'		=> $this->getLikerIds(),
			'like_count'	=> count($this->getLikerIds()),
			'count_viewer'	=> $this->getCountViewer(),
			'category_slug'	=> $this->category->getSlug(),
			'category_name'	=> $this->category->getName(),
			'category_id'	=> $this->category->getId(),
			'stock_tags'	=> array_values($this->getStockTags()),
			'type' 			=> 'branch'
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

	public function setContent( $content ){
		$this->content = $content;
	}

	public function getContent(){
		return $this->content;
	}

	public function setBranch( $branch ){
		$this->branch = $branch;
	}

	public function getBranch(){
		return $this->branch;
	}

	public function setCategory( $category ){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}
}