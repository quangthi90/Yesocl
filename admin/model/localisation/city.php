<?php
use Document\Localisation\City;

class ModelLocalisationCity extends Doctrine {
	public function addCity( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['country']) || empty($data['country']) ){
			return false;
		}
		
		$country = $this->dm->getRepository('Document\Localisation\Country')->find( $data['country'] );
		
		if ( !$country ){
			return false;
		}
		
		$city = new City();
		$city->setName( $data['name'] );
		$city->setCountry( $country );
		
		if ( isset($data['status']) ){
			$city->setStatus( $data['status'] );
		}

		$this->dm->persist( $city );
		$this->dm->flush();
	}

	public function editCity( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		if ( !isset($data['country']) || empty($data['country']) ){
			return false;
		}
		
		$city = $this->dm->getRepository('Document\Localisation\City')->find( $id );
		
		if ( !$city ){
			return false;
		}

		$city->setName( $data['name'] ); 
		
		if ( $city->getCountry() && $city->getCountry()->getId() != $data['country'] ){
			$country = $this->dm->getRepository('Document\City\Country')->find( $data['country'] );
			
			if ( !$country ){
				return false;
			}
		
			$city->setCountry( $country );
		} 
		
		if ( isset($data['status']) ){
			$city->setStatus( $data['status'] );
		}

		$this->dm->flush();
	}

	public function deleteCity( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$city = $this->dm->getRepository( 'Document\Localisation\City' )->find( $id );

				$this->dm->remove($city);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getCity( $city_id ) {
		return $this->dm->getRepository( 'Document\Localisation\City' )->find( $city_id );
	}

	public function getCities( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Localisation\City' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

    	if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . $data['filter_name'] . '.*/i') );
    	}

    	if ( isset( $data['filter_country'] ) && $data['filter_country'] ) {
    		$query->field( 'this.country.id' )->equals( new \MongoRegex('/' . $data['filter_country'] . '.*/i') );
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
	
	public function getTotalcities() {
		$cities = $this->dm->getRepository( 'Document\Localisation\City' )->findAll();

		return count($cities);
	}

	public function searchLocationByKeyword( $data = array() ) {
		if ( !isset( $data['filter_location'] ) || empty( $data['filter_location'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\Localisation\City',
				)
    	);
 		
		$query_data = 'location_t:*"' . $data['filter_location'] . '"*';
 
		$query->setQuery( $query_data );
 
		return $this->client->execute( $query );
	}
}
?>