<?php
use Document\Branch\Category,
	Document\Branch\Layout,
	Document\Setting\Config;

class ModelBranchCategory extends Doctrine {
	public function addCategory( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		if ( !isset($data['code']) || empty($data['code']) ){
			return false;
		}
		$data['code'] = strtolower(trim($data['code']));
		
		$category = new Category();
		$category->setName( $data['name'] );
		$category->setCode( $data['code'] );
		if ( isset($data['order']) && !empty($data['order']) ){
			$category->setOrder( $data['order'] );
		}

		$config = new Config();
		$this->config->load( 'Category' );
		$config->setKey( $this->config->get( 'action_title' ) . $data['code'] );
		$config->setValue( $data['code'] );
		$this->dm->persist( $config );		

		$this->dm->persist( $category );
		$this->dm->flush();
	}

	public function editCategory( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$category = $this->dm->getRepository('Document\Branch\Category')->find( $id );
		
		if ( !$category ){
			return false;
		}

		$category->setName( $data['name'] ); 
		if ( isset($data['order']) && !empty($data['order']) ){
			$category->setOrder( $data['order'] );
		}

		$this->dm->flush();
	}

	public function deleteCategory( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$category = $this->dm->getRepository( 'Document\Branch\Category' )->find( $id );
				
				// if Category = 'view' ==> not del
				if ( $category->getCode() == $this->config->get('action_view') ){
					continue;
				}

				$layouts = $this->dm->getRepository( 'Document\Branch\Layout' )->findBy( array('Categorys.id' => $id) );
				foreach ( $layouts as $layout ) {
					$layout->removeCategory( $id );
				}

				$groups = $this->dm->getRepository( 'Document\Admin\Group' )->findBy( array('permissions.Categorys.id' => $id) );
				foreach ( $groups as $group ) {
					$permissions = $group->getPermissionByCategoryId( $id );
					foreach ( $permissions as $permission ) {
						$group->getPermissions()->removeElement( $permission );
					}
				}

				$config = $this->dm->getRepository('Document\Setting\Config')->findOneByKey( $this->config->get( 'action_title' ) . $category->getCode() );
				if ( $config ){
					$this->dm->remove( $config );
				}

				$this->dm->remove( $category );
			}
		}
		
		$this->dm->flush();
	}
	
	public function getCategory( $action_id ) {
		$category = $this->dm->getRepository( 'Document\Branch\Category' )->find( $action_id );
		return $category;
	}

	public function getCategorys( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Branch\Category' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] )
    		->sort( 'order' );
    	
    	return $query->getQuery()->execute();
	}

	public function getAllCategorys() {
		$query = $this->dm->createQueryBuilder( 'Document\Branch\Category' )->sort( 'order' );
    		
    	return $query->getQuery()->execute();
	}
	
	public function getTotalCategorys() {
		$query = $this->dm->createQueryBuilder( 'Document\Branch\Category' );

		$categorys = $query->getQuery()->execute();

		return count($categorys);
	}

	public function getCategoryByCode( $code ){
		return $this->dm->getRepository( 'Document\Branch\Category' )->findBy( array('code' => $code) );
	}
}
?>