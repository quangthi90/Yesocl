<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="branch") */
Class Branch {
	/** @MongoDB\Id */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** @MongoDB\ReferenceMany(targetDocument="Position", mappedBy="branchs") */
	private $positions = array();
	
	/** @MongoDB\Boolean */
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

	public function addPosition( $position ){
		$this->positions[] = $position;
	}

	public function setPositions( $positions ){
		$this->positions = $positions;
	}

	public function getPositions(){
		return $this->positions;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}