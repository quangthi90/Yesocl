<?php 
class ControllerAdminAdmin extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'admin/admin';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_admin_admin->addAdmin( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('admin/admin', 'token=' . $this->session->data['token'], 'SSL') );
		}

		$this->data['action'] = $this->url->link( 'admin/admin/insert', 'token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_update')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_admin_admin->editAdmin( $this->request->get['admin_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('admin/admin', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'admin/admin' );
		$this->load->model( 'admin/admin' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_admin_admin->deleteAdmin( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('admin/admin', 'token=' . $this->session->data['token'], 'SSL') );
		}

		$this->getList( );
	}

	private function getList(){
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
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'admin/admin', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_group'] = $this->language->get( 'text_group' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_username'] = $this->language->get( 'text_username' );	
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
		$this->data['insert'] = $this->url->link( 'admin/admin/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'admin/admin/delete', 'token=' . $this->session->data['token'], 'SSL' );

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
					'href' => $this->url->link( 'admin/admin/update', 'admin_id=' . $admin->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['admins'][] = array(
					'id' => $admin->getId(),
					'username' => $admin->getUsername(),
					'status' => $admin->getStatus() === true ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'group' => $admin->getGroup()->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $admin_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('admin/admin', '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
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
		
		// Error username
		if ( isset($this->error['username']) ) {
			$this->data['error_username'] = $this->error['username'];
		} else {
			$this->data['error_username'] = '';
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
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'admin/admin', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_true'] = $this->language->get( 'text_true' );
		$this->data['text_false'] = $this->language->get( 'text_false' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		
		// Entry
		$this->data['entry_username'] = $this->language->get( 'entry_username' );
		$this->data['entry_password'] = $this->language->get( 'entry_password' );
		$this->data['entry_confirm'] = $this->language->get( 'entry_confirm' );
		$this->data['entry_group'] = $this->language->get( 'entry_group' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'admin/admin', 'token=' . $this->session->data['token'], 'SSL' );
		
		// admin
		if ( isset($this->request->get['admin_id']) ){
			$admin = $this->model_admin_admin->getadmin( array('admin_id' => $this->request->get['admin_id']) );
			
			if ( $admin ){
				$this->data['action'] = $this->url->link( 'admin/admin/update', 'admin_id=' . $admin->getId() . '&token=' . $this->session->data['token'], 'SSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry username		
		if ( isset($this->request->post['username']) ){
			$this->data['username'] = $this->request->post['username'];
		}elseif ( isset($admin) ){
			$this->data['username'] = $admin->getUsername();
		}else {
			$this->data['username'] = '';
		}
		
		// Entry password
		if ( isset($this->request->post['password']) ){
			$this->data['password'] = $this->request->post['password'];
		}else {
			$this->data['password'] = '';
		}
		
		// Entry confirm
		$this->data['confirm'] = '';
		
		// Entry status
		if ( isset($this->request->post['status']) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($admin) ) {
			$this->data['status'] = $admin->getStatus();
		}else {
			$this->data['status'] = 0;
		}
		
		// Entry Group
		$this->load->model( 'admin/group' );
		
		$groups = $this->model_admin_group->getAllGroups();
		
		$this->data['groups'] = array();
		
		foreach ( $groups as $group ){
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if ( isset($this->request->post['group']) ) {
			$this->data['group_id'] = $this->request->post['group'];
		}elseif ( isset($admin) && $admin->getGroup() != null ) {
			$this->data['group_id'] = $admin->getGroup()->getId();
		}else {
			$this->data['group_id'] = 0;
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($city) ){
			$this->data['status'] = $city->getStatus();
		}else {
			$this->data['status'] = true;
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
		
		if ((utf8_strlen($this->request->post['username']) < 1) || (utf8_strlen($this->request->post['username']) > 32)) {
      		$this->error['username'] = $this->language->get('error_username');
    	}else{
	    	$this->load->model( 'admin/admin' );
			if ( isset($this->request->post['username']) && !empty($this->request->post['username']) ){
		    	if ( $this->model_admin_admin->isExistUsername($admin_id, $this->request->post['username']) ){
		    		$this->error['username'] = $this->language->get('error_exist_username');
		      		break;
		    	}
			}
		}
		
    	
		if ( isset($this->request->post['password']) ) {
      		if ((utf8_strlen($this->request->post['password']) < 4 && utf8_strlen($this->request->post['password']) != 0) || (utf8_strlen($this->request->post['password']) > 20) || (utf8_strlen($this->request->post['password']) == 0 && $admin_id == 0) ) {
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