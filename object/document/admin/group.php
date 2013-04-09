<?php
namespace Document\Admin;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="admin_group")
 */
Class Group {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;

    /** @MongoDB\ReferenceMany(targetDocument="Admin", mappedBy="group") */
	private $admins = array();

	/** @MongoDB\EmbedMany(targetDocument="Permission") */
	private $permissions = array();
	
	/** @MongoDB\Boolean */
	private $status;

	public function getPermissionByLayoutId( $layout_id ){
		foreach ( $this->permissions as $permission ) {
			if ( $permission->getLayout()->getId() == $layout_id ){
				return $permission;
			}
		}

		return null;
	}

	public function getPermissionByActionId( $actions_id ){
		$permissions = array();
		foreach ( $this->permissions as $permission ) {
			$actions = $permission->getActions()->toArray();

			$actionIds = array_map(function($action){
				return $action->getId();
			}, $actions);

			if ( in_array($actions_id, $actionIds) ){
				$permissions[] = $permission;
			}
		}
		return $permissions;
	}

	public function getId(){
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

	public function addPermission( Permission $permission ){
		$this->permissions[] = $permission;
	}

	public function setPermissions( $permissions ){
		$this->permissions = $permissions;
	}

	public function getPermissions(){
		return $this->permissions;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}