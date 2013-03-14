<?php
use Document\Data\Value;

class ModelDataValue extends Doctrine {
	public function addValue( $data = array() ) {
		// Name is require
		if ( !isset($data['value']) || empty($data['value']) ){
			return false;
		}

		// Type is require
		if ( !isset($data['type']) || empty($data['type']) ){
			return false;
		}
		
		$value = new Value();
		$value->setValue( $data['value'] );

		$type = $this->dm->getRepository('Document\Data\Type')->find( $data['type'] );
		$value->setType( $type );

		$this->dm->persist( $value );
		$this->dm->flush();
	}

	public function editValue( $id, $data = array() ) {
		// Name is require
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

		return $this->dm->getRepository( 'Document\Data\Value' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalValues() {
		$values = $this->dm->getRepository( 'Document\Data\Value' )->findAll();

		return count($values);
	}
}
?>