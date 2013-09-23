<?php
use Document\Attribute\Group;

class ModelAttributeGroup extends Model {
	public function addGroup( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = new group();
		$group->setName( $data['name'] );

		$this->dm->persist( $group );
		$this->dm->flush();
	}

	public function editGroup( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = $this->dm->getRepository('Document\Attribute\Group')->find( $id );

		$group->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteGroup( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$group = $this->dm->getRepository( 'Document\Attribute\Group' )->find( $id );

				$this->dm->remove($group);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getGroup( $group_id ) {
		return $this->dm->getRepository( 'Document\Attribute\Group' )->find( $group_id );
	}

	public function getGroups( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Attribute\Group' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalGroups() {
		$groups = $this->dm->getRepository( 'Document\Attribute\Group' )->findAll();

		return count($groups);
	}
}
?>