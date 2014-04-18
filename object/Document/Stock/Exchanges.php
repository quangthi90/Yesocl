<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="stock_exchange")
 */
Class Exchanges {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\EmbedMany(targetDocument="Exchange")
	 */
	private $exchanges = array();

	/** @MongoDB\ReferenceOne(targetDocument="Stock") */
	private $stock;

	public function getExchangeByCreated( $created ){
		foreach ( $this->exchanges as $oExchange ) {
			if ( $oExchange->getCreated == $created ){
				return $oExchange;
			}
		}

		return null;
	}

	public function getExchangeById( $idExchange ){
		foreach ( $this->exchanges as $oExchange ) {
			if ( $oExchange->getId() == $idExchange ){
				return $oExchange;
			}
		}

		return null;
	}

	public function getId() {
		return $this->id;
	}

	public function addExchange( Exchange $exchange ){
		$this->exchanges[] = $exchange;
		// var_dump($exchange->getCreated()); print("<br>");
		if ( !$this->stock->getLastExchange() || $exchange->getCreated() > $this->stock->getLastExchange()->getCreated() ){
			// Update Pre last Exchange
			$this->stock->setPreLastExchange( $this->stock->getLastExchange() );

			// Update last Exchange
			$this->stock->setLastExchange( $exchange );
			if ( $this->stock->getLastExchange()->getClosePrice() >= $exchange->getClosePrice() ){
				$this->stock->setIsDown( true );
			}else{
				$this->stock->setIsDown( false );
			}
		}
	}

	public function setExchanges( $exchanges ){
		$this->exchanges = $exchanges;
	}

	public function getExchanges(){
		return $this->exchanges;
	}
}