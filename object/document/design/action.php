<?php
namespace Document\Design;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="design_action")
 */
Class Action {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;

	/** @MongoDB\String */
	private $code;

	/** @MongoDB\Int */
	private $order;

	/** @MongoDB\ReferenceMany(targetDocument="Layout", mappedBy="actions") */
    private $layouts = array();

	public function getId(){
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

	public function addLayout( Layout $layout ){
		$this->layouts[] = $layout;
	}

	public function setLayouts( $layouts ){
		$this->layouts = $layouts;
	}

	public function getLayouts(){
		return $this->layouts;
	}
}