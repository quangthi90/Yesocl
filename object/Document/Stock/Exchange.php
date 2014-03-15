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
	private $highPrice;

	/** @MongoDB\Float */
	private $lowPrice;

	/** @MongoDB\Int */
	private $volume;

	/** @MongoDB\Date */
	private $created;

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

	public function getHighPrice(){
		return $this->highPrice;
	}

	public function setHighPrice( $highPrice ){
		$this->highPrice = $highPrice;
	}

	public function getLowPrice(){
		return $this->lowPrice;
	}

	public function setLowPrice( $lowPrice ){
		$this->lowPrice = $lowPrice;
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