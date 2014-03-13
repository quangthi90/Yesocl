<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(db="yesocl", collection="stock")
 * @SOLR\Document(collection="stock")
 */
Class Stock {
	/** 
	 * @MongoDB\Id 
	 * @SOLR\Field(type="id")
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
	 */
	private $name;

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
	 */
	private $code;

	/** 
	 * @MongoDB\EmbedMany(targetDocument="Exchange")
	 */
	private $exchanges = array();

	/** @MongoDB\ReferenceMany(targetDocument="Market", inversedBy="stocks") */
	private $market;
	
	/** @MongoDB\Boolean */
	private $status = true;

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

	public function addExchange( Exchange $exchange ){
		$this->exchanges[] = $exchange;
	}

	public function setExchanges( $exchanges ){
		$this->exchanges = $exchanges;
	}

	public function getExchanges(){
		return $this->exchanges;
	}

	public function setMarket( $market ){
		$this->market = $market;
	}

	public function getMarket(){
		return $this->market;
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