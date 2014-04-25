<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\Document(collection="branch_post") */
Class Post extends AbstractPost {
	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Branch", inversedBy="posts") */
	private $branch;

	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Category") */
	private $category;

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
			'category_id'	=> $this->category->getId()
		);

		return $post_data;
	}

	/** @MongoDB\PostPersist */
    public function postPersist()
    {
    	$this->setType('Branch');
    }

    /** @MongoDB\PostUpdate */
    public function postUpdate()
    {
    	$this->setType('Branch');
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
}