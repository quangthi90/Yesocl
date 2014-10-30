<?php
namespace Document\Attribute;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="attribute_type") */
Class Type {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\ReferenceMany(targetDocument="Attribute", mappedBy="type") */
	private $attributes = array(); 

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function addAttribute( Attribute $attribute ){
		$this->attributes[] = $attribute;
	}

	public function setAttribute( $attributes ){
		$this->attributes = $attributes;
	}

	public function getAttribute(){
		return $this->attributes;
	}
}