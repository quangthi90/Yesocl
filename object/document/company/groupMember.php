<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class GroupMember {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\Boolean */
	private $canDel = true;

	/** @MongoDB\ReferenceMany(targetDocument="Action") */
	private $actions = array();

	/** @MongoDB\ReferenceMany(targetDocument="Document\Branch\Category") */
	private $categories = array();

	/** @MongoDB\ReferenceMany(targetDocument="Document\User\User") */
	private $members = array();

	/**
	 * Get Action By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Action
	 * 		- null if not found
	 */
	public function getActionById( $action_id ){
		foreach ( $this->actions as $action ){
			if ( $action->getId() === $action_id ){
				return $action;
			}
		}
		
		return null;
	}

	/**
	 * Get Category By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Category
	 * 		- null if not found
	 */
	public function getCategoryById( $category_id ){
		foreach ( $this->categories as $category ){
			if ( $category->getId() === $category_id ){
				return $category;
			}
		}
		
		return null;
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

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setCanDel( $canDel ){
		$this->canDel = $canDel;
	}

	public function getCanDel(){
		return $this->canDel;
	}

	public function addAction( Action $action ){
		$this->actions[] = $action;
	}

	public function setActions( $actions ){
		$this->actions = $actions;
	}

	public function getActions(){
		return $this->actions;
	}

	public function addCategory( \Document\Branch\Category $category ){
		$this->categories[] = $category;
	}

	public function setCategories( $categories ){
		$this->categories = $categories;
	}

	public function getCategories(){
		return $this->categories;
	}

	public function addMember( \Document\User\User $member ){
		$this->members[] = $member;
	}

	public function setMembers( $members ){
		$this->members = $members;
	}

	public function getMembers(){
		return $this->members;
	}
}