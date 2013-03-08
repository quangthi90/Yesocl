<?php
use Document\Information\Degree;

class ModelInformationDegree extends Doctrine {
	public function addDegree( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$degree = new Degree();
		$degree->setName( $data['name'] );

		$this->dm->persist( $degree );
		$this->dm->flush();
	}

	public function editDegree( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$degree = $this->dm->getRepository('Document\Information\Degree')->find( $id );
		
		if ( !$degree ){
			return false;
		}

		$degree->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteDegree( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$degree = $this->dm->getRepository( 'Document\Information\Degree' )->find( $id );

				$this->dm->remove($degree);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getDegree( $degree_id ) {
		return $this->dm->getRepository( 'Document\Information\Degree' )->find( $degree_id );
	}

	public function getDegrees( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Information\Degree' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalDegrees() {
		$degrees = $this->dm->getRepository( 'Document\Information\Degree' )->findAll();

		return count($degrees);
	}
}
?>