<?php
namespace Document\User\Meta;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\EmbeddedDocument
 */
Class Background {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

    /** @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Experience") */
    private $experiences = array();

    /** @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Education") */
    private $educations = array();

    /** @MongoDB\String */
    private $interest;

	/** @MongoDB\Boolean */
    private $maritalStatus;

    /** @MongoDB\String */
	private $adviceForContact;

    /** @MongoDB\String */
	private $sumary;

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

	public function setInterest( $interest ){
		$this->interest = $interest;
	}

	public function getInterest(){
		return $this->interest;
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

	public function setSumary( $sumary ) {
		$this->sumary = $sumary;
	}

	public function getSumary() {
		return $this->sumary;
	}
}