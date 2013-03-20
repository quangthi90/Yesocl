<?php
namespace Document\Data;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(collection="data_value")
 */
Class Value {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** 
	 * @MongoDB\String 
	 */
	private $value; 

	/** @MongoDB\ReferenceOne(targetDocument="Type", inversedBy="values") */
	private $type;

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setValue( $value ){
		$this->value = $value;
	}

	public function getValue(){
		return $this->value;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}
}