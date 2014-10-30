<?php
class ModelBranchCategory extends Model {
	public function getAllCategories( $data = array() ){
		$query = array('deleted' => false);

		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}

		$results = $this->dm->getRepository("Document\Branch\Category")
			->findBy( $query )
			->sort( array('order' => 1) );

		return $results;
	}

	public function getCategory( $data = array() ){
		$query = array('deleted' => false);

		if ( !empty($data['category_id']) ){
			$query['id'] = $data['category_id'];
		
		}elseif ( !empty($data['category_slug']) ){
			$query['slug'] = $data['category_slug'];
		
		}else{
			return null;
		}

		return $this->dm->getRepository('Document\Branch\Category')->findOneBy( $query );
	}
}
?>