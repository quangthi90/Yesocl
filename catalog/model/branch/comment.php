<?php
class ModelBranchComment extends Doctrine {
	public function getComments( $data = array() ){
		$this->load->model( 'tool/cache' );
		if ( !isset($data['start']) || empty($data['start']) ){
			$data['start'] = 0;
		}
		if ( !isset($data['limit']) || empty($data['limit']) ){
			$data['limit'] = 10;
		}

		if ( !isset($data['branch_id']) || empty($data['branch_id']) ){
			return array();
		}

		if ( !isset($data['post_id']) || empty($data['post_id']) ){
			return array();
		}

		$comments = $this->model_tool_cache->getLastComments( $data['post_id'], $this->config->get('common')['type']['branch'], $data['branch_id'] );
	}

	public function getComment( $Comment_id ){

	}
}
?>