<?php
class ControllerStockFinance extends Controller {
	private $error = array();
	private $limit = 10;
	private $route = 'stock/finance';

	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/finance' );
		$this->load->model( 'stock/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/finance' );
		$this->load->model( 'stock/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiFinanceForm() ){
			$this->model_stock_finance->addFinance( $this->request->get['stock_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect( $this->url->link('stock/finance', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'], 'SSL') );
		}

		$this->data['action'] = $this->url->link( 'stock/finance/insert', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'] . $url, 'SSL' );

		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/finance' );
		$this->load->model( 'stock/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiFinanceForm(true) ){
			$this->model_stock_finance->editFinance( $this->request->get['stock_id'], $this->request->get['finance_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect( $this->url->link('stock/finance', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'] . $url, 'SSL') );
		}

		$this->getForm();
	}

	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/finance' );
		$this->load->model( 'stock/finance' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiFinanceDelete() ){
			$this->model_stock_finance->deleteFinances( $this->request->get['stock_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect( $this->url->link('stock/finance', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'] . $url, 'SSL') );
		}

		$this->getList();
	}

	private function getList(){
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'stock/finance', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');

		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_action'] = $this->language->get('column_action');

		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');

		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		$this->data['button_filter'] = $this->language->get('button_filter');

		// TOKEN
		$this->data['token'] = $this->session->data['token'];
		$this->data['stock_id'] = '0';

		$url = '';
		if ( !empty($this->request->get['stock_id']) ){
			$idStock = $this->request->get['stock_id'];
			$this->data['stock_id'] = $this->request->get['stock_id'];
			$url .= '&stock_id=' . $idStock;
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if ( !empty($this->request->get['page']) ){
			$page = $this->request->get['page'];
			$url .= '&page=' . $page;
		}else{
			$page = 1;
		}

		// Link
		$this->data['insert'] = $this->url->link( 'stock/finance/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['delete'] = $this->url->link( 'stock/finance/delete', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		// Stock
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			'filter_name' => $filter_name,
			'filter_status' => $filter_status,
		);

		// $oFinances = $this->model_stock_finance->getFinances( $idStock );
		// $lFinances = array();
		// $iFinanceTotal = 0;getAllFinance

		// if ( $oFinances ){
			// $lFinances = $oFinances->getFinances()->slice( $aData['start'], $aData['limit'] );
			// $iFinanceTotal = $oFinances->getFinances()->count();
		// }

		$lFinances = $this->model_stock_finance->getAllFinance( $idStock, $aData );
		$iFinanceTotal = count($lFinances);
		$lFinances = array_slice ( $lFinances , $aData['start'] , $aData['limit'] );
		$this->data['finances'] = array();
		//if ( $lFinances->slice( $aData['start'], $aData['limit'] ) ){
			foreach ( $lFinances as $oFinance ){
				$action = array();

				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'stock/finance/update', 'token=' . $this->session->data['token'] . '&finance_id=' . $oFinance->getId() . $url, 'SSL' ),
					'icon' => 'icon-edit',
				);

				$this->data['finances'][] = array(
					'id' => $oFinance->getId(),
					'name' => $oFinance->getFinance()->getName(),
					'status' => $oFinance->getStatus() ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		//}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		$pagination = new Pagination();
		$pagination->total = $iFinanceTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('stock/finance', '&page={page}' . '&token=' . $this->session->data['token'] . '&stock_id=' . $idStock . $url, 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['filter_name'] = $filter_name;
		$this->data['filter_status'] = $filter_status;

		$this->template = 'stock/finance_list.tpl';
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

		if ( isset($this->error['error_finance_name']) ) {
			$this->data['error_finance_name'] = $this->error['error_finance_name'];
		} else {
			$this->data['error_finance_name'] = '';
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'stock/finance', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		$url = '';

   		if ( !empty($this->request->get['stock_id']) ){
   			$idStock = $this->request->get['stock_id'];
   			$url .= '&stock_id=' . $idStock;
   		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if ( !empty($this->request->get['page']) ){
			$page = $this->request->get['page'];
			$url .= '&page=' . $page;
		}else{
			$page = 1;
		}

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');

		// Text
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		$this->data['text_datetime'] = $this->language->get('text_datetime');
		$this->data['text_value'] = $this->language->get('text_value');
		$this->data['text_year'] = $this->language->get('text_year');
		$this->data['text_quarter'] = $this->language->get('text_quarter');

		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add'] = $this->language->get('button_add');

		// Entry
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_values'] = $this->language->get('entry_values');
		$this->data['entry_status'] = $this->language->get('entry_status');

		// Link
		$this->data['cancel'] = $this->url->link( 'stock/finance', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		// Stock
		if ( isset($this->request->get['finance_id']) ){
			$idFinance = $this->request->get['finance_id'];
			$oFinances = $this->model_stock_finance->getFinances( $idStock );
			if ( $oFinances ){
				$oStockFinance = $oFinances->getFinanceById( $idFinance );
			}else{
				$this->redirect( $this->data['cancel'] );
			}
			if ( $oStockFinance ){
				$this->data['action'] = $this->url->link( 'stock/finance/update', 'token=' . $this->session->data['token'] . '&finance_id=' . $idFinance . $url, 'SSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}

			$oFinance = $oStockFinance->getFinance();
		}

		// Entry finance name
		if ( isset($this->request->post['finance_name']) ){
			$this->data['finance_name'] = $this->request->post['finance_name'];
		}elseif ( isset($oFinance) ){
			$this->data['finance_name'] = $oFinance->getName();
		}else {
			$this->data['finance_name'] = '';
		}

		// Entry finance id
		if ( isset($this->request->post['finance_id']) ){
			$this->data['finance_id'] = $this->request->post['finance_id'];
		}elseif ( isset($oFinance) ){
			$this->data['finance_id'] = $oFinance->getId();
		}else {
			$this->data['finance_id'] = '';
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

		// Entry values
		if ( isset($this->request->post['values']) ){
			$this->data['values'] = $this->request->post['values'];
		}elseif ( isset($oStockFinance) ){
			$this->data['values'] = $oStockFinance->getValues();
		}else {
			$this->data['values'] = true;
		}

		// Finance Datetime data
		$this->load->model('finance/date');
		$lDates = $this->model_finance_date->getAllDates();
		$this->data['dates'] = array();
		foreach ( $lDates as $oDate ) {
			$this->data['dates'][] = $oDate->formatToCache();
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'stock/finance_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function isValiFinanceForm( $bIsEdit = false ){
		if ( !isset($this->request->post['finance_name']) || strlen($this->request->post['finance_name']) < 3 || strlen($this->request->post['finance_name']) > 128 ){
			$this->error['error_finance_name'] = $this->language->get( 'error_finance_name' );
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
}
?>