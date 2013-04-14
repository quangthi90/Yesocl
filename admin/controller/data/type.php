<?php 
class ControllerDataType extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'data/type';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'data/type' );
		$this->load->model( 'data/type' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'data/type' );
		$this->load->model( 'data/type' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_data_type->addType( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('data/type', 'token=' . $this->session->data['token'], 'SSL') );
		}

		$this->data['action'] = $this->url->link( 'data/type/insert', 'token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'data/type' );
		$this->load->model( 'data/type' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_data_type->editType( $this->request->get['type_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('data/type', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'data/type' );
		$this->load->model( 'data/type' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_data_type->deleteType( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('data/type', 'token=' . $this->session->data['token'], 'SSL') );
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
		
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_code'])) {
			$filter_code = $this->request->get['filter_code'];
		} else {
			$filter_code = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'asc';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_code'])) {
			$url .= '&filter_code=' . $this->request->get['filter_code'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'data/type', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_has_values'] = $this->language->get( 'text_has_values' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_name'] = $this->language->get( 'column_name' );	
		$this->data['column_code'] = $this->language->get( 'column_code' );	
		$this->data['column_action'] = $this->language->get( 'column_action' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_filter'] = $this->language->get( 'button_filter' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'data/type/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'data/type/delete', 'token=' . $this->session->data['token'], 'SSL' );

		$data = array(
			'filter_name' => $filter_name,
			'filter_code' => $filter_code,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// Group
		$types = $this->model_data_type->getTypes( $data );
		
		$type_total = $this->model_data_type->getTotalTypes( $data );
		
		$this->data['types'] = array();
		if ( $types ){
			foreach ( $types as $type ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'data/type/update', 'type_id=' . $type->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['types'][] = array(
					'id' => $type->getId(),
					'name' => $type->getName(),
					'code' => $type->getCode(),
					'status' => $type->getStatus(),
					'hasvalues' => ( count( $type->getValues() ) ) ? 1 : 0,
					'action' => $action,
				);
			}
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_code'])) {
			$url .= '&filter_code=' . $this->request->get['filter_code'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if ($order == 'asc') {
			$url .= '&order=desc';
		} else {
			$url .= '&order=asc';
		}
					
		$this->data['sort_name'] = $this->url->link('data/type', 'page=' . $page . '&sort=name' . $url . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['sort_code'] = $this->url->link('data/type', 'page=' . $page . '&sort=code' . $url . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['sort_status'] = $this->url->link('data/type', 'page=' . $page . '&sort=status' . $url . '&token=' . $this->session->data['token'], 'SSL' );
		
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_code'])) {
			$url .= '&filter_code=' . $this->request->get['filter_code'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		$url .= '&sort=' . $sort;
											
		$url .= '&order=' . $order;
		
		$pagination = new Pagination();
		$pagination->total = $type_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('data/type', '&page={page}' . $url . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->data['filter_name'] = $filter_name;
		$this->data['filter_code'] = $filter_name;
		$this->data['filter_status'] = $filter_status;
		
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'data/type_list.tpl';
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'data/type', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );
		$this->data['text_valid_code'] = $this->language->get( 'text_valid_code' );

		// Error
		$this->data['error_exist_code'] = $this->language->get( 'error_exist_code' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		
		// Entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_code'] = $this->language->get( 'entry_code' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'data/type', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['codeValidate'] = $this->url->link( 'data/type/codeValidate', 'token=' . $this->session->data['token'], 'SSL' );
		
		// Group
		if ( isset($this->request->get['type_id']) ){
			$type = $this->model_data_type->getType( $this->request->get['type_id'] );
			
			if ( $type ){
				$this->data['action'] = $this->url->link( 'data/type/update', 'type_id=' . $type->getId() . '&token=' . $this->session->data['token'], 'SSL' );	
				$this->data['codeValidate'] = $this->url->link( 'data/type/codeValidate&type_id=' . $type->getId() . '&token=' . $this->session->data['token'], 'SSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($type) ){
			$this->data['name'] = $type->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry code
		if ( isset($this->request->post['code']) ){
			$this->data['code'] = $this->request->post['code'];
		}elseif ( isset($type) ){
			$this->data['code'] = $type->getCode();
		}else {
			$this->data['code'] = '';
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($type) ){
			$this->data['status'] = $type->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		$this->template = 'data/type_form.tpl';
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

		if ( !isset($this->request->post['code']) || strlen($this->request->post['code']) < 3 || strlen($this->request->post['code']) > 128 ){
			$this->error['error_code'] = $this->language->get( 'error_code' );
		}

		if ( $this->model_data_type->isExistCode( $this->request->post['code'] ) ){
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

	public function autocomplete() {
		$this->load->model( 'data/type' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		if ( isset( $this->request->get['filter_code'] ) ) {
			$filter_code = $this->request->get['filter_code'];
			$sort = 'code';
		}else {
			$filter_code = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			'filter_code' => $filter_code,
			'sort' => $sort,
			);

		$type_data = $this->model_data_type->getTypes( $data );

		$json = array();
		foreach ($type_data as $type) {
			$json[] = array(
				'name' => $type->getName(),
				'code' => $type->getCode(),
				'id' => $type->getId(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function codeValidate(){
		if ( !isset($this->request->get['code']) || empty($this->request->get['code']) ){
			$this->response->setOutput('false');
			return;
		}
		
		if ( isset($this->request->get['type_id']) ){
			$type_id = $this->request->get['type_id'];
		}

		$this->load->model( 'data/type' );

		if ( isset( $type_id ) ) {
			$type = $this->model_data_type->getTypeByCode( $this->request->get['code'] );
			if ( !empty( $type ) && $type->getId() != $type_id ) {
				$this->response->setOutput('false');
				return;
			}
		}else {
			if ( $this->model_data_type->isExistCode( $this->request->get['code'] ) ) {
				$this->response->setOutput('false');
				return;
			}
		}
		
		$this->response->setOutput('true');
		return;
	}
}
?>