<?php
use Document\Localisation\Ward;

class ModelLocalisationWard extends Model {
	public function addWard( $data = array() ) {
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
		
		$ward = new Ward();
		$ward->setName( $data['name'] );
		$ward->setdistrict( $district );
		
		if ( isset($data['status']) ){
			$ward->setStatus( $data['status'] );
		}

		$this->dm->persist( $ward );
		$this->dm->flush();
	}

	public function editWard( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['district']) || empty($data['district']) ){
			return false;
		}
		
		$ward = $this->dm->getRepository('Document\Localisation\Ward')->find( $id );
		
		if ( !$ward ){
			return false;
		}

		$ward->setName( $data['name'] ); 
		
		if ( $ward->getdistrict() && $ward->getdistrict()->getId() != $data['district'] ){
			$district = $this->dm->getRepository('Document\Ward\district')->find( $data['district'] );
			
			if ( !$district ){
				return false;
			}
		
			$ward->setdistrict( $district );
		} 
		
		if ( isset($data['status']) ){
			$ward->setStatus( $data['status'] );
		}

		$this->dm->flush();
	}

	public function deleteWard( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$ward = $this->dm->getRepository( 'Document\Localisation\Ward' )->find( $id );

				$this->dm->remove($ward);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getWard( $ward_id ) {
		return $this->dm->getRepository( 'Document\Localisation\Ward' )->find( $ward_id );
	}

	public function getWards( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Localisation\Ward' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalWards() {
		$wards = $this->dm->getRepository( 'Document\Localisation\Ward' )->findAll();

		return count($wards);
	}
}
?>