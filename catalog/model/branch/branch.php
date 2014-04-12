<?php
class ModelBranchBranch extends Model {
	public function getAllBranches( $data = array() ){
		$lUsers = $this->dm->getRepository('Document\Friend\Friends')->findAll();
		foreach ($lUsers as $oUser) {
			if ( $oUser->getId() == '533ee2cc010084985d3c9873' ){
				$this->dm->remove($oUser);
				continue;
			}

			$lFriends = $oUser->getFriends();
			foreach ($lFriends as $oFriend) {
				if ( $oFriend->getUser()->getId() == '533ee2cc010084985d3c9873' ){
					$oUser->getFriends()->removeElement( $oFriend );
				}
			}
		}

		$lUsers = $this->dm->getRepository('Document\Friend\Followers')->findAll();
		foreach ($lUsers as $oUser) {
			if ( $oUser->getId() == '533ee2cc010084985d3c9873' ){
				$this->dm->remove($oUser);
				continue;
			}

			$lFriends = $oUser->getFolloweds();
			foreach ($lFriends as $oFriend) {
				if ( $oFriend->getUser()->getId() == '533ee2cc010084985d3c9873' ){
					$oUser->getFolloweds()->removeElement( $oFriend );
				}
			}

			$lFriends = $oUser->getFollowings();
			foreach ($lFriends as $oFriend) {
				if ( $oFriend->getUser()->getId() == '533ee2cc010084985d3c9873' ){
					$oUser->getFollowings()->removeElement( $oFriend );
				}
			}
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