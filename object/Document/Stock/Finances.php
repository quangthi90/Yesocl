<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="stock_finance")
 */
Class Finances {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** @MongoDB\EmbedMany(targetDocument="Finance") */
	private $finances = array();

	/** @MongoDB\ReferenceOne(targetDocument="Stock") */
	private $stock;
	
	/** @MongoDB\Boolean */
	private $status = true;

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\Date */
	private $created;

	public function formatToCache() {
		return array(
			'id' => $this->id,
			'stock' => $this->getStock()->formatToCache(),
			'finances' => $this->getFinances()->formatToCache()
		);
	}

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->deleted = false;
    }

    public function getFinanceById( $idFinance ){
    	foreach ( $this->getFinances() as $finance ) {
    		if ( $finance->getId() == $idFinance ){
    			return $finance;
    		}
    	}
    	return null;
    }

    public function getFinanceByFinanceId( $idFinance ){
    	// print('<meta content="text/html; charset=utf-8" http-equiv="Content-Type">');
    	// print($idFinance . "<br>");
    	foreach ( $this->getFinances() as $finance ) {
    		// print($finance->getFinance()->getId() . " - " . $finance->getFinance()->getName() .  "<br>");
    		if ( $finance->getFinance()->getId() == $idFinance ){
    			// print($finance->getId());
    			return $finance;
    		}
    	}
    	// exit;
    	return null;
    }

	public function getId() {
		return $this->id;
	}

	public function setFinances( $finances ){
		$this->finances = $finances;
	}

	public function getFinances(){
		return $this->finances;
	}

	public function addFinance( Finance $finance ){
		$this->finances[] = $finance;
	}

	public function setStock( $stock ){
		$this->stock = $stock;
	}

	public function getStock(){
		return $this->stock;
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