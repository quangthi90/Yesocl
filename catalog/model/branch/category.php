<?php
class ModelBranchCategory extends Model {
	public function getAllCategories( $data = array() ){
		$query = array();

		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}

		$results = $this->dm->getRepository("Document\Branch\Category")
			->findBy( $query )
			->sort( array('order' => 1) );

		return $results;
	}

	public function getCategory( $data = array() ){
		if ( !empty($data['category_id']) ){
			return $this->dm->getRepository('Document\Branch\Category')->find( $data['category_id'] );
		}elseif ( !empty($data['category_slug']) ){
			return $this->dm->getRepository('Document\Branch\Category')->findOneBySlug( $data['category_slug'] );
		}

		return null;
	}
}
?>