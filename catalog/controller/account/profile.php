<?php
use Document\User\Meta,
	Document\User\Meta\Location,
	Document\User\Meta\Background;

class ControllerAccountProfile extends Controller {
	private $error = array();

	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->extension->path('WelcomePage');

			$this->redirect( $this->extension->path('WelcomePage') );
		}

		// text
		$this->data['text_self_employed'] = 'Self-employed';

		$this->load->model('user/user');
		$this->load->model('data/value');
		$this->load->model('tool/image');

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
				'school' => html_entity_decode($oEducation->getSchool()),
				'school_id' => $oEducation->getSchoolId(),
				'degree' => html_entity_decode($oEducation->getDegree()),
				'degree_id' => $oEducation->getDegreeId(),
				'fieldofstudy' => html_entity_decode($oEducation->getFieldOfStudy()),
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
				'title' => html_entity_decode($oExperience->getTitle()),
				'company' => html_entity_decode($oExperience->getCompany()),
				'location' => html_entity_decode($oExperLocation->getLocation()),
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
			'slug' => $oUser->getSlug(),
			'avatar' => $this->model_tool_image->getAvatarUser( $oUser->getAvatar(), $oUser->getPrimaryEmail()->getEmail(), 150, 150 ),
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
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->load->model('user/user');
		$this->load->model('tool/image');

		if ( !empty($this->request->get['user_slug']) && $this->request->get['user_slug'] != $this->customer->getSlug() ){
			$oUser = $this->model_user_user->getUserFull( array('user_slug' => $this->request->get['user_slug']) );
		}else{
			$oUser = $this->customer->getUser();
		}

		if ( !$oUser ){
			throw new Exception(gettext("Page not found!"));
		}

		$aUser = $oUser->formatToCache();

		if ( !$oLocation = $oUser->getMeta()->getLocation() ){
			$oLocation = new Location();
		}

		$aUser['avatar'] 	= $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'], 150, 150 );
		$aUser['fullname'] 	= $oUser->getFullName();
		$aUser['gender'] 	= $oUser->getMeta()->getSex() ? 'Male' : 'Female';
		$aUser['birthday'] 	= $oUser->getMeta()->getBirthday()->format('d/m/Y');
		$aUser['address'] 	= $oUser->getMeta()->getAddress();
		$aUser['location']	= $oLocation->getLocation();
		$aUser['industry']	= $oUser->getMeta()->getIndustry();
		
		// Emails
		$aEmails = $oUser->getEmails();
		foreach ( $aEmails as $oEmail ) {
			$aUser['emails'][$oEmail->getId()] = $oEmail->getEmail();
			if ( $oEmail->getPrimary() == true ){
				$this->data['primary_email'] = $oEmail->getId();
			}
		}

		// Phones
		$aPhones = $oUser->getMeta()->getPhones();
		foreach ( $aPhones as $oPhone ) {
			$aUser['phones'][] = $oPhone->getPhone();
		}

		// Check background null
		if ( !$oBackground = $oUser->getMeta()->getBackground() ){
			$oBackground = new Background();
			$oBackground->setEducations( array() );
			$oBackground->setExperiences( array() );
			$oBackground->setSkills( array() );
		}

		// Summary
		$aUser['summary'] = $oBackground->getSummary();

		// Educations
		$lEducations = $oBackground->getEducations();
		foreach ( $lEducations as $oEducation ) {
			$aUser['educations'][] = array(
				'school' 	=> $oEducation->getSchool(),
				'degree'	=> $oEducation->getDegree(),
				'field'		=> $oEducation->getFieldOfStudy(),
				'started'	=> $oEducation->getStarted(),
				'ended'		=> $oEducation->getEnded()
			);
		}

		// Experiences
		$lExperiences = $oBackground->getExperiences();
		foreach ( $lExperiences as $oExperience ) {
			if ( !$oLocation = $oExperience->getLocation() ){
				$oLocation = new Location();
			}

			$aUser['experiences'][] = array(
				'company'	=> $oExperience->getCompany(),
				'location'	=> $oLocation->getLocation(),
				'title'		=> $oExperience->getTitle(),
				'started'	=> $oExperience->getStarted(),
				'ended'		=> $oExperience->getEnded()
			);
		}

		// Skills
		$lSkills = $oBackground->getSkills();
		foreach ( $lSkills as $oSkill ) {
			$aUser['skills'][] = $oSkill->getSkill();
		}

		$this->data['user'] = $aUser;

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