<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(collection="user_background")
 */
Class Background {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

    /** @MongoDB\EmbedMany(targetDocument="Experience") */
    private $experiences = array();

    /** @MongoDB\EmbedMany(targetDocument="Education") */
    private $educations = array();

    /** @MongoDB\String */
    private $interests;

    /** @MongoDB\Date */
	private $birthday;

	/** @MongoDB\Boolean */
    private $maritalStatus;

    /** @MongoDB\String */
	private $adviceForContact;

	public function getId(){
		return $this->id;
	}

	public function addExperience( Experience $experience ){
		$this->experiences[] = $experience;
	}

	public function setExperiences( $experiences ){
		$this->experiences = $experiences;
	}

	public function getExperiences(){
		return $this->experiences;
	}

	public function addEducation( Education $education ){
		$this->educations[] = $education;
	}

	public function setEducations( $educations ){
		$this->educations = $educations;
	}

	public function getEducations(){
		return $this->educations;
	}

	public function setInterests( $interests ){
		$this->interests = $interests;
	}

	public function getInterests(){
		return $this->interests;
	}

	public function setBirthday( $birthday ){
		$this->birthday = $birthday;
	}

	public function getBirthday(){
		return $this->birthday;
	}

	public function setMaritalStatus( $maritalStatus ){
		$this->maritalStatus = $maritalStatus;
	}

	public function getMaritalStatus(){
		return $this->maritalStatus;
	}

	public function setAdviceForContact( $adviceForContact ){
		$this->adviceForContact = $adviceForContact;
	}

	public function getAdviceForContact(){
		return $this->adviceForContact;
	}
}