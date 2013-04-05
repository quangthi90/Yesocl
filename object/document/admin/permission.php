<?php
namespace Document\Admin;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Permission {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\ReferenceOne(targetDocument="\Document\Design\Layout") */
	private $layout;

    /** @MongoDB\ReferenceMany(targetDocument="\Document\Design\Action") */
	private $actions = array();

	public function getId(){
		return $this->id;
	}

	public function setLayout( $layout ){
		$this->layout = $layout;
	}

	public function getLayout(){
		return $this->layout;
	}

	public function addAction( \Document\Design\Action $action ){
		$this->actions[] = $action;
	}

	public function setActions( $actions ){
		$this->actions = $actions;
	}

	public function getActions(){
		return $this->actions;
	}
}