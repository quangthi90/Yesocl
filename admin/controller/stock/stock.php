<?php 
class ControllerStockStock extends Controller {
	private $error = array();
	private $limit = 10;
	private $route = 'stock/stock';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/stock');
		$this->load->model( 'stock/stock');

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/stock');
		$this->load->model( 'stock/stock');

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_stock_stock->addStock( $this->request->post );
			
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'stock/stock/insert', 'token=' . $this->session->data['token'], 'sSL');
		
		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language('stock/stock');
		$this->load->model('stock/stock');

		$this->document->setTitle( $this->language->get('heading_title') );

		$url = '';
		if ( !empty($this->request->get['page']) ){
			$url .= '&page=' . $this->request->get['page'];
		}

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm(true) ){
			if ( $this->model_stock_stock->editStock($this->request->get['stock_id'], $this->request->post) ){
				$this->session->data['success'] = $this->language->get('text_success');
			}else{
				$this->session->data['warning'] = $this->language->get('text_error');
			}
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'] . $url, 'sSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/stock');
		$this->load->model( 'stock/stock');

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_stock_stock->deleteStocks( $this->request->post );
			
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->getList();
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

		$url = '';
		$pageUrl .= '&page=' . $page;

		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);

		if ( !empty($this->request->get['filter_name']) ){
			$url .= '&filter_name=' . $this->request->get['filter_name'];
			$aData['filter_name'] = $this->request->get['filter_name'];
		}

		if ( !empty($this->request->get['filter_code']) ){
			$url .= '&filter_code=' . $this->request->get['filter_code'];
			$aData['filter_code'] = $this->request->get['filter_code'];
		}

		if ( !empty($this->request->get['filter_market']) ){
			$url .= '&filter_market=' . $this->request->get['filter_market'];
			$aData['filter_market'] = $this->request->get['filter_market'];
		}

		if ( !empty($this->request->get['filter_status']) ){
			$url .= '&filter_status=' . $this->request->get['filter_status'];
			$aData['filter_status'] = $this->request->get['filter_status'];
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title' ),
			'href'      => $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');

		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_code'] = $this->language->get('column_code');
		$this->data['column_market'] = $this->language->get('column_market');
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_action'] = $this->language->get('column_action');
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');
		
		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		$this->data['button_filter'] = $this->language->get('button_filter');
		
		// Link
		$this->data['insert'] = $this->url->link( 'stock/stock/insert', 'token=' . $this->session->data['token'] . $pageUrl . $url, 'SSL');
		$this->data['delete'] = $this->url->link( 'stock/stock/delete', 'token=' . $this->session->data['token'] . $pageUrl . $url, 'SSL');

		// Stock		
		$lStocks = $this->model_stock_stock->getStocks( $aData );
		
		$iStockTotal = $lStocks->count();
		
		$this->data['stocks'] = array();
		if ( $lStocks ){
			foreach ( $lStocks as $oStock ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get('text_edit' ),
					'href' => $this->url->link( 'stock/stock/update', 'stock_id=' . $oStock->getId() . '&token=' . $this->session->data['token'] . $pageUrl . $url, 'sSL' ),
					'icon' => 'icon-edit',
				);

				$action[] = array(
					'text' => $this->language->get('text_trading' ),
					'href' => $this->url->link( 'stock/exchange', 'stock_id=' . $oStock->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-signal',
				);

				$action[] = array(
					'text' => $this->language->get( 'button_post' ),
					'href' => $this->url->link( 'stock/post', 'token=' . $this->session->data['token'] . '&stock_id=' . $oStock->getId(), 'SSL' ),
					'icon' => 'icon-list',
				);

				$action[] = array(
					'text' => $this->language->get( 'button_finance' ),
					'href' => $this->url->link( 'stock/finance', 'token=' . $this->session->data['token'] . '&stock_id=' . $oStock->getId(), 'SSL' ),
					'icon' => 'icon-list',
				);
			
				$this->data['stocks'][] = array(
					'id' => $oStock->getId(),
					'name' => $oStock->getName(),
					'code' => $oStock->getCode(),
					'market' => $oStock->getMarket()->getName(),
					'status' => $oStock->getStatus() ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		}

		$this->load->model('stock/market');
		$lMarkets = $this->model_stock_market->getMarkets();
		$this->data['markets'] = array();
		foreach ( $lMarkets as $oMarket ) {
			$this->data['markets'][] = array(
				'id' => $oMarket->getId(),
				'name' => $oMarket->getName()
			);
		}

		if ( !empty($this->request->get['filter_name']) ){
			$this->data['filter_name'] = $this->request->get['filter_name'];
		}else{
			$this->data['filter_name'] = '';
		}

		if ( !empty($this->request->get['filter_code']) ){
			$this->data['filter_code'] = $this->request->get['filter_code'];
		}else{
			$this->data['filter_code'] = '';
		}

		if ( !empty($this->request->get['filter_market']) ){
			$this->data['filter_market'] = $this->request->get['filter_market'];
		}else{
			$this->data['filter_market'] = '';
		}

		if ( !empty($this->request->get['filter_status']) ){
			$this->data['filter_status'] = $this->request->get['filter_status'];
		}else{
			$this->data['filter_status'] = '';
		}

		$this->data['token'] = $this->session->data['token'];
		
		$pagination = new Pagination();
		$pagination->total = $iStockTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('stock/stock', '&page={page}' . '&token=' . $this->session->data['token'] . $url, 'sSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'stock/stock_list.tpl';
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

		$idStock = $this->request->get['stock_id'];

		$url = '';
		if ( !empty($this->request->get['page']) ){
			$url .= '&page=' . $this->request->get['page'];
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title' ),
			'href'      => $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		// Text	
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		$this->data['text_fund'] = $this->language->get('text_fund');
		$this->data['text_add'] = $this->language->get('text_add');
		$this->data['text_remove'] = $this->language->get('text_remove');

		// Tab
		$this->data['tab_fund'] = $this->language->get('tab_fund');
		$this->data['tab_basic'] = $this->language->get('tab_basic');
		
		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
		// Entry
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_code'] = $this->language->get('entry_code');
		$this->data['entry_market'] = $this->language->get('entry_market');
		$this->data['entry_status'] = $this->language->get('entry_status');
		
		// Link
		$this->data['cancel'] = $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'] . $url, 'sSL');
		
		// Stock
		$isEdit = false;
		if ( isset($this->request->get['stock_id']) ){
			$oStock = $this->model_stock_stock->getStock( array('id' => $idStock) );
			
			if ( $oStock ){
				$this->data['action'] = $this->url->link( 'stock/stock/update', 'stock_id=' . $idStock . '&token=' . $this->session->data['token'] . $url, 'sSL');	
				$isEdit = true;
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oStock) ){
			$this->data['name'] = $oStock->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oStock) ){
			$this->data['status'] = $oStock->getStatus();
		}else {
			$this->data['status'] = true;
		}

		// Entry market
		if ( isset($this->request->post['market_id']) ){
			$this->data['market_id'] = $this->request->post['market_id'];
		}elseif ( isset($oStock) ){
			$this->data['market_id'] = $oStock->getMarket()->getId();
		}else {
			$this->data['market_id'] = '';
		}
		$this->load->model('stock/market');
		$lMarkets = $this->model_stock_market->getMarkets();
		$this->data['markets'] = array();
		foreach ( $lMarkets as $oMarket ) {
			$this->data['markets'][] = array(
				'id' => $oMarket->getId(),
				'name' => $oMarket->getName()
			);
		}

		// Funds
		if ( isset($this->request->post['funds']) ){
			$this->data['funds'] = $this->request->post['funds'];
		}elseif ( $oStock && $oStock->getMeta() ){
			$this->data['funds'] = $oStock->getMeta()->getFunds();
		}else {
			$this->data['funds'] = array();
		}
		$this->load->model('stock/fund');
		$lFunds = $this->model_stock_fund->getAllFunds();
		$this->data['all_funds'] = array();
		foreach ( $lFunds as $oFund ) {
			$this->data['all_funds'][] = array(
				'id' => $oFund->getId(),
				'name' => $oFund->getName(),
				'type' => $oFund->getType()
			);
		}

		$this->data['fund_types'] = $this->config->get('stock')['fund'];

		$this->data['is_edit'] = $isEdit;

		$this->template = 'stock/stock_form.tpl';
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

		elseif ( !empty($this->request->post['code']) && $this->model_stock_stock->getStock(array('code', $this->request->post['code'])) ){
			$this->error['error_code'] = $this->language->get( 'error_exist_code' );
		}

		elseif ( !empty($this->request->post['funds']) ){
			foreach ( $this->request->post['funds'] as $aFund ) {
				$iFundPercent = $aFund[$this->config->get('stock')['fund']['percent']];
				if ( !empty($iFundPercent) && ($iFundPercent < -100 || $iFundPercent > 100) ){
					$this->error['warning'] = $this->language->get( 'error_fund_percent' );
					break;
				}
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
			$this->error['error_permission'] = $this->language->get('error_permission');
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
		
		$this->load->language('stock/import_stock');
		$this->load->model('stock/stock');

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
			if ( $this->model_stock_stock->importStock($this->request->files['file']) ){
				$this->data['success'] = $this->language->get('text_success');
			}else{
				$this->data['error_warning'] = $this->language->get('text_error');
			}
		}

		$this->data['action'] = $this->url->link( 'stock/stock/import', 'token=' . $this->session->data['token'], 'sSL');
		
		$this->template = 'stock/import_stock.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	public function search(){
		$this->load->model('stock/stock');
		$aResults = $this->model_stock_stock->searchStock( $this->request->get );

		$aStocks = array();
		foreach ( $aResults as $aResult ) {
			$aStocks[$aResult->getCode()] = array(
				'name' => $aResult->getName(),
				'code' => $aResult->getCode()
			);
		}

		$this->response->setOutput( json_encode($aStocks) );
	}
}
?>