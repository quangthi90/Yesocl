<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

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

	/** @MongoDB\ReferenceMany(targetDocument="Stock", mappedBy="market") */
	private $stocks = array();

	/** @MongoDB\ReferenceOne(targetDocument="Stock") */
	private $stockMarket;
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\Date */
	private $created;

	public function formatToCache() {
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'code' => $this->code,
			'order' => $this->order
		);
	}

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
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

	public function addStock( Stock $stock ){
		$this->stocks[] = $stock;
	}

	public function setStocks( $stocks ){
		$this->stocks = $stocks;
	}

	public function getStocks(){
		return $this->stocks;
	}

	public function setStockMarket( $stockMarket ){
		$this->stockMarket = $stockMarket;
	}

	public function getStockMarket(){
		return $this->stockMarket;
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