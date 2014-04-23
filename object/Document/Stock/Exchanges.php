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
	 * @MongoDB\Hash
	 */
	private $exchanges = array();

	/** @MongoDB\ReferenceOne(targetDocument="Stock") */
	private $stock;

	/**
	 * Calculate Max and Min price in a some day
	 * 2014/04/13
	 * Param:
	 *	- Int iDay
	 *	- Object system Doctrine systemDoctrine
	 */
	public function calculateRangePrice( $iDay, $systemDoctrine = null ){
        $oTimeLimit = clone $this->stock->getLastExchange()->getCreated();
        date_sub($oTimeLimit, date_interval_create_from_date_string($iDay . ' days'));
        $oTimeLimit = $oTimeLimit->getTimestamp();
        $aExchanges = $this->exchanges;
        // $aExchanges = array_reverse($aExchanges);

        $iMaxPrice = $this->stock->getLastExchange()->getHighPrice();
        $iMinPrice = $this->stock->getLastExchange()->getLowPrice();
        foreach ($aExchanges as $oExchange) {
            if ( $oExchange['created'] < $oTimeLimit ){
                break;
            }

            if ( $iMaxPrice < $oExchange['high_price'] ){
            	$iMaxPrice = $oExchange['high_price'];
            }

            if ( $iMinPrice > $oExchange['low_price'] ){
            	$iMinPrice = $oExchange['low_price'];
            }
        }

        $rangePrice = $this->stock->getRangePrice();
        $rangePrice[$iDay] = array(
    		'max_price' => $iMaxPrice,
    		'min_price' => $iMinPrice
    	);
        $this->stock->setRangePrice( $rangePrice );

        if ( $systemDoctrine != null ){
        	$systemDoctrine->flush();
        }
	}

	public function getRangePriceByDay( $iDay, $systemDoctrine ){
		if ( empty($this->stock->getRangePrice()[$iDay]) ){
			$this->calculateRangePrice( $iDay, $systemDoctrine );
		}

		return $this->stock->getRangePrice()[$iDay];
	}

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	foreach ( $this->rangePrice as $iDay => $aRange ) {
    		$this->calculateRangePrice( $iDay );
    	}
    }

    /** @MongoDB\PreUpdate */
    public function preUpdate()
    {
    	foreach ( $this->rangePrice as $iDay => $aRange ) {
    		$this->calculateRangePrice( $iDay );
    	}
    }

	public function getId() {
		return $this->id;
	}

	public function addExchange( $exchange ){
		$timestamp = $exchange->getCreated()->getTimestamp();
		$this->exchanges[$timestamp] = $exchange->formatToCache();
		krsort($this->exchanges);
		
		if ( !$this->stock->getLastExchange() || $exchange->getCreated() > $this->stock->getLastExchange()->getCreated() ){
			if ( $this->stock->getLastExchange()->getClosePrice() > $exchange->getClosePrice() ){
				$this->stock->setIsDown( true );
			}else{
				$this->stock->setIsDown( false );
			}
			// Update Pre last Exchange
			$this->stock->setPreLastExchange( $this->stock->getLastExchange() );
			// Update last Exchange
			$this->stock->setLastExchange( $exchange );
		}
	}

	public function setExchanges( $exchanges ){
		$this->exchanges = $exchanges;
	}

	public function getExchanges(){
		return $this->exchanges;
	}

	public function setStock( $stock ) {
		$this->stock = $stock;
	}

	public function getStock() {
		return $this->stock;
	}
}