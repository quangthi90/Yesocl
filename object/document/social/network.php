<?php
namespace Document\Social;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="social_network")
 */
Class Network {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $name;

	/** 
	 * @MongoDB\String 
	 */
	private $code;

    /** @MongoDB\ReferenceMany(targetDocument="Document\User\User", mappedBy="socialNetwork") */
	private $users = array();
	
	/** @MongoDB\Boolean */
	private $status;

	public function getId() {
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

	public function addUser( User $user ){
		$this->users[] = $user;
	}

	public function setUsers( $users ){
		$this->users = $users;
	}

	public function getUsers(){
		return $this->users;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}