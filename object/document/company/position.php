<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="company_position") */
Class Position {
	/** @MongoDB\Id */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** @MongoDB\ReferenceMany(targetDocument="Branch", inversedBy="positions") */
	private $branchs = array();
	
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

	public function addBranch( $branch ){
		$this->branchs[] = $branch;
	}

	public function setBranchs( $branchs ){
		$this->branchs = $branchs;
	}

	public function getBranchs(){
		return $this->branchs;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}