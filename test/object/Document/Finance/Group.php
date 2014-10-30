<?php
namespace Document\Finance;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="finance_group")
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

	/** @MongoDB\ReferenceMany(targetDocument="Finance", mappedBy="group") */
	private $finances = array();

	/** 
	 * @MongoDB\Int 
	 */
	private $order;
	
	/** @MongoDB\Boolean */
	private $status = true;

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Date */
	private $created;

	public function formatToCache() {
		return array(
			'id' => $this->id,
			'name' => $this->name
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

	public function setFinances( $finances ){
		$this->finances = $finances;
	}

	public function addFinance( Finance $finance ){
		$this->finance[] = $finance;
	}

	public function getFinances(){
		return $this->childFinances;
	}

	public function setOrder( $order ){
		$this->order = $order;
	}

	public function getOrder(){
		return $this->order;
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