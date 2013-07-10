<?php
namespace Document\Group;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class GroupMember {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\ReferenceMany(targetDocument="Action") */
	private $actions = array();

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

	public function addAction( Action $action ){
		$this->actions[] = $action;
	}

	public function setActions( $actions ){
		$this->actions = $actions;
	}

	public function getActions(){
		return $this->actions;
	}
}