<?php
namespace Document\Information;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="industry") */
Class Industry {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}
}