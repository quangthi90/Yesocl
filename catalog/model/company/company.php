<?php
class ModelCompanyCompany extends Model {	
	public function getCompanyBySlug( $slug ){
		$query = $this->dm->getRepository('Document\Company\Company')->findOneBySlug( $slug );

		return $query;
	}

	public function getCompanies( $data = array() ) {
		if ( isset( $data['start'] ) && $data['start'] >= 0 ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) && $data['limit'] > 0 ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 10;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Company\Company' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

		if ( isset( $data['filter_name'] ) ) {
			$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
		}

		if ( isset( $data['sort'] ) ) {
			if ( isset( $data['order'] ) && $data['order'] == 'desc' ) {
    			$query->sort( $data['sort'], 'desc' );
    		}else {
    			$query->sort( $data['sort'], 'asc' );
    		}
		}else {
			if ( isset( $data['order'] ) && $data['order'] == 'asc' ) {
				$query->sort( 'created', 'asc' );
			}else {
				$query->sort( 'created', 'desc' );
			}
		}

		return $query->getQuery()->execute();
	}
}
?>