<?php
class ModelBranchBranch extends Doctrine {
	public function getAllBranchs(){
		$this->load->model( 'tool/cache' );
		$branchs = $this->model_tool_cache->getAllBranchs();

		if ( count($branchs) == 0 ){
			$results = $this->dm->getRepository('Document\Branch\Branch')->findByStatus( true );

			$branchs = array();
			foreach ( $results as $branch ) {
				$branchs[] = $this->model_tool_cache->setObject( $branch, $this->config->get('post')['type']['branch'] );
			}
		}

		return $branchs;
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