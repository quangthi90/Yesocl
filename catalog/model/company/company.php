<?php
class ModelCompanyCompany extends Doctrine {	
	public function getCompanyBySlug( $slug, $sort='created', $order = 'desc' ){
		$query = $this->dm->getRepository('Documnet\Company\Company')->findOneBySlug( $slug )->sort( $sort, $order );

		return $query;
	}
}
?>