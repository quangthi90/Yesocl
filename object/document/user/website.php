<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Website {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $url;

	/**
	 * @MongoDB\String
	 */
	private $visible;

	public function getId(){
		return $this->id;
	}

	public function setUrl( $url ){
		$this->url = $url;
	}

	public function getUrl(){
		return $this->url;
	}

	public function setVisible( $visible ){
		$this->visible = $visible;
	}

	public function getVisible(){
		return $this->visible;
	}
}