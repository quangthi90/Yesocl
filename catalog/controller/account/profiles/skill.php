<?php
class ControllerAccountProfilesSkill extends Controller {
	private $error;

	public function add() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			$json['message'] = 'failed';
		}elseif ( !$this->validate() ){
			$json = $this->error;
		}else {
			$this->load->model('user/background');

			if ( $id = $this->model_user_background->addSkill( $this->customer->getId(), $this->request->post ) ) {
				$json['message'] = 'success';
				$json['id'] = $id;
				$json['skill'] = $this->request->post['skill'];
				$json['remove'] = $this->extension->path('ProfileRemoveSkill', array(
					'skill_id' => $id
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
		}elseif ( empty($this->request->get['skill_id']) ){
			$json['message'] = 'Skill id is empty';
		}else {
			$this->load->model('user/background');

			if ( !$this->model_user_background->removeSkill( $this->customer->getId(), $this->request->get['skill_id'] ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	private function validate() {
		$this->load->language('account/profile');
		
		if ( empty($this->request->post['skill']) ) {
			$this->error['skill'] = $this->language->get('error_skill');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}