<?php
use Document\User\Meta\Location,
	Document\User\Meta\Background,
	Document\User\Meta\Education,
	Document\User\Meta\Experience,
	Document\User\Meta\Skill;

class ModelUserBackground extends Model {
	public function addEducation( $user_id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( empty($data['started']) ) {
			return false;
		}

		if ( empty($data['ended']) ) {
			return false;
		}

		if ( empty($data['degree']) ) {
			return false;
		}

		if ( empty($data['school']) ) {
			return false;
		}

		if ( empty($data['fieldofstudy']) ) {
			return false;
		}

		$education = new Education();
		$education->setStarted( (string) $data['started'] );
		$education->setEnded( (string) $data['ended'] );
		$education->setDegree( $data['degree'] );
		$education->setDegreeId( $data['degree_id'] );
		$education->setSchool( $data['school'] );
		$education->setSchoolId( $data['school_id'] );
		$education->setFieldOfStudy( $data['fieldofstudy'] );
		$education->setFieldOfStudyId( $data['fieldofstudy_id'] );

		$this->dm->persist( $education );
		$user->getMeta()->getBackground()->addEducation( $education );

		$this->dm->flush();

		return $education->getId();	}

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

		if ( empty( $data['started'] ) ) {
			return false;
		}

		if ( empty( $data['ended'] ) ) {
			return false;
		}

		if ( empty( $data['degree'] ) || empty( $data['degree'] ) ) {
			return false;
		}

		if ( empty( $data['school'] ) || empty( $data['school'] ) ) {
			return false;
		}

		if ( empty( $data['fieldofstudy'] ) || empty( $data['fieldofstudy'] ) ) {
			return false;
		}

		$education = $user->getMeta()->getBackground()->getEducationById( $id );

		$education->setStarted( (string) $data['started'] );
		$education->setEnded( (string) $data['ended'] );
		$education->setDegree( $data['degree'] );
		$education->setDegreeId( $data['degree_id'] );
		$education->setSchool( $data['school'] );
		$education->setSchoolId( $data['school_id'] );
		$education->setFieldOfStudy( $data['fieldofstudy'] );
		$education->setFieldOfStudyId( $data['fieldofstudy_id'] );

		$this->dm->flush();

