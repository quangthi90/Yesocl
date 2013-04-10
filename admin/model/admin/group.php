<?php
use Document\Admin\Group,
	Document\Admin\Permission;

class ModelAdminGroup extends Doctrine {
	/**
	 * Create new Group
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	array Data{
	 * 		string Name
	 * 	}
	 * @return: boolean
	 */
	public function addGroup( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = new group();
		$group->setName( $data['name'] );

		if ( isset($data['layouts']) ){
			foreach ( $data['layouts'] as $layoutId => $actionIds ) {
				$permission = new Permission();
				$layout = $this->dm->getRepository( 'Document\Design\Layout' )->find( $layoutId );
				$permission->setLayout( $layout );

				foreach ( $actionIds as $actionId ) {
					$action = $this->dm->getRepository( 'Document\Design\Action' )-> find( $actionId );
					$permission->addAction( $action );
				}
				$this->dm->persist( $permission );
				$group->addPermission( $permission );
			}
		}

		$this->dm->persist( $group );
		$this->dm->flush();
		
		return true;
	}

	/**
	 * Edit Group
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	int Group ID
	 * 	array Data{
	 * 		string Name
	 * 	}
	 * @return: boolean
	 */
	public function editGroup( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = $this->dm->getRepository('Document\Admin\Group')->find( $id );

		$group->setName( $data['name'] ); 

		if ( isset($data['layouts']) ){
			$permissions = array();
			foreach ( $data['layouts'] as $layoutId => $actionIds ) {
				$permission = new Permission();
				$layout = $this->dm->getRepository( 'Document\Design\Layout' )->find( $layoutId );
				if ( !$layout ){
					continue;
				}
				$permission->setLayout( $layout );
				$actions = array();
				foreach ( $actionIds as $actionId ) {
					$action = $this->dm->getRepository( 'Document\Design\Action' )-> find( $actionId );
					if ( !$action ){
						continue;
					}
					$actions[] = $action;
				}
				$permission->setActions( $actions );
				$this->dm->persist( $permission );
				$permissions[] = $permission;
			}
			$group->setPermissions( $permissions );
		}

		$this->dm->flush();
		
		return true;
	}

	/**
	 * Delete Group
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	array Data{
	 * 		int Group ID
	 * 	}
	 * @return: void
	 */
	public function deleteGroup( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$group = $this->dm->getRepository( 'Document\Admin\Group' )->find( $id );

				$this->dm->remove($group);
			}
		}
		
		$this->dm->flush();
	}
	
	/**
	 * Get One Group
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	array Data{
	 * 		string Name
	 * 	}
	 * @return: boolean
	 */
	public function getGroup( $group_id ) {
		return $this->dm->getRepository( 'Document\Admin\Group' )->find( $group_id );
	}

	/**
	 * Get List Groups
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	array Data{
	 * 		int Limit
	 * 		int Start
	 * 	}
	 * @return: array Object Group
	 */
	public function getGroups( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Admin\Group' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}

	public function getAllGroups() {
		return $this->dm->getRepository( 'Document\Admin\Group' )->findAll();
	}
	
	/**
	 * Get Total Group
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: empty
	 * @return: int Total Group
	 */
	public function getTotalGroups() {
		$groups = $this->dm->getRepository( 'Document\Admin\Group' )->findAll();

		return count($groups);
	}
}
?>