<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="stock_market")
 */
Class Market {
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
	private $code;

	/** 
	 * @MongoDB\Int
	 */
	private $order;

	/** 
	 * @MongoDB\EmbedMany(targetDocument="Exchange") 
	 */
	private $exchanges = array();

	/** @MongoDB\ReferenceMany(targetDocument="Stock", mappedBy="market") */
	private $stocks = array();
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\Date */
	private $created;

	public function getId() {
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setCode( $code ){
		$this->code = $code;
	}

	public function getCode(){
		return $this->code;
	}

	public function setOrder( $order ){
		$this->order = $order;
	}

	public function getOrder(){
		return $this->order;
	}

	public function addExchange( Exchange $exchange ){
		$this->exchanges[] = $exchange;
	}

	public function setExchanges( $exchanges ){
		$this->exchanges = $exchanges;
	}

	public function getExchanges(){
		return $this->exchanges;
	}

	public function addStock( Stock $stock ){
		$this->stocks[] = $stock;
	}

	public function setStocks( $stocks ){
		$this->stocks = $stocks;
	}

	public function getStocks(){
		return $this->stocks;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}
}