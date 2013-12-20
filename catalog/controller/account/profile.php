<?php
use Document\User\Meta,
	Document\User\Meta\Location,
	Document\User\Meta\Background;

class ControllerAccountProfile extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->extension->path('WelcomePage');

			$this->redirect( $this->extension->path('WelcomePage') );
		}

		// text
		$this->data['text_self_employed'] = 'Self-employed';

		$this->load->model('user/user');
		$this->load->model('data/value');

		$oUser = $this->customer->getUser();

		// Entry phone type
		$lPhoneTypes = $this->model_data_value->getAllValues( array( 'filter_type_code' => $this->config->get( 'datatype_phone_type' ) ) );
		$this->data['phone_types'] = array();
		foreach ($lPhoneTypes as $oPhoneType) {
			$this->data['phone_types'][] = array(
				'text' => $oPhoneType->getName(),
				'code' => $oPhoneType->getValue(),
			);
		}

		// Check meta null
		if ( !$oMeta = $oUser->getMeta() ){
			$oMeta = new Meta();
			$oMeta->setPhones( array() );
		}

		// Check location null
		if ( !$oUserLocation = $oMeta->getLocation() ){
			$oUserLocation = new Location();
		}

		// Check background null
		if ( !$oBackground = $oMeta->getBackground() ){
			$oBackground = new Background();
			$oBackground->setEducations( array() );
			$oBackground->setExperiences( array() );
			$oBackground->setSkills( array() );
		}

		// phone
		$aPhones = array();
		foreach ( $oMeta->getPhones() as $oPhone ) {
			if ( !empty($oPhone) ) {
				$aPhones[] = array(
					'id' => $oPhone->getId(),
					'type' => $oPhone->getType(),
					'phone' => $oPhone->getPhone(),
					'visible' => $oPhone->getVisible(),
				);
			}
		}

		// sort education function
		function sortEducation($a, $b) {
			if ( $a['started'] == $b['started'] ) {
				if ( $a['ended'] == $b['ended'] ) {
					return 0;
				}
				return $a['ended'] > $b['ended'] ? -1 : 1;
			}
			return $a['started'] > $b['started'] ? -1 : 1;
		}

		// educations
		$aEducations = array();
		foreach ( $oBackground->getEducations() as $oEducation ) {
			$aEducations[] = array(
				'id' => $oEducation->getId(),
				'school' => $oEducation->getSchool(),
				'school_id' => $oEducation->getSchoolId(),
				'degree' => $oEducation->getDegree(),
				'degree_id' => $oEducation->getDegreeId(),
				'fieldofstudy' => $oEducation->getFieldOfStudy(),
				'fieldofstudy_id' => $oEducation->getFieldOfStudyId(),
				'started' => $oEducation->getStarted(),
				'ended' => $oEducation->getEnded()
			);
		}

		// experiences
		$aExperiences = array();
		foreach ( $oBackground->getExperiences() as $oExperience ) {
			if ( !$oExperLocation = $oExperience->getLocation() ){
				$oExperLocation = new Location();
			}
			
			$aExperiences[] = array(
				'id' => $oExperience->getId(),
				'title' => $oExperience->getTitle(),
				'company' => $oExperience->getCompany(),
				'location' => $oExperLocation->getLocation(),
				'city_id' => $oExperLocation->getId(),
				'started' => $oExperience->getStarted(),
				'ended' => $oExperience->getEnded()
			);
		}

		// skills
		$aSkills = array();
		foreach ( $oBackground->getSkills() as $oSkill ) {
			$aSkills[] = array(
				'id' => $oSkill->getId(),
				'skill' => $oSkill->getSkill()
			);
		}

		// email
		$aEmails = array();
		foreach ($oUser->getEmails() as $key => $oEmail) {
			$aEmails[$key] = array(
				'email' => $oEmail->getEmail(),
				'primary' => $oEmail->getPrimary(),
			);
		}

		// user data
		$this->data['user'] = array(
			'id' => $oUser->getId(),
			'username' => $oUser->getUsername(),
			'firstname' => $oUser->getMeta()->getFirstname(),
			'lastname' => $oUser->getMeta()->getLastname(),
			'fullname' => $oUser->getFullName(),
			'emails' => $aEmails,
			'phones' => $aPhones,
			'sex' => $oUser->getMeta()->getSex(),
			'sext' => $oUser->getMeta()->getSex() ? $this->language->get('text_male') : $this->language->get('text_female'),
			'birthday' => $oMeta->getBirthday(),
			'location' => $oUserLocation->getLocation(),
			'cityid' => $oUserLocation->getCityId(),
			'address' => $oUser->getMeta()->getAddress(),
			'industry' => $oUser->getMeta()->getIndustry(),
			'industryid' => $oUser->getMeta()->getIndustryId(),
			'summary' => $oBackground->getSummary(),
			'educations' => $aEducations,
			'experiences' => $aExperiences,
			'skills' => $aSkills
		);

		// orther const
		$this->data['current_year'] = date('Y');
		$this->data['before_year'] = $this->data['current_year'] - 100;
		$this->data['fulture_year'] = $this->data['current_year'] + 10;

		// set selected menu
		$this->session->setFlash( 'menu', 'profile' );

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/profiles/profiles.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/profiles/profiles.tpl';
		} else {
			$this->template = 'default/template/account/profiles/profiles.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->twig_render());
	}
	public function view() {
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/profiles/profiles_view.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/profiles/profiles_view.tpl';
		} else {
			$this->template = 'default/template/account/profiles/profiles_view.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'	
		);
				
		$this->response->setOutput($this->twig_render());
	}
}
?>