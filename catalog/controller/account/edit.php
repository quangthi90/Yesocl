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
		$this->data['link_update_background_experience'] = $this->url->link('account/edit/updateBackgroundExperience', '', 'SSL');

		$this->load->model('user/user');

		$user_id = $this->customer->getId();
		$user = $this->model_user_user->getUserFull( array('user_id' => $user_id) );

		// phone
		$phone_data = '';
		foreach ($user->getMeta()->getPhones() as $phone) {
			if ( $phone && !empty( $phone ) ) {
				$phone_data = $phone->getPhone();
				break;
			}
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

		// experiences
		$experiences_data = array();
		foreach ($user->getMeta()->getBackground()->getExperiences() as $experience) {
			$experiences_data[] = array(
				'id' => $experience->getId(),
				'title' => $experience->getTitle(),
				'company' => $experience->getCompany(),
				'location' => $experience->getLocation()->getLocation(),
				'location_id' => $experience->getLocation()->getId(),
				'started' => $experience->getStarted()->format('F Y'),
				'ended' => $experience->getEnded()->format('F Y')
				);
		}

		// user data
		$this->data['user'] = array(
			'id' => $user->getId(),
			'username' => $user->getUsername(),
			'fullname' => $user->getFullName(),
			'email' => $user->getPrimaryEmail()->getEmail(),
			'phone' => $phone_data,
			'sex' => $user->getMeta()->getSex() ? $this->language->get('text_male') : $this->language->get('text_female'),
			'sex_num' => $user->getMeta()->getSex(),
			'birthday' => $user->getMeta()->getBirthday(),
			'location' => $user->getMeta()->getLocation()->getLocation(),
			'address' => $user->getMeta()->getAddress(),
			'industry' => $user->getMeta()->getIndustry(),
			'sumary' => $user->getMeta()->getBackground()->getSumary(),
			'educations' => $educations_data,
			'experiences' => $experiences_data
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
		if ((utf8_strlen($this->request->post['fullname']) < 1) || (utf8_strlen($this->request->post['fullname']) > 32)) {
			$this->error['fullname'] = $this->language->get('error_fullname');
		}

		if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['email'])) {
			$this->error['email'] = $this->language->get('error_email');
		}
		
		$this->load->model('account/customer');
		if (($this->customer->getEmail() != $this->request->post['email']) && $this->model_account_customer->getTotalCustomersByEmail($this->request->post['email'])) {
			$this->error['warning'] = $this->language->get('error_exists');
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

	private function validateBackgroundEducation() {
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
		}else {
			$json['message'] = 'success';
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

			if ( !$this->model_account_customer->addEducation( $this->request->post ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function updateBackgroundEducation() {
		$json = array();

		if ( !$this->customer->isLogged() || !$this->validateBackgroundEducation() ) {
			$json['message'] = 'failed';
		}else {
			$json['message'] = 'success';
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>