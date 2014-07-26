<?php
class ControllerFinanceCode extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'finance/code';

	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/code' );
		$this->load->model( 'finance/code' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/code' );
		$this->load->model( 'finance/code' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_finance_code->addCode( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/code', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'finance/code/insert', 'token=' . $this->session->data['token'], 'sSL' );

		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/code' );
		$this->load->model( 'finance/code' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm(true) ){
			$this->model_finance_code->editCode( $this->request->get['code_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/code', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->getForm();
	}

	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/code' );
		$this->load->model( 'finance/code' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_finance_code->deleteCodes( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/code', 'token=' . $this->session->data['token'], 'sSL') );
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
			'href'      => $this->url->link( 'finance/code', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');

		// Column
		$this->data['column_code'] = $this->language->get('column_code');
		$this->data['column_finance'] = $this->language->get('column_finance');
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_action'] = $this->language->get('column_action');

		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');

		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');

		// Link
		$this->data['insert'] = $this->url->link( 'finance/code/insert', 'token=' . $this->session->data['token'], 'sSL' );
		$this->data['delete'] = $this->url->link( 'finance/code/delete', 'token=' . $this->session->data['token'], 'sSL' );

		// finance
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);

		$lCodes = $this->model_finance_code->getCodes( $aData );

		$iCodeTotal = $lCodes->count();

		$this->data['codes'] = array();
		if ( $lCodes ){
			foreach ( $lCodes as $oCode ){
				$action = array();

				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'finance/code/update', 'code_id=' . $oCode->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-edit',
				);

				$this->data['codes'][] = array(
					'id' => $oCode->getId(),
					'code' => $oCode->getCode(),
					'finance' => $oCode->getFinance()->getName(),
					'status' => $oCode->getStatus() ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		}

		$pagination = new Pagination();
		$pagination->total = $iCodeTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('finance/code', '&page={page}' . '&token=' . $this->session->data['token'], 'sSL');

		$this->data['pagination'] = $pagination->render();

		$this->template = 'finance/code_list.tpl';
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

		if ( isset($this->error['error_code']) ) {
			$this->data['error_code'] = $this->error['error_code'];
		} else {
			$this->data['error_code'] = '';
		}

		if ( isset($this->error['error_finance']) ) {
			$this->data['error_finance'] = $this->error['error_finance'];
		} else {
			$this->data['error_finance'] = '';
		}

		$idCode = $this->request->get['code_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/code', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');

		// Text
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');

		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		// Entry
		$this->data['entry_code'] = $this->language->get('entry_code');
		$this->data['entry_finance'] = $this->language->get('entry_finance');
		$this->data['entry_status'] = $this->language->get('entry_status');

		// Link
		$this->data['cancel'] = $this->url->link( 'finance/code', 'token=' . $this->session->data['token'], 'sSL' );

		// finance
		if ( isset($this->request->get['code_id']) ){
			$oCode = $this->model_finance_code->getCode( $idCode );
			if ( $oCode ){
				$this->data['action'] = $this->url->link( 'finance/code/update', 'code_id=' . $idCode . '&token=' . $this->session->data['token'], 'sSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry code
		if ( isset($this->request->post['code']) ){
			$this->data['code'] = $this->request->post['code'];
		}elseif ( isset($oCode) ){
			$this->data['code'] = $oCode->getCode();
		}else {
			$this->data['code'] = '';
		}

		// Entry Finance
		if ( isset($this->request->post['finance_id']) ){
			$this->data['finance_id'] = $this->request->post['finance_id'];
			$this->data['finance'] = $this->request->post['finance'];
		}elseif ( isset($oCode) ){
			$this->data['finance_id'] = $oCode->getFinance()->getId();
			$this->data['finance'] = $oCode->getFinance()->getName();
		}else {
			$this->data['finance_id'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oCode) ){
			$this->data['status'] = $oCode->getStatus();
		}else {
			$this->data['status'] = true;
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'finance/code_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm( $bIsEdit = false ){
		if ( !isset($this->request->post['code']) || strlen($this->request->post['code']) < 1 || strlen($this->request->post['code']) > 128 ){
			$this->error['error_code'] = $this->language->get( 'error_code' );
		}elseif ( $this->isExistCode($this->request->post['code']) ) {
			$this->error['error_code'] = $this->language->get( 'error_code_exist' );
		}

		if ( empty($this->request->post['finance_id']) ){
			$this->error['error_finance'] = $this->language->get( 'error_finance' );
		}elseif ( $this->isExistFinance($this->request->post['finance_id']) ) {
			$this->error['error_finance'] = $this->language->get( 'error_finance_exist' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;
		}
	}

	private function isExistCode( $code ) {
		$this->load->model('finance/code');

		$oCode =  $this->model_finance_code->getCodeByCode( $code );

		if ( !$oCode || (isset($this->request->get['code_id']) && $oCode->getId() == $this->request->get['code_id']) ) {
			return false;
		}else {
			return true;
		}
	}

	private function isExistFinance( $finance_id ) {
		$this->load->model('finance/code');

		$oCode =  $this->model_finance_code->getCodeByFinance( $finance_id );

		if ( !$oCode || (isset($this->request->get['code_id']) && $oCode->getId() == $this->request->get['code_id']) ) {
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