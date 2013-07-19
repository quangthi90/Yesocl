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

		if ( isset($data['status']) || !empty($data['status']) ){
			$group_member->setStatus( $data['status'] );
		}

		if ( isset($data['actions']) || !empty($data['actions']) ){
			$group_member->setActions( array() );
			foreach ( $data['actions'] as $action_id ) {
				$action = $this->dm->getRepository('Document\Group\Action')->find( $action_id );
				$group_member->addAction( $action );
			}
		}

		if ( isset($data['members']) || !empty($data['members']) ){
			$group_member->setMembers( array() );
			foreach ( $data['members'] as $member_id ) {
				$member = $this->dm->getRepository('Document\User\User')->find( $member_id );
				$group_member->addMember( $member );
			}
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

		$group_members = $group->getGroupMembers();
		foreach ( $group_members as $key => $group_member ) {
			if ( $group_member->getId() == $id ){
				$group_member->setName( $data['name'] );

				if ( isset($data['status']) || !empty($data['status']) ){
					$group_member->setStatus( $data['status'] );
				}

				if ( isset($data['actions']) || !empty($data['actions']) ){
					$group_member->setActions( array() );
					foreach ( $data['actions'] as $action_id ) {
						$action = $this->dm->getRepository('Document\Group\Action')->find( $action_id );
						$group_member->addAction( $action );
					}
				}

				if ( isset($data['members']) || !empty($data['members']) ){
					$group_member->setMembers( array() );
					foreach ( $data['members'] as $member_id ) {
						$member = $this->dm->getRepository('Document\User\User')->find( $member_id );
						$group_member->addMember( $member );
					}
				}

				$group_members[$key] = $group_member;
			}
		}
		$group->setGroupMembers( $group_members );
		
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