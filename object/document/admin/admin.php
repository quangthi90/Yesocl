<?php
namespace Document\Admin;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="admin")
 */
Class Admin {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $username;

	/** @MongoDB\String */
	private $password;

	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="admins") */
    private $group;
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\String */
	private $salt;

	public function getId(){
		return $this->id;
	}

	public function setUsername( $username ){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword( $password ){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setGroup( $group ){
		$this->group = $group;
	}

	public function getGroup(){
		return $this->group;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setSalt( $salt ){
		$this->salt = $salt;
	}

	public function getSalt(){
		return $this->salt;
	}
}