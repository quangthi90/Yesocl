<?php
namespace Document\Finance;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="finance")
 */
Class Finance {
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
	private $slug;

	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="finances") */
	private $group;

	/** @MongoDB\ReferenceMany(targetDocument="Finance", mappedBy="parentFinance") */
	private $childFinances = array();

	/** @MongoDB\ReferenceOne(targetDocument="Finance", inversedBy="childFinances") */
	private $parentFinance;

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
			'name' => $this->getName(),
			'slug' => $this->getSlug(),
			'parent' => $this->getParentFinance()->formatToCache(),
			'order' => $this->getOrder(),
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

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function setGroup( $group ){
		$this->group = $group;
	}

	public function getGroup(){
		return $this->group;
	}

	public function setChildFinances( $childFinances ){
		$this->childFinances = $childFinances;
	}

	public function addChildFinance( Finance $childFinance ){
		$this->childFinance[] = $childFinance;
	}

	public function getChildFinances(){
		return $this->childFinances;
	}

	public function setParentFinance( $parentFinance ){
		$this->parentFinance = $parentFinance;
	}

	public function getParentFinance(){
		return $this->parentFinance;
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