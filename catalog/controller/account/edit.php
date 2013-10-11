<?php
class ControllerAccountEdit extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->extension->path('WelcomePage');

			$this->redirect( $this->extension->path('WelcomePage') );
		}

		$this->data['link_update_profiles'] = $this->url->link('account/edit/updateProfiles', '', 'SSL');
		$this->data['link_update_background_sumary'] = $this->url->link('account/edit/updateBackgroundSumary', '', 'SSL');
		$this->data['link_update_background_education'] = $this->url->link('account/edit/updateBackgroundEducation', '', 'SSL');
		$this->data['link_add_education'] = $this->url->link('account/edit/addEducation', '', 'SSL');
		$this->data['link_remove_education'] = $this->url->link('account/edit/removeEducation', '', 'SSL');
		$this->data['link_edit_education'] = $this->url->link('account/edit/editEducation', '', 'SSL');
		$this->data['link_add_experience'] = $this->url->link('account/edit/addExperience', '', 'SSL');
		$this->data['link_remove_experience'] = $this->url->link('account/edit/removeExperience', '', 'SSL');
		$this->data['link_edit_experience'] = $this->url->link('account/edit/editExperience', '', 'SSL');
		$this->data['link_add_skill'] = $this->url->link('account/edit/addSkill', '', 'SSL');
		$this->data['link_remove_skill'] = $this->url->link('account/edit/removeSkill', '', 'SSL');
		
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

		//usort( $educations_data, 'sortEducation');

		// sort experience function
		/*function sortExperience($a, $b) {
			$c = strtotime( $a['started'] );
			$d = strtotime( $b['ended'] );
			if ( $c == $d ) {
				if ( $c == $d ) {
					return 0;
				}
				return $c > $d ? -1 : 1;
			}
			return $c > $d ? -1 : 1;
		}*/

		// experiences
		$experiences_data = array();
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

		//usort( $experiences_data, 'sortExperience');

		// skills
		$skills_data = array();
		foreach ($user->getMeta()->getBackground()->getSkills() as $skill) {
			$skills_data[] = array(
				'id' => $skill->getId(),
				'skill' => $skill->getSkill()
				);
		}

		// email
		$emails_data = array();
		foreach ($user->getEmails() as $key => $email) {
			$emails_data[$key] = array(
				'email' => $email->getEmail(),
				'primary' => $email->getPrimary() ? 1 : 0,
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
			'emails_js' => json_encode( $emails_data ),
			'phones' => $phones_data,
			'phones_js' => json_encode( $phones_data ),
			'sex' => $user->getMeta()->getSex() ? 1 : 0,
			'sext' => $user->getMeta()->getSex() ? $this->language->get('text_male') : $this->language->get('text_female'),
			'birthday' => $user->getMeta()->getBirthday()->format('d/m/Y'),
			'birthdayt' => $user->getMeta()->getBirthday()->format('d/m/Y'),
			'location' => $user->getMeta()->getLocation()->getLocation(),
			'address' => $user->getMeta()->getAddress(),
			'industry' => $user->getMeta()->getIndustry(),
			'sumary' => $user->getMeta()->getBackground()->getSumary(),
			'educations' => $educations_data,
			'experiences' => $experiences_data,
			'skills' => $skills_data
		);

		// orther const
		$this->data['current_year'] = date('Y');
		$this->data['before_year'] = $this->data['current_year'] - 100;
		// print($user->getUsername());
		// print($user ? 'not null' : 'null');
		// exit;

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

	private function validate() {
		if ((utf8_strlen($this->request->post['firstname']) < 1) || (utf8_strlen($this->request->post['firstname']) > 32)) {
			$this->error['firstname'] = $this->language->get('error_firstname');
		}

		if ((utf8_strlen($this->request->post['lastname']) < 1) || (utf8_strlen($this->request->post['lastname']) > 32)) {
			$this->error['lastname'] = $this->language->get('error_lastname');
		}

		if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['email'])) {
			$this->error['email'] = $this->language->get('error_email');
		}
		
		if (($this->customer->getEmail() != $this->request->post['email']) && $this->model_account_customer->getTotalCustomersByEmail($this->request->post['email'])) {
			$this->error['warning'] = $this->language->get('error_exists');
		}

		if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 32)) {
			$this->error['telephone'] = $this->language->get('error_telephone');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateProfiles() {
		$this->load->model( 'account/customer' );

		if ( !isset( $this->request->post['username'] ) || !is_string( $this->request->post['username'] ) ) {
			$this->error['username'] = $this->language->get('error_username');
		}elseif ((strlen($this->request->post['username']) < 5) || (strlen($this->request->post['username']) > 32)) {
			$this->error['username'] = $this->language->get('error_username');
		}elseif ( !preg_match( '/^[A-z]+[0-9]*$/', $this->request->post['username']) ) {
			$this->error['username'] = $this->language->get('error_username');
		}elseif ( $this->model_account_customer->isExistUsername( $this->request->post['username'], $this->customer->getId() ) ) {
			$this->error['username'] = $this->language->get('error_exist_username');
		}

		if ( !isset( $this->request->post['firstname'] ) || !is_string( $this->request->post['firstname'] ) ) {
			$this->error['firstname'] = $this->language->get('error_firstname');
		}elseif ((utf8_strlen($this->request->post['firstname']) < 1) || (utf8_strlen($this->request->post['firstname']) > 32)) {
			$this->error['firstname'] = $this->language->get('error_firstname');
		}

		if ( !isset( $this->request->post['lastname'] ) || !is_string( $this->request->post['lastname'] ) ) {
			$this->error['lastname'] = $this->language->get('error_lastname');
		}elseif ((utf8_strlen($this->request->post['lastname']) < 1) || (utf8_strlen($this->request->post['lastname']) > 32)) {
			$this->error['lastname'] = $this->language->get('error_lastname');
		}

		if ( !isset($this->request->post['birthday']) || !is_string( $this->request->post['birthday']) ) {
			$this->error['birthday'] = $this->language->get('error_birthday');
		}elseif ( !(\Datetime::createFromFormat('d/m/Y', $this->request->post['birthday'])) ) {
			$this->error['birthday'] = $this->language->get('error_birthday');
		}

		if ( isset($this->request->post['emails']) ){
			foreach ( $this->request->post['emails'] as $email ) {
				if ((utf8_strlen($email['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email['email'])) {
		      		$this->error['email'] = $this->language->get('error_email');
		      		break;
		    	}
		    	
		    	if ( $this->model_account_customer->isExistEmail($this->customer->getId(), $email['email']) ){
		    		$this->error['email'] = $this->language->get('error_exist_email');
		      		break;
		    	}
			}
		}

		if ( isset( $this->request->post['phones'] ) && is_array( $this->request->post['phones'] ) ) {
			foreach ($this->request->post['phones'] as $key => $phone) {
				if ( !isset( $phone['phone'] ) || !is_string( $phone['phone'] ) ) {
					if ( !isset( $this->error['phone'] ) ) {
						$this->error['phone'] = array();
					}
					$this->error['phone'][$key] = $this->language->get('error_phone');
				}elseif ( (strlen( $phone['phone'] ) < 6) || (strlen( $phone['phone'] ) > 20) ) {
					if ( !isset( $this->error['phone'] ) ) {
						$this->error['phone'] = array();
					}
					$this->error['phone'][$key] = $this->language->get('error_phone');
				}elseif ( !preg_match( '/^[0-9]+$/', $phone['phone'] ) ) {
					if ( !isset( $this->error['phone'] ) ) {
						$this->error['phone'] = array();
					}
					$this->error['phone'][$key] = $this->language->get('error_phone');
				}
			}
		}

		if ( !isset( $this->request->post['address'] ) || !is_string( $this->request->post['address'] ) ) {
			$this->error['address'] = $this->language->get('error_address');
		}elseif ((utf8_strlen($this->request->post['address']) < 1) || (utf8_strlen($this->request->post['address']) > 255)) {
			$this->error['address'] = $this->language->get('error_address');
		}

		if ( !isset( $this->request->post['location'] ) || !is_string( $this->request->post['location'] ) ) {
			$this->error['location'] = $this->language->get('error_location');
		}elseif ((utf8_strlen($this->request->post['location']) < 1) || (utf8_strlen($this->request->post['location']) > 255)) {
			$this->error['location'] = $this->language->get('error_location');
		}

		if ( isset( $this->request->post['industry'] ) && is_string( $this->request->post['industry'] ) && (utf8_strlen($this->request->post['industry']) > 1) ) {
			if ( utf8_strlen($this->request->post['industry']) > 64 ) {
				$this->error['industry'] = $this->language->get('error_industry');
			}elseif ( !preg_match('/^[A-z]+$/', $this->request->post['industry']) ) {
				$this->error['industry'] = $this->language->get('error_industry');
			}
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateBackgroundSumary() {
		if ((utf8_strlen($this->request->post['sumary']) < 1)) {
			$this->error['sumary'] = $this->language->get('error_sumary');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateAddEducation() {
		if ( !isset( $this->request->post['started'] ) ) {
			$this->error['error_education_started'] = $this->language->get('error_education_started');
		}

		if ( !isset( $this->request->post['ended'] ) ) {
			$this->error['error_education_ended'] = $this->language->get('error_education_ended');
		}

		if ( !isset( $this->request->post['degree'] ) || empty( $this->request->post['degree'] ) ) {
			$this->error['error_education_degree'] = $this->language->get('error_education_degree');
		}

		if ( !isset( $this->request->post['school'] ) || empty( $this->request->post['school'] ) ) {
			$this->error['error_education_school'] = $this->language->get('error_education_school');
		}

		if ( !isset( $this->request->post['fieldofstudy'] ) || empty( $this->request->post['fieldofstudy'] ) ) {
			$this->error['error_education_fieldofstudy'] = $this->language->get('error_education_fieldofstudy');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateRemoveEducation() {
		if ( !isset( $this->request->post['id'] ) || empty( $this->request->post['id'] ) ) {
			$this->error['error_background_education_id'] = $this->language->get( 'error_background_education_id' );
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateEditEducation() {
		if ( !isset( $this->request->post['id'] ) ) {
			$this->error['error_education'] = $this->language->get('error_education');
		}

		if ( !isset( $this->request->post['started'] ) ) {
			$this->error['error_education_started'] = $this->language->get('error_education_started');
		}

		if ( !isset( $this->request->post['ended'] ) ) {
			$this->error['error_education_ended'] = $this->language->get('error_education_ended');
		}

		if ( !isset( $this->request->post['degree'] ) || empty( $this->request->post['degree'] ) ) {
			$this->error['error_education_degree'] = $this->language->get('error_education_degree');
		}

		if ( !isset( $this->request->post['school'] ) || empty( $this->request->post['school'] ) ) {
			$this->error['error_education_school'] = $this->language->get('error_education_school');
		}

		if ( !isset( $this->request->post['fieldofstudy'] ) || empty( $this->request->post['fieldofstudy'] ) ) {
			$this->error['error_education_fieldofstudy'] = $this->language->get('error_education_fieldofstudy');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
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

	public function updateProfiles() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateProfiles() ) {
			$json['message'] = 'failed';
			$json = $this->error;
		}else {
			$this->load->model('account/customer');

			if ( $user = $this->model_account_customer->updateProfiles( $this->request->post ) ) {
				$json['message'] = 'success';

				$json['url'] = $this->url->link('account/edit/updateProfiles', '', 'SSL');
				$json['username'] = $user->getUsername();
				$json['firstname'] = $user->getMeta()->getFirstname();
				$json['lastname'] = $user->getMeta()->getLastname();
				$json['fullname'] = $user->getFullName();
				$json['email'] = $user->getPrimaryEmail()->getEmail();
				$json['phones'] = array();
				foreach ($user->getMeta()->getPhones() as $phone) {
					$json['phones'][] = array(
						'id' => $phone->getId(),
						'type' => $phone->getType(),
						'phone' => $phone->getPhone(),
						'visible' => $phone->getVisible()
						);
				}
				$json['phones_js'] = json_encode( $json['phones'] );
				$json['emails'] = array();
				foreach ($user->getEmails() as $key => $email) {
					$json['emails'][$key] = array(
						'email' => $email->getEmail(),
						'primary' => $email->getPrimary() ? 1 : 0,
						);
				}
				$json['emails_js'] = json_encode( $json['emails'] );
				$json['sex'] = $user->getMeta()->getSex() ? 1 : 0;
				$json['sext'] = $user->getMeta()->getSex() ? $this->language->get('text_male') : $this->language->get('text_female');
				$json['birthday'] = $user->getMeta()->getBirthday()->format('d/m/Y');
				$json['birthdayt'] = $user->getMeta()->getBirthday()->format('d/m/Y');
				$json['location'] = $user->getMeta()->getLocation()->getLocation();
				$json['address'] = $user->getMeta()->getAddress();
				$json['industry'] = $user->getMeta()->getIndustry();
			}else {
				//$json['message'] = 'failed';
				$json = $this->error;
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function updateBackgroundSumary() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateBackgroundSumary() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( !$this->model_account_customer->updateBackground( $this->request->post ) ) {
				$json['message'] = 'failed'; 
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function addEducation() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateAddEducation() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( $id = $this->model_account_customer->addEducation( $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['started'] = (int)$this->request->post['started'];
				$json['ended'] = (int)$this->request->post['ended'];
				$json['degree'] = $this->request->post['degree'];
				$json['school'] = $this->request->post['school'];
				$json['fieldofstudy'] = $this->request->post['fieldofstudy'];
				$json['url'] = $this->url->link('account/edit/editEducation', '', 'SSL');
				$json['remove'] = $this->url->link('account/edit/removeEducation', '', 'SSL');
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function removeEducation() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateRemoveEducation() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( !$this->model_account_customer->removeEducation( $this->request->post ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function editEducation() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateEditEducation() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( $id = $this->model_account_customer->editEducation( $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['started'] = (int)$this->request->post['started'];
				$json['ended'] = (int)$this->request->post['ended'];
				$json['degree'] = $this->request->post['degree'];
				$json['school'] = $this->request->post['school'];
				$json['fieldofstudy'] = $this->request->post['fieldofstudy'];
				$json['url'] = $this->url->link('account/edit/editEducation', '', 'SSL');
				$json['remove'] = $this->url->link('account/edit/removeEducation', '', 'SSL');
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function addExperience() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateAddExperience() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('account/customer');

			if ( $id = $this->model_account_customer->addExperience( $this->request->post ) ) {
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

			if ( !$this->model_account_customer->removeExperience( $this->request->post ) ) {
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

			if ( $id = $this->model_account_customer->editExperience( $this->request->post ) ) {
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

			if ( $skill = $this->model_account_customer->addSkill( $this->request->post ) ) {
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

			if ( !$this->model_account_customer->removeSkill( $this->request->post ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>