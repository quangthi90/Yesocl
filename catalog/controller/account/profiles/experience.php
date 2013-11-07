<?php
class ControllerAccountProfilesExperience extends Controller {
	private $error;

	public function add() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			$json['message'] = 'failed';
		}elseif ( !$this->validate() ){
			$json = $this->error;
		}else {
			$this->load->model('user/background');

			if ( $id = $this->model_user_background->addExperience($this->customer->getId(), $this->request->post ) ) {
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
				$json['city_id'] = $this->request->post['city_id'];
				$json['edit'] = $this->extension->path('ProfileEditExperience', array(
					'experience_id' => $id
				));
				$json['remove'] = $this->extension->path('ProfileRemoveExperience', array(
					'experience_id' => $id
				));
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function remove() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			$json['message'] = 'failed';
		}else {
			$this->load->model('user/background');

			if ( !$this->model_user_background->removeExperience($this->customer->getId(), $this->request->get['experience_id']) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function edit() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			$json['message'] = 'failed';
		}elseif ( !$this->validate() ){
			$json = $this->error;
		}else {
			$this->load->model('user/background');

			if ( $id = $this->model_user_background->editExperience( $this->customer->getId(), $this->request->get['experience_id'], $this->request->post ) ) {
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
				$json['city_id'] = $this->request->post['city_id'];
				$json['edit'] = $this->extension->path('ProfileEditExperience', array(
					'experience_id' => $id
				));
				$json['remove'] = $this->extension->path('ProfileRemoveExperience', array(
					'experience_id' => $id
				));
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	private function validate() {
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

		if ( empty( $this->request->post['title'] ) ) {
			$this->error['error_experience_title'] = $this->language->get('error_experience_title');
		}

		if ( empty( $this->request->post['company'] ) ) {
			$this->error['error_experience_company'] = $this->language->get('error_experience_company');
		}

		if ( empty( $this->request->post['location'] ) ) {
			$this->error['error_experience_location'] = $this->language->get('error_experience_location');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}