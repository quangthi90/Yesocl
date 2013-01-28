<?php
use Document\customer\group;

class ModelCustomerGroup extends Doctrine {
	public function addgroup( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = new group();
		$group->setName( $data['name'] );
		
		if ( isset($data['status']) && !empty($data['status']) ){
			$group->setStatus( $data['status'] );
		}

		$this->dm->persist( $group );
		$this->dm->flush();
	}

	public function editGroup( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$group = $this->dm->getRepository('Document\customer\group')->find( $id );

		$group->setName( $data['name'] ); 

		if ( isset($data['status']) ){
			$status = $data['status'] === 1 ? true : false;
			
			$group->setStatus( $status );
		}

		$this->dm->flush();
	}

	public function deletegroup( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$group = $this->dm->getRepository( 'Document\customer\group' )->find( $id );

				$this->dm->remove($group);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getGroup( $group_id ) {
		return $this->dm->getRepository( 'Document\customer\group' )->find( $group_id );
	}

	public function getgroups( $data = array() ) {
		if (!isset($data['limit']) || !((int)$data['limit'] < 0)) {
			$data['limit'] = 15;
		}
		if (!isset($data['start']) || !((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$groups = $this->dm->getRepository( 'Document\customer\group' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );

		$results = array();
		foreach ($groups as $group_id => $group) {
			$results[] = array(
				'id' => $group_id,
				'name' => $group->getName(),
				'status' => $group->getStatus()
			);
		}

		return $results;
	}
}
?>