<?php
class ModelCompanyCompany extends Model {	
	public function getCompanyBySlug( $slug ){
		$query = $this->dm->getRepository('Document\Company\Company')->findOneBySlug( $slug );

		return $query;
	}
}
?>