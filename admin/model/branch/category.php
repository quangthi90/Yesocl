<?php
use Document\Branch\Category,
	Document\Branch\Layout,
	Document\Setting\Config;

use MongoRegex;

class ModelBranchCategory extends Model {
	public function addCategory( $data = array() ) {
		// Name is required
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		// Branch is requied
		if ( !isset($data['branch_id']) || empty($data['branch_id']) ){
			return false;
		}
		$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $data['branch_id'] );
		if ( !$branch ){
			return false;
		}

		$order = 0;
		if ( isset($data['order']) && !empty($data['order']) ){
			$order = $data['order'];
		}

		$parent = null;
		if ( isset($data['parent_id']) && !empty($data['parent_id']) ){
			$parent = $this->dm->getRepository('Document\Branch\Category')->find( $data['parent_id'] );
		}

		// Slug
		$slug = $this->url->create_slug( $data['name'] );
		$categories = $this->dm->getRepository( 'Document\Branch\Category' )->findBySlug( new MongoRegex("/^$slug/i") );
		$arr_slugs = array_map(function($oCategory){
			return $oCategory->getSlug();
		}, $categories->toArray());
		$this->load->model( 'tool/slug' );
		$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );	
		
		$oCategory = new Category();
		$oCategory->setName( $data['name'] );
		$oCategory->setSlug( $slug );
		$oCategory->setBranch( $branch );
		$oCategory->setOrder( $order );
		$oCategory->setParent( $parent );
		$oCategory->setIsStock( (bool)$data['isStock'] );

		$this->dm->persist( $oCategory );
		$this->dm->flush();
	}

	public function editCategory( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		// Branch is requied
		if ( !isset($data['branch_id']) || empty($data['branch_id']) ){
			return false;
		}
		$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $data['branch_id'] );
		if ( !$branch ){
			return false;
		}
		
		// Check category
		$oCategory = $this->dm->getRepository('Document\Branch\Category')->find( $id );
		if ( !$oCategory ){
			return false;
		}

		$order = 0;
		if ( isset($data['order']) && !empty($data['order']) ){
			$order = $data['order'];
		}

		$parent = null;
		if ( isset($data['parent_id']) && !empty($data['parent_id']) ){
			$parent = $this->dm->getRepository('Document\Branch\Category')->find( $data['parent_id'] );
		}

		// Slug
		if ( $data['name'] != $oCategory->getName() ){
			$slug = $this->url->create_slug( $data['name'] );
		
			$categories = $this->dm->getRepository( 'Document\Branch\Category' )->findBySlug( new MongoRegex("/^$slug/i") );

			$arr_slugs = array_map(function($oCategory){
				return $oCategory->getSlug();
			}, $categories->toArray());

			$this->load->model( 'tool/slug' );
			$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );
			
			$oCategory->setSlug( $slug );
		}

		$oCategory->setName( $data['name'] );
		$oCategory->setBranch( $branch );
		$oCategory->setOrder( $order );
		$oCategory->setParent( $parent );
		$oCategory->setIsStock( (bool)$data['isStock'] );

		$this->dm->flush();
	}

	public function deleteCategory( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$oCategory = $this->dm->getRepository( 'Document\Branch\Category' )->find( $id );

				$this->dm->remove( $oCategory );
			}
		}
		
		$this->dm->flush();
	}
	
	public function getCategory( $action_id ) {
		$oCategory = $this->dm->getRepository( 'Document\Branch\Category' )->find( $action_id );
		return $oCategory;
	}

	public function getCategories( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}
		if (!isset($data['sort']) || empty($data['sort']) ){
			$data['sort'] = 'order';
		}

		$query = $this->dm->createQueryBuilder( 'Document\Branch\Category' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] )
    		->sort( $data['sort'] );
    	
    	return $query->getQuery()->execute();
	}

	public function getAllCategories( $data = array() ) {
		$query = array();
		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}
		if ( empty($data['sort']) ){
			$data['sort'] = 'order';
		}

		return $this->dm->getRepository( 'Document\Branch\Category' )
			->findBy($query)
			->sort(array($data['sort'] => 1));
	}
	
	public function getTotalCategories() {
		$query = $this->dm->createQueryBuilder( 'Document\Branch\Category' );

		$categories = $query->getQuery()->execute();

		return count($categories);
	}

	public function getCategoryByCode( $code ){
		return $this->dm->getRepository( 'Document\Branch\Category' )->findBy( array('code' => $code) );
	}
}
?>