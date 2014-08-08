<?php
class ControllerUserList extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'user/list';

	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'user/list' );
		$this->load->model( 'user/list' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'user/list' );
		$this->load->model( 'user/list' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm( array( 'validateCode' => true ) ) ){
			$this->model_user_list->addUserList( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('user/list', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'user/list/insert', 'token=' . $this->session->data['token'], 'sSL' );

		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'user/list' );
		$this->load->model( 'user/list' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_user_list->editUserList( $this->request->get['list_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('user/list', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['disabledCode'] = true;

		$this->getForm();
	}

	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'user/list' );
		$this->load->model( 'user/list' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_user_list->deleteUserLists( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('user/list', 'token=' . $this->session->data['token'], 'sSL') );
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
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'user/list', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');

		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_code'] = $this->language->get('column_code');
		$this->data['column_action'] = $this->language->get('column_action');

		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');

		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');

		// Link
		$this->data['insert'] = $this->url->link( 'user/list/insert', 'token=' . $this->session->data['token'], 'sSL' );
		$this->data['delete'] = $this->url->link( 'user/list/delete', 'token=' . $this->session->data['token'], 'sSL' );

		// finance
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);

		$lItems = $this->model_user_list->getUserLists( $aData );

		$iItemsTotal = $lItems->count();

		$this->data['items'] = array();
		foreach ($lItems as $key => $oItem) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link( 'user/list/update', 'list_id=' . $oItem->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
				'icon' => 'icon-edit',
			);

			$this->data['items'][] = array(
				'id' => $oItem->getId(),
				'name' => $oItem->getName(),
				'code' => $oItem->getCode(),
				'action' => $action,
				);
		}

		$pagination = new Pagination();
		$pagination->total = $iItemsTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('user/list', '&page={page}' . '&token=' . $this->session->data['token'], 'sSL');

		$this->data['pagination'] = $pagination->render();

		$this->template = 'user/user_list_list.tpl';
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

		if ( isset($this->error['error_code']) ) {
			$this->data['error_code'] = $this->error['error_code'];
		} else {
			$this->data['error_code'] = '';
		}

		if ( isset($this->error['error_users']) ) {
			$this->data['error_users'] = $this->error['error_users'];
		} else {
			$this->data['error_users'] = '';
		}

		$idItem = $this->request->get['list_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'user/list', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');

		// Text
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_error_users'] = $this->language->get('error_users');
		$this->data['text_search_user'] = $this->language->get('text_search_user');

		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_user'] = $this->language->get('button_add_user');

		// Column
		$this->data['column_user'] = $this->language->get('column_user');
		$this->data['column_action'] = $this->language->get('column_action');

		// Entry
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_code'] = $this->language->get('entry_code');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_users'] = $this->language->get('entry_users');

		// Link
		$this->data['cancel'] = $this->url->link( 'user/list', 'token=' . $this->session->data['token'], 'sSL' );

		$this->data['token'] = $this->session->data['token'];

		// Item
		if ( isset($this->request->get['list_id']) ){
			$oItem = $this->model_user_list->getUserList( $idItem );
			if ( $oItem ){
				$this->data['action'] = $this->url->link( 'user/list/update', 'list_id=' . $idItem . '&token=' . $this->session->data['token'], 'sSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oItem) ){
			$this->data['name'] = $oItem->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry code
		if ( isset($this->request->post['code']) ){
			$this->data['code'] = $this->request->post['code'];
		}elseif ( isset($oItem) ){
			$this->data['code'] = $oItem->getCode();
		}else {
			$this->data['code'] = '';
		}

		// Entry description
		if ( isset($this->request->post['description']) ){
			$this->data['description'] = $this->request->post['description'];
		}elseif ( isset($oItem) ){
			$this->data['description'] = $oItem->getDescription();
		}else {
			$this->data['description'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oItem) ){
			$this->data['status'] = $oItem->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// Entry users
		$this->data['users'] = array();
		if ( isset($this->request->post['users']) ){
			$this->data['users'] = $this->request->post['users'];
		}elseif ( isset($oItem) ){
			$this->load->model('user/user');
			$lUsers = $this->model_user_user->getUsers( array( 'ids' => $oItem->getUsers() ) );
			foreach ($lUsers as $key => $oUser) {
				$this->data['users'][] = array(
					'name' => (( $oUser->getUsername() ) ? $oUser->getUsername() : '') . ' (' . $oUser->getPrimaryEmail()->getEmail() . ')',
					'id' => $oUser->getId(),
					);
			}
		}

		$this->template = 'user/user_list_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm( $options = array() ){
		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 1 || strlen($this->request->post['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}

		if ( isset( $options['validateCode'] ) && $options['validateCode'] ) {
			if ( !isset($this->request->post['code']) || strlen($this->request->post['code']) < 1 || strlen($this->request->post['code']) > 128 ){
				$this->error['error_code'] = $this->language->get( 'error_code' );
			}

			if ( $this->isExistCode( $this->request->post['code'] ) ) {
				$this->error['error_code'] = $this->language->get( 'error_exist_code' );
			}
		}

		if ( isset($this->request->post['users']) ) {
			if ( !$this->isValidateUserList($this->request->post['users']) ) {
				$this->error['error_users'] = $this->language->get( 'error_users' );
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

	private function isValidateUserList( $data ) {
		$tmp = array();
		foreach ($data as $key => $value) {
			$tmp[$value['id']] = $value['id'];
		}

		return count($tmp) == count($data);
	}

	private function isExistCode( $code ) {
		$this->load->model('user/list');

		if ( isset( $this->request->get['list_id'] ) ) {
			$list_id = $this->request->get['list_id'];
		}else {
			$list_id = '';
		}

		return $this->model_user_list->isExistCode( $code, $list_id );
	}
}
?>