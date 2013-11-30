<?php 
class ControllerAccountRegister extends Controller {
	private $error = array();

	public function register(){
		$this->language->load('account/register');

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_account_customer->addCustomer($this->request->post);
			
			$this->customer->login($this->request->post['email'], $this->request->post['password']);
			
			unset($this->session->data['guest']);

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok'
	        )));
    	}
    	
    	if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'warning' => $this->data['error_warning']
        )));
		
	}
	      
  	public function index() {  		
  		if ($this->customer->getId()) {
  			// error
  			if (isset($this->error['localtion'])) {
  				$this->data['error_location'] = $this->error['location'];
  			}

  			if (isset($this->error['postal_code'])) {
  				$this->data['error_postal_code'] = $this->error['postal_code'];
  			}

  			if (isset($this->error['job_title'])) {
  				$this->data['error_job_title'] = $this->error['job_title'];
  			}

  			if (isset($this->error['company'])) {
  				$this->data['error_company'] = $this->error['company'];
  			}

  			if (isset($this->error['industry'])) {
  				$this->data['error_industry'] = $this->error['industry'];
  			}

  			if (isset($this->error['school'])) {
  				$this->data['error_school'] = $this->error['school'];
  			}

  			// text
  			$this->data['text_introdure_your_self'] = 'Introduce your self';
  			$this->data['text_create_profile'] = 'Create my profile';
  			$this->data['text_profile_recommend'] = 'A Yesocl profile helps you...';
  			$this->data['text_recommend_1'] = 'Showcase your skills and experience';
  			$this->data['text_recommend_2'] = 'Be found for new opportunities';
  			$this->data['text_recommend_3'] = 'Stay in touch with colleagues and friends';
  			$this->data['text_i_current'] = 'I am current';
  			$this->data['text_live_in'] = 'I live in';
  			$this->data['text_location_placer'] = 'Input Text';
  			$this->data['text_postal_code'] = 'Postal code';
  			$this->data['text_post_code_placer'] = 'Input Text';
  			$this->data['text_employed'] = 'Employed';
  			$this->data['text_job_seeker'] = 'Job Seeker';
  			$this->data['text_student'] = 'Student';
  			$this->data['text_most_recent_job_title'] = 'Most Recent Job title';
  			$this->data['text_job_title'] = 'Job title';
  			$this->data['text_job_title_placer'] = 'Input Text';
  			$this->data['text_industry'] = 'Industry';
  			$this->data['text_industry_placer'] = 'Input Text';
  			$this->data['text_self_employed'] = 'I am a self-employed';
  			$this->data['text_company'] = 'Company';
  			$this->data['text_most_recent_company'] = 'Most Recent Company';
  			$this->data['text_company_placer'] = 'Input Text';
  			$this->data['text_industry'] = 'Industry';
  			$this->data['text_industry_placer'] = 'Input Text';
  			$this->data['text_school'] = 'School';
  			$this->data['text_school_placer'] = 'Input Text';
  			$this->data['text_from'] = 'From';
  			$this->data['text_to'] = 'To';
  			$this->data['text_fieldofstudy'] = 'Field of study';
  			$this->data['text_fieldofstudy_placer'] = 'Input Text';

  			// error
  			$this->data['text_field_required'] = 'Field is required';
  			$this->data['text_error_location'] = 'Location must be between 3 to 127 character!';
  			$this->data['text_error_postal_code'] = 'Postal code must be between 3 to 5 character!';
  			$this->data['text_error_company_name'] = 'Company name must be between 3 to 127 character!';
  			$this->data['text_error_company_title'] = 'Job title must be between 3 to 127 character!';
  			$this->data['text_error_school_name'] = 'School name must be between 3 to 127 character!';
  			$this->data['text_error_school_fieldofstudy'] = 'Field of study must be between 3 to 127 character!';
  			$this->data['text_error_industry'] = 'Industry must be between 3 to 127 character!';

  			// link
  			$this->data['link_autocomplete_company'] = HTTP_SERVER . $this->url->link('company/company/autocomplete');
  			$this->data['link_autocomplete_school'] = HTTP_SERVER . $this->url->link('data/value/schoolAutoComplete');
  			$this->data['link_autocomplete_fieldofstudy'] = HTTP_SERVER . $this->url->link('data/value/fieldOfStudyAutoComplete');
  			$this->data['link_autocomplete_title'] = HTTP_SERVER . $this->url->link('data/value/industryAutoComplete');
  			$this->data['link_autocomplete_location'] = HTTP_SERVER . $this->url->link('data/value/locationAutoComplete');
  			$this->data['link_submit_step_1'] = HTTP_SERVER . $this->url->link('account/register/step1');

  			// get customer data
  			$this->load->model('account/customer');
  			$customer = $this->model_account_customer->getCustomer($this->customer->getId());
  			if (empty($customer)) {
  				// set redirect link & redirect to login form.
  			}

  			// fetch data to step 1
  			// common
  			$this->data['current_year'] = date('Y');
  			$this->data['before_year'] = $this->data['current_year'] - 99;
  			$this->data['future_year'] = $this->data['current_year'] + 10;

  			$meta = $customer->getMeta();
  			//location
  			$location = $meta->getLocation();
  			if ($location) {
	  			$this->data['location']	= $location->getLocation();
	  			$this->data['city_id']	= $location->getCityId();
  			}else {
	  			$this->data['location']	= '';
	  			$this->data['city_id']	= 0;
  			}
  			//post code
  			$this->data['postal_code'] = $meta->getPostalCode();
  			// background
	  		$this->data['current'] = 0;

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/register/register.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/account/register/register.tpl';
			} else {
				$this->template = 'default/template/account/register/register.tpl';
			}
			
			$this->children = array(
				'common/sidebar_control',
				'common/footer',
				'common/header'	
			);
					
			$this->response->setOutput($this->twig_render());
  		}else {
  			// set redirect link & redirect to login form.
  		}
  	}

  	public function step1() {
  		$aJson = array();

  		$this->load->model('user/background');
  		if ($this->customer->getId() && $this->validateStep1() && $this->model_user_background->completeRegister($this->customer->getId(), $this->request->post)) {
  			$aJson['message'] = 'success';
  		}else {
  			$aJson['message'] = 'error';
  		}

  		$aJson['error'] = $this->error;

  		$this->response->setOutput(json_encode($aJson));
  	}

  	private function validate() {
    	if ((utf8_strlen($this->request->post['firstname']) < 1) || (utf8_strlen($this->request->post['firstname']) > 32)) {
      		$this->error['warning'] = $this->language->get('error_firstname');
    	
    	}elseif ((utf8_strlen($this->request->post['lastname']) < 1) || (utf8_strlen($this->request->post['lastname']) > 32)) {
      		$this->error['warning'] = $this->language->get('error_lastname');
    	
    	}elseif ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['email'])) {
      		$this->error['warning'] = $this->language->get('error_email');
    	
    	}elseif ($this->model_account_customer->getCustomerByEmail($this->request->post['email'])) {
      		$this->error['warning'] = $this->language->get('error_exists');
    	}else{
    		$this->load->library('recaptcha');
			$captcha = new Recaptcha();
			$resp = $captcha->recaptcha_check_answer($_SERVER["REMOTE_ADDR"], 
				$this->request->post['recaptcha_challenge_field'],
				$this->request->post['recaptcha_response_field']
			);
			//file_put_contents("D:\\a.txt", $resp->error);
			if (!$resp->is_valid) {
	        	$this->error['warning'] = "Security code wasn't entered correctly";
	        }
	    }
    	if (!$this->error) {
      		return true;
    	} 
    	return false;
  	}	

  	private function validateStep1() {
  		//$this->load->language('account/register');

  		if (empty($this->request->post['location']) || strlen(trim($this->request->post['location'])) < 3 || strlen(trim($this->request->post['location'])) > 127) {
  			$this->error['location'] = $this->language->get('error_location');
  		}

  		if (!empty($this->request->post['postal_code']) && !preg_match('/^[0-9]{3,5}$/', $this->request->post['postal_code'])) {
  			$this->error['postal_code'] = $this->language->get('error_postal_code');
  		}

  		if (isset($this->request->post['current'])) {
  			if ($this->request->post['current'] == 2) {
  				if (empty($this->request->post['company_name']) || strlen(trim($this->request->post['company_name'])) < 3 || strlen(trim($this->request->post['company_name'])) > 127) {
  					$this->error['company_name'] = $this->language->get('error_company_name');
  				}

  				if (empty($this->request->post['company_title']) || strlen(trim($this->request->post['company_title'])) < 3 || strlen(trim($this->request->post['company_title'])) > 127) {
  					$this->error['company_title'] = $this->language->get('error_company_title');
  				}
  			}elseif ($this->request->post['current'] == 1) {
  				if (empty($this->request->post['school_name']) || strlen(trim($this->request->post['school_name'])) < 3 || strlen(trim($this->request->post['school_name'])) > 127) {
  					$this->error['school_name'] = $this->language->get('error_school_name');
  				}

  				if (empty($this->request->post['school_fieldofstudy']) || strlen(trim($this->request->post['school_fieldofstudy'])) < 3 || strlen(trim($this->request->post['school_fieldofstudy'])) > 127) {
  					$this->error['school_fieldofstudy'] = $this->language->get('error_school_fieldofstudy');
  				}
  			}else {
  				if (empty($this->request->post['mscompany_name']) || strlen(trim($this->request->post['mscompany_name'])) < 3 || strlen(trim($this->request->post['mscompany_name'])) > 127) {
  					$this->error['mscompany_name'] = $this->language->get('error_company_name');
  				}

  				if (empty($this->request->post['mscompany_title']) || strlen(trim($this->request->post['mscompany_title'])) < 3 || strlen(trim($this->request->post['mscompany_title'])) > 127) {
  					$this->error['mscompany_title'] = $this->language->get('error_company_title');
  				}
  			}
  		}else {
  			$this->error['current'] = $this->language->get('error_current');
  		}

  		if ($this->error) {
  			return false;
  		}else {
  			return true;
  		}
  	}
}
?>