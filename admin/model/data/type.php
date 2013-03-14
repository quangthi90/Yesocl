<?php
use Document\Data\Type;

class ModelDataType extends Doctrine {
	public function addType( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$type = new Type();
		$type->setName( $data['name'] );

		$this->dm->persist( $type );
		$this->dm->flush();
	}

	public function editType( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$type = $this->dm->getRepository('Document\Data\Type')->find( $id );
		
		if ( !$type ){
			return false;
		}

		$type->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteType( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$type = $this->dm->getRepository( 'Document\Data\Type' )->find( $id );

				$this->dm->remove($type);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getType( $type_id ) {
		return $this->dm->getRepository( 'Document\Data\Type' )->find( $type_id );
	}

	public function getTypes( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Data\Type' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalTypes() {
		$types = $this->dm->getRepository( 'Document\Data\Type' )->findAll();

		return count($types);
	}
}
?>