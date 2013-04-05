<?php
namespace Document\Design;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="design_layout")
 */
Class Layout {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;

	/** @MongoDB\String */
	private $path;

	/** @MongoDB\ReferenceMany(targetDocument="Action", inversedBy="layouts") */
    private $actions = array();

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setPath( $path ){
		$this->path = $path;
	}

	public function getPath(){
		return $this->path;
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

	public function removeAction( $action_id ){
		$actions = array();
		foreach ( $this->actions as $action ) {
			if ( $action->getId() != $action_id ){
				$actions[] = $action;
			}
		}
		$this->setActions( $actions );
	}

	public function getActionById( $action_id ){
		foreach ( $this->actions as $action ) {
			if ( $action->getId() == $action_id ){
				return $action;
			}
		}

		return null;
	}
}