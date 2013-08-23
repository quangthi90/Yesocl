<?php
class ModelBranchCategory extends Doctrine {
	public function getAllCategories( $data = array() ){
		$query = array();

		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}

		$results = $this->dm->getRepository("Document\Branch\Category")->findBy( $query );

		return $results;
	}
}
?>