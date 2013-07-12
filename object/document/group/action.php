<?php
namespace Document\Group;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="group_action") */
Class Action {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;

	/** @MongoDB\String */
	private $code;

	/** @MongoDB\Int */
	private $order;

	/** @MongoDB\ReferenceOne(targetDocument="GroupMember", inversedBy="actions") */
    private $groupMember;

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

	public function setGroupMember( $groupMember ){
		$this->groupMember = $groupMember;
	}

	public function getGroupMember(){
		return $this->groupMember;
	}
}