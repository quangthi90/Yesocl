<?php 
class ControllerAdminAdmin extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_admin_admin->addAdmin( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'admin/admin') );
		}

		$this->data['action'] = $this->url->link( 'admin/admin/insert' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_admin_admin->editAdmin( $this->request->get['admin_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'admin/admin') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_admin_admin->deleteAdmin( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'admin/admin') );
		}

		$this->getList( );
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
			'href'      => $this->url->link( 'admin/admin' ),
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
		$this->data['insert'] = $this->url->link( 'admin/admin/insert' );
		$this->data['delete'] = $this->url->link( 'admin/admin/delete' );

		// admin
		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$admins = $this->model_admin_admin->getAdmins( $data );
		
		$admin_total = $this->model_admin_admin->getTotalAdmins();
		
		$this->data['admins'] = array();
		if ( $admins ){
			foreach ( $admins as $admin ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'admin/admin/update', 'admin_id=' . $admin->getId() ),
					'icon' => 'icon-edit',
				);
			
				$this->data['admins'][] = array(
					'id' => $admin->getId(),
					'email' => $admin->getPrimaryEmail( true )->getEmail(),
					'status' => $admin->getStatus() === true ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'group' => $admin->getGroupadmin()->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $admin_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('admin/admin', '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'admin/admin_list.tpl';
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'admin/admin' ),
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
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		$this->data['button_add_email'] = $this->language->get( 'button_add_email' );
		
		// Entry
		$this->data['entry_email'] = $this->language->get( 'entry_email' );
		$this->data['entry_password'] = $this->language->get( 'entry_password' );
		$this->data['entry_confirm'] = $this->language->get( 'entry_confirm' );
		$this->data['entry_group'] = $this->language->get( 'entry_group' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_have_value'] = $this->language->get( 'entry_have_value' );
		
		$this->data['entry_firstname'] = $this->language->get( 'entry_firstname' );
		$this->data['entry_lastname'] = $this->language->get( 'entry_lastname' );
		$this->data['entry_birthday'] = $this->language->get( 'entry_birthday' );
		
		// Warning
		$this->data['error_primary_email'] = $this->language->get( 'error_primary_email' );
		$this->data['error_email_empty'] = $this->language->get( 'error_email_empty' );
		$this->data['error_exist_email'] = $this->language->get( 'error_exist_email' );
		
		// Tab
		$this->data['tab_general'] = $this->language->get( 'tab_general' );
		$this->data['tab_information'] = $this->language->get( 'tab_information' );
		$this->data['tab_email'] = $this->language->get( 'tab_email' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'admin/admin' );
		$this->data['emailValidate'] = $this->url->link( 'admin/admin/emailValidate' );
		
		// admin
		if ( isset($this->request->get['admin_id']) ){
			$admin = $this->model_admin_admin->getadmin( array('admin_id' => $this->request->get['admin_id']) );
			
			if ( $admin ){
				$this->data['action'] = $this->url->link( 'admin/admin/update', 'admin_id=' . $admin->getId() );	
				$this->data['emailValidate'] = $this->url->link( 'admin/admin/emailValidate&admin_id=' . $admin->getId() );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry email
		if ( isset($this->request->post['admin']['emails']) ){
			$this->data['emails'] = $this->request->post['admin']['emails'];
		}elseif ( isset($admin) ){
			$this->data['emails'] = $admin->getEmails();
		}else {
			$this->data['emails'] = array();
		}
		
		// Entry password
		if ( isset($this->request->post['admin']['password']) ){
			$this->data['password'] = $this->request->post['admin']['password'];
		}else {
			$this->data['password'] = '';
		}
		
		// Entry confirm
		$this->data['confirm'] = '';
		
		// Entry status
		if ( isset($this->request->post['admin']['status']) ) {
			$this->data['status'] = $this->request->post['admin']['status'];
		}elseif ( isset($admin) ) {
			$this->data['status'] = $admin->getStatus();
		}else {
			$this->data['status'] = 0;
		}
		
		// Entry Group
		$this->load->model( 'admin/group' );
		
		$groups = $this->model_admin_group->getGroups( );
		
		$this->data['groups'] = array();
		
		foreach ( $groups as $group ){
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if ( isset($this->request->post['admin']['group']) ) {
			$this->data['group_id'] = $this->request->post['admin']['group'];
		}elseif ( isset($admin) && $admin->getGroupAdmin() != null ) {
			$this->data['group_id'] = $admin->getGroupAdmin()->getId();
		}else {
			$this->data['group_id'] = 0;
		}
		
		// Entry firstname
		if ( isset($this->request->post['meta']['firstname']) ){
			$this->data['firstname'] = $this->request->post['meta']['firstname'];
		}elseif ( isset($admin) && $admin->getMeta() ){
			$this->data['firstname'] = $admin->getMeta()->getFirstname();
		}else {
			$this->data['firstname'] = '';
		}
		
		// Entry lastname
		if ( isset($this->request->post['meta']['lastname']) ){
			$this->data['lastname'] = $this->request->post['meta']['lastname'];
		}elseif ( isset($admin) && $admin->getMeta() ){
			$this->data['lastname'] = $admin->getMeta()->getLastname();
		}else {
			$this->data['lastname'] = '';
		}

		$this->template = 'admin/admin_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		$admin_id = 0;
		if ( isset($this->request->get['admin_id']) ){
			$admin_id = $this->request->get['admin_id'];
		}
		
		if ((utf8_strlen($this->request->post['admin']['meta']['firstname']) < 1) || (utf8_strlen($this->request->post['admin']['meta']['firstname']) > 32)) {
      		$this->error['firstname'] = $this->language->get('error_firstname');
    	}

    	if ((utf8_strlen($this->request->post['admin']['meta']['lastname']) < 1) || (utf8_strlen($this->request->post['admin']['meta']['lastname']) > 32)) {
      		$this->error['lastname'] = $this->language->get('error_lastname');
    	}
		
    	$this->load->model( 'admin/admin' );
		if ( isset($this->request->post['admin']['emails']) ){
			foreach ( $this->request->post['admin']['emails'] as $email ) {
				if ((utf8_strlen($email['email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email['email'])) {
		      		$this->error['email'] = $this->language->get('error_email');
		      		break;
		    	}
		    	
		    	if ( $this->model_admin_admin->isExistEmail($admin_id, $email['email']) ){
		    		$this->error['email'] = $this->language->get('error_exist_email');
		      		break;
		    	}
			}
		}
		
    	
		if ($this->request->post['admin']['password'] || (!isset($this->request->get['admin']['admin_id']))) {
      		if ((utf8_strlen($this->request->post['admin']['password']) < 4) || (utf8_strlen($this->request->post['admin']['password']) > 20)) {
        		$this->error['password'] = $this->language->get('error_password');
      		}
	
	  		if ($this->request->post['admin']['password'] != $this->request->post['admin']['confirm']) {
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
		
		$admin_id = 0;
		if ( isset($this->request->get['admin_id']) ){
			$admin_id = $this->request->get['admin_id'];
		}
		
		$this->load->model( 'admin/admin' );
		
		if ( $this->model_admin_admin->isExistEmail($admin_id, $this->request->get['email']) === true ){
    		$this->response->setOutput('false');
			return;
    	}
		
		$this->response->setOutput('true');
		return;
	}
	
	public function autoComplete(){
		
	}
}
?>