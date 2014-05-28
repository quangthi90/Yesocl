<?php
use Document\Branch\Category,
	Document\Branch\Layout,
	Document\Setting\Config;

use MongoRegex;

class ModelBranchCategory extends Model {
	public function addCategory( $aData = array() ) {
		// Name is required
		if ( !isset($aData['name']) || empty($aData['name']) ){
			return false;
		}

		// Branch is requied
		if ( !isset($aData['branch_id']) || empty($aData['branch_id']) ){
			return false;
		}
		$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $aData['branch_id'] );
		if ( !$branch ){
			return false;
		}

		$order = 0;
		if ( isset($aData['order']) && !empty($aData['order']) ){
			$order = $aData['order'];
		}

		$parent = null;
		if ( isset($aData['parent_id']) && !empty($aData['parent_id']) ){
			$parent = $this->dm->getRepository('Document\Branch\Category')->find( $aData['parent_id'] );
		}

		// Slug
		$slug = $this->url->create_slug( $aData['name'] );
		$categories = $this->dm->getRepository( 'Document\Branch\Category' )->findBySlug( new MongoRegex("/^$slug/i") );
		$arr_slugs = array_map(function($oCategory){
			return $oCategory->getSlug();
		}, $categories->toArray());
		$this->load->model( 'tool/slug' );
		$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );	
		
		$oCategory = new Category();
		$oCategory->setName( $aData['name'] );
		$oCategory->setSlug( $slug );
		$oCategory->setBranch( $branch );
		$oCategory->setOrder( $order );
		$oCategory->setParent( $parent );
		$oCategory->setIsBranch( (bool)$aData['isBranch'] );

		$this->dm->persist( $oCategory );
		$this->dm->flush();
	}

	public function editCategory( $id, $aData = array() ) {
		// Name is require
		if ( !isset($aData['name']) || empty($aData['name']) ){
			return false;
		}

		// Branch is requied
		if ( !isset($aData['branch_id']) || empty($aData['branch_id']) ){
			return false;
		}
		$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $aData['branch_id'] );
		if ( !$branch ){
			return false;
		}
		
		// Check category
		$oCategory = $this->dm->getRepository('Document\Branch\Category')->find( $id );
		if ( !$oCategory ){
			return false;
		}

		$order = 0;
		if ( isset($aData['order']) && !empty($aData['order']) ){
			$order = $aData['order'];
		}

		$parent = null;
		if ( isset($aData['parent_id']) && !empty($aData['parent_id']) ){
			$parent = $this->dm->getRepository('Document\Branch\Category')->find( $aData['parent_id'] );
		}

		// Slug
		if ( $aData['name'] != $oCategory->getName() ){
			$slug = $this->url->create_slug( $aData['name'] );
		
			$categories = $this->dm->getRepository( 'Document\Branch\Category' )->findBySlug( new MongoRegex("/^$slug/i") );

			$arr_slugs = array_map(function($oCategory){
				return $oCategory->getSlug();
			}, $categories->toArray());

			$this->load->model( 'tool/slug' );
			$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );
			
			$oCategory->setSlug( $slug );
		}

		$oCategory->setName( $aData['name'] );
		$oCategory->setBranch( $branch );
		$oCategory->setOrder( $order );
		$oCategory->setParent( $parent );
		$oCategory->setIsBranch( (bool)$aData['isBranch'] );

		$this->dm->flush();
	}

	public function deleteCategory( $aData = array() ) {
		if ( isset($aData['id']) ) {
			foreach ( $aData['id'] as $id ) {
				$oCategory = $this->dm->getRepository( 'Document\Branch\Category' )->find( $id );
				if ( $oCategory ) $oCategory->setDeleted(true);
			}
		}
		
		$this->dm->flush();
	}
	/*public function deleteCategory( $aData = array() ) {
		if ( isset($aData['id']) ) {
			foreach ( $aData['id'] as $id ) {
				$category = $this->dm->getRepository( 'Document\Branch\Category' )->find( $id );

				$this->dm->remove( $oCategory );
			}
		}
		
		$this->dm->flush();
	}*/
	
	public function getCategory( $category_id ) {
		$query = array( 
			'deleted' => false,
			'id' => $category_id
		);
		return $this->dm->getRepository( 'Document\Branch\Category' )->findOneBy( $query );
	}

	public function getCategories( $aData = array() ) {
		if (!isset($aData['limit']) || ((int)$aData['limit'] < 0)) {
			$aData['limit'] = 10;
		}
		if (!isset($aData['start']) || ((int)$aData['start'] < 0)) {
			$aData['start'] = 0;
		}
		if (!isset($aData['sort']) || empty($aData['sort']) ){
			$aData['sort'] = 'order';
		}

		$query = array(
			'deleted' => false
		);

		return $this->dm->getRepository('Document\Branch\Category')->findBy( $query )
					->limit( $aData['limit'] )
		    		->skip( $aData['start'] )
		    		->sort( $aData['sort'] );
	}

	public function getAllCategories( $aData = array() ) {
		$query = array('deleted' => false);
		if ( !empty($aData['branch_id']) ){
			$query['branch.id'] = $aData['branch_id'];
		}
		if ( empty($aData['sort']) ){
			$aData['sort'] = 'order';
		}

		return $this->dm->getRepository( 'Document\Branch\Category' )
			->findBy($query)
			->sort(array($aData['sort'] => 1));
	}
	
	public function getTotalCategories() {
		$query = array('deleted' => false);
		$categories = $this->dm->getRepository( 'Document\Branch\Category' )->findBy($query);

		return $categories->count();
	}

	public function getCategoryByCode( $code ){
		return $this->dm->getRepository( 'Document\Branch\Category' )->findBy( array('code' => $code) );
	}
}
?>