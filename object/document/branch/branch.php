<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="branch") */
Class Branch {
	/** @MongoDB\Id */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** @MongoDB\ReferenceMany(targetDocument="Position", mappedBy="branchs") */
	private $positions = array();
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="branch") */
	private $groups = array();

	/** @MongoDB\ReferenceMany(targetDocument="Category", mappedBy="branch") */
	private $categories = array();

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
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

	public function setCategorys( $categories ){
		$this->categories = $categories;
	}

	public function getCategorys(){
		return $this->categories;
	}
}