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
	private $private;

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

	public function setPrivate( $settings ){
		if (is_array($settings)) {
			$this->private = serialize($settings);
		}
	}

	public function addPrivate( $setting ){
		$settings = $this->getPrivate();

		if (is_array($setting)) {
			$this->setPrivate(array_merge($settings, $setting));
		}else {
			return FALSE;
		}
	}

	public function getPrivate(){
		$settings = unserialize($this->private);
		if ($settings !== FALSE) {
			return $settings;
		}else {
			return array();
		}
	}

	public function getPrivateByKey( $key ) {
		$settings = $this->getPrivate();
		if (isset($settings[$key])) {
			return $settings[$key];
		}else {
			return NULL;
		}
	}
}