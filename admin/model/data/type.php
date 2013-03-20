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

				$values = $this->dm->getRepository( 'Document\Data\value' )->findBy( array( 'type.id' => $id ) );
				foreach ($values as $value) {
					$this->dm->remove($value);
				}

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

		$query = $this->dm->createQueryBuilder( 'Document\Data\Type' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

    	if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . $data['filter_name'] . '.*/i') );
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
	
	public function getTotalTypes( $data ) {
		$query = $this->dm->createQueryBuilder( 'Document\Data\Type' );

		if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . $data['filter_name'] . '.*/i') );
    	}

		$types = $query->getQuery()->execute();

		return count($types);
	}
}
?>