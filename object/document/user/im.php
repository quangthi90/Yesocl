<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Im {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $im;

	/** @MongoDB\String */
	private $type;
	
	/** @MongoDB\String */
	private $visible;

	public function getId(){
		return $this->id;
	}

	public function setIm( $im ){
		$this->im = $im;
	}

	public function getIm(){
		return $this->im;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

	public function setVisible( $visible ){
		$this->visible = $visible;
	}

	public function getVisible(){
		return $this->visible;
	}
}