		return $education->getId();	}

	public function addExperience( $user_id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( empty($data['started_month']) ) {
			return false;
		}

		if ( empty($data['ended_month']) ) {
			return false;
		}

		if ( empty($data['started_year']) ) {
			return false;
		}

		if ( empty($data['ended_year']) ) {
			return false;
		}

		if ( empty($data['title']) ) {
			return false;
		}

		if ( empty($data['company']) ) {
			return false;
		}

		if ( empty($data['location']) ) {
			return false;
		}

		$experience = new Experience();
		$started = new \Datetime();
		$started->setDate( $data['started_year'], $data['started_month'], 1 );
		$experience->setStarted( $started );

		$ended = new \Datetime();
		$ended->setDate( $data['ended_year'], $data['ended_month'], 1 );
		$experience->setEnded( $ended );

		$experience->setTitle( $data['title'] );
		$experience->setCompany( $data['company'] );

		$location = new Location();
		$location->setLocation( trim( $data['location'] ) );
		$experience->setLocation( $location );

		$this->dm->persist( $experience );
		$user->getMeta()->getBackground()->addExperience( $experience );

		$this->dm->flush();

		return $experience->getId();
	}

	public function removeExperience( $user_id, $id ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		$experience = $user->getMeta()->getBackground()->getExperienceById( $id );
		
		if ( $experience ){
			$user->getMeta()->getBackground()->getExperiences()->removeElement( $experience );
		}

		$this->dm->flush();

		return true;
	}

	public function editExperience( $user_id, $id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( empty($data['started_month']) ) {
			return false;
		}

		if ( empty($data['ended_month']) ) {
			return false;
		}

		if ( empty($data['started_year']) ) {
			return false;
		}

		if ( empty($data['ended_year']) ) {
			return false;
		}

		if ( empty($data['title']) ) {
			return false;
		}

		if ( empty($data['company']) ) {
			return false;
		}

		if ( empty($data['location']) ) {
			return false;
		}

		$experience = $user->getMeta()->getBackground()->getExperienceById( $id );

		$started = new \Datetime();
		$started->setDate( $data['started_year'], $data['started_month'], 1 );
		$experience->setStarted( $started );

		$ended = new \Datetime();
		$ended->setDate( $data['ended_year'], $data['ended_month'], 1 );
		$experience->setEnded( $ended );

		$experience->setTitle( $data['title'] );
		$experience->setCompany( $data['company'] );

		$location = new Location();
		$location->setLocation( trim( $data['location'] ) );
		$experience->setLocation( $location );
		$location->setCityId( $data['cityid'] );

		$this->dm->flush();

		return $experience->getId();
	}

	public function addSkill( $user_id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( !isset( $data['skill'] ) || empty( $data['skill'] ) ) {
			return false;
		}

		$skill = new Skill();
		$skill->setSkill( $data['skill'] );

		$this->dm->persist( $skill );
		$user->getMeta()->getBackground()->addSkill( $skill );

		$this->dm->flush();

		return $skill->getId();
	}

	public function removeSkill( $user_id, $id ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		$skill = $user->getMeta()->getBackground()->getSkillById( $id );

		if ( $skill ){
			$user->getMeta()->getBackground()->getSkills()->removeElement( $skill );
		}

		$this->dm->flush();

		return true;
	}

	public function completeRegister( $user_id, $data = array()) {
		$user = $this->dm->getRepository('Document\User\User')->find($user_id);

		if (!$user) {
			return false;
		}

		if (empty($data['location'])) {
			return false;
		}

		if (empty($data['city_id'])) {
			$data['city_id'] = 0;
		}

		if (empty($data['postal_code'])) {
			$data['postal_code'] = '';
		}

		if (!isset($data['current'])) {
			return false;
		}

		if ($data['current'] == '2') {
			if (empty($data['company_name'])) {
				return false;
			}

			if (empty($data['company_id'])) {
				$data['company']['id'] = 0;
			}

			if (empty($data['company_title'])) {
				return false;
			}

			if (empty($data['company_self_employed'])) {
				$data['company_self_employed'] = 0;
			}

			if (empty($data['company_start_month'])) {
				$data['company_start_month'] = date('m');
			}

			if (empty($data['company_start_year'])) {
				$data['company_start_year'] = date('Y');
			}
		}elseif ($data['current'] == '1') {
			if (empty($data['school_name'])) {
				return false;
			}

			if (empty($data['school_id'])) {
				$data['school']['id'] = 0;
			}

			if (empty($data['school_fieldofstudy'])) {
				return false;
			}

			if (empty($data['school_start'])) {
				$data['school']['start'] = date('Y');
			}

			if (empty($data['school_end'])) {
				$data['school']['end'] = date('Y');
			}
		}else {
			if (empty($data['mscompany_name'])) {
				return false;
			}

			if (empty($data['mscompany_id'])) {
				$data['mscompany']['id'] = 0;
			}

			if (empty($data['mscompany_title'])) {
				return false;
			}

			if (empty($data['mscompany_self_employed'])) {
				$data['mscompany_self_employed'] = 0;
			}

			if (empty($data['mscompany_start_month'])) {
				$data['mscompany_start_month'] = date('m');
			}

			if (empty($data['mscompany_start_year'])) {
				$data['mscompany_start_year'] = date('Y');
			}

			if (empty($data['mscompany_end_month'])) {
				$data['mscompany_end_month'] = date('m');
			}

			if (empty($data['mscompany_end_year'])) {
				$data['mscompany_end_year'] = date('Y');
			}
		}

		$location = new Location();
		$location->setLocation($data['location']);
		$location->setCityId($data['city_id']);
		$user->getMeta()->setLocation($location);

		$user->getMeta()->setPostalCode($data['postal_code']);

		if ($data['current'] == '2') {
			$experience = new Experience();
			$experience->setCompany($data['company_name']);
			$experience->setCompanyId($data['company_id']);
			$experience->setTitle($data['company_title']);
			$experience->setSelfEmployed($data['company_self_employed']);
			$start = new \Datetime();
			$start->setDate($data['company_start_month'], $data['company_start_year'], 1);
			$experience->setStarted($start);
			$experience->setEnded(null);
			if ($user->getMeta()->getBackground()) {
				$user->getMeta()->getBackground()->addExperience($experience);
			}else {
				$background = new Background();
				$background->addExperience($experience);
				$user->getMeta()->setBackground($background);
			}
		}elseif ($data['current'] == '1') {
			$education = new Education();
			$education->setSchool($data['school_name']);
			$education->setSchoolId($data['school_id']);
			$education->setFieldOfStudy($data['school_fieldofstudy']);
			$education->setStarted($data['school_start']);
			$education->setEnded($data['school_end']);
			if ($user->getMeta()->getBackground()) {
				$user->getMeta()->getBackground()->addEducation($education);
			}else {
				$background = new Background();
				$background->addEducation($education);
				$user->getMeta()->setBackground($background);
			}
		}else {
			$experience = new Experience();
			$experience->setCompany($data['mscompany_name']);
			$experience->setCompanyId($data['mscompany_id']);
			$experience->setTitle($data['mscompany_title']);
			$experience->setSelfEmployed($data['mscompany_self_employed']);
			$start = new \Datetime();
			$start->setDate($data['mscompany_start_month'], $data['mscompany_start_year'], 1);
			$experience->setStarted($start);
			$end = new \Datetime();
			$end->setDate($data['mscompany_end_month'], $data['mscompany_end_year'], 1);
			$experience->setEnded($end);
			if ($user->getMeta()->getBackground()) {
				$user->getMeta()->getBackground()->addExperience($experience);
			}else {
				$background = new Background();
				$background->addExperience($experience);
				$user->getMeta()->setBackground($background);
			}
		}

		$this->dm->flush();

		return true;
	}
}
?>