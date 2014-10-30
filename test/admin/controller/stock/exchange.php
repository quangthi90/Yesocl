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
			if ( $this->model_stock_exchange->addExchange($this->request->get['stock_id'], $this->request->post) ){
				$this->session->data['success'] = $this->language->get('text_success');
			}else{
				$this->session->data['error_warning'] = $this->language->get('error_warning');
			}

			$this->redirect( $this->url->link('stock/exchange', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'stock/exchange/insert', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'], 'sSL' );
		
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
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_stock_exchange->editExchange($this->request->get['stock_id'], $this->request->get['exchange_id'], $this->request->post) ){
				$this->session->data['success'] = $this->language->get('text_success');
			}else{
				$this->session->data['error_warning'] = $this->language->get('error_warning');
			}
			
			$this->redirect( $this->url->link('stock/exchange', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'], 'sSL') );
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
			$this->model_stock_exchange->deleteExchanges( $this->request->get['stock_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect( $this->url->link('stock/exchange', 'token=' . $this->session->data['token'] . '&stock_id=' . $this->request->get['stock_id'], 'sSL') );
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

		$link_url = '&stock_id=' . $this->request->get['stock_id'];

		$url = $link_url . '&page=' . $page; 

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

   		$this->load->model('stock/exchange');
   		$this->load->model('stock/stock');

		$oStockExchanges = $this->model_stock_exchange->getExchange( array('stock_id' => $this->request->get['stock_id']) );
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

		if ( !$oStockExchanges ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_not_found');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}
		
		$aExchanges = $oStockExchanges->getExchanges();
		
		$iExchangeTotal = count( $aExchanges );
		
		$this->data['exchanges'] = array();
		if ( $aExchanges ){
			$key = 0;
			foreach ( $aExchanges as $aExchange ){
				if ( $key < $aData['start'] ){
					$key++;
					continue;
				}

				if ( count($this->data['exchanges']) == $aData['limit'] ){
					break;
				}

				$action = array();
			
				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'stock/exchange/update', 'exchange_id=' . $aExchange['created'] . '&token=' . $this->session->data['token'] . $url, 'sSL' ),
					'icon' => 'icon-edit',
				);

				$aExchange['id'] = $aExchange['created'];
				$aExchange['created'] = date('d/m/Y', $aExchange['created']);
				$aExchange['action'] = $action;
				$this->data['exchanges'][] = $aExchange;

				$key++;
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $iExchangeTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('stock/exchange', '&page={page}' . '&token=' . $this->session->data['token'] . $link_url, 'sSL');
			
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
		
		if ( isset($this->error['error_high']) ) {
			$this->data['error_high'] = $this->error['error_high'];
		} else {
			$this->data['error_high'] = '';
		}

		if ( isset($this->error['error_low']) ) {
			$this->data['error_low'] = $this->error['error_low'];
		} else {
			$this->data['error_low'] = '';
		}

		if ( isset($this->error['error_open']) ) {
			$this->data['error_open'] = $this->error['error_open'];
		} else {
			$this->data['error_open'] = '';
		}

		if ( isset($this->error['error_close']) ) {
			$this->data['error_close'] = $this->error['error_close'];
		} else {
			$this->data['error_close'] = '';
		}

		if ( isset($this->error['error_volume']) ) {
			$this->data['error_volume'] = $this->error['error_volume'];
		} else {
			$this->data['error_volume'] = '';
		}

		if ( isset($this->error['error_created']) ) {
			$this->data['error_created'] = $this->error['error_created'];
		} else {
			$this->data['error_created'] = '';
		}

		$idExchange = $this->request->get['exchange_id'];
		$idStock = $this->request->get['stock_id'];

		$url = '&stock_id=' . $idStock;
		if ( !empty($this->request->get['page']) ){
			$url .= '&page=' . $this->request->get['page'];
		}

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
		$this->data['entry_high'] = $this->language->get('entry_high');
		$this->data['entry_low'] = $this->language->get('entry_low');
		$this->data['entry_open'] = $this->language->get('entry_open');
		$this->data['entry_close'] = $this->language->get('entry_close');
		$this->data['entry_volume'] = $this->language->get('entry_volume');
		$this->data['entry_created'] = $this->language->get('entry_created');
		
		// Link
		$this->data['cancel'] = $this->url->link( 'stock/exchange', 'token=' . $this->session->data['token'] . $url, 'sSL' );
		
		// Stock
		$this->load->model('stock/exchange');
		$oStockExchanges = $this->model_stock_exchange->getExchange( array('stock_id' => $idStock) );
		if ( !$oStockExchanges ){
			$this->session->data['error_warning'] = $this->language->get('error_stock_empty');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}
		if ( isset($this->request->get['exchange_id']) ){
			$oExchange = $oStockExchanges->getExchanges()[$idExchange];
			
			if ( $oExchange ){
				$this->data['action'] = $this->url->link( 'stock/exchange/update', 'exchange_id=' . $idExchange . '&token=' . $this->session->data['token'] . $url, 'sSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry high price
		if ( isset($this->request->post['high']) ){
			$this->data['high'] = $this->request->post['high'];
		}elseif ( isset($oExchange) ){
			$this->data['high'] = $oExchange['high_price'];
		}else {
			$this->data['high'] = '';
		}

		// Entry low price
		if ( isset($this->request->post['low']) ){
			$this->data['low'] = $this->request->post['low'];
		}elseif ( isset($oExchange) ){
			$this->data['low'] = $oExchange['low_price'];
		}else {
			$this->data['low'] = '';
		}

		// Entry open price
		if ( isset($this->request->post['open']) ){
			$this->data['open'] = $this->request->post['open'];
		}elseif ( isset($oExchange) ){
			$this->data['open'] = $oExchange['open_price'];
		}else {
			$this->data['open'] = '';
		}

		// Entry close price
		if ( isset($this->request->post['close']) ){
			$this->data['close'] = $this->request->post['close'];
		}elseif ( isset($oExchange) ){
			$this->data['close'] = $oExchange['close_price'];
		}else {
			$this->data['close'] = '';
		}

		// Entry volume price
		if ( isset($this->request->post['volume']) ){
			$this->data['volume'] = $this->request->post['volume'];
		}elseif ( isset($oExchange) ){
			$this->data['volume'] = $oExchange['volume'];
		}else {
			$this->data['volume'] = '';
		}

		// Entry created price
		if ( isset($this->request->post['created']) ){
			$this->data['created'] = $this->request->post['created'];
		}elseif ( isset($oExchange) ){
			$this->data['created'] = date('m/d/Y', $oExchange['created']);
		}else {
			$this->data['created'] = '';
		}

		$this->template = 'stock/exchange_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm( $bIsEdit = false ){
		if ( empty($this->request->post['high']) || strlen($this->request->post['high']) > 30 ){
			$this->error['error_high'] = $this->language->get('error_high');
		}

		if ( empty($this->request->post['low']) || strlen($this->request->post['low']) > 30 ){
			$this->error['error_low'] = $this->language->get('error_low');
		}

		if ( empty($this->request->post['open']) || strlen($this->request->post['open']) > 30 ){
			$this->error['error_open'] = $this->language->get('error_open');
		}

		if ( empty($this->request->post['close']) || strlen($this->request->post['close']) > 30 ){
			$this->error['error_close'] = $this->language->get('error_close');
		}

		if ( empty($this->request->post['volume']) || strlen($this->request->post['volume']) > 30 ){
			$this->error['error_volume'] = $this->language->get('error_volume');
		}

		if ( empty($this->request->post['created']) ){
			$this->error['error_created'] = $this->language->get('error_created');
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

		$this->document->setTitle( $this->language->get('heading_title') );

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