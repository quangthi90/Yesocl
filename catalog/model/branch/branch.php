<?php
class ModelBranchBranch extends Doctrine {
	public function getAllBranchs(){
		return $this->dm->getRepository('Document\Branch\Branch')->findAll();
	}
}
?>