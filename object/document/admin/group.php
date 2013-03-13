<?php
namespace Document\Admin;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="admin_group")
 */
Class Group {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $name;

    /** @MongoDB\ReferenceMany(targetDocument="Admin", mappedBy="groupAdmin") */
	private $admins = array();
	
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

	public function addAdmin( Admin $admin ){
		$this->admins[] = $admin;
	}

	public function setAdmins( $admins ){
		$this->admins = $admins;
	}

	public function getAdmins(){
		return $this->admins;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}