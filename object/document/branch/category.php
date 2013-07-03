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

	/** @MongoDB\ReferenceOne(targetDocument="Branch", inversedBy="categories") */
	private $branch;

	/** @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="parent") */
	private $children;

	/** @MongoDB\ReferenceMany(targetDocument="Category", mappedBy="children") */
	private $parent;
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\Int */
	private $order;

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
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

	public function setOrder( $order ){
		$this->order = $order;
	}

	public function getOrder(){
		return $this->order;
	}
}