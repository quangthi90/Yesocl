<?php
use Document\Company\Career;

class ModelCompanyCareer extends Doctrine {
	public function addCareer( $company_id, $data = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->find( $company_id );
		if ( empty( $company ) ) {
			return false;
		}

		// User is required
		if ( !isset( $data['user_id'] ) || $this->isExistUser( $data['user_id'], $company_id ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Position is required
		if ( !isset( $data['position'] ) ) {
			return false;
		}
		$position = $this->dm->getRepository( 'Document\Company\Position' )->find( $data['position'] );
		if ( empty( $position ) ) {
			return false;
		}

		$career = new Career();
		$career->setUser( $user );
		$career->setPosition( $position );

		$company->addCareer( $career );

		$this->dm->flush();

		return true;
	}

	public function editCareer( $career_id, $data = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->findOneBy( array( 'careers.id' => $career_id ) );
		if ( empty( $company ) ) {
			return false;
		}

		// Position is required
		if ( !isset( $data['position'] ) ) {
			return false;
		}
		$position = $this->dm->getRepository( 'Document\Company\Position' )->find( $data['position'] );
		if ( empty( $position ) ) {
			return false;
		}

		$career = $company->getCareerById( $career_id );

		// User is required
		if ( !isset( $data['user_id'] ) && $this->isExistUser( $data['user_id'], $company_id ) && $data['user_id'] != $career->getUser()->getId() ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		$career->setUser( $user );
		$career->setPosition( $position );

		$this->dm->flush();

		return true;
	}

	public function deleteCareers( $company_id, $data = array() ) {
		if ( isset($data['id']) ) {
			$company = $this->dm->getRepository('Document\Company\Company')->find( $company_id );
			
			if ( !empty( $company ) ){
				foreach ( $data['id'] as $id ) {
					$company->getCareers()->removeElement( $company->getCareerById( $id ) );
				}
			}
		}
		
		$this->dm->flush();
	}

	public function getCareers( $company_id, $data ) {
		$careers = array();
		$company = $this->dm->getRepository( 'Document\Company\Company' )->find( $company_id );
		if ( !empty( $company ) ) {
			$careers = $company->getCareers();
		}

		return $careers;
	}

	public function getCareer( $career_id, $company_id ) {
		$career = null;
		$company = $this->dm->getRepository( 'Document\Company\Company' )->find( $company_id );
		if ( !empty( $company ) ) {
			$career = $company->getCareerById( $career_id );
		}

		return $career;
	}

	public function isExistUser( $user_id, $company_id ) {
		$company = $this->dm->getRepository( 'Document\Company\Company' )->find( $company_id );

		if ( !empty( $company ) ) {
			foreach ($company->getCareers() as $career) {
				if ( $career->getUser()->getId() == $user_id ) {
					return true;
				}
			}

			return false;
		}else {
			return false;
		}
	}
}
?>