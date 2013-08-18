<?php
class ModelBranchCategory extends Doctrine {
	public function getCategories( $branch_id ){
		$categories = $this->dm->getRepository("Document\Branch\Category")->findBy(array(
			'branch.id' => $branch_id
		));

		return $categories;
	}
}
?>