<?php
namespace Document\Setting;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="config") */
Class Config {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $key;
	
	/** @MongoDB\String */
	private $value;

	public function getId(){
		return $this->id;
	}

	public function setKey( $key ){
		$this->key = $key;
	}

	public function getKey(){
		return $this->key;
	}

	public function setValue( $value ){
		$this->value = $value;
	}

	public function getValue(){
		return $this->value;
	}
}