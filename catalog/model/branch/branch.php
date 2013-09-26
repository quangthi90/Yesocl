<?php
class ModelBranchBranch extends Model {
	public function getAllBranchs( $data = array() ){
		$query = array('deleted' => false);

		$results = $this->dm->getRepository('Document\Branch\Branch')->findBy( $query );
		
		return $results;
	}

	public function getBranch( $data = array() ){
		if ( !empty($data['branch_id']) ){
			return $this->dm->getRepository('Document\Branch\Branch')->find($data['branch_id']);
		}elseif ( !empty($data['branch_slug']) ){
			return $this->dm->getRepository('Document\Branch\Branch')->findOneBySlug($data['branch_slug']);
		}

		return null;
	}
}
?>