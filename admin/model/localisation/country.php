<?php
use Document\Localisation\Country;

class ModelLocalisationCountry extends Model {
	public function addCountry( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$country = new Country();
		$country->setName( $data['name'] );
		
		if ( isset($data['status']) ){
			$country->setStatus( $data['status'] );
		}

		$this->dm->persist( $country );
		$this->dm->flush();
	}

	public function editCountry( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$country = $this->dm->getRepository('Document\Localisation\Country')->find( $id );

		$country->setName( $data['name'] ); 
		
		if ( isset($data['status']) ){
			$country->setStatus( $data['status'] );
		}

		$this->dm->flush();
	}

	public function deleteCountry( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$country = $this->dm->getRepository( 'Document\Localisation\Country' )->find( $id );

				$this->dm->remove($country);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getCountry( $country_id ) {
		return $this->dm->getRepository( 'Document\Localisation\Country' )->find( $country_id );
	}

	public function getCountries( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Localisation\Country' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

    	if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . $data['filter_name'] . '.*/i') );
    	}

    	if ( isset( $data['sort'] ) ) {
    		if ( isset( $data['order'] ) && $data['order'] == 'desc' ) {
    			$query->sort( $data['sort'], 'desc' );
    		}else {
    			$query->sort( $data['sort'], 'asc' );
    		}
    	}
    		
    	return $query->getQuery()->execute();
	}
	
	public function getTotalCountries() {
		$countries = $this->dm->getRepository( 'Document\Localisation\Country' )->findAll();

		return count($countries);
	}
}
?>