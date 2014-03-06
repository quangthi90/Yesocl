<?php
use Document\User\Meta\Background,
	Document\User\Meta\Location,
	Document\User\Meta\Education,
	Document\User\Meta\Experience,
	Document\User\Meta\Skill;
use Datetime;

class ModelUserBackground extends Model {

	public function addEducation( $user_id, $data = array(), $isSocial = false ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( $isSocial == false && empty($data['started']) ) {
			return false;
		}

		if ( $isSocial == false && empty($data['ended']) ) {
			return false;
		}

		if ( $isSocial == false && empty($data['degree']) ) {
			return false;
		}

		if ( empty($data['school']) ) {
			return false;
		}

		if ( $isSocial == false && empty($data['fieldofstudy']) ) {
			return false;
		}

		$education = new Education();
		$education->setStarted( (string) $data['started'] );
		$education->setEnded( (string) $data['ended'] );
		$education->setDegree( htmlentities($data['degree']) );
		$education->setDegreeId( $data['degree_id'] );
		$education->setSchool( htmlentities($data['school']) );
		$education->setSchoolId( $data['school_id'] );
		$education->setFieldOfStudy( htmlentities($data['fieldofstudy']) );
		$education->setFieldOfStudyId( $data['fieldofstudy_id'] );

		$this->dm->persist( $education );

		if ( !$oBackground = $user->getMeta()->getBackground() ){
			$oBackground = new Background();
			$oBackground->addEducation( $education );
			$user->getMeta()->setBackground( $oBackground );
		}else{
			$oBackground->addEducation( $education );
		}

		$user->getMeta()->setCurrentInfo();
		
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

		$user->getMeta()->setCurrentInfo();

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
		$education->setDegree( htmlentities($data['degree']) );
		$education->setDegreeId( $data['degree_id'] );
		$education->setSchool( htmlentities($data['school']) );
		$education->setSchoolId( $data['school_id'] );
		$education->setFieldOfStudy( htmlentities($data['fieldofstudy']) );
		$education->setFieldOfStudyId( $data['fieldofstudy_id'] );

		// Set current job for user
		// Studient - Employee - Job Seeker
		$user->getMeta()->setCurrentInfo();

		$this->dm->flush();

		return $education->getId();
	}

	public function addExperience( $user_id, $data = array(), $isSocial = false ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( $isSocial == false && empty($data['started_month']) ) {
			return false;
		}

		if ( $isSocial == false && empty($data['started_year']) ) {
			return false;
		}

		if ( $isSocial == false && empty($data['title']) ) {
			return false;
		}

		if ( empty($data['company']) ) {
			return false;
		}

		if ( empty($data['self_employed']) ) {
			$data['self_employed'] = 0;
		}

		if ( $isSocial == false && empty($data['location']) ) {
			return false;
		}

		$experience = new Experience();
		$started = new \Datetime();
		$started->setDate( $data['started_year'], $data['started_month'], 1 );
		$experience->setStarted( $started );

		if (!empty($data['current']) && $data['current']) {
			$ended = null;
		}else {
			$ended = new \Datetime();
			$ended->setDate( $data['ended_year'], $data['ended_month'], 1 );
		}
		$experience->setEnded( $ended );

		$experience->setTitle( $data['title'] );
		$experience->setCompany( $data['company'] );
		$experience->setSelfEmployed( $data['self_employed'] );

		$location = new Location();
		$location->setLocation( trim( $data['location'] ) );
		$experience->setLocation( $location );

		$this->dm->persist( $experience );
		if ( !$oBackground = $user->getMeta()->getBackground() ){
			$oBackground = new Background();
			$oBackground->addExperience( $experience );
			$user->getMeta()->setBackground( $oBackground );
		}else{
			$oBackground->addExperience( $experience );
		}

		$this->dm->flush();

		if ( !empty($data['current']) ){
			$user->getMeta()->setCurrentInfo();
			$this->dm->flush();
		}

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

		if ( $id == $user->getMeta()->getCurrentId() ){
			$user->getMeta()->setCurrentInfo();
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

		if ( empty($data['started_year']) ) {
			return false;
		}

		if ( empty($data['title']) ) {
			return false;
		}

		if ( empty($data['company']) ) {
			return false;
		}

		if ( empty($data['self_employed']) ) {
			$data['self_employed'] = 0;
		}

		if ( empty($data['current']) ) {
			$data['current'] = 0;
		}

		if ( empty($data['location']) ) {
			return false;
		}

		if ( empty($data['ended_year']) && empty($data['ended_month']) ){
			$user->setCurrent( 'work at ' . $data['company'] );
		}

		$experience = $user->getMeta()->getBackground()->getExperienceById( $id );

		$started = new \Datetime();
		$started->setDate( $data['started_year'], $data['started_month'], 1 );
		$experience->setStarted( $started );

		if ( !empty($data['current']) ) {
			$ended = null;
		}else {
			$ended = new \Datetime();
			$ended->setDate( $data['ended_year'], $data['ended_month'], 1 );
		}
		$experience->setEnded( $ended );

		$experience->setTitle( $data['title'] );
		$experience->setCompany( $data['company'] );
		$experience->setSelfEmployed( $data['self_employed'] );

		$location = new Location();
		$location->setLocation( trim( $data['location'] ) );
		$experience->setLocation( $location );
		$location->setCityId( $data['cityid'] );

		if ( !empty($data['current']) ){
			$user->getMeta()->setCurrentInfo();
		}

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

		if ( !$oBackground = $user->getMeta()->getBackground() ){
			$oBackground = new Background();
			$oBackground->addSkill( $skill );
			$user->getMeta()->setBackground( $oBackground );
		}else{
			$oBackground->addSkill( $skill );
		}

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
}
?>