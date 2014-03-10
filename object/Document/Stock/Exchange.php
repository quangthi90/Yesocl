<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Exchange {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** @MongoDB\Float */
	private $openPrice;

	/** @MongoDB\Float */
	private $closePrice;

	/** @MongoDB\Float */
	private $maxPrice;

	/** @MongoDB\Float */
	private $minPrice;

	/** @MongoDB\Int */
	private $volume;

	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    }

	public function getId() {
		return $this->id;
	}

	public function getOpenPrice(){
		return $this->openPrice;
	}

	public function setOpenPrice( $openPrice ){
		$this->openPrice = $openPrice;
	}

	public function getClosePrice(){
		return $this->closePrice;
	}

	public function setClosePrice( $closePrice ){
		$this->closePrice = $closePrice;
	}

	public function getMaxPrice(){
		return $this->maxPrice;
	}

	public function setMaxPrice( $maxPrice ){
		$this->maxPrice = $maxPrice;
	}

	public function getMinPrice(){
		return $this->minPrice;
	}

	public function setMinPrice( $minPrice ){
		$this->minPrice = $minPrice;
	}

	public function getVolume(){
		return $this->volume;
	}

	public function setVolume( $volume ){
		$this->volume = $volume;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}
}