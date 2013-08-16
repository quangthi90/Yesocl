<?php
class ModelBranchBranch extends Doctrine {
	public function getAllBranchs(){
		$this->load->model( 'tool/cache' );
		return $this->model_tool_cache->getAllBranchs();
	}
}
?>