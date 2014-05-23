<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\Document(collection="stock_post") */
Class Post extends AbstractPost {
	/** @MongoDB\ReferenceOne(targetDocument="Document\Stock\Stock", inversedBy="posts") */
	private $stock;

	/**
	* Format array to save to Cache
	* 2014/02/27
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array User
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
			'count_viewer'	=> $this->getCountViewer(),
			'category_slug'	=> $this->category->getSlug(),
			'category_name'	=> $this->category->getName(),
			'category_id'	=> $this->category->getId(),
			'type'			=> 'stock'
		);

		return $post_data;
	}

	/** @MongoDB\PostPersist */
    public function postPersist()
    {
    	$this->setType('Stock');
    }

    /** @MongoDB\PostUpdate */
    public function postUpdate()
    {
    	$this->setType('Stock');
    }

	public function setStock( $stock ){
		$this->stock = $stock;
	}

	public function getStock(){
		return $this->stock;
	}
}