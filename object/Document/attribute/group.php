<?php
namespace Document\Attribute;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="attribute_group") */
Class Group {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\ReferenceMany(targetDocument="Attribute", mappedBy="group") */
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

	public function setAttributes( $attributes ){
		$this->attributes = $attributes;
	}

	public function getAttributes(){
		return $this->attributes;
	}
} 