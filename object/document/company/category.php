<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="company_post_category") */
Class Category {
	/** @MongoDB\Id */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** @MongoDB\ReferenceMany(targetDocument="Post", mappedBy="category") */
	private $posts = array();
	
	/** @MongoDB\Int */
	private $order;
	
	/** @MongoDB\Boolean */
	private $status;

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function addPost( $post ){
		$this->posts[] = $post;
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

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}