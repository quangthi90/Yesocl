<?php
namespace Document\Attribute;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="attribute") */
Class Attribute {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\Boolean */
	private $required;
	
	/** @MongoDB\Boolean */
	private $haveValue;
	
	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="attributes") */
    private $group;
    
    /** @MongoDB\ReferenceOne(targetDocument="Type", inversedBy="attributes") */
    private $type;
    
    /** @MongoDB\EmbedMany(targetDocument="Value") */
    private $values = array();

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setRequired( $required ){
		$this->required = $required;
	}

	public function getRequired(){
		return $this->required;
	}

	public function setHaveValue( $haveValue ){
		$this->haveValue = $haveValue;
	}

	public function getHaveValue(){
		return $this->haveValue;
	}

	public function setGroup( $group ){
		$this->group = $group;
	}

	public function getGroup(){
		return $this->group;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

	public function addValue( Value $value ){
		$this->values[] = $value;
	}

	public function setValues( $values ){
		$this->values = $values;
	}

	public function getValues(){
		return $this->values;
	}
	
	/**
	 * Get Value by ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: int Value ID
	 * @return: 
	 * 		Object Value
	 * 		null if not found Value with ID input
	 */
	public function getValueById( $value_id ){
		foreach ( $this->values as $value ){
			if ( $value->getId() === $value_id ){
				return $value;
			}
		}
		
		return null;
	}
}