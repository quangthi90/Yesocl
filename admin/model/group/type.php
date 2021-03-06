<?php
use Document\Group\Type;

class ModelGroupType extends Model {
	public function addType( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$type = new type();
		$type->setName( $data['name'] );

		$this->dm->persist( $type );
		$this->dm->flush();
	}

	public function editType( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$type = $this->dm->getRepository('Document\Group\Type')->find( $id );

		$type->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteType( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$type = $this->dm->getRepository( 'Document\Group\Type' )->find( $id );

				foreach ($type->getGroups() as $group) {
					$this->dm->remove( $group );
				}

				$this->dm->remove($type);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getType( $type_id ) {
		return $this->dm->getRepository( 'Document\Group\Type' )->find( $type_id );
	}

	public function getTypes( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Group\Type' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalTypes() {
		$types = $this->dm->getRepository( 'Document\Group\Type' )->findAll();

		return count($types);
	}
}
?>