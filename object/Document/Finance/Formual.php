<?php
namespace Document\Finance;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(db="yesocl", collection="finance_formual")
 */
Class Formual {
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
	private $function;

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Date */
	private $created;

	public function formatToCache() {
		return array(
			'id' => $this->id,
			'name' => $this->name,
			//'owner' => $this->owner,
			'function' => $this->function,
			'deleted' => $this->deleted,
			'created' => $this->created,
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

	public function setFunction( $function ){
		$this->function = $function;
	}

	public function getFunction(){
		return $this->function;
	}

	public function setDeleted( $deleted ){
		$this->deleted = $deleted;
	}

	public function getDeleted(){
		return $this->deleted;
	}
}