<?php
namespace Document\Data;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(collection="data_type")
 */
Class Type {
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
	private $code;

	/** @MongoDB\ReferenceMany(targetDocument="Type", mappedBy="type") */
	private $values = array();

	/** 
	 * @MongoDB\Boolean 
	 */
	private $status;

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setCode( $code ){
		$this->code = $code;
	}

	public function getCode(){
		return $this->code;
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

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}