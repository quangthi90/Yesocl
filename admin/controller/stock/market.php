<?php 
class ControllerStockMarket extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'stock/market';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/market' );
		$this->load->model( 'stock/market' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/market' );
		$this->load->model( 'stock/market' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_stock_market->addMarket( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/market', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'stock/market/insert', 'token=' . $this->session->data['token'], 'sSL' );
		
		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/market' );
		$this->load->model( 'stock/market' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm(true) ){
			$this->model_stock_market->editMarket( $this->request->get['market_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/market', 'token=' . $this->session->data['token'], 'sSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/market' );
		$this->load->model( 'stock/market' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_stock_market->deleteMarkets( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/market', 'token=' . $this->session->data['token'], 'sSL') );
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
			'href'      => $this->url->link( 'stock/market', 'token=' . $this->session->data['token'], 'sSL' ),
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
		$this->data['column_order'] = $this->language->get('column_order');
		$this->data['column_status'] = $this->language->get('column_status');	
		$this->data['column_action'] = $this->language->get('column_action');
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');
		
		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		
		// Link
		$this->data['insert'] = $this->url->link( 'stock/market/insert', 'token=' . $this->session->data['token'], 'sSL' );
		$this->data['delete'] = $this->url->link( 'stock/market/delete', 'token=' . $this->session->data['token'], 'sSL' );

		// Stock
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$lMarkets = $this->model_stock_market->getMarkets( $aData );
		
		$iMarketTotal = $lMarkets->count();
		
		$this->data['markets'] = array();
		if ( $lMarkets ){
			foreach ( $lMarkets as $oMarket ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'stock/market/update', 'market_id=' . $oMarket->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['markets'][] = array(
					'id' => $oMarket->getId(),
					'name' => $oMarket->getName(),
					'code' => $oMarket->getCode(),
					'order' => $oMarket->getOrder(),
					'status' => $oMarket->getStatus() ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $oMarket;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('stock/market', '&page={page}' . '&token=' . $this->session->data['token'], 'sSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'stock/market_list.tpl';
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

		$idMarket = $this->request->get['market_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'stock/market', 'token=' . $this->session->data['token'], 'sSL' ),
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
		$this->data['entry_stock'] = $this->language->get('entry_stock');
		$this->data['entry_status'] = $this->language->get('entry_status');
		
		// Link
		$this->data['cancel'] = $this->url->link( 'stock/market', 'token=' . $this->session->data['token'], 'sSL' );
		
		// Stock
		$this->data['is_edit'] = false;
		if ( isset($this->request->get['market_id']) ){
			$oMarket = $this->model_stock_market->getMarket( array('id' => $idMarket) );
			
			if ( $oMarket ){
				$this->data['action'] = $this->url->link( 'stock/market/update', 'market_id=' . $idMarket . '&token=' . $this->session->data['token'], 'sSL' );	
				$this->data['is_edit'] = true;
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oMarket) ){
			$this->data['name'] = $oMarket->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry Code
		if ( isset($this->request->post['code']) ){
			$this->data['code'] = $this->request->post['code'];
		}elseif ( isset($oMarket) ){
			$this->data['code'] = $oMarket->getCode();
		}else {
			$this->data['code'] = '';
		}

		// Entry order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($oMarket) ){
			$this->data['order'] = $oMarket->getOrder();
		}else {
			$this->data['order'] = '';
		}

		// Entry stock
		if ( isset($this->request->post['stock']) ){
			$this->data['stock'] = $this->request->post['stock'];
		}elseif ( $oMarket && $oMarket->getStockMarket() ){
			$this->data['stock'] = $oMarket->getStockMarket()->getName();
		}else {
			$this->data['stock'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oMarket) ){
			$this->data['status'] = $oMarket->getStatus();
		}else {
			$this->data['status'] = true;
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'stock/market_form.tpl';
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

		elseif ( !empty($this->request->post['code']) && $this->model_stock_market->getMarket(array('code', $this->request->post['code'])) ){
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
}
?>