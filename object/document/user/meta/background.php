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
	private $summary;

    /** @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Skill") */
    private $skills = array();

    public function getEducationById( $id ){
    	foreach ( $this->educations as $education ) {
    		if ( $education->getId() == $id ){
    			return $education;
    		}
    	}

    	return null;
    }

    public function getExperienceById( $id ){
    	foreach ( $this->experiences as $experience ) {
    		if ( $experience->getId() == $id ){
    			return $experience;
    		}
    	}

    	return null;
    }

    public function getSkillById( $id ){
    	foreach ( $this->skills as $skill ) {
    		if ( $skill->getId() == $id ){
    			return $skill;
    		}
    	}

    	return null;
    }

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

	public function getCurrentExperience() {
		foreach ($experiences as $experience) {
			if ($experience->getCurrent()) {
				return $experience;
			}
		}

		return null;
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

	public function getCurrentEducation() {
		foreach ($educations as $education) {
			if ($education->getCurrent()) {
				return $education;
			}
		}

		return null;
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

	public function setSummary( $summary ) {
		$this->summary = $summary;
	}

	public function getSummary() {
		return $this->summary;
	}

	public function addSkill( Education $skill ){
		$this->skills[] = $skill;
	}

	public function setSkills( $skills ){
		$this->skills = $skills;
	}

	public function getSkills(){
		return $this->skills;
	}
}