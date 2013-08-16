<?php
class ModelBranchBranch extends Doctrine {
	public function getAllBranchs(){
		$this->load->model( 'tool/cache' );
		return $this->model_tool_cache->getAllBranchs();
	}

	public function getBranch( $branch_slug ){
		$this->load->model('tool/cache');
		return $this->model_tool_cache->getObject( $branch_slug, $this->config->get('post')['type']['branch'] );
	}
}
?>