<?php
use Document\User\User,
	Document\User\Meta,
	Document\User\Meta\Email,
	Document\User\Meta\Location,
	Document\User\Meta\Education,
	Document\User\Meta\Phone,
	Document\User\Meta\Skill,
	Document\User\Meta\Background;

class ModelUserBackground extends Model {

	public function addEducation( $user_id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( !isset( $data['started'] ) ) {
			return false;
		}

		if ( !isset( $data['ended'] ) ) {
			return false;
		}

		if ( !isset( $data['degree'] ) || empty( $data['degree'] ) ) {
			return false;
		}

		if ( !isset( $data['school'] ) || empty( $data['school'] ) ) {
			return false;
		}

		if ( !isset( $data['fieldofstudy'] ) || empty( $data['fieldofstudy'] ) ) {
			return false;
		}

		$education = new Education();
		$education->setStarted( (string) $data['started'] );
		$education->setEnded( (string) $data['ended'] );
		$education->setDegree( $data['degree'] );
		$education->setSchool( $data['school'] );
		$education->setFieldOfStudy( $data['fieldofstudy'] );

		$this->dm->persist( $education );
		$user->getMeta()->getBackground()->addEducation( $education );

		$this->dm->flush();

		return $education->getId();
	}

	public function removeEducation( $user_id, $id ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		$education = $user->getMeta()->getBackground()->getEducationById( $id );
		
		if ( !$education ){
			return false;
		}

		$user->getMeta()->getBackground()->getEducations()->removeElement( $education );

		$this->dm->flush();

		return true;
	}

	public function editEducation( $user_id, $id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( !isset( $data['started'] ) ) {
			return false;
		}

		if ( !isset( $data['ended'] ) ) {
			return false;
		}

		if ( !isset( $data['degree'] ) || empty( $data['degree'] ) ) {
			return false;
		}

		if ( !isset( $data['school'] ) || empty( $data['school'] ) ) {
			return false;
		}

		if ( !isset( $data['fieldofstudy'] ) || empty( $data['fieldofstudy'] ) ) {
			return false;
		}

		$education = $user->getMeta()->getBackground()->getEducationById( $id );

		$education->setStarted( (string) $data['started'] );
		$education->setEnded( (string) $data['ended'] );
		$education->setDegree( $data['degree'] );
		$education->setSchool( $data['school'] );
		$education->setFieldOfStudy( $data['fieldofstudy'] );

		$this->dm->flush();

		return $education->getId();
	}
}
?>