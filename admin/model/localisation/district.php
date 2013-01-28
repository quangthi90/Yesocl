<?php
use Document\Localisation\District;

class ModelLocalisationDistrict extends Doctrine {
	public function addDistrict( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['city']) || empty($data['city']) ){
			return false;
		}
		
		$city = $this->dm->getRepository('Document\Localisation\City')->find( $data['city'] );
		
		if ( !$city ){
			return false;
		}
		
		$district = new District();
		$district->setName( $data['name'] );
		$district->setCity( $city );
		
		if ( isset($data['status']) ){
			$district->setStatus( $data['status'] );
		}

		$this->dm->persist( $district );
		$this->dm->flush();
	}

	public function editDistrict( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['city']) || empty($data['city']) ){
			return false;
		}
		
		$district = $this->dm->getRepository('Document\Localisation\District')->find( $id );
		
		if ( !$district ){
			return false;
		}

		$district->setName( $data['name'] ); 
		
		if ( $district->getCity() && $district->getCity()->getId() != $data['city'] ){
			$city = $this->dm->getRepository('Document\District\City')->find( $data['city'] );
			
			if ( !$city ){
				return false;
			}
		
			$district->setCity( $city );
		} 
		
		if ( isset($data['status']) ){
			$district->setStatus( $data['status'] );
		}

		$this->dm->flush();
	}

	public function deleteDistrict( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$district = $this->dm->getRepository( 'Document\Localisation\District' )->find( $id );

				$this->dm->remove($district);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getDistrict( $district_id ) {
		return $this->dm->getRepository( 'Document\Localisation\District' )->find( $district_id );
	}

	public function getDistricts( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Localisation\District' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalDistricts() {
		$districts = $this->dm->getRepository( 'Document\Localisation\District' )->findAll();

		return count($districts);
	}
}
?>