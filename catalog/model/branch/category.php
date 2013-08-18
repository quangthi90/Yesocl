<?php
class ModelBranchCategory extends Doctrine {
	public function getAllCategories( $branch_slug ){
		$this->load->model('tool/cache');
	}
}
?>