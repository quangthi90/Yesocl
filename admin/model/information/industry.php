<?php
use Document\Information\Industry;

class ModelInformationIndustry extends Doctrine {
	public function addIndustry( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$industry = new Industry();
		$industry->setName( $data['name'] );

		$this->dm->persist( $industry );
		$this->dm->flush();
	}

	public function editIndustry( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$industry = $this->dm->getRepository('Document\Information\Industry')->find( $id );
		
		if ( !$industry ){
			return false;
		}

		$industry->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteIndustry( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$industry = $this->dm->getRepository( 'Document\Information\Industry' )->find( $id );

				$this->dm->remove($industry);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getIndustry( $industry_id ) {
		return $this->dm->getRepository( 'Document\Information\Industry' )->find( $industry_id );
	}

	public function getIndustries( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Information\Industry' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	public function getTotalIndustries() {
		$industries = $this->dm->getRepository( 'Document\Information\Industry' )->findAll();

		return count($industries);
	}
}
?>