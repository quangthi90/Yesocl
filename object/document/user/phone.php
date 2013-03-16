<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Phone {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $phone;

	/** @MongoDB\String */
	private $type;
	
	/** @MongoDB\String */
	private $visible;

	public function getId(){
		return $this->id;
	}

	public function setPhone( $phone ){
		$this->phone = $phone;
	}

	public function getPhone(){
		return $this->phone;
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