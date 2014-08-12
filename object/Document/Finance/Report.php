<?php
namespace Document\Finance;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(db="yesocl", collection="finance_report")
 */
Class Report {
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
	private $dates;

	/**
	 * @MongoDB\Hash
	 */
	private $functions = array();

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Date */
	private $created;

	public function formatToCache() {
		return array(
			'id' => $this->id,
			'name' => $this->getName(),
			'dates' => $this->getDates(),
			'functions' => $this->getFunctions(),
			'status' => $this->getStatus()
		);
	}

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->deleted = false;
    }

	public function getId() {
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setDates( $dates ){
		$this->dates = $dates;
	}

	public function getDates(){
		return $this->dates;
	}

	public function setFunctions( $functions ){
		$this->functions = $functions;
	}

	public function getFunctions(){
		return $this->functions;
	}

	public function setGroup( $group ){
		$this->group = $group;
	}

	public function getGroup(){
		return $this->group;
	}

	public function setDeleted( $deleted ){
		$this->deleted = $deleted;
	}

	public function getDeleted(){
		return $this->deleted;
	}
}