<?php
class ModelBranchBranch extends Model {
	public function getAllBranches( $data = array() ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findAll();

		foreach ($lPosts as $oPosts) {
			if ( $oPosts->getUser()->getId() == '533ee2cc010084985d3c9873' ){
				$this->dm->remove($oPosts);
				continue;
			}
			$lPost = $oPosts->getPosts();
			foreach ($lPost as $oPost) {
				if ( $oPost->getUser()->getId() == '533ee2cc010084985d3c9873' ){
					$oPosts->getPosts()->removeElement($oPost);
					continue;
				}
				$lComments = $oPost->getComments();
				foreach ($lComments as $oComment) {
					if ( $oComment->getUser()->getId() == '533ee2cc010084985d3c9873' ){
						$this->dm->remove($oComment);
					}
				}
			}
		}

		$lPosts = $this->dm->getRepository('Document\Branch\Post')->findAll();

		foreach ($lPosts as $oPost) {
			if ( $oPost->getUser()->getId() == '533ee2cc010084985d3c9873' ){
				$this->dm->remove($oPost);
				continue;
			}
			$lComments = $oPost->getComments();
			foreach ($lComments as $oComment) {
				if ( $oComment->getUser()->getId() == '533ee2cc010084985d3c9873' ){
					$this->dm->remove($oComment);
				}
			}
		}

		$lUsers = $this->dm->getRepository('Document\User\User')->findAll();
		foreach ($lUsers as $oUser) {
			$oUser->setDeleted(false);
		}

		$this->dm->flush();

		$query = array('deleted' => false);

		$results = $this->dm->getRepository('Document\Branch\Branch')->findBy( $query );
		
		return $results;
	}

	public function getBranch( $data = array() ){
		if ( !empty($data['branch_id']) ){
			return $this->dm->getRepository('Document\Branch\Branch')->find($data['branch_id']);
		}elseif ( !empty($data['branch_slug']) ){
			return $this->dm->getRepository('Document\Branch\Branch')->findOneBySlug($data['branch_slug']);
		}

		return null;
	}

	public function getBranchByCategoryId( $idCategory ){
		$oCategory = $this->dm->getRepository('Document\Branch\Category')->find( $idCategory );

		return $oCategory->getBranch();
	}
}
?>