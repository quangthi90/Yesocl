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
}
?>