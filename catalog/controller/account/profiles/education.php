<?php
class ControllerAccountProfilesEducation extends Controller {
	private $error;

	public function add() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			$json['message'] = 'failed';
		}elseif ( !$this->validate() ){
			$json = $this->error;
		}else {
			$this->load->model('user/background');

			if ( $id = $this->model_user_background->addEducation( $this->customer->getId(), $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['started'] = (int)$this->request->post['started'];
				$json['ended'] = (int)$this->request->post['ended'];
				$json['degree'] = $this->request->post['degree'];
				$json['school'] = $this->request->post['school'];
				$json['fieldofstudy'] = $this->request->post['fieldofstudy'];
				$json['degree_id'] = $this->request->post['degree_id'];
				$json['school_id'] = $this->request->post['school_id'];
				$json['fieldofstudy_id'] = $this->request->post['fieldofstudy_id'];
				$json['edit'] = $this->extension->path('ProfileEditEducation', array(
					'education_id' => $id
				));
				$json['remove'] = $this->extension->path('ProfileRemoveEducation', array(
					'education_id' => $id
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
		}elseif ( empty($this->request->get['education_id']) ){
			$json['message'] = 'education id is empty';
		}else {
			$this->load->model('user/background');

			if ( !$this->model_user_background->removeEducation( $this->customer->getId(), $this->request->get['education_id'] ) ) {
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
		}elseif ( empty($this->request->get['education_id']) ){
			$json['message'] = 'education id is empty';
		}else {
			$this->load->model('user/background');

			if ( $id = $this->model_user_background->editEducation( $this->customer->getId(), $this->request->get['education_id'], $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['started'] = (int)$this->request->post['started'];
				$json['ended'] = (int)$this->request->post['ended'];
				$json['degree'] = $this->request->post['degree'];
				$json['school'] = $this->request->post['school'];
				$json['fieldofstudy'] = $this->request->post['fieldofstudy'];
				$json['degree_id'] = $this->request->post['degree_id'];
				$json['school_id'] = $this->request->post['school_id'];
				$json['fieldofstudy_id'] = $this->request->post['fieldofstudy_id'];
				$json['edit'] = $this->extension->path('ProfileEditEducation', array(
					'education_id' => $id
				));
				$json['remove'] = $this->extension->path('ProfileRemoveEducation', array(
					'education_id' => $id
				));
			}else {
				$json['message'] = 'failed';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	private function validate() {
		$this->load->language('account/profile');
		
		if ( empty( $this->request->post['started'] ) ) {
			$this->error['education_started'] = $this->language->get('error_education_started_empty');
		
		}elseif ( empty( $this->request->post['ended'] ) ) {
			$this->error['education_ended'] = $this->language->get('error_education_ended_empty');
		
		}elseif ( $this->request->post['started'] > $this->request->post['ended'] ) {
			$this->error['education_started_ended'] = $this->language->get('error_education_started_ended');
		
		}elseif ( empty( $this->request->post['degree'] ) ) {
			$this->error['education_degree'] = $this->language->get('error_education_degree');
		
		}elseif ( empty( $this->request->post['school'] ) ) {
			$this->error['education_school'] = $this->language->get('error_education_school');
		
		}elseif ( empty( $this->request->post['fieldofstudy'] ) ) {
			$this->error['education_fieldofstudy'] = $this->language->get('error_education_fieldofstudy');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}