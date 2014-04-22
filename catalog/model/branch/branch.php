<?php
class ModelBranchBranch extends Model {
	public function getAllBranches( $data = array() ){
		$query = array('deleted' => false);

		$results = $this->dm->getRepository('Document\Branch\Branch')->findBy( $query );
		
		return $results;
	}

	public function getBranch( $data = array() ){
		$query = array('deleted' => false);

		if ( !empty($data['branch_id']) ){
			$query['id'] = $data['branch_id'];
		
		}elseif ( !empty($data['branch_slug']) ){
			$query['slug'] = $data['branch_slug'];
		
		}else{
			return null;
		}

		return $this->dm->getRepository('Document\Branch\Branch')->findOneBy($query);
	}

	public function getBranchByCategoryId( $idCategory ){
		$oCategory = $this->dm->getRepository('Document\Branch\Category')->find( $idCategory );

		$oBranch = $oCategory->getBranch();
		if ( !$oBranch || $oBranch->getDeleted() == true ) return null;
		return $oBranch;
	}
}
?>