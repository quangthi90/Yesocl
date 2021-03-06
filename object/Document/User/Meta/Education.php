<?php
namespace Document\User\Meta;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Education {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $school;

	/** @MongoDB\String */
	private $school_id;

	/** @MongoDB\String */
	private $started;

	/** @MongoDB\String */
	private $ended;

	/** @MongoDB\String */
	private $degree;

	/** @MongoDB\String */
	private $degree_id;

	/** @MongoDB\String */
	private $fieldOfStudy;

	/** @MongoDB\String */
	private $fieldOfStudy_id;

	/** @MongoDB\String */
	private $grace;

	/** @MongoDB\String */
    private $societies;

    /** @MongoDB\String */
	private $description;

	public function getId(){
		return $this->id;
	}

	public function setSchool( $school ) {
		$this->school = $school;
	}

	public function getSchool() {
		return $this->school;
	}

	public function setSchoolId( $school_id ) {
		$this->school_id = $school_id;
	}

	public function getSchoolId() {
		return $this->school_id;
	}

	public function setStarted( $started ){
		$this->started = $started;
	}

	public function getStarted(){
		return $this->started;
	}

	public function setEnded( $ended ){
		$this->ended = $ended;
	}

	public function getEnded(){
		return $this->ended;
	}

	public function setDegree( $degree ) {
		$this->degree = $degree;
	}

	public function getDegree() {
		return $this->degree;
	}

	public function setDegreeId( $degree_id ) {
		$this->degree_id = $degree_id;
	}

	public function getDegreeId() {
		return $this->degree_id;
	}

	public function setFieldOfStudy( $fieldOfStudy ) {
		$this->fieldOfStudy = $fieldOfStudy;
	}

	public function getFieldOfStudy() {
		return $this->fieldOfStudy;
	}

	public function setFieldOfStudyId( $fieldOfStudy_id ) {
		$this->fieldOfStudy_id = $fieldOfStudy_id;
	}

	public function getFieldOfStudyId() {
		return $this->fieldOfStudy_id;
	}

	public function setGrace( $grace ) {
		$this->grace = $grace;
	}

	public function getGrace() {
		return $this->grace;
	}

	public function setSocieties( $societies ){
		$this->societies = $societies;
	}

	public function getSocieties(){
		return $this->societies;
	}

	public function setDescription( $description ) {
		$this->description = $description;
	}

	public function getDescription() {
		return $this->description;
	}
}