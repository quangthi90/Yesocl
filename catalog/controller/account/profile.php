<?php
class ControllerAccountProfile extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->extension->path('WelcomePage');

			$this->redirect( $this->extension->path('WelcomePage') );
		}

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
				$experiences_data[] = array(
					'id' => $experience->getId(),
					'title' => $experience->getTitle(),
					'company' => $experience->getCompany(),
					'location' => $experience->getLocation()->getLocation(),
					'location_id' => $experience->getLocation()->getId(),
					'started_month' => $experience->getStarted()->format('n'),
					'ended_month' => $experience->getEnded()->format('n'),
					'started_year' => $experience->getStarted()->format('Y'),
					'ended_year' => $experience->getEnded()->format('Y'),
					'started_text' => $experience->getStarted()->format('F Y'),
					'ended_text' => $experience->getEnded()->format('F Y')
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
			'birthday' => $user->getMeta()->getBirthday()->format('d/m/Y'),
			'birthdayt' => $user->getMeta()->getBirthday()->format('d/m/Y'),
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

	public function validatePhone() {
		$json = array();
		if ( $this->customer->isLogged() ) {
			//$this->load->language('account/customer');
			if ( !isset( $this->request->post['phone'] ) || !is_string( $this->request->post['phone'] ) ) {
				$json['message'] = $this->language->get('error_phone');
			}elseif ( (strlen( $this->request->post['phone'] ) < 6) || (strlen( $this->request->post['phone'] ) > 20) ) {
				$json['message'] = $this->language->get('error_phone');
			}elseif ( !preg_match( '/^[0-9]+$/', $this->request->post['phone'] ) ) {
				$json['message'] = $this->language->get('error_phone');
			}else {
				$json['message'] = 'success';
			}
		}
		$this->response->setOutput( json_encode( $json ) );
	}

	public function validateEmail() {
		$json = array();
		if ( $this->customer->isLogged() ) {
			//$this->load->language('account/customer');
			if ( !isset($this->request->post['emails']) || !is_array( $this->request->post['emails'] ) ){
				$json['emails'] = $this->language->get('error_emails');
			}elseif ( count( $this->request->post['emails'] ) < 1 ) {
				$json['emails'] = $this->language->get('error_emails');
			}else {
				$hasPrimary = false;
				foreach ( $json['emails'] as $key => $email ) {
					if ( !isset( $email['email'] ) || !is_string( $email['email'] ) ) {
						if ( !isset( $json['email'] ) ) {
							$json['email'] = array();
						}
						$json['email'][$key] = $this->language->get('error_email');
					}elseif ( (utf8_strlen($email['email']) < 6) || (utf8_strlen($email['email']) > 96)) {
						if ( !isset( $json['email'] ) ) {
							$json['email'] = array();
						}
			      		$json['email'][$key] = $this->language->get('error_email');
			    	}elseif ( !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email['email']) ) {
			    		if ( !isset( $json['email'] ) ) {
							$json['email'] = array();
						}
			      		$json['email'][$key] = $this->language->get('error_email');
			    	}elseif ( $this->model_user_user->isExistEmail( $email['email'], $this->customer->getId() ) ){
			    		if ( !isset( $json['email'] ) ) {
							$json['email'] = array();
						}
			    		$json['email'][$key] = $this->language->get('error_exist_email');
			    	}
			    	if ( $email['primary'] ) {
			    		$hasPrimary = true;
			    	}
				}
				if ( !$hasPrimary ) {
					if ( isset( $json['email']) ) {
						unset( $json['email'] );
					}
					$json['emails'] = $this->language->get('error_exist_primary_email');
				}
				if ( !isset( $json['email'] ) && !isset( $json['emails'] ) ) {
					$json['message'] = 'success';
				}
			}
		}
		$this->response->setOutput( json_encode( $json ) );
	}

	public function validateUsername() {
		$this->load->language('account/edit');

		$json = array();
		if ( $this->customer->isLogged() ) {
			$this->load->model( 'user/user' );

			if ((strlen($this->request->post['username']) < 5) || (strlen($this->request->post['username']) > 32)) {
				$json['message'] = $this->language->get('error_username');
			}elseif ( $this->model_user_user->isExistUsername( $this->request->post['username'], $this->customer->getId() ) ) {
				$json['message'] = $this->language->get('error_exist_username');
			}

			if ( !isset( $json['message'] ) ) {
				$json['message'] = 'success';
			}
		}
		$this->response->setOutput( json_encode( $json ) );
	}

	private function validateAddExperience() {
		if ( !isset( $this->request->post['started_month'] ) ) {
			$this->error['error_experience_started_month'] = $this->language->get('error_experience_started_month');
		}

		if ( !isset( $this->request->post['ended_month'] ) ) {
			$this->error['error_experience_ended_month'] = $this->language->get('error_experience_ended_month');
		}

		if ( !isset( $this->request->post['started_year'] ) ) {
			$this->error['error_experience_started_year'] = $this->language->get('error_experience_started_year');
		}

		if ( !isset( $this->request->post['ended_year'] ) ) {
			$this->error['error_experience_ended_year'] = $this->language->get('error_experience_ended_year');
		}

		if ( !isset( $this->request->post['title'] ) || empty( $this->request->post['title'] ) ) {
			$this->error['error_experience_title'] = $this->language->get('error_experience_title');
		}

		if ( !isset( $this->request->post['company'] ) || empty( $this->request->post['company'] ) ) {
			$this->error['error_experience_company'] = $this->language->get('error_experience_company');
		}

		if ( !isset( $this->request->post['location'] ) || empty( $this->request->post['location'] ) ) {
			$this->error['error_experience_location'] = $this->language->get('error_experience_location');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateRemoveExperience() {
		if ( !isset( $this->request->post['id'] ) || empty( $this->request->post['id'] ) ) {
			$this->error['error_background_experience'] = $this->language->get( 'error_background_experience' );
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateEditExperience() {
		if ( !isset( $this->request->post['id'] ) || empty( $this->request->post['id'] ) ) {
			$this->error['error_background_experience'] = $this->language->get( 'error_background_experience' );
		}

		if ( !isset( $this->request->post['started_month'] ) ) {
			$this->error['error_experience_started_month'] = $this->language->get('error_experience_started_month');
		}

		if ( !isset( $this->request->post['ended_month'] ) ) {
			$this->error['error_experience_ended_month'] = $this->language->get('error_experience_ended_month');
		}

		if ( !isset( $this->request->post['started_year'] ) ) {
			$this->error['error_experience_started_year'] = $this->language->get('error_experience_started_year');
		}

		if ( !isset( $this->request->post['ended_year'] ) ) {
			$this->error['error_experience_ended_year'] = $this->language->get('error_experience_ended_year');
		}

		if ( !isset( $this->request->post['title'] ) || empty( $this->request->post['title'] ) ) {
			$this->error['error_experience_title'] = $this->language->get('error_experience_title');
		}

		if ( !isset( $this->request->post['company'] ) || empty( $this->request->post['company'] ) ) {
			$this->error['error_experience_company'] = $this->language->get('error_experience_company');
		}

		if ( !isset( $this->request->post['location'] ) || empty( $this->request->post['location'] ) ) {
			$this->error['error_experience_location'] = $this->language->get('error_experience_location');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateAddSkill() {
		if ( !isset( $this->request->post['skill'] ) || empty( $this->request->post['skill'] ) ) {
			$this->error['skill'] = $this->language->get('error_skill');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateRemoveSkill() {
		if ( !isset( $this->request->post['id'] ) || empty( $this->request->post['id'] ) ) {
			$this->error['error_background_skill'] = $this->language->get( 'error_background_skill' );
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	public function addExperience() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateAddExperience() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( $id = $this->model_user_user->addExperience( $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['started_month'] = (int)$this->request->post['started_month'];
				$json['ended_month'] = (int)$this->request->post['ended_month'];
				$json['started_year'] = (int)$this->request->post['started_year'];
				$json['ended_year'] = (int)$this->request->post['ended_year'];
				$json['started_text'] = date("F Y", mktime(0, 0, 0, $json['started_month'], 1, $json['started_year']));
				$json['ended_text'] = date("F Y", mktime(0, 0, 0, $json['ended_month'], 1, $json['ended_year']));
				$json['title'] = $this->request->post['title'];
				$json['company'] = $this->request->post['company'];
				$json['location'] = $this->request->post['location'];
				$json['url'] = $this->url->link('account/edit/editExperience', '', 'SSL');
				$json['remove'] = $this->url->link('account/edit/removeExperience', '', 'SSL');
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function removeExperience() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateRemoveExperience() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( !$this->model_user_user->removeExperience( $this->request->post ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function editExperience() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateEditExperience() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( $id = $this->model_user_user->editExperience( $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['started_month'] = (int)$this->request->post['started_month'];
				$json['ended_month'] = (int)$this->request->post['ended_month'];
				$json['started_year'] = (int)$this->request->post['started_year'];
				$json['ended_year'] = (int)$this->request->post['ended_year'];
				$json['started_text'] = date("F Y", mktime(0, 0, 0, $json['started_month'], 1, $json['started_year']));
				$json['ended_text'] = date("F Y", mktime(0, 0, 0, $json['ended_month'], 1, $json['ended_year']));
				$json['title'] = $this->request->post['title'];
				$json['company'] = $this->request->post['company'];
				$json['location'] = $this->request->post['location'];
				$json['url'] = $this->url->link('account/edit/editExperience', '', 'SSL');
				$json['remove'] = $this->url->link('account/edit/removeExperience', '', 'SSL');
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function addSkill() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateAddSkill() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( $skill = $this->model_user_user->addSkill( $this->request->post ) ) {
				$json['id'] = $skill->getId();
				$json['skill'] = $skill->getSkill();
				$json['remove'] = $this->url->link('account/edit/removeSkill', '', 'SSL');

				$json['message'] = 'success';
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function removeSkill() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateRemoveSkill() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( !$this->model_user_user->removeSkill( $this->request->post ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>