<?php
use Document\Group\GroupMember;

class ModelGroupGroupMember extends Doctrine {
	public function addGroupMember( $group_id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = $this->dm->getRepository('Document\Group\Group')->find( $group_id );

		if ( !$group ){
			return false;
		}
		
		$group_member = new GroupMember();
		$group_member->setName( $data['name'] );

		if ( !isset($data['status']) || empty($data['status']) ){
			$group_member->setStatus( $data['status'] );
		}

		$this->dm->persist( $group_member );
		
		$group->addGroupMember( $group_member );
		
		$this->dm->flush();
		
		return true;
	}

	public function editGroupMember( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy(array(
			'groupMembers.id' => $id
		));

		if ( !$group ){
			return false;
		}

		foreach ( $group->groupMembers as $key => $group_member ) {
			if ( $group_member->getId() == $id ){
				$group[$key]->setName( $data['name'] );

				if ( !isset($data['status']) || empty($data['status']) ){
					$group[$key]->setStatus( $data['status'] );
				}
			}
		}
		
		$this->dm->flush();
		
		return true;
	}

	public function deleteGroupMember( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array('groupMembers.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $group->getGroupMembers() as $group_member ){
					if ( $group_member->getId() == $id ){
						$group->getGroupMembers()->removeElement( $group_member );
						break;
					}
				}
			}
		}
		
		$this->dm->flush();
	}
}
?>