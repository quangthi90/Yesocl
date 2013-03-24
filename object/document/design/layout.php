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
}