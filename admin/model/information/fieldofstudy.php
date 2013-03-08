<?php
use Document\Information\Fieldofstudy;

class ModelInformationFieldofstudy extends Doctrine {
	public function addFieldofstudy( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$fieldofstudy = new Fieldofstudy();
		$fieldofstudy->setName( $data['name'] );

		$this->dm->persist( $fieldofstudy );
		$this->dm->flush();
	}

	public function editFieldofstudy( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$fieldofstudy = $this->dm->getRepository('Document\Information\Fieldofstudy')->find( $id );
		
		if ( !$fieldofstudy ){
			return false;
		}

		$fieldofstudy->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteFieldofstudy( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$fieldofstudy = $this->dm->getRepository( 'Document\Information\Fieldofstudy' )->find( $id );

				$this->dm->remove($fieldofstudy);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getfieldofstudy( $fieldofstudy_id ) {
		return $this->dm->getRepository( 'Document\Information\Fieldofstudy' )->find( $fieldofstudy_id );
	}

	public function getFieldsofstudy( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Information\Fieldofstudy' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalFieldsofstudy() {
		$fieldsofstudy = $this->dm->getRepository( 'Document\Information\Fieldofstudy' )->findAll();

		return count($fieldsofstudy);
	}
}
?>