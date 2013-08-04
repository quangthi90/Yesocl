<?php
class ModelBranchBranch extends Doctrine {
	public function getAllBranchs(){
		return $this->dm->getRepository('Document\Branch\Branch')->findBy( array(
			'status' => true
		));
	}

	public function getBranch( $branch_id ){
		
	}
}
?>