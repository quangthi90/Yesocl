<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\Document(collection="branch") */
Class Branch {
	/** @MongoDB\Id */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** 
	 * @MongoDB\String 
	 */
	private $slug; 

	/** @MongoDB\ReferenceMany(targetDocument="Position", mappedBy="branchs") */
	private $positions = array();
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="branch") */
	private $groups = array();

	/** @MongoDB\ReferenceMany(targetDocument="Category", mappedBy="branch") */
	private $categories = array();

	/** @MongoDB\ReferenceOne(targetDocument="\Document\Company\Company") */
	private $company;

	/** @MongoDB\ReferenceMany(targetDocument="Post", mappedBy="branch") */
	private $posts = array();

	/** @MongoDB\Int */
	private $order;

    /** 
	 * @SOLR\Field(type="text")
	 */
	private $type;

	/**
	 * Get Post By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Post ID
	 * @return:
	 * 		- Object Post
	 * 		- null if not found
	 */
	public function getPostById( $post_id ){
		foreach ( $this->posts as $post ){
			if ( $post->getId() == $post_id ){
				return  $post;
			}
		}
		
		return null;
	}

	/**
	 * Get Post By Slug
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string post Slug
	 * @return:
	 * 		- Object Post
	 * 		- null if not found
	 */
	public function getPostBySlug( $post_slug ){
		foreach ( $this->posts as $post ){
			if ( $post->getSlug() == $post_slug ){
				return  $post;
			}
		}
		
		return null;
	}

	/**
	* Format array to save to Cache
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array Branch
	*/
    public function formatToCache(){
		$data = array(
			'id'		=> $this->getId(),
			'company' 	=> $this->getCompany()->getId(),
			'name' 		=> $this->getName(),
			'slug'		=> $this->getSlug(),
			'status'	=> $this->getStatus()
		);

		return $data;
	}

	/**
	 * Get Post By Category ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Category ID
	 * @return:
	 * 		- list Object Posts
	 */
	public function getPostsByCategory( $category_id ){
		$posts = array();
		foreach ( $this->posts as $post ){
			if ( $post->getCategory()->getId() == $category_id ){
				$posts[$post->getId()] = $post;
			}
		}
		
		return posts;
	}

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function addPosition( $position ){
		$this->positions[] = $position;
	}

	public function setPositions( $positions ){
		$this->positions = $positions;
	}

	public function getPositions(){
		return $this->positions;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function addGroup( \Document\Group\Group $group ){
		$this->groups[] = $group;
	}

	public function setGroups( $groups ){
		$this->groups = $groups;
	}

	public function getGroups(){
		return $this->groups;
	}

	public function addCategory( $category ){
		$this->categories[] = $category;
	}

	public function setCategories( $categories ){
		$this->categories = $categories;
	}

	public function getCategories(){
		return $this->categories;
	}

	public function setCompany( $company ){
		$this->company = $company;
	}

	public function getCompany(){
		return $this->company;
	}

	public function setPosts( $posts ){
		$this->posts = $posts;
	}

	public function getPosts(){
		return $this->posts;
	}

	public function setOrder( $order ){
		$this->order = $order;
	}

	public function getOrder(){
		return $this->order;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}
}