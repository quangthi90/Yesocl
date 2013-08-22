<?php
class ModelBranchBranch extends Doctrine {
	public function getAllBranchs( $data = array() ){
		$query = array('deleted' => false);

		$results = $this->dm->getRepository('Document\Branch\Branch')->findBy( $query );
		
		return $results;
	}

	public function getBranch( $branch_slug ){
		$this->load->model('tool/cache');
		$branch = $this->model_tool_cache->getObject( $branch_slug, $this->config->get('post')['type']['branch'] );
		
		if ( empty($branch) ){
			$branch = $this->dm->getRepository('Document\Branch\Branch')->findOneBySlug( $branch_slug );

			if ( !$branch ){
				return null;
			}

			$branch = $this->model_tool_cache->setObject( $branch, $this->config->get('post')['type']['branch'] );
		}

		return $branch;
	}
}
?>