<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\Document(collection="stock_post") */
Class Post extends AbstractPost {
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
			'title' 		=> $this->getTitle(),
			'content' 		=> html_entity_decode($this->getContent()),
			'created'		=> $created,
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
			'count_viewer'	=> $this->getCountViewer(),
			'stock_tags'	=> array_values($this->getStockTags()),
			'user_tags'		=> $this->getUserTags(),
			'type'			=> 'stock'
		);

		return $post_data;
	}
	
	public function getId() {
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
}