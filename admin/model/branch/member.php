<?php
use Document\Branch\Branch;
use MongoId;

class ModelBranchMember extends Model {
	/**
	* Add new Branch's Member to Database
	* 2014/02/12
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: 
	*	string MongoID Branch ID
	*	- array data
	* 	{
	*		string MongoID User (Member) ID 	-- required
	* 	}
	* @return: bool
	*	- true: success
	*	- false: not success
	*/
	public function add( $branch_id, $data = array() ) {
		// Member ID is required
		if ( empty($data['member_id']) ) {
			return false;
		}

		$oBranch = $this->dm->getRepository('Document\Branch\Branch')->find( $branch_id );
		if ( !$oBranch ){
			return false;
		}

		$lMembers = $oBranch->getMembers();
		foreach ( $lMembers as $oUserMember ) {
			if ( $data['member_id'] == $oUserMember->getId() ){
				return true;
			}
		}

		$oUserMember = $this->dm->getRepository('Document\User\User')->find( $data['member_id'] );
		if ( !$oUserMember ){
			return false;
		}

		$oBranch->addMember( $oUserMember );
		
		$this->dm->flush();

		return true;
	}

	/**
	* Delete Members by IDs
	* 2014/02/12
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: array string ID
	*/
	public function delete( $branch_id, $data ) {
		if ( !empty( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$oBranch = $this->dm->getRepository('Document\Branch\Branch')->find( $branch_id );
				if ( !$oBranch ){
					return false;
				}

				$oUserMember = $oBranch->getMemberById( $id );

				$oBranch->getMembers()->removeElement( $oUserMember );
			}

			$this->dm->flush();

			return true;
		}

		return false;
	}
}
?>