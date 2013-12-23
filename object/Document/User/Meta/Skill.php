<?php
namespace Document\User\Meta;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Skill {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $skill;

	public function getId(){
		return $this->id;
	}

	public function setSkill( $skill ){
		$this->skill = $skill;
	}

	public function getSkill(){
		return $this->skill;
	}
}