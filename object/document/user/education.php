<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Education {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $school;

	/** @MongoDB\Date */
	private $started;

	/** @MongoDB\Date */
	private $ended;

	/** @MongoDB\String */
	private $degree;

	/** @MongoDB\String */
	private $fieldOfStudy;

	/** @MongoDB\String */
	private $grace;

	/** @MongoDB\EmbedMany(targetDocument="Experience") */
    private $societies = array();

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

	public function setFieldOfStudy( $fieldOfStudy ) {
		$this->fieldOfStudy = $fieldOfStudy;
	}

	public function getFieldOfStudy() {
		return $this->fieldOfStudy;
	}

	public function setGrace( $grace ) {
		$this->grace = $grace;
	}

	public function getGrace() {
		return $this->grace;
	}

	public function addSociety( Societiy $society ){
		$this->societies[] = $society;
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