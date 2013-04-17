<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(collection="company_group")
 */
Class Group {
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
	private $description;

	/** @MongoDB\ReferenceMany(targetDocument="Company", mappedBy="group") */
	private $companies = array();

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

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function addCompany( $company ){
		$this->companies[] = $company;
	}

	public function setCompanies( $companies ){
		$this->companies = $companies;
	}

	public function getCompanies(){
		return $this->companies;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}