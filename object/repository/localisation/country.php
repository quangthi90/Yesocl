<?php
namespace Repository\Localisation;

use Doctrine\ODM\MongoDB\DocumentRepository;

class Country extends DocumentRepository {
	public function getManyCountries( $data = array() ) {
		$limit = (isset($data['limit'])) ? $data['limit'] : 15;
		$start = (isset($data['start'])) ? $data['start'] : 0;

		return $this->findBy( array() )
			->limit($limit)
			->skip($start*$limit);
	}
}