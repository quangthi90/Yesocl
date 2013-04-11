<?php 
class ControllerUserUser extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'user/user' );
		$this->load->model( 'user/user' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function view(){
		$this->load->language( 'user/user' );
		$this->load->model( 'user/user' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'user/user' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_true'] = $this->language->get( 'text_true' );
		$this->data['text_false'] = $this->language->get( 'text_false' );
		$this->data['text_email'] = $this->language->get( 'text_email' );
		$this->data['text_primary'] = $this->language->get( 'text_primary' );
		$this->data['text_delete'] = $this->language->get( 'text_delete' );
		$this->data['text_yes'] = $this->language->get( 'text_yes' );
		$this->data['text_no'] = $this->language->get( 'text_no' );
		$this->data['text_title'] = 'Title';//$this->language->get( 'text_no' );
		$this->data['text_url'] = 'Url';//$this->language->get( 'text_no' );
		$this->data['text_to'] = 'to';//$this->language->get( 'text_no' );
		$this->data['text_month'] = 'Month: ';//$this->language->get( 'text_no' );
		$this->data['text_year'] = 'Year: ';//$this->language->get( 'text_no' );
		$this->data['text_name'] = 'Name';//$this->language->get( 'text_no' );
		$this->data['text_value'] = 'Value';//$this->language->get( 'text_no' );
		$this->data['text_visible'] = 'Visible';//$this->language->get( 'text_no' );
		$this->data['text_type'] = 'Type';//$this->language->get( 'text_no' );
		$this->data['text_im'] = 'Im';//$this->language->get( 'text_no' );
		$this->data['text_phone'] = 'Phone';//$this->language->get( 'text_no' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		$this->data['button_add_email'] = $this->language->get( 'button_add_email' );
		$this->data['button_add_phone'] = 'Add Phone';//$this->language->get( 'button_add_email' );
		$this->data['button_add_im'] = 'Add Im';//$this->language->get( 'button_add_email' );
		$this->data['button_add_website'] = 'Add Website';//$this->language->get( 'button_save' );
		$this->data['button_add_experience'] = 'Add Experience';//$this->language->get( 'button_save' );
		$this->data['button_add_education'] = 'Add Education';//$this->language->get( 'button_add_email' );
		$this->data['button_add_former'] = 'Add Former';//$this->language->get( 'button_save' );

		// Entry
		$this->data['entry_username'] = $this->language->get( 'entry_username' );
		$this->data['entry_email'] = $this->language->get( 'entry_email' );
		$this->data['entry_password'] = $this->language->get( 'entry_password' );
		$this->data['entry_confirm'] = $this->language->get( 'entry_confirm' );
		$this->data['entry_group'] = $this->language->get( 'entry_group' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_have_value'] = $this->language->get( 'entry_have_value' );
		
		$this->data['entry_firstname'] = $this->language->get( 'entry_firstname' );
		$this->data['entry_lastname'] = $this->language->get( 'entry_lastname' );
		$this->data['entry_birthday'] = $this->language->get( 'entry_birthday' );
		$this->data['entry_marital_status'] = 'Marital Status:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_country'] = 'Country:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_city'] = 'City:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_postal_code'] = 'Postal Code:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_industry'] = 'Industry:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_headingline'] = 'Headingline:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_interest'] = 'Interest:';//$this->language->get( 'entry_birthday' );
		
		$this->data['entry_im'] = 'IM:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_phone'] = 'Phone:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_address'] = 'Address:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_advice_for_contact'] = 'Advice For Contact:';//$this->language->get( 'entry_birthday' );

		$this->data['entry_company'] = 'Company:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_current'] = 'Current:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_title'] = 'Title:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_location'] = 'Location:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_time_period'] = 'Time Period:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_description'] = 'Description:';//$this->language->get( 'entry_birthday' );

		$this->data['entry_school'] = 'School:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_date_attended'] = 'Date Attended:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_degree'] = 'Degree:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_field_of_study'] = 'Field Of Study:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_grace'] = 'Grace:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_societies'] = 'Societies:';//$this->language->get( 'entry_birthday' );

		// Warning
		$this->data['error_primary_email'] = $this->language->get( 'error_primary_email' );
		$this->data['error_email_empty'] = $this->language->get( 'error_email_empty' );
		$this->data['error_exist_email'] = $this->language->get( 'error_exist_email' );
		$this->data['error_experience_empty'] = 'Error Empty Experience';//$this->language->get( 'error_email_empty' );
		
		// Tab
		$this->data['tab_general'] = $this->language->get( 'tab_general' );
		$this->data['tab_information'] = $this->language->get( 'tab_information' );
		$this->data['tab_email'] = $this->language->get( 'tab_email' );
		$this->data['tab_im'] = 'Im';//$this->language->get( 'tab_email' );
		$this->data['tab_phone'] = 'Phone';//$this->language->get( 'tab_email' );
		$this->data['tab_website'] = 'Website';//$this->language->get( 'tab_email' );
		$this->data['tab_experience'] = 'Experience';//$this->language->get( 'tab_email' );
		$this->data['tab_education'] = 'Education';//$this->language->get( 'tab_email' );
		$this->data['tab_former'] = 'Former';//$this->language->get( 'tab_email' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'user/user' );
		
		// user
		if ( isset($this->request->get['user_id']) ){
			$user = $this->model_user_user->getUser( array('user_id' => $this->request->get['user_id']) );
			
			if ( empty( $user ) ){	
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry firstname
		$this->data['username'] = $user->getUsername();

		// Entry email
		$this->data['emails'] = array();
		foreach ($user->getEmails() as $key => $email) {
			$this->data['emails'][$key] = array(
				'email' => $email->getEmail(),
				'primary' => $email->getPrimary(),
				);
		}
		
		// Entry status
		$this->data['status'] = $user->getStatus();
		
		// Entry Group
		$this->load->model( 'user/group' );
		
		$groups = $this->model_user_group->getGroups( );
		
		$this->data['groups'] = array();
		
		foreach ( $groups as $group ){
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if ( $user->getGroupUser() != null ) {
			$this->data['group_id'] = $user->getGroupUser()->getId();
		}else {
			$this->data['group_id'] = 0;
		}
		
		// Entry firstname
		if ( $user->getMeta() ){
			$this->data['firstname'] = $user->getMeta()->getFirstname();
		}else {
			$this->data['firstname'] = '';
		}
		
		// Entry lastname
		if ( $user->getMeta() ){
			$this->data['lastname'] = $user->getMeta()->getLastname();
		}else {
			$this->data['lastname'] = '';
		}

		// Entry birthday
		if ( $user->getMeta()->getBackground() ){
			$this->data['birthday'] = $user->getMeta()->getBackground()->getBirthday()->format('d-m-Y');
		}else {
			$this->data['birthday'] = '';
		}

		// Entry marital status
		if ( $user->getMeta()->getBackground() ){
			$this->data['marital_status'] = $user->getMeta()->getBackground()->getMaritalStatus();
		}else {
			$this->data['marital_status'] = 0;
		}

		// Entry localtion country
		if ( $user->getMeta() ){
			$this->data['country'] = $user->getMeta()->getLocation()->getCountry();
			$this->data['country_id'] = $user->getMeta()->getLocation()->getCountryId();
		}else {
			$this->data['country'] = '';
			$this->data['country_id'] = 0;
		}

		// Entry localtion city
		if ( $user->getMeta() ){
			$this->data['city'] = $user->getMeta()->getLocation()->getCity();
			$this->data['city_id'] = $user->getMeta()->getLocation()->getCityId();
		}else {
			$this->data['city'] = '';
			$this->data['city_id'] = 0;
		}

		// Entry postal code
		if ( $user->getMeta() ){
			$this->data['postal_code'] = $user->getMeta()->getPostalCode();
		}else {
			$this->data['postal_code'] = '';
		}

		// Entry address
		if ( $user->getMeta() ){
			$this->data['address'] = $user->getMeta()->getAddress();
		}else {
			$this->data['address'] = '';
		}

		// Entry advice for contact
		if ( $user->getMeta()->getBackground() ){
			$this->data['advice_for_contact'] = $user->getMeta()->getBackground()->getAdviceForContact();
		}else {
			$this->data['advice_for_contact'] = '';
		}

		// Entry industry
		if ( $user->getMeta() ){
			$this->data['industry'] = $user->getMeta()->getIndustry();
		}else {
			$this->data['industry'] = '';
		}

		// Entry heading line
		if ( $user->getMeta() ){
			$this->data['heading_line'] = $user->getMeta()->getHeadingLine();
		}else {
			$this->data['heading_line'] = '';
		}

		// Entry interest
		if ( $user->getMeta()->getBackground() ){
			$this->data['interest'] = $user->getMeta()->getBackground()->getInterest();
		}else {
			$this->data['interest'] = '';
		}

		// Entry im
		$this->data['im_types'] = array();
		$this->data['im_types'][] = array(
			'text' => 'Skype',
			'code' => 'skype',
			);
		$this->data['im_types'][] = array(
			'text' => 'Yahoo',
			'code' => 'yahoo',
			);

		$this->data['ims'] = array();
		foreach ($user->getMeta()->getIms() as $key => $im) {
			$this->data['ims'][$key] = array(
				'type' => $im->getType(),
				'im' => $im->getIm(),
				'visible' => $im->getVisible(),
				);
		}

		// Entry phone
		$this->data['phone_types'] = array();
		$this->data['phone_types'][] = array(
			'text' => 'Mobile',
			'code' => 'mobile',
			);
		$this->data['phone_types'][] = array(
			'text' => 'Telephone',
			'code' => 'telephone',
			);

		$this->data['phones'] = array();
		foreach ($user->getMeta()->getPhones() as $key => $phone) {
			$this->data['phones'][$key] = array(
				'type' => $phone->getType(),
				'phone' => $phone->getPhone(),
				'visible' => $phone->getVisible(),
				);
		}

		// Entry website title
		$this->data['title_types'] = array();
		$this->data['title_types'][] = array(
			'text' => 'Personal Website',
			'code' => 'personal',
			);
		$this->data['title_types'][] = array(
			'text' => 'Company Website',
			'code' => 'company',
			);
		$this->data['title_types'][] = array(
			'text' => 'Other...',
			'code' => 'other',
			);

		$this->data['websites'] = array();
		foreach ($user->getMeta()->getWebsites() as $key => $website) {
			$this->data['websites'][$key] = array(
				'title' => $website->getTitle(),
				'url' => $website->getUrl(),
				);
		}

		// Entry experiencies
		$this->data['experiencies'] = array();
		foreach ($user->getMeta()->getBackground()->getExperiencies() as $key => $experience) {
			$started = $experience->getStarted();
			$ended = $experience->getEnded();
			$this->data['experiencies'][$key] = array(
				'company' => $experience->getCompany(),
				'current' => $experience->getCurrent(),
				'title' => $experience->getTitle(),
				'location' => $experience->getLocation(),
				'ended' => array( 'month' => $ended->format( 'm' ), 'year' => $ended->format( 'Y' ) ),
				'started' => array( 'month' => $started->format( 'm' ), 'year' => $started->format( 'Y' ) ),
				'description' => $experience->getDescription(),
				);
		}

		// Entry educations
		$this->data['educations'] = array();
		foreach ($user->getMeta()->getBackground()->getEducations() as $key => $education) {
			$this->data['educations'][$key] = array(
				'school' => $education->getSchool(),
				'degree' => $education->getDegree(),
				'grace' => $education->getGrace(),
				'fieldofstudy' => $education->getFieldOfStudy(),
				'societies' => $education->getSocieties(),
				'ended' => $education->getEnded(),
				'started' => $education->getStarted(),
				'description' => $education->getDescription(),
				);
		}

		// Entry Formers
		$this->data['formers'] = array();
		foreach ($user->getMeta()->getFormers() as $key => $former) {
			$this->data['formers'][$key] = array(
				'name' => $former->getName(),
				'value' => $former->getValue(),
				'visible' => $former->getVisible(),
				);
		}

		// Entry former visible
		$this->data['visible_types'] = array();
		$this->data['visible_types'][] = array(
			'text' => 'My Follow',
			'code' => 'myfollow',
			);
		$this->data['visible_types'][] = array(
			'text' => 'My Network',
			'code' => 'mynetwork',
			);
		$this->data['visible_types'][] = array(
			'text' => 'Every One',
			'code' => 'everyone',
			);

		$this->template = 'user/user_view.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	public function insert(){
		$this->load->language( 'user/user' );
		$this->load->model( 'user/user' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateInsert() ){
			$this->model_user_user->addUser( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'user/user') );
		}

		$this->data['action'] = $this->url->link( 'user/user/insert' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'user/user' );
		$this->load->model( 'user/user' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateUpdate() ){
			$this->model_user_user->editUser( $this->request->get['user_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'user/user') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'user/user' );
		$this->load->model( 'user/user' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_user_user->deleteUser( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'user/user') );
		}

		$this->getList( );
	}

	public function changepassword(){
		$this->load->language( 'user/user' );
		$this->load->model( 'user/user' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateChangePassword() ){
			$this->model_user_user->changePassword( $this->request->get['user_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'user/user') );
		}
		
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
 	
		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];
		
			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}

		// Error password
		if ( isset($this->error['password']) ) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}

		// Error confirm
		if ( isset($this->error['confirm']) ) {
			$this->data['error_confirm'] = $this->error['confirm'];
		} else {
			$this->data['error_confirm'] = '';
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'user/user' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// Entry
		$this->data['entry_password'] = $this->language->get( 'entry_password' );
		$this->data['entry_confirm'] = $this->language->get( 'entry_confirm' );

		// Link
		$this->data['cancel'] = $this->url->link( 'user/user' );
		
		// user
		if ( isset($this->request->get['user_id']) ){
			$user = $this->model_user_user->getUser( array('user_id' => $this->request->get['user_id']) );
			
			if ( $user ){
				$this->data['action'] = $this->url->link( 'user/user/changepassword', 'user_id=' . $user->getId() );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}else {
			$this->redirect( $this->data['cancel'] );
		}

		// Password
		if ( isset($this->request->post['password']) ){
			$this->data['password'] = $this->request->post['password'];
		}else {
			$this->data['password'] = '';
		}

		// Confirm
		if ( isset($this->request->post['confirm']) ){
			$this->data['confirm'] = $this->request->post['confirm'];
		}else {
			$this->data['confirm'] = '';
		}

		$this->template = 'user/user_password.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function getList( ){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];

			unset( $this->session->data['error_warning'] );
		} elseif ( isset($this->session->data['error_warning']) ) {
			$this->data['error_warning'] = $this->session->data['error_warning'];
			
			unset( $this->session->data['error_warning'] );
		} else {
			$this->data['error_warning'] = '';
		}
		
		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];
		
			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'user/user' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_group'] = $this->language->get( 'text_group' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_email'] = $this->language->get( 'text_email' );	
		$this->data['text_action'] = $this->language->get( 'text_action' );
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'user/user/insert' );
		$this->data['delete'] = $this->url->link( 'user/user/delete' );

		// user
		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$users = $this->model_user_user->getUsers( $data );
		
		$user_total = $this->model_user_user->getTotalUsers();
		
		$this->data['users'] = array();
		if ( $users ){
			foreach ( $users as $user ){
				$action = array();

				$action[] = array(
					'text' => 'View',//$this->language->get( 'text_view' )
					'href' => $this->url->link( 'user/user/view', 'user_id=' . $user->getId() ),
					'icon' => 'icon-edit',
				);

				$action[] = array(
					'text' => 'Change Password',//$this->language->get( 'text_change_password' )
					'href' => $this->url->link( 'user/user/changepassword', 'user_id=' . $user->getId() ),
					'icon' => 'icon-edit',
				);
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'user/user/update', 'user_id=' . $user->getId() ),
					'icon' => 'icon-edit',
				);
			
				$this->data['users'][] = array(
					'id' => $user->getId(),
					'email' => $user->getPrimaryEmail()->getEmail(),
					'status' => $user->getStatus() === true ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'group' => $user->getGroupUser()->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $user_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('user/user', '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'user/user_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function getForm(){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
 	
		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];
		
			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}
		
		// Error firstname
		if ( isset($this->error['firstname']) ) {
			$this->data['error_firstname'] = $this->error['firstname'];
		} else {
			$this->data['error_firstname'] = '';
		}
		
		// Error lastname
		if ( isset($this->error['lastname']) ) {
			$this->data['error_lastname'] = $this->error['lastname'];
		} else {
			$this->data['error_lastname'] = '';
		}
		
		// Error email
		if ( isset($this->error['email']) ) {
			$this->data['error_email'] = $this->error['email'];
		} else {
			$this->data['error_email'] = '';
		}
		
		// Error password
		if ( isset($this->error['password']) ) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}
		
		// Error confirm
		if ( isset($this->error['confirm']) ) {
			$this->data['error_confirm'] = $this->error['confirm'];
		} else {
			$this->data['error_confirm'] = '';
		}

		// Error Country
		if ( isset($this->error['country']) ) {
			$this->data['error_country'] = $this->error['country'];
		} else {
			$this->data['error_country'] = '';
		}

		// Error City
		if ( isset($this->error['city']) ) {
			$this->data['error_city'] = $this->error['city'];
		} else {
			$this->data['error_city'] = '';
		}

		// Error Industry
		if ( isset($this->error['industry']) ) {
			$this->data['error_industry'] = $this->error['industry'];
		} else {
			$this->data['error_industry'] = '';
		}

		// Error Education
		if ( isset($this->error['education']) ) {
			$this->data['error_education'] = $this->error['education'];
		} else {
			$this->data['error_education'] = array();
		}

		// Error Experience
		if ( isset($this->error['experience']) ) {
			$this->data['error_experience'] = $this->error['experience'];
		} else {
			$this->data['error_experience'] = array();
		}

		// Error Former
		if ( isset($this->error['former']) ) {
			$this->data['error_former'] = $this->error['former'];
		} else {
			$this->data['error_former'] = array();
		}

		// Error Im
		if ( isset($this->error['im']) ) {
			$this->data['error_im'] = $this->error['im'];
		} else {
			$this->data['error_im'] = array();
		}

		// Error Phone
		if ( isset($this->error['phone']) ) {
			$this->data['error_phone'] = $this->error['phone'];
		} else {
			$this->data['error_phone'] = array();
		}

		// Error Website
		if ( isset($this->error['website']) ) {
			$this->data['error_website'] = $this->error['website'];
		} else {
			$this->data['error_website'] = array();
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'user/user' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_true'] = $this->language->get( 'text_true' );
		$this->data['text_false'] = $this->language->get( 'text_false' );
		$this->data['text_email'] = $this->language->get( 'text_email' );
		$this->data['text_primary'] = $this->language->get( 'text_primary' );
		$this->data['text_delete'] = $this->language->get( 'text_delete' );
		$this->data['text_yes'] = $this->language->get( 'text_yes' );
		$this->data['text_no'] = $this->language->get( 'text_no' );
		$this->data['text_title'] = 'Title';//$this->language->get( 'text_no' );
		$this->data['text_url'] = 'Url';//$this->language->get( 'text_no' );
		$this->data['text_to'] = ' to ';//$this->language->get( 'text_no' );
		$this->data['text_month'] = 'Month: ';//$this->language->get( 'text_no' );
		$this->data['text_year'] = 'Year: ';//$this->language->get( 'text_no' );
		$this->data['text_name'] = 'Name';//$this->language->get( 'text_no' );
		$this->data['text_value'] = 'Value';//$this->language->get( 'text_no' );
		$this->data['text_visible'] = 'Visible';//$this->language->get( 'text_no' );
		$this->data['text_type'] = 'Type';//$this->language->get( 'text_no' );
		$this->data['text_im'] = 'Im';//$this->language->get( 'text_no' );
		$this->data['text_phone'] = 'Phone';//$this->language->get( 'text_no' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		$this->data['button_add_email'] = $this->language->get( 'button_add_email' );
		$this->data['button_add_phone'] = 'Add Phone';//$this->language->get( 'button_add_email' );
		$this->data['button_add_im'] = 'Add Im';//$this->language->get( 'button_add_email' );
		$this->data['button_add_website'] = 'Add Website';//$this->language->get( 'button_save' );
		$this->data['button_add_experience'] = 'Add Experience';//$this->language->get( 'button_save' );
		$this->data['button_add_education'] = 'Add Education';//$this->language->get( 'button_add_email' );
		$this->data['button_add_former'] = 'Add Former';//$this->language->get( 'button_save' );

		// Entry
		$this->data['entry_email'] = $this->language->get( 'entry_email' );
		$this->data['entry_username'] = $this->language->get( 'entry_username' );
		$this->data['entry_password'] = $this->language->get( 'entry_password' );
		$this->data['entry_confirm'] = $this->language->get( 'entry_confirm' );
		$this->data['entry_group'] = $this->language->get( 'entry_group' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_have_value'] = $this->language->get( 'entry_have_value' );
		
		$this->data['entry_firstname'] = $this->language->get( 'entry_firstname' );
		$this->data['entry_lastname'] = $this->language->get( 'entry_lastname' );
		$this->data['entry_birthday'] = $this->language->get( 'entry_birthday' );
		$this->data['entry_marital_status'] = 'Marital Status:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_country'] = 'Country:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_city'] = 'City:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_postal_code'] = 'Postal Code:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_industry'] = 'Industry:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_headingline'] = 'Headingline:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_interest'] = 'Interest:';//$this->language->get( 'entry_birthday' );
		
		$this->data['entry_im'] = 'IM:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_phone'] = 'Phone:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_address'] = 'Address:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_advice_for_contact'] = 'Advice For Contact:';//$this->language->get( 'entry_birthday' );

		$this->data['entry_company'] = 'Company:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_current'] = 'Current:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_title'] = 'Title:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_location'] = 'Location:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_time_period'] = 'Time Period:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_description'] = 'Description:';//$this->language->get( 'entry_birthday' );

		$this->data['entry_school'] = 'School:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_date_attended'] = 'Date Attended:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_degree'] = 'Degree:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_field_of_study'] = 'Field Of Study:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_grace'] = 'Grace:';//$this->language->get( 'entry_birthday' );
		$this->data['entry_societies'] = 'Activities and Societies:';//$this->language->get( 'entry_birthday' );

		// Warning
		$this->data['error_primary_email'] = $this->language->get( 'error_primary_email' );
		$this->data['error_email_empty'] = $this->language->get( 'error_email_empty' );
		$this->data['error_exist_email'] = $this->language->get( 'error_exist_email' );
		$this->data['error_experience_empty'] = 'Error Empty Experience';//$this->language->get( 'error_email_empty' );
		$this->data['error_school'] = $this->language->get( 'error_school' );
		$this->data['error_company'] = $this->language->get( 'error_company' );
		$this->data['text_error_former'] = $this->language->get( 'error_former' );
		$this->data['text_error_im'] = $this->language->get( 'error_im' );
		$this->data['text_error_phone'] = $this->language->get( 'error_phone' );
		$this->data['error_url'] = $this->language->get( 'error_url' );
		
		// Tab
		$this->data['tab_general'] = $this->language->get( 'tab_general' );
		$this->data['tab_information'] = $this->language->get( 'tab_information' );
		$this->data['tab_email'] = $this->language->get( 'tab_email' );
		$this->data['tab_im'] = 'Im';//$this->language->get( 'tab_email' );
		$this->data['tab_phone'] = 'Phone';//$this->language->get( 'tab_email' );
		$this->data['tab_website'] = 'Website';//$this->language->get( 'tab_email' );
		$this->data['tab_experience'] = 'Experience';//$this->language->get( 'tab_email' );
		$this->data['tab_education'] = 'Education';//$this->language->get( 'tab_email' );
		$this->data['tab_former'] = 'Former';//$this->language->get( 'tab_email' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'user/user' );
		$this->data['emailValidate'] = $this->url->link( 'user/user/emailValidate' );
		
		// user
		if ( isset($this->request->get['user_id']) ){
			$user = $this->model_user_user->getUser( array('user_id' => $this->request->get['user_id']) );
			
			if ( $user ){
				$this->data['action'] = $this->url->link( 'user/user/update', 'user_id=' . $user->getId() );	
				$this->data['emailValidate'] = $this->url->link( 'user/user/emailValidate&user_id=' . $user->getId() );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry username
		if ( isset($this->request->post['user']['username']) ){
			$this->data['username'] = $this->request->post['user']['username'];
		}elseif ( isset($user) ) {
			$this->data['username'] = $user->getUsername();
		}else {
			$this->data['username'] = '';
		}

		// Entry email
		$this->data['emails'] = array();
		if ( isset($this->request->post['user']['emails']) ){
			$this->data['emails'] = $this->request->post['user']['emails'];
		}elseif ( isset($user) ){
			foreach ($user->getEmails() as $key => $email) {
				$this->data['emails'][$key] = array(
					'email' => $email->getEmail(),
					'primary' => $email->getPrimary(),
					);
			}
		}
		
		// Entry password
		if ( isset($this->request->post['user']['password']) ){
			$this->data['password'] = $this->request->post['user']['password'];
		}elseif ( isset($user) ) {
			
		}else {
			$this->data['password'] = '';
		}
		
		// Entry confirm
		$this->data['confirm'] = '';
		
		// Entry status
		if ( isset($this->request->post['user']['status']) ) {
			$this->data['status'] = $this->request->post['user']['status'];
		}elseif ( isset($user) ) {
			$this->data['status'] = $user->getStatus();
		}else {
			$this->data['status'] = 1;
		}
		
		// Entry Group
		$this->load->model( 'user/group' );
		
		$groups = $this->model_user_group->getGroups( );
		
		$this->data['groups'] = array();
		
		foreach ( $groups as $group ){
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if ( isset($this->request->post['user']['group']) ) {
			$this->data['group_id'] = $this->request->post['user']['group'];
		}elseif ( isset($user) && $user->getGroupUser() != null ) {
			$this->data['group_id'] = $user->getGroupUser()->getId();
		}else {
			$this->data['group_id'] = 0;
		}
		
		// Entry firstname
		if ( isset($this->request->post['meta']['firstname']) ){
			$this->data['firstname'] = $this->request->post['meta']['firstname'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['firstname'] = $user->getMeta()->getFirstname();
		}else {
			$this->data['firstname'] = '';
		}
		
		// Entry lastname
		if ( isset($this->request->post['meta']['lastname']) ){
			$this->data['lastname'] = $this->request->post['meta']['lastname'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['lastname'] = $user->getMeta()->getLastname();
		}else {
			$this->data['lastname'] = '';
		}

		// Entry birthday
		if ( isset($this->request->post['background']['birthday']) ){
			$this->data['birthday'] = $this->request->post['background']['birthday'];
		}elseif ( isset($user) && $user->getMeta()->getBackground() ){
			$this->data['birthday'] = $user->getMeta()->getBackground()->getBirthday()->format('d-m-Y');
		}else {
			$this->data['birthday'] = '';
		}

		// Entry marital status
		if ( isset($this->request->post['background']['maritalstatus']) ){
			$this->data['marital_status'] = $this->request->post['background']['maritalstatus'];
		}elseif ( isset($user) && $user->getMeta()->getBackground() ){
			$this->data['marital_status'] = $user->getMeta()->getBackground()->getMaritalStatus();
		}else {
			$this->data['marital_status'] = 0;
		}

		// Entry localtion country
		if ( isset($this->request->post['meta']['location']['country']) ){
			$this->data['country'] = $this->request->post['meta']['location']['country'];
			$this->data['country_id'] = $this->request->post['meta']['location']['country_id'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['country'] = $user->getMeta()->getLocation()->getCountry();
			$this->data['country_id'] = $user->getMeta()->getLocation()->getCountryId();
		}else {
			$this->data['country'] = '';
			$this->data['country_id'] = 0;
		}

		// Entry localtion city
		if ( isset($this->request->post['meta']['location']['city']) ){
			$this->data['city'] = $this->request->post['meta']['location']['city'];
			$this->data['city_id'] = $this->request->post['meta']['location']['city_id'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['city'] = $user->getMeta()->getLocation()->getCity();
			$this->data['city_id'] = $user->getMeta()->getLocation()->getCityId();
		}else {
			$this->data['city'] = '';
			$this->data['city_id'] = 0;
		}

		// Entry postal code
		if ( isset($this->request->post['meta']['postalcode']) ){
			$this->data['postal_code'] = $this->request->post['meta']['postalcode'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['postal_code'] = $user->getMeta()->getPostalCode();
		}else {
			$this->data['postal_code'] = '';
		}

		// Entry address
		if ( isset($this->request->post['meta']['address']) ){
			$this->data['address'] = $this->request->post['meta']['address'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['address'] = $user->getMeta()->getAddress();
		}else {
			$this->data['address'] = '';
		}

		// Entry advice for contact
		if ( isset($this->request->post['background']['adviceforcontact']) ){
			$this->data['advice_for_contact'] = $this->request->post['background']['adviceforcontact'];
		}elseif ( isset($user) && $user->getMeta()->getBackground() ){
			$this->data['advice_for_contact'] = $user->getMeta()->getBackground()->getAdviceForContact();
		}else {
			$this->data['advice_for_contact'] = '';
		}

		// Entry industry
		if ( isset($this->request->post['meta']['industry']) ){
			$this->data['industry'] = $this->request->post['meta']['industry'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['industry'] = $user->getMeta()->getIndustry();
		}else {
			$this->data['industry'] = '';
		}

		// Entry heading line
		if ( isset($this->request->post['meta']['headingline']) ){
			$this->data['heading_line'] = $this->request->post['meta']['headingline'];
		}elseif ( isset($user) && $user->getMeta() ){
			$this->data['heading_line'] = $user->getMeta()->getHeadingLine();
		}else {
			$this->data['heading_line'] = '';
		}

		// Entry interest
		if ( isset($this->request->post['background']['interest']) ){
			$this->data['interest'] = $this->request->post['background']['interest'];
		}elseif ( isset($user) ){
			$this->data['interest'] = $user->getMeta()->getBackground()->getInterest();
		}else {
			$this->data['interest'] = '';
		}

		// Entry im
		$this->data['im_types'] = array();
		$this->data['im_types'][] = array(
			'text' => 'Skype',
			'code' => 'skype',
			);
		$this->data['im_types'][] = array(
			'text' => 'Yahoo',
			'code' => 'yahoo',
			);

		$this->data['ims'] = array();
		if ( isset($this->request->post['user']['ims']) ){
			$this->data['ims'] = $this->request->post['user']['ims'];
		}elseif ( isset( $user ) ){
			foreach ($user->getMeta()->getIms() as $key => $im) {
				$this->data['ims'][$key] = array(
					'type' => $im->getType(),
					'im' => $im->getIm(),
					'visible' => $im->getVisible(),
					);
			}
		}

		// Entry phone
		$this->data['phone_types'] = array();
		$this->data['phone_types'][] = array(
			'text' => 'Mobile',
			'code' => 'mobile',
			);
		$this->data['phone_types'][] = array(
			'text' => 'Telephone',
			'code' => 'telephone',
			);

		$this->data['phones'] = array();
		if ( isset($this->request->post['user']['phones']) ){
			$this->data['phones'] = $this->request->post['user']['phones'];
		}elseif ( isset( $user ) ){
			foreach ($user->getMeta()->getPhones() as $key => $phone) {
				$this->data['phones'][$key] = array(
					'type' => $phone->getType(),
					'phone' => $phone->getPhone(),
					'visible' => $phone->getVisible(),
					);
			}
		}

		// Entry website title
		$this->data['title_types'] = array();
		$this->data['title_types'][] = array(
			'text' => 'Personal Website',
			'code' => 'personal',
			);
		$this->data['title_types'][] = array(
			'text' => 'Company Website',
			'code' => 'company',
			);
		$this->data['title_types'][] = array(
			'text' => 'Other...',
			'code' => 'other',
			);

		$this->data['websites'] = array();
		if ( isset($this->request->post['user']['websites']) ){
			$this->data['websites'] = $this->request->post['user']['websites'];
		}elseif ( isset( $user ) ){
			foreach ($user->getMeta()->getWebsites() as $key => $website) {
				$this->data['websites'][$key] = array(
					'title' => $website->getTitle(),
					'url' => $website->getUrl(),
					);
			}
		}

		// Entry experiencies
		$this->data['experiencies'] = array();
		if ( isset($this->request->post['background']['experiencies']) ){
			$this->data['experiencies'] = $this->request->post['background']['experiencies'];
		}elseif ( isset( $user ) ){
			foreach ($user->getMeta()->getBackground()->getExperiencies() as $key => $experience) {
				$started = $experience->getStarted();
				$ended = $experience->getEnded();
				$this->data['experiencies'][$key] = array(
					'company' => $experience->getCompany(),
					'current' => $experience->getCurrent(),
					'title' => $experience->getTitle(),
					'location' => $experience->getLocation(),
					'ended' => array( 'month' => $ended->format( 'm' ), 'year' => $ended->format( 'Y' ) ),
					'started' => array( 'month' => $started->format( 'm' ), 'year' => $started->format( 'Y' ) ),
					'description' => $experience->getDescription(),
					);
			}
		}

		// Entry educations
		$this->data['educations'] = array();
		if ( isset($this->request->post['background']['educations']) ){
			$this->data['educations'] = $this->request->post['background']['educations'];
		}elseif ( isset( $user ) ){
			foreach ($user->getMeta()->getBackground()->getEducations() as $key => $education) {
				$this->data['educations'][$key] = array(
					'school' => $education->getSchool(),
					'degree' => $education->getDegree(),
					'grace' => $education->getGrace(),
					'fieldofstudy' => $education->getFieldOfStudy(),
					'societies' => $education->getSocieties(),
					'ended' => $education->getEnded(),
					'started' => $education->getStarted(),
					'description' => $education->getDescription(),
					);
			}
		}

		// Entry Formers
		$this->data['formers'] = array();
		if ( isset($this->request->post['user']['formers']) ){
			$this->data['formers'] = $this->request->post['user']['formers'];
		}elseif ( isset( $user ) ){
			foreach ($user->getMeta()->getFormers() as $key => $former) {
				$this->data['formers'][$key] = array(
					'name' => $former->getName(),
					'value' => $former->getValue(),
					'visible' => $former->getVisible(),
					);
			}
		}

		// Entry former visible
		$this->data['visible_types'] = array();
		$this->data['visible_types'][] = array(
			'text' => 'My Follow',
			'code' => 'myfollow',
			);
		$this->data['visible_types'][] = array(
			'text' => 'My Network',
			'code' => 'mynetwork',
			);
		$this->data['visible_types'][] = array(
			'text' => 'Every One',
			'code' => 'everyone',
			);

		$this->template = 'user/user_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateInsert(){
		$user_id = 0;
		if ( isset($this->request->get['user_id']) ){
			$user_id = $this->request->get['user_id'];
		}
		
		if ((utf8_strlen($this->request->post['meta']['firstname']) < 1) || (utf8_strlen($this->request->post['meta']['firstname']) > 32)) {
      		$this->error['firstname'] = $this->language->get('error_firstname');
    	}

    	if ((utf8_strlen($this->request->post['meta']['lastname']) < 1) || (utf8_strlen($this->request->post['meta']['lastname']) > 32)) {
      		$this->error['lastname'] = $this->language->get('error_lastname');
    	}
		
    	$this->load->model( 'user/user' );
		if ( isset($this->request->post['user']['emails']) ){
			foreach ( $this->request->post['user']['emails'] as $email ) {
				if ((utf8_strlen($email['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email['email'])) {
		      		$this->error['email'] = $this->language->get('error_email');
		      		break;
		    	}
		    	
		    	if ( $this->model_user_user->isExistEmail($user_id, $email['email']) ){
		    		$this->error['email'] = $this->language->get('error_exist_email');
		      		break;
		    	}
			}
		}
		
		if ($this->request->post['user']['password'] || (!isset($this->request->get['user']['user_id']))) {
      		if ((utf8_strlen($this->request->post['user']['password']) < 4) || (utf8_strlen($this->request->post['user']['password']) > 20)) {
        		$this->error['password'] = $this->language->get('error_password');
      		}
	
	  		if ($this->request->post['user']['password'] != $this->request->post['user']['confirm']) {
	    		$this->error['confirm'] = $this->language->get('error_confirm');
	  		}
    	}

    	if ((utf8_strlen($this->request->post['meta']['location']['country']) < 1) || (utf8_strlen($this->request->post['meta']['location']['country_id']) < 1)) {
      		$this->error['country'] = $this->language->get('error_country');
    	}

    	if ((utf8_strlen($this->request->post['meta']['location']['city']) < 1) || (utf8_strlen($this->request->post['meta']['location']['city_id']) < 1)) {
      		$this->error['city'] = $this->language->get('error_city');
    	}

    	if ( (utf8_strlen($this->request->post['meta']['industry']) < 1) ) {
      		$this->error['industry'] = $this->language->get('error_industry');
    	}

    	// Education
    	$education_error = array();
    	foreach ($this->request->post['background']['educations'] as $key => $education) {
    		if ( !trim( $education['school'] ) ) {
    			$education_error[$key]['school'] = $this->language->get( 'error_school' );
    		}
    	}
    	if ( !empty( $education_error ) ) {
    		$this->error['education'] = $education_error;
    	}

    	// Experience
    	$experience_error = array();
    	foreach ($this->request->post['background']['experiencies'] as $key => $experience) {
    		if ( !trim( $experience['company'] ) ) {
    			$experience_error[$key]['company'] = $this->language->get( 'error_company' );
    		}
    	}
    	if ( !empty( $experience_error ) ) {
    		$this->error['experience'] = $experience_error;
    	}

    	// Former
    	$former_error = array();
    	foreach ($this->request->post['user']['formers'] as $key => $former) {
    		if ( !trim( $former['name'] ) ) {
    			$former_error[$key]['name'] = $this->language->get( 'error_former' );
    		}
    	}
    	if ( !empty( $former_error ) ) {
    		$this->error['former'] = $former_error;
    	}

    	// Im
    	$im_error = array();
    	foreach ($this->request->post['user']['ims'] as $key => $im) {
    		if ( !trim( $im['im'] ) ) {
    			$im_error[$key]['im'] = $this->language->get( 'error_im' );
    		}
    	}
    	if ( !empty( $im_error ) ) {
    		$this->error['im'] = $im_error;
    	}

    	// Phone
    	$phone_error = array();
    	foreach ($this->request->post['user']['phones'] as $key => $phone) {
    		if ( !trim( $phone['phone'] ) ) {
    			$phone_error[$key]['phone'] = $this->language->get( 'error_phone' );
    		}
    	}
    	if ( !empty( $phone_error ) ) {
    		$this->error['phone'] = $phone_error;
    	}

    	// Website
    	$website_error = array();
    	foreach ($this->request->post['user']['websites'] as $key => $website) {
    		if ( !trim( $website['url'] ) ) {
    			$website_error[$key]['url'] = $this->language->get( 'error_url' );
    		}
    	}
    	if ( !empty( $website_error ) ) {
    		$this->error['website'] = $website_error;
    	}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}

	private function isValidateUpdate(){
		$user_id = 0;
		if ( isset($this->request->get['user_id']) ){
			$user_id = $this->request->get['user_id'];
		}
		
		if ((utf8_strlen($this->request->post['meta']['firstname']) < 1) || (utf8_strlen($this->request->post['meta']['firstname']) > 32)) {
      		$this->error['firstname'] = $this->language->get('error_firstname');
    	}

    	if ((utf8_strlen($this->request->post['meta']['lastname']) < 1) || (utf8_strlen($this->request->post['meta']['lastname']) > 32)) {
      		$this->error['lastname'] = $this->language->get('error_lastname');
    	}
		
    	$this->load->model( 'user/user' );
		if ( isset($this->request->post['user']['emails']) ){
			foreach ( $this->request->post['user']['emails'] as $email ) {
				if ((utf8_strlen($email['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email['email'])) {
		      		$this->error['email'] = $this->language->get('error_email');
		      		break;
		    	}
		    	
		    	if ( $this->model_user_user->isExistEmail($user_id, $email['email']) ){
		    		$this->error['email'] = $this->language->get('error_exist_email');
		      		break;
		    	}
			}
		}

    	if ((utf8_strlen($this->request->post['meta']['location']['country']) < 1) || (utf8_strlen($this->request->post['meta']['location']['country_id']) < 1)) {
      		$this->error['country'] = $this->language->get('error_country');
    	}

    	if ((utf8_strlen($this->request->post['meta']['location']['city']) < 1) || (utf8_strlen($this->request->post['meta']['location']['city_id']) < 1)) {
      		$this->error['city'] = $this->language->get('error_city');
    	}

    	if ( (utf8_strlen($this->request->post['meta']['industry']) < 1) ) {
      		$this->error['industry'] = $this->language->get('error_industry');
    	}

    	// Education
    	$education_error = array();
    	foreach ($this->request->post['background']['educations'] as $key => $education) {
    		if ( !trim( $education['school'] ) ) {
    			$education_error[$key]['school'] = $this->language->get( 'error_school' );
    		}
    	}
    	if ( !empty( $education_error ) ) {
    		$this->error['education'] = $education_error;
    	}

    	// Experience
    	$experience_error = array();
    	foreach ($this->request->post['background']['experiencies'] as $key => $experience) {
    		if ( !trim( $experience['company'] ) ) {
    			$experience_error[$key]['company'] = $this->language->get( 'error_company' );
    		}
    	}
    	if ( !empty( $experience_error ) ) {
    		$this->error['experience'] = $experience_error;
    	}

    	// Former
    	$former_error = array();
    	foreach ($this->request->post['user']['formers'] as $key => $former) {
    		if ( !trim( $former['name'] ) ) {
    			$former_error[$key]['name'] = $this->language->get( 'error_former' );
    		}
    	}
    	if ( !empty( $former_error ) ) {
    		$this->error['former'] = $former_error;
    	}

    	// Im
    	$im_error = array();
    	foreach ($this->request->post['user']['ims'] as $key => $im) {
    		if ( !trim( $im['im'] ) ) {
    			$im_error[$key]['im'] = $this->language->get( 'error_im' );
    		}
    	}
    	if ( !empty( $im_error ) ) {
    		$this->error['im'] = $im_error;
    	}

    	// Phone
    	$phone_error = array();
    	foreach ($this->request->post['user']['phones'] as $key => $phone) {
    		if ( !trim( $phone['phone'] ) ) {
    			$phone_error[$key]['phone'] = $this->language->get( 'error_phone' );
    		}
    	}
    	if ( !empty( $phone_error ) ) {
    		$this->error['phone'] = $phone_error;
    	}

    	// Website
    	$website_error = array();
    	foreach ($this->request->post['user']['websites'] as $key => $website) {
    		if ( !trim( $website['url'] ) ) {
    			$website_error[$key]['url'] = $this->language->get( 'error_url' );
    		}
    	}
    	if ( !empty( $website_error ) ) {
    		$this->error['website'] = $website_error;
    	}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}

	private function isValidateChangePassword(){
		if ($this->request->post['password'] || (!isset($this->request->get['user_id']))) {
      		if ((utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 20)) {
        		$this->error['password'] = $this->language->get('error_password');
      		}
	
	  		if ($this->request->post['password'] != $this->request->post['confirm']) {
	    		$this->error['confirm'] = $this->language->get('error_confirm');
	  		}
    	}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}

	private function isValidateDelete(){
		if ( !isset($this->request->post['id']) || !is_array( $this->request->post['id']) ){
			$this->error['error_permission'] = $this->language->get( 'error_permission' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}
	
	public function emailValidate(){
		if ( !isset($this->request->get['email']) || empty($this->request->get['email']) ){
			$this->response->setOutput('false');
			return;
		}
		
		$user_id = 0;
		if ( isset($this->request->get['user_id']) ){
			$user_id = $this->request->get['user_id'];
		}
		
		$this->load->model( 'user/user' );
		
		if ( $this->model_user_user->isExistEmail($user_id, $this->request->get['email']) === true ){
    		$this->response->setOutput('false');
			return;
    	}
		
		$this->response->setOutput('true');
		return;
	}
	
	public function autocompleteCountry(){
		$this->load->model( 'localisation/country' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			'sort' => $sort,
			);

		$country_data = $this->model_localisation_country->getCountries( $data );

		$json = array();
		foreach ($country_data as $country) {
			$json[] = array(
				'name' => $country->getName(),
				'id' => $country->getId(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function autocompleteCity(){
		$this->load->model( 'localisation/city' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		if ( isset( $this->request->get['filter_country'] ) ) {
			$filter_country = $this->request->get['filter_country'];
		}else {
			$filter_country = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			'filter_country' => $filter_country,
			'sort' => $sort,
			);

		$city_data = $this->model_localisation_city->getCities( $data );

		$json = array();
		foreach ($city_data as $city) {
			$json[] = array(
				'name' => $city->getName(),
				'id' => $city->getId(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function searchUser() {
		$this->load->model( 'user/user' );

		if ( isset( $this->request->get['filter'] ) ) {
			$filter = $this->request->get['filter'];
		}else {
			$filter = null;
		}

		$data = array(
			'filter' => $filter,
			);

		$users = $this->model_user_user->search( $data );

		$json = array();

		foreach ($users as $user) {
			$primary = ( $user->getUsername()) ? $user->getUsername() : $user->getFullname();
			$primary .= '(' . $user->getPrimaryEmail()->getEmail() . ')';
			$json[] = array(
				'id' => $user->getId(),
				'primary' => $primary,
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>