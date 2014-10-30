<?php
use Document\Branch\Branch;
use MongoId;

class ModelBranchBranch extends Model {
	/**
	* Add new Branch to Database
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: 
	*	- array data
	* 	{
	*		string Name 		-- required
	*		bool Status
	*		int Order
	* 	}
	* @return: bool
	*	- true: success
	*	- false: not success
	*/
	public function addBranch( $aData = array(), $aLogo = array() ) {
		// name is required & isn't exist
		if ( isset($aData['name']) && !empty($aData['name']) ) {
			$this->data['name'] = strtolower( trim($aData['name']) );
		}else {
			return false;
		}

		// order
		if ( !isset($aData['order']) || empty($aData['order']) ){
			$aData['order'] = 0;
		}
		
		// status
		if ( !isset( $aData['status'] ) ) {
			$aData['status'] = 0;
		}

		$slug = $this->url->create_slug( $aData['name'] ) . '-' . new MongoId();

		$oBranch = new Branch();
		$oBranch->setName( $aData['name'] );
		$oBranch->setStatus( $aData['status'] );
		$oBranch->setOrder( $aData['order'] );
		$oBranch->setSlug( $slug );
		$oBranch->setCode( $aData['code'] );
		
		$this->dm->persist( $oBranch );
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($aLogo) && $this->model_tool_image->isValidImage($aLogo) ) {
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$avatar_name = $this->config->get('branch')['default']['avatar_name'];
			$path = $folder_link . $oBranch->getId();
			if ( $aData['logo'] = $this->model_tool_image->uploadImage($path, $avatar_name, $aLogo) ) {
				$oBranch->setLogo( $aData['logo'] );
			}
		}

		$this->dm->flush();

		return true;
	}

	/**
	* Edit Branch by Id
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: 
	*	- string Branch ID
	*	- array data
	* 	{
	*		string Name 		-- required
	*		bool Status
	*		int Order
	* 	}
	* @return: bool
	*	- true: success
	*	- false: not success
	*/
	public function editBranch( $idBranch, $aData = array(), $aLogo = array() ) {
		$oBranch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $idBranch );
		if ( empty( $oBranch ) ) {
			return false;
		}

		// name is required
		if ( isset( $aData['name'] ) ) {
			$this->data['name'] = strtolower( trim( $aData['name'] ) );
		}else {
			return false;
		}
		
		// status
		if ( !isset( $aData['status'] ) ) {
			$aData['status'] = 0;
		}

		// order
		if ( !isset($aData['order']) || empty($aData['order']) ){
			$aData['order'] = 0;
		}

		$oBranch->setName( $aData['name'] );
		$oBranch->setStatus( $aData['status'] );
		$oBranch->setOrder( $aData['order'] );
		$oBranch->setCode( $aData['code'] );

		if ( $aData['name'] != $oBranch->getName() ){
			$slug = $this->url->create_slug( $aData['name'] ) . '-' . new MongoId();

			$oBranch->setSlug( $slug );
		}
		
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($aLogo) && $this->model_tool_image->isValidImage($aLogo) ) {
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$avatar_name = $this->config->get('branch')['default']['avatar_name'];
			$path = $folder_link . $oBranch->getId();
			if ( $aData['logo'] = $this->model_tool_image->uploadImage($path, $avatar_name, $aLogo) ) {
				$oBranch->setLogo( $aData['logo'] );
			}
		}
		
		$this->dm->flush();

		return true;
	}

	/**
	* Delete Branches by ID
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: array string ID
	*/
	public function deleteBranches( $aData ) {
		if ( empty($aData['id']) ) return false;
		
		foreach ( $aData['id'] as $id ) {
			$oBranch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $id );
			if ( !$oBranch ) continue;
			$oBranch->setDeleted( true );
		}

		$this->dm->flush();

		return false;
	}
	/*public function deleteBranches( $aData ) {
		if ( isset( $aData['id'] ) ) {
			foreach ($aData['id'] as $id) {
				$oBranch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $id );
				if ( !empty( $oBranch ) ) {
					$this->dm->createQueryBuilder( 'Document\Branch\Position' )->remove()->field( 'branches.id' )->equals( $oBranch->getId() )->getQuery()->execute();
					
					$this->dm->remove( $oBranch );
				}
			}
		}

		$this->dm->flush();aD	}*/

	/**
	* Get Branch by ID
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: string Branch ID
	* @return: Object Branch
	*/
	public function getBranch( $idBranch ) {
		$query = array(
			'deleted' => false,
			'id' => $idBranch
		);
		return $this->dm->getRepository( 'Document\Branch\Branch' )->findOneBy( $query );
	}

	/**
	* Get Branches
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: 
	*	- array data
	*	{
	*		int Start -- Default 0
	*		int Limit -- Default 10
	*	}
	* @return: list Object Branch Sort by Order
	*/
	public function getBranches( $aData = array() ) {
		if ( isset( $aData['start'] ) && $aData['start'] >= 0 ) {
			$aData['start'] = (int)$aData['start'];
		}else {
			$aData['start'] = 0;
		}

		if ( isset( $aData['limit'] ) && $aData['limit'] > 0 ) {
			$aData['limit'] = (int)$aData['limit'];
		}else {
			$aData['limit'] = 10;
		}

		$query = array('deleted' => false);

		return $this->dm->getRepository('Document\Branch\Branch')
			->findBy( $query )
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array('order' => 1) );
	}

	/**
	* Get All Branches
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: list Object Branch Sort by Order
	*/
	public function getAllBranches(){
		$query = $this->dm->getRepository('Document\Branch\Branch')->findAll()
			->sort( array('order' => 1) );

		return $query;
	}
}
?>