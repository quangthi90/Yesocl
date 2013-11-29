<?php
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

		$user_id = $this->customer->getId();
		$user = $this->model_user_user->getUserFull( array('user_id' => $user_id) );

		// Entry phone type
		$phone_types = $this->model_data_value->getAllValues( array( 'filter_type_code' => $this->config->get( 'datatype_phone_type' ) ) );
		$this->data['phone_types'] = array();
		foreach ($phone_types as $phone_type) {
			$this->data['phone_types'][] = array(
				'text' => $phone_type->getName(),
				'code' => $phone_type->getValue(),
			);
		}

		// phone
		$phones_data = array();
		foreach ($user->getMeta()->getPhones() as $phone) {
			if ( $phone && !empty( $phone ) ) {
				$phones_data[] = array(
					'id' => $phone->getId(),
					'type' => $phone->getType(),
					'phone' => $phone->getPhone(),
					'visible' => $phone->getVisible(),
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
		$educations_data = array();
		if ( $user->getMeta()->getBackground() ){
			foreach ($user->getMeta()->getBackground()->getEducations() as $education) {
				$educations_data[] = array(
					'id' => $education->getId(),
					'school' => $education->getSchool(),
					'school_id' => $education->getSchoolId(),
					'degree' => $education->getDegree(),
					'degree_id' => $education->getDegreeId(),
					'fieldofstudy' => $education->getFieldOfStudy(),
					'fieldofstudy_id' => $education->getFieldOfStudyId(),
					'started' => $education->getStarted(),
					'ended' => $education->getEnded()
				);
			}
		}

		// experiences
		$experiences_data = array();
		if ( $user->getMeta()->getBackground() ){
			foreach ($user->getMeta()->getBackground()->getExperiences() as $experience) {
				$ended = $experience->getEnded();
				$experiences_data[] = array(
					'id' => $experience->getId(),
					'title' => $experience->getTitle(),
					'company' => $experience->getCompany(),
					'location' => $experience->getLocation()->getLocation(),
					'city_id' => $experience->getLocation()->getId(),
					'current' => ($ended) ? 0 : 1,
					'self_employed' => ($experience->getSelfEmployed()) ? 1 : 0,
					'started_month' => $experience->getStarted()->format('n'),
					'ended_month' => ($ended) ? $ended->format('n') : '',
					'started_year' => $experience->getStarted()->format('Y'),
					'ended_year' => ($ended) ? $ended->format('Y') : '',
					'started_text' => $experience->getStarted()->format('F Y'),
					'ended_text' => ($ended) ? $experience->getEnded()->format('F Y') : '',
				);
			}
		}

		// skills
		$skills_data = array();
		if ( $user->getMeta()->getBackground() ){
			foreach ($user->getMeta()->getBackground()->getSkills() as $skill) {
				$skills_data[] = array(
					'id' => $skill->getId(),
					'skill' => $skill->getSkill()
				);
			}
		}

		// email
		$emails_data = array();
		foreach ($user->getEmails() as $key => $email) {
			$emails_data[$key] = array(
				'email' => $email->getEmail(),
				'primary' => $email->getPrimary(),
			);
		}

		// user data
		$this->data['user'] = array(
			'id' => $user->getId(),
			'username' => $user->getUsername(),
			'firstname' => $user->getMeta()->getFirstname(),
			'lastname' => $user->getMeta()->getLastname(),
			'fullname' => $user->getFullName(),
			'emails' => $emails_data,
			'phones' => $phones_data,
			'sex' => $user->getMeta()->getSex(),
			'sext' => $user->getMeta()->getSex() ? $this->language->get('text_male') : $this->language->get('text_female'),
			'birthday' => $user->getMeta()->getBirthday() ? $user->getMeta()->getBirthday()->format('d/m/Y') : date('d/m/Y', time()),
			'location' => $user->getMeta()->getLocation() ? $user->getMeta()->getLocation()->getLocation() : '',
			'cityid' => $user->getMeta()->getLocation() ? $user->getMeta()->getLocation()->getCityId() : '',
			'address' => $user->getMeta()->getAddress(),
			'industry' => $user->getMeta()->getIndustry(),
			'industryid' => $user->getMeta()->getIndustryId(),
			'summary' => $user->getMeta()->getBackground() ? $user->getMeta()->getBackground()->getSummary() : '',
			'educations' => $educations_data,
			'experiences' => $experiences_data,
			'skills' => $skills_data
		);

		// orther const
		$this->data['current_year'] = date('Y');
		$this->data['before_year'] = $this->data['current_year'] - 100;

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
}
?>