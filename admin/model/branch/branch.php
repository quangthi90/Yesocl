<?php
use Document\Branch\Branch;

class ModelBranchBranch extends Doctrine {
	public function addBranch( $data = array() ) {
		// name is required & isn't exist
		if ( isset($data['name']) && !empty($data['name']) ) {
			$this->data['name'] = strtolower( trim($data['name']) );
		}else {
			return false;
		}
		
		// Company
		if ( isset($data['company_id']) ){
			$company = $this->dm->getRepository('Document\Company\Company')->find( $data['company_id'] );
			if ( !$company ){
				return false;
			}
		}else{
			return false;
		}
		
		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$branch = new Branch();
		$branch->setName( $data['name'] );
		$branch->setStatus( $data['status'] );
		$branch->setCompany( $company );
		
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

		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $branch_id );
		if ( empty( $branch ) ) {
			return false;
		}

		// Company
		if ( isset($data['company_id']) ){
			if ( !$branch->getCompany() || $data['company_id'] != $branch->getCompany()->getId() ){
				$company = $this->dm->getRepository('Document\Company\Company')->find( $data['company_id'] );
				if ( !$company ){
					return false;
				}
			}else{
				$company = $branch->getCompany();
			}
		}else{
			return false;
		}

		$branch->setName( $data['name'] );
		$branch->setStatus( $data['status'] );
		$branch->setCompany( $company );
		
		$this->dm->flush();

		return true;
	}

	public function deleteBranchs( $data ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $id );
				if ( !empty( $branch ) ) {
					$this->dm->createQueryBuilder( 'Document\Branch\Position' )->remove()->field( 'branchs.id' )->equals( $branch->getId() )->getQuery()->execute();
				
					$this->dm->remove( $branch );
				}
			}
		}

		$this->dm->flush();
	}

	public function getBranch( $branch_id ) {
		return $this->dm->getRepository( 'Document\Branch\Branch' )->find( $branch_id );
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

		$query = $this->dm->createQueryBuilder( 'Document\Branch\Branch' )->skip( $data['start'] )->limit( $data['limit'] );

		if ( isset( $data['filter_name'] ) ) {
			$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i' ) );
		}

		return $query->getQuery()->execute();
	}

	public function getAllBranchs(){
		$query = $this->dm->getRepository('Document\Branch\Branch')->findAll();

		return $query;
	}

	public function getTotalBranchs( $data = array() ) {
		return count( $this->dm->getRepository( 'Document\Branch\Branch' )->findAll() );
	}

	public function isExistName( $name ) {
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->findOneBy( array( 'name' => strtolower( trim( $name ) ) ) );

		if ( !empty( $branch ) ) {
			return true;
		}else {
			return false;
		}
	}
}
?>