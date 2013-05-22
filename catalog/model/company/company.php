<?php
class ModelCompanyCompany extends Doctrine {	
	public function getCompanyBySlug( $slug ){
		$query = $this->dm->getRepository('Document\Company\Company')->findOneBySlug( $slug );

		return $query;
	}
}
?>