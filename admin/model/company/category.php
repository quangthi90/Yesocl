<?php
use Document\Company\Category;

class ModelCompanyCategory extends Doctrine {
	public function addCategory( $data = array() ) {
		// name is required & isn't exist
		if ( isset( $data['name'] ) && !$this->isExistName( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// order
		if ( !isset( $data['order'] ) ) {
			$data['order'] = 0;
		}else {
			$data['order'] = (int)$data['order'];
		}

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$category = new Category();
		$category->setName( $data['name'] );
		$category->setOrder( $data['order'] );
		$category->setStatus( $data['status'] );

		$this->dm->persist( $category );
		$this->dm->flush();

		return true;
	}

	public function editCategory( $category_id, $data = array() ) {
		// name is required
		if ( isset( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// order
		if ( !isset( $data['order'] ) ) {
			$data['order'] = 0;
		}else {
			$data['order'] = (int)$data['order'];
		}

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$category = $this->dm->getRepository( 'Document\Company\Category' )->find( $category_id );
		if ( empty( $category ) ) {
			return false;
		}

		// name is exist
		if ( $category->getName() != $data['name'] && $this->isExistName( $data['name'] ) ) {
			return false;
		}

		$category->setName( $data['name'] );
		$category->setOrder( $data['order'] );
		$category->setStatus( $data['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteCategories( $data ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$category = $this->dm->getRepository( 'Document\Company\Category' )->find( $id );

				if ( !empty( $category ) ) {
					$this->dm->remove( $category );
				}
			}
		}

		$this->dm->flush();
	}

	public function getCategory( $category_id ) {
		return $this->dm->getRepository( 'Document\Company\Category' )->find( $category_id );
	}

	public function getCategories( $data = array() ) {
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

		return $this->dm->getRepository( 'Document\Company\Category' )->findAll()->limit( $this->data['limit'] )->skip( $this->data['start'] );
	}

	public function getTotalCategories( $data = array() ) {
		return count( $this->dm->getRepository( 'Document\Company\Category' )->findAll() );
	}

	public function isExistName( $name ) {
		$category = $this->dm->getRepository( 'Document\Company\Category' )->findOneBy( array( 'name' => strtolower( trim( $name ) ) ) );

		if ( !empty( $category ) ) {
			return true;
		}else {
			return false;
		}
	}
}
?>