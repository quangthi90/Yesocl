<?php 
class ControllerStockStock extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'stock/stock';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/stock' );
		$this->load->model( 'stock/stock' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function import(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_import')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language('stock/import_stock');
		$this->load->model('stock/stock');

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'stock/import', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

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

		$this->data['action'] = $this->url->link( 'stock/stock/import', 'token=' . $this->session->data['token'], 'sSL' );
		
		$this->template = 'stock/import_stock.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'stock/stock' );
		$this->load->model( 'stock/stock' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_Stock_Stock->addStock( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'stock/stock/insert', 'token=' . $this->session->data['token'], 'sSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/stock' );
		$this->load->model( 'stock/stock' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_Stock_Stock->editStock( $this->request->get['stock_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'stock/stock' );
		$this->load->model( 'stock/stock' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_Stock_Stock->deleteStock( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'sSL') );
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
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_group'] = $this->language->get( 'text_group' );
		$this->data['text_type'] = $this->language->get( 'text_type' );
		$this->data['text_Stock'] = $this->language->get( 'text_Stock' );	
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
		$this->data['insert'] = $this->url->link( 'stock/stock/insert', 'token=' . $this->session->data['token'], 'sSL' );
		$this->data['delete'] = $this->url->link( 'stock/stock/delete', 'token=' . $this->session->data['token'], 'sSL' );

		// Stock
		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$Stocks = $this->model_Stock_Stock->getStocks( $data );
		
		$Stock_total = $this->model_Stock_Stock->getTotalStocks();
		
		$this->data['stocks'] = array();
		if ( $Stocks ){
			foreach ( $Stocks as $Stock ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'stock/stock/update', 'stock_id=' . $Stock->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-edit',
				);
				
				if ( $Stock->getHaveValue() == true ){
					$action[] = array(
						'text' => $this->language->get( 'text_values' ),
						'href' => $this->url->link( 'stock/value', 'stock_id=' . $Stock->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
						'icon' => 'icon-list',
					);
				}
			
				$this->data['stocks'][] = array(
					'id' => $Stock->getId(),
					'name' => $Stock->getName(),
					'group' => $Stock->getGroup()->getName(),
					'type' => $Stock->getType()->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $Stock_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('stock/stock', '&page={page}' . '&token=' . $this->session->data['token'], 'sSL');
			
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'], 'sSL' ),
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
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_type'] = $this->language->get( 'entry_type' );
		$this->data['entry_group'] = $this->language->get( 'entry_group' );
		$this->data['entry_required'] = $this->language->get( 'entry_required' );
		$this->data['entry_have_value'] = $this->language->get( 'entry_have_value' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'stock/stock', 'token=' . $this->session->data['token'], 'sSL' );
		
		// Stock
		if ( isset($this->request->get['stock_id']) ){
			$Stock = $this->model_Stock_Stock->getStock( $this->request->get['stock_id'] );
			
			if ( $Stock ){
				$this->data['action'] = $this->url->link( 'stock/stock/update', 'stock_id=' . $Stock->getId() . '&token=' . $this->session->data['token'], 'sSL' );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($Stock) ){
			$this->data['name'] = $Stock->getName();
		}else {
			$this->data['name'] = '';
		}
		
		// Entry required
		if ( isset($this->request->post['required']) ) {
			$this->data['required'] = $this->request->post['required'];
		}elseif ( isset($Stock) ) {
			$this->data['required'] = $Stock->getRequired();
		}else {
			$this->data['required'] = 0;
		}
		
		// Entry haveValue
		if ( isset($this->request->post['haveValue']) ) {
			$this->data['haveValue'] = $this->request->post['haveValue'];
		}elseif ( isset($Stock) ) {
			$this->data['haveValue'] = $Stock->gethaveValue();
		}else {
			$this->data['haveValue'] = 0;
		}
		
		// Entry Group
		$this->load->model( 'stock/group' );
		
		$groups = $this->model_Stock_group->getGroups( );
		
		$this->data['groups'] = array();
		
		foreach ( $groups as $group ){
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if ( isset($this->request->post['group']) ) {
			$this->data['group_id'] = $this->request->post['group'];
		}elseif ( isset($Stock) && $Stock->getGroup() != null ) {
			$this->data['group_id'] = $Stock->getGroup()->getId();
		}else {
			$this->data['group_id'] = 0;
		}
		
		// Entry type
		$this->load->model( 'stock/type' );
		
		$types = $this->model_Stock_type->getTypes();
		
		$this->data['types'] = array();
		
		foreach ( $types as $type ){
			$this->data['types'][] = array(
				'id' => $type->getId(),
				'name' => $type->getName()
			);
		}
		
		if ( isset($this->request->post['type']) ) {
			$this->data['type_id'] = $this->request->post['type'];
		}elseif ( isset($Stock) && $Stock->getType() != null ) {
			$this->data['type_id'] = $Stock->getType()->getId();
		}else {
			$this->data['type_id'] = 0;
		}

		$this->template = 'stock/stock_form.tpl';
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