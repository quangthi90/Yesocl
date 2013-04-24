<?php
use Document\Company\Branch;

class ModelCompanyBranch extends Doctrine {
	public function addBranch( $data = array() ) {
		// name is required & isn't exist
		if ( isset( $data['name'] ) && !$this->isExistName( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$branch = new Branch();
		$branch->setName( $data['name'] );
		$branch->setStatus( $data['status'] );

		$this->dm->persist( $branch );
		$this->dm->flush();

		return true;
	}

	public function editBranch( $branch_id, $data = array() ) {
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

		$branch = $this->dm->getRepository( 'Document\Company\Branch' )->find( $branch_id );
		if ( empty( $branch ) ) {
			return false;
		}

		// name is exist
		if ( $branch->getName() != $data['name'] && $this->isExistName( $data['name'] ) ) {
			return false;
		}

		$branch->setName( $data['name'] );
		$branch->setStatus( $data['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteBranchs( $data ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$branch = $this->dm->getRepository( 'Document\Company\Branch' )->find( $id );
				if ( !empty( $branch ) ) {
					$this->dm->createQueryBuilder( 'Document\Company\Position' )->remove()->field( 'branchs.id' )->equals( $branch->getId() )->getQuery()->execute();
				
					$this->dm->remove( $branch );
				}
			}
		}

		$this->dm->flush();
	}

	public function getBranch( $branch_id ) {
		return $this->dm->getRepository( 'Document\Company\Branch' )->find( $branch_id );
	}

	public function getBranchs( $data = array() ) {
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

		$query = $this->dm->createQueryBuilder( 'Document\Company\Branch' )->skip( $data['start'] )->limit( $data['limit'] );

		if ( isset( $data['filter_name'] ) ) {
			$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i' ) );
		}

		return $query->getQuery()->execute();
	}

	public function getTotalBranchs( $data = array() ) {
		return count( $this->dm->getRepository( 'Document\Company\Branch' )->findAll() );
	}

	public function isExistName( $name ) {
		$branch = $this->dm->getRepository( 'Document\Company\Branch' )->findOneBy( array( 'name' => strtolower( trim( $name ) ) ) );

		if ( !empty( $branch ) ) {
			return true;
		}else {
			return false;
		}
	}
}
?>