<?php 
use Document\Group\GroupMember;

class ControllerGroupGroupMember extends Controller {
	private $error = array( );
	private $route = 'group/group_member';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'group/group_member' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/group_member' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'group/group_member' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/group_member' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_group_member->addGroupMember( $this->request->get['group_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			
				$this->redirect( $this->url->link( 'group/group_member', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/group_member', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->data['action'] = $this->url->link( 'group/group_member/insert', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'group/group_member' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/group_member' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_group_member->editGroupMember( $this->request->get['group_member_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_update');
			
				$this->redirect( $this->url->link( 'group/group_member', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/group_member', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'group/group_member' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/group_member' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_group_member->deleteGroupMember( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/group_member', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->getList( );
	}

	private function getList( ){
		// Limit
		$limit = $this->config->get('config_admin_limit');
		
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
		
		if ( isset($this->request->get['page']) ) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		$group_id = 0;
		if ( isset($this->request->get['group_id']) ){
			$group_id = $this->request->get['group_id'];
		}
		
		$this->load->model( 'group/group' );
		$group = $this->model_group_group->getGroup( $this->request->get['group_id'] );

		if ( !$group ){
			$this->session->data['error_warning'] = $this->language->get( 'error_not_found_group' );
			$this->redirect( $this->url->link( 'group/group', 'token=' . $this->session->data['token'], 'SSL' ) );
		}
		
		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/group_member', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );

		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_group'] = $this->language->get( 'column_group' );	
		$this->data['column_action'] = $this->language->get( 'column_action' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'group/group_member/insert', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'group/group_member/delete', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['back'] = $this->url->link( 'group/group', 'token=' . $this->session->data['token'], 'SSL' );

		// group_member
		$group_members = $group->getGroupMembers();
		
		$group_member_total = 0;
		
		$this->data['group_members'] = array();
		if ( $group_members ){
			$group_member_total = count($group_members);
			for ( $i = (($page - 1) * $limit); $i < ($group_member_total - (($page - 1) * $limit)); $i++ ){
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/group_member/update', 'group_member_id=' . $group_members[$i]->getId() . '&group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['group_members'][] = array(
					'id' => $group_members[$i]->getId(),
					'name' => $group_members[$i]->getName(),
					'canDel' => $group_members[$i]->getCanDel(),
					'status' => $group_members[$i]->getStatus() ? $this->language->get( 'text_enabled' ) : $this->language->get( 'text_disabled' ),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $group_member_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('sale/customer', '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'group/group_member_list.tpl';
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
		
		if ( isset($this->error['error_name']) ) {
			$this->data['error_name'] = $this->error['error_name'];
		} else {
			$this->data['error_name'] = '';
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/group_member', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_select_all_category'] = $this->language->get( 'text_select_all_category' );
		$this->data['text_select_all_action'] = $this->language->get( 'text_select_all_action' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// Column
		$this->data['column_action'] = $this->language->get( 'column_action' );
		$this->data['column_category'] = $this->language->get( 'column_category' );
		$this->data['column_username'] = $this->language->get( 'column_username' );
		$this->data['column_fullname'] = $this->language->get( 'column_fullname' );
		$this->data['column_email'] = $this->language->get( 'column_email' );
		
		// Entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_action'] = $this->language->get( 'entry_action' );
		$this->data['entry_category'] = $this->language->get( 'entry_category' );
		$this->data['entry_find_member'] = $this->language->get( 'entry_find_member' );

		// Tab
		$this->data['tab_general'] = $this->language->get( 'tab_general' );
		$this->data['tab_member'] = $this->language->get( 'tab_member' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'group/group_member', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		
		$group_id = 0;
		if ( isset($this->request->get['group_id']) ){
			$group_id = $this->request->get['group_id'];
		}
		
		$this->load->model( 'group/group' );
		$group = $this->model_group_group->getGroup( $this->request->get['group_id'] );
		
		// group_member
		if ( isset($this->request->get['group_member_id']) ){
			if ( $group ){
				foreach ( $group->getGroupMembers() as $group_member ){
					if ( $group_member->getId() == $this->request->get['group_member_id'] ){
						break;
					}
				}
				
				$this->data['action'] = $this->url->link( 'group/group_member/update', 'group_member_id=' . $this->request->get['group_member_id'] . '&group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($group_member) ){
			$this->data['name'] = $group_member->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($group_member) ){
			$this->data['status'] = $group_member->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// Entry action
		$this->load->model('group/action');
		$actions = $this->model_group_action->getAllActions();

		$this->data['actions'] = array();
		foreach ( $actions as $action ) {
			$checked = false;
			if ( isset($group_member) && $group_member->getActionById($action->getId()) ){
				$checked = true;
			}

			$this->data['actions'][] = array(
				'id'	=> $action->getId(),
				'name'	=> $action->getName(),
				'checked' => $checked
			);
		}

		// Entry Category
		$this->load->model('branch/category');
		$categories = $this->model_branch_category->getAllCategories(array(
			'branch_id' => $group->getBranch()->getId()
		));

		$this->data['categories'] = array();
		foreach ( $categories as $category ) {
			$checked = false;
			if ( isset($group_member) && $group_member->getCategoryById($category->getId()) ){
				$checked = true;
			}

			$this->data['categories'][] = array(
				'id'	=> $category->getId(),
				'name'	=> $category->getName(),
				'checked' => $checked
			);
		}

		// Entry Member
		$this->data['members'] = array();
		if ( isset( $group_member ) ) {
			foreach ( $group_member->getMembers() as $member ) {
				$this->data['members'][] = array(
					'id' => $member->getId(),
					'username' => $member->getUsername(),
					'fullname' => $member->getFullname(),
					'email' => $member->getPrimaryEmail()->getEmail()
				);
			}
		}

		$this->data['token'] = $this->session->data['token'];
		
		$this->template = 'group/group_member_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 3 || strlen($this->request->post['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
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
}
?>