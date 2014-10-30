<?php
class ControllerAccountProfilesSummary extends Controller {
	private $error;

	public function update() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			$json['message'] = 'user not login';
		}elseif ( !$this->validate() ){
			$json = $this->error;
		}else{
			$this->load->model('user/meta');

			if ( !$this->model_user_meta->updateSummary( $this->customer->getId(), $this->request->post ) ) {
				$json['message'] = 'failed';
			}else {
				$json['message'] = 'success';
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	private function validate() {
		$this->load->language('account/profile');

		if ((utf8_strlen($this->request->post['summary']) < 50)) {
			$this->error['summary'] = $this->language->get('error_summary');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}