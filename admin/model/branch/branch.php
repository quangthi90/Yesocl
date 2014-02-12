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
	public function addBranch( $data = array(), $aLogo = array() ) {
		// name is required & isn't exist
		if ( isset($data['name']) && !empty($data['name']) ) {
			$this->data['name'] = strtolower( trim($data['name']) );
		}else {
			return false;
		}

		// order
		if ( !isset($data['order']) || empty($data['order']) ){
			$data['order'] = 0;
		}
		
		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$slug = $this->url->create_slug( $data['name'] ) . '-' . new MongoId();

		$branch = new Branch();
		$branch->setName( $data['name'] );
		$branch->setStatus( $data['status'] );
		$branch->setOrder( $data['order'] );
		$branch->setSlug( $slug );
		
		$this->dm->persist( $branch );
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($aLogo) && $this->model_tool_image->isValidImage($aLogo) ) {
			$folder_link = $this->config->get('company')['default']['image_link'];
			$avatar_name = $this->config->get('company')['default']['avatar_name'];
			$path = $folder_link . $branch->getId() . '/';
			if ( $aData['logo'] = $this->model_tool_image->uploadImage($path, $avatar_name, $aLogo) ) {
				$branch->setLogo( $aData['logo'] );
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
	public function editBranch( $branch_id, $data = array(), $aLogo = array() ) {
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $branch_id );
		if ( empty( $branch ) ) {
			return false;
		}

		// name is required
		if ( isset( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}
		
		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		// order
		if ( !isset($data['order']) || empty($data['order']) ){
			$data['order'] = 0;
		}

		$branch->setName( $data['name'] );
		$branch->setStatus( $data['status'] );
		$branch->setOrder( $data['order'] );

		if ( $data['name'] != $branch->getName() ){
			$slug = $this->url->create_slug( $data['name'] ) . '-' . new MongoId();

			$branch->setSlug( $slug );
		}
		
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($aLogo) && $this->model_tool_image->isValidImage($aLogo) ) {
			$folder_link = $this->config->get('company')['default']['image_link'];
			$avatar_name = $this->config->get('company')['default']['avatar_name'];
			$path = $folder_link . $branch->getId() . '/';
			if ( $aData['logo'] = $this->model_tool_image->uploadImage($path, $avatar_name, $aLogo) ) {
				$branch->setLogo( $aData['logo'] );
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
	public function deleteBranches( $data ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $id );
				if ( !empty( $branch ) ) {
					$this->dm->createQueryBuilder( 'Document\Branch\Position' )->remove()->field( 'branches.id' )->equals( $branch->getId() )->getQuery()->execute();
					
					$this->dm->remove( $branch );
				}
			}
		}

		$this->dm->flush();
	}

	/**
	* Get Branch by ID
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: string Branch ID
	* @return: Object Branch
	*/
	public function getBranch( $branch_id ) {
		return $this->dm->getRepository( 'Document\Branch\Branch' )->find( $branch_id );
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
	public function getBranches( $data = array() ) {
		if ( isset( $data['start'] ) && $data['start'] >= 0 ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) && $data['limit'] > 0 ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 10;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Branch\Branch' )
			->skip( $data['start'] )->limit( $data['limit'] )
			->sort( array('order' => 1) );

		return $query->getQuery()->execute();
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