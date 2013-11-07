<?php
use Document\Company\GroupMember;

class ModelCompanyGroupMember extends Model {
	public function addGroupMember( $company_id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$company = $this->dm->getRepository('Document\Company\Company')->find( $company_id );

		if ( !$company ){
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
				$action = $this->dm->getRepository('Document\Company\Action')->find( $action_id );
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
		
		$company->addGroupMember( $group_member );
		
		$this->dm->flush();
		
		return true;
	}

	public function editGroupMember( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$company = $this->dm->getRepository('Document\Company\Company')->findOneBy(array(
			'GroupMembers.id' => $id
		));

		if ( !$company ){
			return false;
		}

		$group_members = $company->getGroupMembers();
		foreach ( $group_members as $key => $group_member ) {
			if ( $group_member->getId() == $id ){
				$group_member->setName( $data['name'] );

				if ( isset($data['status']) || !empty($data['status']) ){
					$group_member->setStatus( $data['status'] );
				}

				if ( isset($data['actions']) || !empty($data['actions']) ){
					$group_member->setActions( array() );
					foreach ( $data['actions'] as $action_id ) {
						$action = $this->dm->getRepository('Document\Company\Action')->find( $action_id );
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
		$company->setGroupMembers( $group_members );
		
		$this->dm->flush();
		
		return true;
	}

	public function deleteGroupMember( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$company = $this->dm->getRepository('Document\Company\Company')->findOneBy( array('GroupMembers.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $company->getGroupMembers() as $group_member ){
					if ( $group_member->getId() == $id ){
						$company->getGroupMembers()->removeElement( $group_member );
						break;
					}
				}
			}
		}
		
		$this->dm->flush();
	}
}
?>