<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="user_setting")
 */
Class Setting {
	/** 
	 * @MongoDB\Id
	 */
	private $id; 

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User") */
    private $user;

    /** @MongoDB\ReferenceMany(targetDocument="Document\Stock\Stock") */
    private $stocks = array();

	/** @MongoDB\String */
	private $displaySettings;

    public function getStockById( $idStock ){
    	foreach ( $this->stocks as $oStock ) {
    		if ( $idStock == $oStock->getId() ){
    			return $oStock;
    		}
    	}

    	return null;
    }

	public function getId() {
		return $this->id;
	}

	public function setUser( $user ){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

	public function addStock( \Document\Stock\Stock $stock ){
		$this->stocks[] = $stock;
	}

	public function setStocks( $stocks ){
		$this->stocks = $stocks;
	}

	public function getStocks(){
		return $this->stocks;
	}

	public function setDisplaySettings( $settings ){
		if (is_array($settings)) {
			$this->displaySettings = serialize($settings);
		}
	}

	public function addDisplaySetting( $setting ){
		$settings = $this->getDisplaySettings();
		if (is_array($settings)) {
			$this->setDisplaySettings(array_merge($settings, $setting));
		}else {
			$this->setDisplaySettings(array_merge($settings, (array)$setting));
		}
	}

	public function getDisplaySettings(){
		return unserialize($this->displaySettings);
	}
}