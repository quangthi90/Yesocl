<?php
namespace Document\Attribute;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Value {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\ReferenceMany(targetDocument="Attribute") */
    private $referenceAttributes = array();

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function addReferenceAttribute( Attribute $referenceAttribute ){
		$this->referenceAttributes[] = $referenceAttribute;
	}

	public function setReferenceAttributes( $referenceAttributes ){
		$this->referenceAttributes = $referenceAttributes;
	}

	public function getReferenceAttributes(){
		return $this->referenceAttributes;
	}
	
	/**
	 * Get Reference Attribute by Attribute ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: int reference Attribute ID
	 * @return: 
	 * 		string object Attribute
	 * 		null if not found Attribute with ID input
	 */
	public function getReferenceAttributeById( $referenceAttributeId ){
		foreach ( $this->referenceAttributes as $referenceAttribute ){
			if ( $referenceAttribute->getId() === $referenceAttributeId ){
				return $referenceAttribute;
			}
		}
		
		return null;
	}
}