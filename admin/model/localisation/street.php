<?php
use Document\Localisation\Street;

class ModelLocalisationStreet extends Doctrine {
	public function addStreet( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['district']) || empty($data['district']) ){
			return false;
		}
		
		$district = $this->dm->getRepository('Document\Localisation\district')->find( $data['district'] );
		
		if ( !$district ){
			return false;
		}
		
		$street = new Street();
		$street->setName( $data['name'] );
		$street->setdistrict( $district );
		
		if ( isset($data['status']) ){
			$street->setStatus( $data['status'] );
		}

		$this->dm->persist( $street );
		$this->dm->flush();
	}

	public function editStreet( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['district']) || empty($data['district']) ){
			return false;
		}
		
		$street = $this->dm->getRepository('Document\Localisation\Street')->find( $id );
		
		if ( !$street ){
			return false;
		}

		$street->setName( $data['name'] ); 
		
		if ( $street->getdistrict() && $street->getdistrict()->getId() != $data['district'] ){
			$district = $this->dm->getRepository('Document\Street\district')->find( $data['district'] );
			
			if ( !$district ){
				return false;
			}
		
			$street->setdistrict( $district );
		} 
		
		if ( isset($data['status']) ){
			$street->setStatus( $data['status'] );
		}

		$this->dm->flush();
	}

	public function deleteStreet( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$street = $this->dm->getRepository( 'Document\Localisation\Street' )->find( $id );

				$this->dm->remove($street);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getStreet( $street_id ) {
		return $this->dm->getRepository( 'Document\Localisation\Street' )->find( $street_id );
	}

	public function getStreets( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Localisation\Street' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalStreets() {
		$streets = $this->dm->getRepository( 'Document\Localisation\Street' )->findAll();

		return count($streets);
	}
}
?>