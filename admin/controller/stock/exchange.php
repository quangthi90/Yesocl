<?php 
class ControllerStockExchange extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'stock/exchange';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/exchange' );

		if ( empty($this->request->get['stock_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_empty');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->load->model( 'stock/exchange' );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/exchange' );

		if ( empty($this->request->get['stock_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_empty');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->load->model( 'stock/exchange' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_stock_exchange->addExchange( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/exchange', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'stock/exchange/insert', 'token=' . $this->session->data['token'], 'sSL' );
		
		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/exchange' );

		if ( empty($this->request->get['stock_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_empty');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->load->model( 'stock/exchange' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm(true) ){
			$this->model_stock_exchange->editExchange( $this->request->get['exchange_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/exchange', 'token=' . $this->session->data['token'], 'sSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/exchange' );
		
		if ( empty($this->request->get['stock_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_empty');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->load->model( 'stock/exchange' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_stock_exchange->deleteExchanges( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/exchange', 'token=' . $this->session->data['token'], 'sSL') );
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

		$url = '';
		$url .= '&stock_id=' . $this->request->get['stock_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'stock/exchange', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		$this->load->model('stock/stock');
		$oStock = $this->model_stock_stock->getStock( array('id' => $this->request->get['stock_id']) );

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		$this->document->setTitle( $this->language->get('heading_title') . ' | ' . $oStock->getCode() );
		
		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');

		// Column
		$this->data['column_high'] = $this->language->get('column_high');
		$this->data['column_low'] = $this->language->get('column_low');
		$this->data['column_open'] = $this->language->get('column_open');
		$this->data['column_close'] = $this->language->get('column_close');
		$this->data['column_volume'] = $this->language->get('column_volume');
		$this->data['column_created'] = $this->language->get('column_created');
		$this->data['column_action'] = $this->language->get('column_action');
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');
		
		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		$this->data['button_back'] = $this->language->get('button_back');
		
		// Link
		$this->data['insert'] = $this->url->link( 'stock/exchange/insert', 'token=' . $this->session->data['token'] . $url, 'sSL' );
		$this->data['delete'] = $this->url->link( 'stock/exchange/delete', 'token=' . $this->session->data['token'] . $url, 'sSL' );
		$this->data['back'] = $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'], 'sSL' );

		// Exchange
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);

		if ( !$oStock ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_not_found');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}
		
		$lExchanges = $oStock->getExchanges();
		
		$iExchangeTotal = $lExchanges->count();
		
		$this->data['exchanges'] = array();
		if ( $lExchanges ){
			foreach ( $lExchanges as $key => $oExchange ){
				if ( $key < $aData['start'] ){
					continue;
				}

				if ( count($this->data['exchanges']) == $aData['limit'] ){
					break;
				}

				$action = array();
			
				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'stock/exchange/update', 'exchange_id=' . $oExchange->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['exchanges'][] = array(
					'id' => $oExchange->getId(),
					'high' => $oExchange->getHighPrice(),
					'low' => $oExchange->getLowPrice(),
					'open' => $oExchange->getOpenPrice(),
					'close' => $oExchange->getClosePrice(),
					'volume' => $oExchange->getVolume(),
					'created' => $oExchange->getCreated()->format('d/m/Y'),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $iExchangeTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('stock/exchange', '&page={page}' . '&token=' . $this->session->data['token'] . $url, 'sSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'stock/exchange_list.tpl';
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

		$idExchange = $this->request->get['exchange_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'stock/exchange', 'token=' . $this->session->data['token'], 'sSL' ),
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
		$this->data['entry_code'] = $this->language->get('entry_code');
		$this->data['entry_order'] = $this->language->get('entry_order');
		$this->data['entry_status'] = $this->language->get('entry_status');
		
		// Link
		$this->data['cancel'] = $this->url->link( 'stock/exchange', 'token=' . $this->session->data['token'], 'sSL' );
		
		// Stock
		$this->data['is_edit'] = false;
		if ( isset($this->request->get['exchange_id']) ){
			$oExchange = $this->model_stock_exchange->getExchange( array('id' => $idExchange) );
			
			if ( $oExchange ){
				$this->data['action'] = $this->url->link( 'stock/exchange/update', 'exchange_id=' . $idExchange . '&token=' . $this->session->data['token'], 'sSL' );	
				$this->data['is_edit'] = true;
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oExchange) ){
			$this->data['name'] = $oExchange->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry Code
		if ( isset($this->request->post['code']) ){
			$this->data['code'] = $this->request->post['code'];
		}elseif ( isset($oExchange) ){
			$this->data['code'] = $oExchange->getCode();
		}else {
			$this->data['code'] = '';
		}

		// Entry order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($oExchange) ){
			$this->data['order'] = $oExchange->getOrder();
		}else {
			$this->data['order'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oExchange) ){
			$this->data['status'] = $oExchange->getStatus();
		}else {
			$this->data['status'] = true;
		}

		$this->template = 'stock/exchange_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm( $bIsEdit = false ){
		if ( empty($this->request->post['name']) || strlen($this->request->post['name']) < 3 || strlen($this->request->post['name']) > 128 ){
			$this->error['warning'] = $this->language->get( 'error_name' );
		}

		if ( $bIsEdit == false && (empty($this->request->post['code']) || strlen($this->request->post['code']) < 3 || strlen($this->request->post['code']) > 10) ){
			$this->error['error_code'] = $this->language->get( 'error_code' );
		}

		elseif ( !empty($this->request->post['code']) && $this->model_stock_exchange->getExchange(array('code', $this->request->post['code'])) ){
			$this->error['error_code'] = $this->language->get( 'error_exist_code' );
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

	public function import(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_import')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language('stock/import_exchange');
		$this->load->model('stock/exchange');

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title' ),
			'href'      => $this->url->link( 'stock/import', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['entry_import'] = $this->language->get('entry_import');
		$this->data['button_submit'] = $this->language->get('button_submit');

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && !empty($this->request->files['file']) ){
			if ( $this->model_stock_exchange->importExchange($this->request->files['file']) ){
				$this->data['success'] = $this->language->get('text_success');
			}else{
				$this->data['error_warning'] = $this->language->get('text_error');
			}
		}

		$this->data['action'] = $this->url->link( 'stock/exchange/import', 'token=' . $this->session->data['token'], 'sSL');
		
		$this->template = 'stock/import_exchange.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}
}
?>