<?php
class ControllerAccountProfilesInformation extends Controller {
	private $error = array();

	public function update() {
		$this->load->language('account/profile');

		$json = array();

		if ( !$this->customer->isLogged() || !$this->validate() ) {
			$json['message'] = 'failed';
			$json = $this->error;
		}else {
			$this->load->model('user/meta');

			if ( $user = $this->model_user_meta->update( $this->customer->getId(), $this->request->post ) ) {
				$json['message'] = 'success';
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
				$json['cityid'] = $user->getMeta()->getLocation()->getCityId();
				$json['address'] = $user->getMeta()->getAddress();
				$json['industry'] = $user->getMeta()->getIndustry();
				$json['industryid'] = $user->getMeta()->getIndustryId();
			}else {
				$json = $this->error;
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	private function validate() {
		$this->load->language('account/profile');

		$this->load->model( 'user/user' );

		if ((strlen($this->request->post['username']) < 3) || (strlen($this->request->post['username']) > 32)) {
			$this->error['username'] = $this->language->get('error_username_length');
		
		}elseif ((utf8_strlen($this->request->post['firstname']) < 1) || (utf8_strlen($this->request->post['firstname']) > 32)) {
			$this->error['firstname'] = $this->language->get('error_firstname');
		
		}elseif ((utf8_strlen($this->request->post['lastname']) < 1) || (utf8_strlen($this->request->post['lastname']) > 32)) {
			$this->error['lastname'] = $this->language->get('error_lastname');
		
		}elseif ( \Datetime::createFromFormat('d/m/Y', $this->request->post['birthday']) > new Datetime() ) {
			$this->error['birthday'] = $this->language->get('error_birthday');
		
		}elseif ((utf8_strlen($this->request->post['address']) < 1) || (utf8_strlen($this->request->post['address']) > 32)) {
			$this->error['address'] = $this->language->get('error_address');
		
		}elseif ((utf8_strlen($this->request->post['location']) < 1) || (utf8_strlen($this->request->post['location']) > 32)) {
			$this->error['location'] = $this->language->get('error_location');
		
		}elseif ( (utf8_strlen($this->request->post['industry']) < 1) || utf8_strlen($this->request->post['industry']) > 64 ) {
			$this->error['industry'] = $this->language->get('error_industry');
		}

		if ( count( $this->request->post['emails'] ) < 1 ) {
			$this->error['emails'] = $this->language->get('error_email_empty');
		}else {
			foreach ( $this->request->post['emails'] as $key => $email ) {
				if ( (utf8_strlen($email['email']) < 6) || (utf8_strlen($email['email']) > 100) ) {
					if ( !isset( $this->error['email'] ) ) {
						$this->error['email'] = array();
					}
		      		$this->error['email'][$key] = $this->language->get('error_email_length');
		    	}elseif ( !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email['email']) ) {
		    		if ( !isset( $this->error['email'] ) ) {
						$this->error['email'] = array();
					}
		      		$this->error['email'][$key] = $this->language->get('error_email_format');
		    	}elseif ( $this->model_user_user->isExistEmail( $email['email'], $this->customer->getId() ) ){
		    		if ( !isset( $this->error['email'] ) ) {
						$this->error['email'] = array();
					}
		    		$this->error['email'][$key] = $this->language->get('error_email_exist');
		    	}
			}
		}

		if ( isset( $this->request->post['phones'] ) && is_array( $this->request->post['phones'] ) ) {
			foreach ($this->request->post['phones'] as $key => $phone) {
				if ( (strlen( $phone['phone'] ) < 6) || (strlen( $phone['phone'] ) > 20) ) {
					if ( !isset( $this->error['phone'] ) ) {
						$this->error['phone'] = array();
					}
					$this->error['phone'][$key] = $this->language->get('error_phone_length');
				}elseif ( !preg_match( '/^[0-9]+$/', $phone['phone'] ) ) {
					if ( !isset( $this->error['phone'] ) ) {
						$this->error['phone'] = array();
					}
					$this->error['phone'][$key] = $this->language->get('error_phone_format');
				}
			}
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>