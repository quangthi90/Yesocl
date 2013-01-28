<?php
use Document\Attribute\value;

class ModelAttributeValue extends Doctrine {
	public function addValue( $data = array(), $attribute_id ) {
		if ( !isset($data['value']) ){
			return false;
		}
		$value_input = $data['value'];
		
		
		// Name is require
		if ( !isset($value_input['name']) || empty($value_input['name']) ){
			return false;
		}
		
		$value = new value();
		$value->setName( $value_input['name'] );
		
		$attribute_repository = $this->dm->getRepository('Document\Attribute\Attribute');
		
		if ( isset($value_input['attributes']) && count($value_input['attributes']) > 0 ){
			foreach ( $value_input['attributes'] as $reference_attribute_id ){
				$reference_attributes[] = $attribute_repository->find( $reference_attribute_id );
			}
			
			$value->setReferenceAttributes( $reference_attributes );
		}else{
			$value->setReferenceAttributes( array() );
		}
		
		$attribute = $attribute_repository->find( $attribute_id );
		$attribute->addValue( $value );
		
		$this->dm->flush();
		
		return true;
	}

	public function editValue( $id, $data = array() ) {
		if ( !isset($data['value']) ){
			return false;
		}
		$value_input = $data['value'];
		
		// Name is require
		if ( !isset($value_input['name']) || empty($value_input['name']) ){
			return false;
		}
		
		$attribute_repository = $this->dm->getRepository('Document\Attribute\Attribute');
		
		$attribute = $attribute_repository->findOneBy( array('values.id' => $id) );
		
		foreach ( $attribute->getValues() as $value ){
			if ( $value->getId() == $id ){
				$value->setName( $value_input['name'] );
				break;
			}
		}
		
		if ( isset($value_input['attributes']) && count($value_input['attributes']) > 0 ){
			foreach ( $value_input['attributes'] as $reference_attribute_id ){
				$reference_attributes[] = $attribute_repository->find( $reference_attribute_id );
			}
			
			$value->setReferenceAttributes( $reference_attributes );
		}else{
			$value->setReferenceAttributes( array() );
		}
		
		$this->dm->flush();
		
		return true;
	}

	public function deleteValue( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$attribute = $this->dm->getRepository('Document\Attribute\Attribute')->findOneBy( array('values.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $attribute->getValues() as $value ){
					if ( $value->getId() == $id ){
						$attribute->getValues()->removeElement( $value );
						break;
					}
				}
			}
		}
		
		$this->dm->flush();
	}
}
?>