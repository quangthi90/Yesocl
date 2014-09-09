<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="branch_category") */
Class Category {
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

	/** @MongoDB\ReferenceOne(targetDocument="Branch", inversedBy="categories") */
	private $branch;

	/** @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="children") */
	private $parent;

	/** @MongoDB\ReferenceMany(targetDocument="Category", mappedBy="parent") */
	private $children;

	/** @MongoDB\ReferenceMany(targetDocument="Post", mappedBy="category") */
	private $posts = array();
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\Int */
	private $order;

	/** @MongoDB\Boolean */
	private $isBranch;
	
	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
        $this->deleted = false;
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

	public function setBranch( $branch ){
		$this->branch = $branch;
	}

	public function getBranch(){
		return $this->branch;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setParent( $parent ){
		$this->parent = $parent;
	}

	public function getParent(){
		return $this->parent;
	}

	public function addChild( $child ){
		$this->children[] = $child;
	}

	public function setChildren( $children ){
		$this->children = $children;
	}

	public function getChildren(){
		return $this->children;
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

	public function setIsBranch( $isBranch ){
		$this->isBranch = $isBranch;
	}

	public function getIsBranch(){
		return $this->isBranch;
	}

	public function getDeleted() {
		return $this->deleted;
	}

	public function setDeleted( $deleted ) {
		$this->deleted = $deleted;
	}
}