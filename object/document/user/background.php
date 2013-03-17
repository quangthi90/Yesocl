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
    private $experiencies = array();

    /** @MongoDB\EmbedMany(targetDocument="Education") */
    private $educations = array();

    /** @MongoDB\String */
    private $interest;

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
		$this->experiencies[] = $experience;
	}

	public function setExperiencies( $experiencies ){
		$this->experiencies = $experiencies;
	}

	public function getExperiencies(){
		return $this->experiencies;
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

	public function setInterest( $interest ){
		$this->interest = $interest;
	}

	public function getInterest(){
		return $this->interest;
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