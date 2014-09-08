<?php
class ControllerFinanceFinance extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'finance/finance';

	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/finance' );
		$this->load->model( 'finance/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/finance' );
		$this->load->model( 'finance/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_group'])) {
			$url .= '&filter_group=' . urlencode(html_entity_decode($this->request->get['filter_group'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiFinanceForm() ){
			$oFinance = $this->model_finance_finance->addFinance( $this->request->post );

			// ADD FINANCE CODE
			if ($oFinance) {
				$this->load->model('finance/code');
				$this->request->post['code'] = $this->request->post['name'];
				$this->request->post['finance_id'] = $oFinance->getId();
				$this->model_finance_code->addCode( $this->request->post );
			}

			$this->session->data['success'] = $this->language->get( 'text_success' );

			$this->redirect( $this->url->link('finance/finance', 'token=' . $this->session->data['token'] . $url, 'SSL') );
		}

		$this->data['action'] = $this->url->link( 'finance/finance/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/finance' );
		$this->load->model( 'finance/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiFinanceForm(true) ){
			$this->model_finance_finance->editFinance( $this->request->get['finance_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_group'])) {
				$url .= '&filter_group=' . urlencode(html_entity_decode($this->request->get['filter_group'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect( $this->url->link('finance/finance', 'token=' . $this->session->data['token'] . $url, 'SSL') );
		}

		$this->getForm();
	}

	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/finance' );
		$this->load->model( 'finance/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiFinanceDelete() ){
			$this->model_finance_finance->deleteFinances( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/finance', 'token=' . $this->session->data['token'], 'SSL') );
		}

		$this->getList( );
	}

	private function getList( ){
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_group'])) {
			$filter_group = $this->request->get['filter_groupT'];
		} else {
			$filter_group = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

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

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_group'])) {
			$url .= '&filter_group=' . urlencode(html_entity_decode($this->request->get['filter_group'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/finance', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');

		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_group'] = $this->language->get('column_group');
		$this->data['column_parent'] = $this->language->get('column_parent');
		$this->data['column_order'] = $this->language->get('column_order');
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_action'] = $this->language->get('column_action');

		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');

		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');

		// Link
		$this->data['insert'] = $this->url->link( 'finance/finance/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['delete'] = $this->url->link( 'finance/finance/delete', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		// finance
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);

		$lFinances = $this->model_finance_finance->getFinances( $aData );

		$iFinanceTotal = $lFinances->count();

		$this->data['finances'] = array();
		if ( $lFinances ){
			foreach ( $lFinances as $oFinance ){
				$action = array();

				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'finance/finance/update', 'finance_id=' . $oFinance->getId() . '&token=' . $this->session->data['token'] . $url, 'SSL' ),
					'icon' => 'icon-edit',
				);

				$this->data['finances'][] = array(
					'id' => $oFinance->getId(),
					'name' => $oFinance->getName(),
					'order' => $oFinance->getOrder(),
					'group' => $oFinance->getGroup() ? $oFinance->getGroup()->getName() : '',
					'parent' => $oFinance->getParentFinance() ? $oFinance->getParentFinance()->getName() : 'root',
					'status' => $oFinance->getStatus() ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_group'])) {
			$url .= '&filter_group=' . urlencode(html_entity_decode($this->request->get['filter_group'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		$pagination = new Pagination();
		$pagination->total = $iFinanceTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('finance/finance', '&page={page}' . '&token=' . $this->session->data['token'] . $url, 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['filter_name'] = $filter_name;
		$this->data['filter_group'] = $filter_group;
		$this->data['filter_status'] = $filter_status;

		$this->template = 'finance/finance_list.tpl';
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

		if ( isset($this->error['error_parent']) ) {
			$this->data['error_parent'] = $this->error['error_parent'];
		} else {
			$this->data['error_parent'] = '';
		}

		if ( isset($this->error['error_order']) ) {
			$this->data['error_order'] = $this->error['error_order'];
		} else {
			$this->data['error_order'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_group'])) {
			$url .= '&filter_group=' . urlencode(html_entity_decode($this->request->get['filter_group'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$idFinance = $this->request->get['finance_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/finance', 'token=' . $this->session->data['token'] . $url, 'SSL' ),
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
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_group'] = $this->language->get('entry_group');
		$this->data['entry_parent'] = $this->language->get('entry_parent');
		$this->data['entry_order'] = $this->language->get('entry_order');
		$this->data['entry_status'] = $this->language->get('entry_status');

		// Link
		$this->data['cancel'] = $this->url->link( 'finance/finance', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		// finance
		if ( isset($this->request->get['finance_id']) ){
			$oFinance = $this->model_finance_finance->getFinance( $idFinance );
			if ( $oFinance ){
				$this->data['action'] = $this->url->link( 'finance/finance/update', 'finance_id=' . $idFinance . '&token=' . $this->session->data['token'] . $url, 'SSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oFinance) ){
			$this->data['name'] = $oFinance->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry group
		if ( isset($this->request->post['group']) ){
			$this->data['group'] = $this->request->post['group'];
		}elseif ( isset($oFinance) && $oFinance->getGroup() ){
			$this->data['group'] = $oFinance->getGroup()->getName();
		}else {
			$this->data['group'] = '';
		}

		// Entry parent
		if ( isset($this->request->post['parent']) ){
			$this->data['parent'] = $this->request->post['parent'];
		}elseif ( isset($oFinance) && $oFinance->getParentFinance() ){
			$this->data['parent'] = $oFinance->getParentFinance()->getName();
		}else {
			$this->data['parent'] = 'root';
		}

		// Entry parent id
		if ( isset($this->request->post['parent_id']) ){
			$this->data['parent_id'] = $this->request->post['parent_id'];
		}elseif ( isset($oFinance) && $oFinance->getparentFinance() ){
			$this->data['parent_id'] = $oFinance->getparentFinance()->getId();
		}else {
			$this->data['parent_id'] = '';
		}

		// Entry order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($oFinance) ){
			$this->data['order'] = $oFinance->getOrder();
		}else {
			$this->data['order'] = 0;
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oFinance) ){
			$this->data['status'] = $oFinance->getStatus();
		}else {
			$this->data['status'] = true;
		}

		// Group Data
		$this->load->model('finance/group');
		$lGroups = $this->model_finance_group->getAllGroups();
		$this->data['groups'] = array();
		foreach ( $lGroups as $oGroup ) {
			$this->data['groups'][] = array(
				'id' => $oGroup->getId(),
				'name' => $oGroup->getName()
			);
		}

		$this->data['token'] = $this->session->data['token'];
		$this->data['autocomplete_finance'] = html_entity_decode($this->url->link('finance/finance/search', 'token=' . $this->session->data['token'], 'SSL'));

		$this->template = 'finance/finance_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function isValiFinanceForm( $bIsEdit = false ){
		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 3 || strlen($this->request->post['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}

		if ( !isset($this->request->post['parent']) || strlen($this->request->post['parent']) < 3 || strlen($this->request->post['parent']) > 128 ){
			$this->error['error_parent'] = $this->language->get( 'error_parent' );
		}

		if ( !isset($this->request->post['order']) || strlen($this->request->post['order']) < 1 || strlen($this->request->post['order']) > 128 ){
			$this->error['error_order'] = $this->language->get( 'error_order' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;
		}
	}

	private function isValiFinanceDelete(){
		if ( !isset($this->request->post['id']) || !is_array( $this->request->post['id']) ){
			$this->error['error_permission'] = $this->language->get( 'error_permission' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;
		}
	}

	public function import(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_import')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language('finance/import');
		$this->load->model('finance/finance');

		$this->document->setTitle( $this->language->get('heading_title') );

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title' ),
			'href'      => $this->url->link( 'finance/import', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['entry_import'] = $this->language->get('entry_import');
		$this->data['button_submit'] = $this->language->get('button_submit');

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && !empty($this->request->files['file']) ){
			if ( $this->model_finance_finance->import($this->request->files['file']) ){
				$this->data['success'] = $this->language->get('text_success');
			}else{
				$this->data['error_warning'] = $this->language->get('text_error');
			}
		}

		$this->data['action'] = $this->url->link( 'finance/finance/import', 'token=' . $this->session->data['token'], 'sSL');

		$this->template = 'stock/import_exchange.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	public function search() {
		$this->load->model('finance/finance');

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			'limit'		  => 20,
		);

		$lFinances = $this->model_finance_finance->searchFinanceByKeyword( $data );

		$json = array();
		foreach ($lFinances as $oFinance) {
			$json[] = array(
				'name' => html_entity_decode( $oFinance->getName() ),
				'id' => $oFinance->getId(),
			);
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function autocomplete() {
		$this->load->model('finance/finance');

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		if ( isset( $this->request->get['filter_group'] ) ) {
			$filter_group = $this->request->get['filter_group'];
		}else {
			$filter_group = null;
		}

		if ( isset( $this->request->get['filter_status'] ) ) {
			$filter_status = $this->request->get['filter_status'];
		}else {
			$filter_status = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			'filter_group' => $filter_group,
			'filter_status' => $filter_status,
			'limit'		  => 20,
		);

		$lFinances = $this->model_finance_finance->searchFinanceByKeyword( $data );

		$json = array();
		foreach ($lFinances as $oFinance) {
			$json[] = array(
				'name' => html_entity_decode( $oFinance->getName() ),
				'group' => html_entity_decode( $oFinance->getGroup()->getName() ),
				'id' => $oFinance->getId(),
			);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>