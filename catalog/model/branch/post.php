<?php
class ModelBranchPost extends Doctrine {
	public function getPosts( $data = array() ){
		$this->load->model( 'tool/cache' );
		if (  empty($data['start']) ){
			$data['start'] = 0;
		}
		if ( empty($data['limit']) ){
			$data['limit'] = 20;
		}

		$query = array('deleted' => false);

		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}

		$results = $this->dm->getRepository('Document\Branch\Post')->findBy( $query );

		return $results;
	}

	public function getPost( $post_id ){

	}
}
?>