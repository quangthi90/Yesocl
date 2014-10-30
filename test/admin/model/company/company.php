<?php
use Document\Company\Company,
	Document\Company\GroupMember;

use MongoRegex;

class ModelCompanyCompany extends Model {
	public function addCompany( $aData = array(), $aLogo = array() ) {
		// name is required & isn't exist
		if ( empty($aData['name']) || $this->isExistName($aData['name']) ){
			return false;
		}

		// owner is required
		if ( empty($aData['user_id']) ){
			return false;
		}

		// owner is required
		if ( empty($aData['group']) ){
			return false;
		}

		// description is required
		if ( empty( $aData['description'] ) ) {
			return false;
		}

		$this->data['name'] = strtolower( trim( $aData['name'] ) );

		$oUser = $this->dm->getRepository( 'Document\User\User' )->find( $aData['user_id'] );
		if ( !$oUser ) {
			return false;
		}

		$oGroup = $this->dm->getRepository( 'Document\Company\Group' )->find( $aData['group'] );
		if ( !$oGroup ) {
			return false;
		}

		// Slug
		$sSlug = $this->url->create_slug( $aData['name'] );
		$lCompanies = $this->dm->getRepository( 'Document\Company\Company' )->findBySlug( new MongoRegex("/^$sSlug/i") );
		$aSlugs = array_map(function($oCompany){
			return $oCompany->getSlug();
		}, $lCompanies->toArray());
		$this->load->model( 'tool/slug' );
		$sSlug = $this->model_tool_slug->getSlug( $sSlug, $aSlugs );
		
		// Add Company
		$oCompany = new Company();
		$oCompany->setSlug( $sSlug );
		$oCompany->setSlug( $sSlug . $expend );
		$oCompany->setName( $aData['name'] );
		$oCompany->setOwner( $oUser );
		$oCompany->setGroup( $oGroup );
		$oCompany->setDescription( $aData['description'] );
		$oCompany->setCreated( new \Datetime( $aData['created'] ) );
		$oCompany->setStatus( $aData['status'] );
		$oCompany->setAddress( $aData['address'] );
		$oCompany->setPhone( $aData['phone'] );
		$oCompany->setFax( $aData['fax'] );
		$oCompany->setWebsite( $aData['website'] );

		if ( isset($aData['branches']) || !empty($aData['branches']) ){
			$oCompany->setBranches( array() );
			foreach ( $aData['branches'] as $idBranchId ) {
				$oBranch = $this->dm->getRepository('Document\Branch\Branch')->find( $idBranchId );
				$oCompany->addBranch( $oBranch );
			}
		}

		$oGroupMember = new GroupMember();
		$oGroupMember->setName( $this->config->get('company')['default']['group_member_name'] );
		$oGroupMember->setStatus( true );
		$oGroupMember->setCanDel( false );
		$this->dm->persist( $oGroupMember );
		$oCompany->addGroupMember( $oGroupMember );

		$this->dm->persist( $oCompany );
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($aLogo) && $this->model_tool_image->isValidImage($aLogo) ) {
			$folder_link = $this->config->get('company')['default']['image_link'];
			$avatar_name = $this->config->get('company')['default']['avatar_name'];
			$path = $folder_link . $oCompany->getId() . '/';
			if ( $aData['logo'] = $this->model_tool_image->uploadImage($path, $avatar_name, $aLogo) ) {
				$oCompany->setLogo( $aData['logo'] );
			}
		}

		$this->dm->flush();

