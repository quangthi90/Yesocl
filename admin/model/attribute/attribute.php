<?php
use Document\Attribute\Attribute;

class ModelAttributeAttribute extends Doctrine {
	public function addAttribute( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['group']) || empty($data['group']) ){
			return false;
		}
		
		$group = $this->dm->getRepository('Document\Attribute\Group')->find( $data['group'] );
		
		if ( !$group ){
			return false;
		}
		
		$type = $this->dm->getRepository('Document\Attribute\Type')->find( $data['type'] );
		
		if ( !$type ){
			return false;
		}
		
		$attribute = new attribute();
		
		$attribute->setName( $data['name'] );
		
		$attribute->setGroup( $group );
		
		$attribute->setType( $type );
		
		if ( isset($data['required']) ){
			$attribute->setRequired( $data['required'] );
		}
		
		if ( isset($data['haveValue']) ){
			$attribute->setHaveValue( $data['haveValue'] );
		}
		
		$this->dm->persist( $attribute );
		
		$this->dm->flush();
	}

	public function editAttribute( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['group']) || empty($data['group']) ){
			return false;
		}
		
		$attribute = $this->dm->getRepository('Document\Attribute\Attribute')->find( $id );
		
		if ( !$attribute ){
			return false;
		}

		$attribute->setName( $data['name'] );
		
		if ( $attribute->getGroup() && $attribute->getGroup()->getId() != $data['group'] ){
			$group = $this->dm->getRepository('Document\Attribute\Group')->find( $data['group'] );
			
			if ( !$group ){
				return false;
			}
		
			$attribute->setGroup( $group );
		} 
		
		if ( !$attribute->getType() || $attribute->getType()->getId() != $data['type'] ){
			$type = $this->dm->getRepository('Document\Attribute\Type')->find( $data['type'] );
			
			if ( !$type ){
				return false;
			}
		
			$attribute->setType( $type );
		} 
		
		if ( isset($data['required']) ){
			$attribute->setRequired( $data['required'] );
		}
		
		if ( isset($data['haveValue']) ){
			$attribute->setHaveValue( $data['haveValue'] );
		}

		$this->dm->flush();
	}

	public function deleteAttribute( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$attribute = $this->dm->getRepository( 'Document\Attribute\Attribute' )->find( $id );

				$this->dm->remove($attribute);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getAttribute( $attribute_id ) {
		return $this->dm->getRepository( 'Document\Attribute\Attribute' )->find( $attribute_id );
	}

	public function getAttributes( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}
		
		if ( isset($data['group_id']) ){
			return $this->dm->getRepository( 'Document\Attribute\Attribute' )->findBy( array('group.id' => $data['group_id']) );
		}

		return $this->dm->getRepository( 'Document\Attribute\Attribute' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalAttributes() {
		$attributes = $this->dm->getRepository( 'Document\Attribute\Attribute' )->findAll();

		return count($attributes);
	}
}
?>