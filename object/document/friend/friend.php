<?php
namespace Document\Friend;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;

/** @MongoDB\EmbeddedDocument */
Class Friend {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** 
	 * @MongoDB\String
	 */
	private $group_id;

	public function getId() {
		return $this->id;
	}

	public function setGroupId( $group_id ){
		$this->group_id = $group_id;
	}

	public function getGroupId(){
		return $this->group_id;
	}
}