<?php
namespace Document\Group;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class GroupMember {
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