		return true;
	}

	public function editCompany( $idCompanyId, $aData = array(), $aLogo = array() ) {
		// name is required & isn't exist
		if ( empty($aData['name']) || $this->isExistName($aData['name']) ){
			return false;
		}

		// owner is required
		if ( empty($aData['user_id']) ){
			return false;
		}

		// owner is required
		if ( empty($aData['group']) ){
			return false;
		}

		// description is required
		if ( empty( $aData['description'] ) ) {
			return false;
		}

		$this->data['name'] = strtolower( trim( $aData['name'] ) );

		$oUser = $this->dm->getRepository( 'Document\User\User' )->find( $aData['user_id'] );
		if ( !$oUser ) {
			return false;
		}

		$oGroup = $this->dm->getRepository( 'Document\Company\Group' )->find( $aData['group'] );
		if ( !$oGroup ) {
			return false;
		}

		$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->find( $idCompanyId );
		if ( !$oCompany ) {
			return false;
		}

		// name is exist
		/*if ( $oCompany->getName() != $aData['name'] && $this->isExistName( $aData['name'] ) ) {
			return false;
		}*/

		// Slug
		if ( $aData['name'] != $oCompany->getName() ){
			$sSlug = $this->url->create_slug( $aData['name'] );
			$lCompanies = $this->dm->getRepository( 'Document\Company\Company' )->findBySlug( new MongoRegex("/^$sSlug/i") );
			$aSlugs = array_map(function($oCompany){
				return $oCompany->getSlug();
			}, $lCompanies->toArray());
			$this->load->model( 'tool/slug' );
			$sSlug = $this->model_tool_slug->getSlug( $sSlug, $aSlugs );
			$oCompany->setSlug( $sSlug );
		}

		// Update Company Info
		$oCompany->setName( $aData['name'] );
		$oCompany->setOwner( $oUser );
		$oCompany->setGroup( $oGroup );
		$oCompany->setDescription( $aData['description'] );
		$oCompany->setCreated( new \Datetime( $aData['created'] ) );
		$oCompany->setStatus( $aData['status'] );
		$oCompany->setAddress( $aData['address'] );
		$oCompany->setPhone( $aData['phone'] );
		$oCompany->setFax( $aData['fax'] );
		$oCompany->setWebsite( $aData['website'] );

		
		$oCompany->setBranches( array() );
		if ( isset($aData['branches']) || !empty($aData['branches']) ){
			foreach ( $aData['branches'] as $idBranchId ) {
				$oBranch = $this->dm->getRepository('Document\Branch\Branch')->find( $idBranchId );
				$oCompany->addBranch( $oBranch );
			}
		}

		$this->load->model('tool/image');
		if ( !empty($aLogo) && $this->model_tool_image->isValidImage($aLogo) ) {
			$folder_link = $this->config->get('company')['default']['image_link'];
			$avatar_name = $this->config->get('company')['default']['avatar_name'];
			$path = $folder_link . $oCompany->getId() . '/';
			if ( $aData['logo'] = $this->model_tool_image->uploadImage($path, $avatar_name, $aLogo) ) {
				$oCompany->setLogo( $aData['logo'] );
			}
		}
		
		$this->dm->flush();

		return true;
	}

	public function deleteCompanies( $aData = array() ) {
		if ( isset( $aData['id'] ) ) {
			foreach ($aData['id'] as $id) {
				$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->find( $id );

				if ( !empty( $oCompany ) ) {
					$this->delete_directory( DIR_IMAGE . 'data/catalog/company/' . $oCompany->getId() );
					$this->dm->remove( $oCompany );
				}
			}
		}

		$this->dm->flush();
	}

	public function getCompany( $idCompanyId ) {
		return $this->dm->getRepository( 'Document\Company\Company' )->find( $idCompanyId );
	}

	public function getCompanies( $aData = array() ) {
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

		$query = $this->dm->createQueryBuilder( 'Document\Company\Company' )
    		->limit( $aData['limit'] )
    		->skip( $aData['start'] );

		if ( isset( $aData['filter_name'] ) ) {
			$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $aData['filter_name'] ) . '.*/i') );
		}

		if ( isset( $aData['sort'] ) ) {
			if ( isset( $aData['order'] ) && $aData['order'] == 'desc' ) {
    			$query->sort( $aData['sort'], 'desc' );
    		}else {
    			$query->sort( $aData['sort'], 'asc' );
    		}
		}else {
			if ( isset( $aData['order'] ) && $aData['order'] == 'asc' ) {
				$query->sort( 'created', 'asc' );
			}else {
				$query->sort( 'created', 'desc' );
			}
		}

		return $query->getQuery()->execute();
	}

	public function getTotalCompanies( $aData = array() ) {
		$query = $this->dm->createQueryBuilder( 'Document\Company\Company' );

		if ( isset( $aData['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $aData['filter_name'] ) . '.*/i') );
    	}

		return count( $query->getQuery()->execute() );
	}

	public function isExistName( $name ) {
		$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->findOneBy( array( 'name' => strtolower( trim( $name ) ) ) );

		if ( !empty( $oCompany ) ) {
			return true;
		}else {
			return false;
		}
	}

	public function addFollower( $idCompanyId, $oUser_id ) {
		$oUser = $this->dm->getRepository( 'Document\User\User' )->find( $oUser_id );
		if ( empty( $oUser ) ) {
			return false;
		}

		if ( $this->isExistFollower( $idCompanyId, $oUser_id ) ) {
			return false;
		}

		$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->find( $idCompanyId );
		if ( empty( $oCompany ) ) {
			return false;
		}

		$oCompany->addFollower( $oUser );

		$this->dm->flush();

		return true;
	}

	public function isExistFollower( $idCompanyId, $oUser_id ) {
		$lCompanies = $this->dm->getRepository( 'Document\Company\Company' )->findBy( array( 'followers.id' => $oUser_id ) );
		
		foreach ($lCompanies as $oCompany) {
			if ( $oCompany->getId() == $idCompanyId  ) {
				return true;
			}
		}
		
		return false;
	}

	public function removeFollowers( $idCompanyId, $aData = array() ) {
		$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->find( $idCompanyId );

		if ( isset( $aData['id'] ) ) {
			foreach ( $aData['id'] as $id ) {
				$oUser = $this->dm->getRepository( 'Document\User\User' )->find( $id );

				if ( !empty( $oUser ) ) {
					$oCompany->getFollowers()->removeElement( $oUser );
				}
			}
		}

		$this->dm->flush();
	}

	public function addRelativeCompany( $idCompanyId, $relative_id ) {
		if ( $idCompanyId == $relative_id ) {
			return false;
		}

		$relative = $this->dm->getRepository( 'Document\Company\Company' )->find( $relative_id );
		if ( empty( $relative ) ) {
			return false;
		}

		if ( $this->isExistRelativeCompany( $idCompanyId, $relative_id ) ) {
			return false;
		}

		$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->find( $idCompanyId );
		if ( empty( $oCompany ) ) {
			return false;
		}

		$oCompany->addRelativeCompany( $relative );

		$this->dm->flush();

		return true;
	}

	public function isExistRelativeCompany( $idCompanyId, $relative_id ) {
		$lCompanies = $this->dm->getRepository( 'Document\Company\Company' )->findBy( array( 'relativeCompanies.id' => $relative_id ) );
		
		foreach ($lCompanies as $oCompany) {
			if ( $oCompany->getId() == $idCompanyId  ) {
				return true;
			}
		}
		
		return false;
	}

	public function removeRelativeCompanies( $idCompanyId, $aData = array() ) {
		$oCompany = $this->dm->getRepository( 'Document\Company\Company' )->find( $idCompanyId );

		if ( isset( $aData['id'] ) ) {
			foreach ( $aData['id'] as $id ) {
				$relative = $this->dm->getRepository( 'Document\Company\Company' )->find( $id );

				if ( !empty( $relative ) ) {
					$oCompany->getRelativeCompanies()->removeElement( $relative );
				}
			}
		}

		$this->dm->flush();
	}

	public function delete_directory( $dirname ) {
  		if(is_dir($dirname)){
    		$files = glob( $dirname . '*', GLOB_MARK );
    		foreach( $files as $file )
      			$this->delete_directory( $file );
    		rmdir( $dirname );
  		}else
    		unlink( $dirname );
	}
}
?>