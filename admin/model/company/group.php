<?php
use Document\Company\Group;

class ModelCompanyGroup extends Doctrine {
	public function addGroup( $data = array() ) {
		// name is required & isn't exist
		if ( isset( $data['name'] ) && !$this->isExistName( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$group = new Group();
		$group->setName( $data['name'] );
		$group->setDescription( $data['description'] );
		$group->setStatus( $data['status'] );

		$this->dm->persist( $group );
		$this->dm->flush();

		return true;
	}

	public function editGroup( $group_id, $data = array() ) {
		// name is required
		if ( isset( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$group = $this->dm->getRepository( 'Document\Company\Group' )->find( $group_id );
		if ( empty( $group ) ) {
			return false;
		}

		// name is exist
		if ( $group->getName() != $data['name'] && $this->isExistName( $data['name'] ) ) {
			return false;
		}

		$group->setName( $data['name'] );
		$group->setDescription( $data['description'] );
		$group->setStatus( $data['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteGroups( $data = array() ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$group = $this->dm->getRepository( 'Document\Company\Group' )->find( $id );

				if ( !empty( $group ) ) {
					foreach ($group->getCompanies as $company) {
						$this->dm->remove( $company );
					}

					$this->dm->remove( $group );
				}
			}
		}

		$this->dm->flush();
	}

	public function getGroup( $group_id ) {
		return $this->dm->getRepository( 'Document\Company\Group' )->find( $group_id );
	}

	public function getAllGroups() {
		return $this->dm->getRepository( 'Document\Company\Group' )->findAll();
	}

	public function getGroups( $data = array() ) {
		if ( isset( $data['start'] ) && $data['start'] >= 0 ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) && $data['limit'] > 0 ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 10;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Company\Group' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

		if ( isset( $data['filter_name'] ) ) {
			$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
		}

		if ( isset( $data['sort'] ) ) {
			if ( isset( $data['order'] ) && $data['order'] == 'desc' ) {
    			$query->sort( $data['sort'], 'desc' );
    		}else {
    			$query->sort( $data['sort'], 'asc' );
    		}
		}

		return $query->getQuery()->execute();
	}

	public function getTotalGroups( $data = array() ) {
		$query = $this->dm->createQueryBuilder( 'Document\Company\Group' );

		if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
    	}

		return count( $query->getQuery()->execute() );
	}

	public function isExistName( $name ) {
		$group = $this->dm->getRepository( 'Document\Company\Group' )->findOneBy( array( 'name' => strtolower( trim( $name ) ) ) );

		if ( !empty( $group ) ) {
			return true;
		}else {
			return false;
		}
	}
}
?>