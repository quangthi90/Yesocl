<?php
use Document\Data\Value;

class ModelDataValue extends Doctrine {
	public function addValue( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		// Type is require
		if ( !isset($data['type']) || empty($data['type']) ){
			return false;
		}

		// Value is require
		if ( !isset($data['value']) || empty($data['value']) ){
			return false;
		}
		
		$value = new Value();
		$value->setname( $data['name'] );
		$value->setValue( $data['value'] );

		$type = $this->dm->getRepository('Document\Data\Type')->find( $data['type'] );
		$value->setType( $type );

		$this->dm->persist( $value );
		$this->dm->flush();
	}

	public function editValue( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		// Value is require
		if ( !isset($data['value']) || empty($data['value']) ){
			return false;
		}

		// Type is require
		if ( !isset($data['type']) || empty($data['type']) ){
			return false;
		}
		
		$value = $this->dm->getRepository('Document\Data\Value')->find( $id );
		
		if ( !$value ){
			return false;
		}

		$value->setname( $data['name'] );
		$value->setValue( $data['value'] ); 

		$type = $this->dm->getRepository('Document\Data\Type')->find( $data['type'] );
		$value->setType( $type );

		$this->dm->flush();
	}

	public function deleteValue( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$value = $this->dm->getRepository( 'Document\Data\Value' )->find( $id );

				$this->dm->remove($value);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getValue( $value_id ) {
		return $this->dm->getRepository( 'Document\Data\Value' )->find( $value_id );
	}

	public function getValues( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Data\Value' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

    	if ( isset( $data['filter_type_name'] ) ) {
    		$type_id = $this->dm->getRepository( 'Document\Data\Type' )->findOneBy( array( 'name' => trim( $data['filter_type_name'] ) ) )->getId();
    		$query->field( 'type.id' )->equals( $type_id );
    	}

    	if ( isset( $data['filter_type_code'] ) ) {
    		$type_id = $this->dm->getRepository( 'Document\Data\Type' )->findOneBy( array( 'code' => trim( $data['filter_type_code'] ) ) )->getId();
    		$query->field( 'type.id' )->equals( $type_id );
    	}
    	
    	if ( isset( $data['filter_type'] ) ) {
    		$query->field( 'type.id' )->equals( trim( $data['filter_type'] ) );
    	}

    	if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
    	}

    	if ( isset( $data['filter_value'] ) ) {
    		$query->field( 'value' )->equals( new \MongoRegex('/' . trim( $data['filter_value'] ) . '.*/i') );
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

	public function getAllValues( $data = array() ) {
		$query = $this->dm->createQueryBuilder( 'Document\Data\Value' );

    	if ( isset( $data['filter_type_name'] ) ) {
    		$type_id = $this->dm->getRepository( 'Document\Data\Type' )->findOneBy( array( 'name' => trim( $data['filter_type_name'] ) ) )->getId();
    		$query->field( 'type.id' )->equals( $type_id );
    	}

    	if ( isset( $data['filter_type_code'] ) ) {
    		$type_id = $this->dm->getRepository( 'Document\Data\Type' )->findOneBy( array( 'code' => trim( $data['filter_type_code'] ) ) )->getId();
    		$query->field( 'type.id' )->equals( $type_id );
    	}
    	
    	if ( isset( $data['filter_type'] ) ) {
    		$query->field( 'type.id' )->equals( trim( $data['filter_type'] ) );
    	}

    	if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
    	}

    	if ( isset( $data['filter_value'] ) ) {
    		$query->field( 'value' )->equals( new \MongoRegex('/' . trim( $data['filter_value'] ) . '.*/i') );
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
	
	public function getTotalValues( $data ) {
		$query = $this->dm->createQueryBuilder( 'Document\Data\Value' );

		if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
    	}

    	if ( isset( $data['filter_type_name'] ) ) {
    		$type_id = $this->dm->getRepository( 'Document\Data\Type' )->findOneBy( array( 'name' => trim( $data['filter_type_name'] ) ) )->getId();
    		$query->field( 'type.id' )->equals( $type_id );
    	}

    	if ( isset( $data['filter_type_code'] ) ) {
    		$type_id = $this->dm->getRepository( 'Document\Data\Type' )->findOneBy( array( 'code' => trim( $data['filter_type_code'] ) ) )->getId();
    		$query->field( 'type.id' )->equals( $type_id );
    	}

    	if ( isset( $data['filter_type'] ) ) {
    		$query->field( 'type.id' )->equals( trim( $data['filter_type'] ) );
    	}

    	if ( isset( $data['filter_value'] ) ) {
    		$query->field( 'value' )->equals( new \MongoRegex('/' . trim( $data['filter_value'] ) . '.*/i') );
    	}
    		
    	$values = $query->getQuery()->execute();

		return count($values);
	}
}
?>