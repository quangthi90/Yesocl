<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Finance {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** @MongoDB\ReferenceOne(targetDocument="Document\Finance\Finance") */
	private $finance;

	/** @MongoDB\Hash */
	private $values = array();
	
	/** @MongoDB\Boolean */
	private $status = true;

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Date */
	private $created;

	public function formatToCache() {
		return array(
			'id' => $this->id,
			'finane' => $this->getFinance()->formatToCache(),
			'status' => $this->getStatus(),
			'values' => $this->getValues()
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

	public function setFinance( $finance ){
		$this->finance = $finance;
	}

	public function getFinance(){
		return $this->finance;
	}

	public function setValues( $values ){
		$this->values = $values;
	}

	public function getValues(){
		return $this->values;
	}

	public function addValue( $datetime, $value ){
		$this->values[$datetime] = $value;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setDeleted( $deleted ){
		$this->deleted = $deleted;
	}

	public function getDeleted(){
		return $this->deleted;
	}
}