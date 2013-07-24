<?php
class ModelBranchPost extends Doctrine {
	public function getPostByBranch( $branch_id ){
		$this->load->model('branch/branch');
		$branch = $this->model_branch_branch->getBranch( $branch_id );
	}
}
?>