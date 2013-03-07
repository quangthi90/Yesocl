<?php
use Document\Information\School;

class ModelInformationSchool extends Doctrine {
	public function addSchool( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$school = new School();
		$school->setName( $data['name'] );

		$this->dm->persist( $school );
		$this->dm->flush();
	}

	public function editSchool( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$school = $this->dm->getRepository('Document\Information\School')->find( $id );
		
		if ( !$school ){
			return false;
		}

		$school->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteSchool( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$school = $this->dm->getRepository( 'Document\Information\School' )->find( $id );

				$this->dm->remove($school);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getSchool( $school_id ) {
		return $this->dm->getRepository( 'Document\Information\School' )->find( $school_id );
	}

	public function getSchools( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Information\School' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalSchools() {
		$schools = $this->dm->getRepository( 'Document\Information\school' )->findAll();

		return count($schools);
	}
}
?>