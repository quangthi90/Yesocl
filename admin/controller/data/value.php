<?php 
class ControllerDataValue extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'data/value' );
		$this->load->model( 'data/value' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'data/value' );
		$this->load->model( 'data/value' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_data_value->addValue( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'data/value') );
		}

		$this->data['action'] = $this->url->link( 'data/value/insert' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'data/value' );
		$this->load->model( 'data/value' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_data_value->editValue( $this->request->get['value_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'data/value') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'data/value' );
		$this->load->model( 'data/value' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_data_value->deleteValue( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'data/value') );
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

		if (isset($this->request->get['filter_type_name'])) {
			$filter_type_name = $this->request->get['filter_type_name'];
		} else {
			$filter_type_name = null;
		}

		if (isset($this->request->get['filter_type'])) {
			$filter_type = $this->request->get['filter_type'];
		} else {
			$filter_type = null;
		}

		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_value'])) {
			$filter_value = $this->request->get['filter_value'];
		} else {
			$filter_value = null;
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

		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . $this->request->get['filter_type'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_value'])) {
			$url .= '&filter_value=' . $this->request->get['filter_value'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		//if (isset($this->request->get['page'])) {
		//	$url .= '&page=' . $this->request->get['page'];
		//}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'data/value' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		//$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['column_type'] = $this->language->get( 'column_type' );
		$this->data['column_name'] = $this->language->get( 'column_name' );
		$this->data['column_value'] = $this->language->get( 'column_value' );	
		$this->data['column_action'] = $this->language->get( 'column_action' );
		//$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		//$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_filter'] = $this->language->get( 'button_filter' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'data/value/insert' );
		$this->data['delete'] = $this->url->link( 'data/value/delete', 'page=' . $page . $url );

		$data = array(
			'filter_type' => $filter_type,
			'filter_name' => $filter_name,
			'filter_value' => $filter_value,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// Value
		$values = $this->model_data_value->getValues( $data );
		
		$value_total = $this->model_data_value->getTotalValues( $data );
		
		$this->data['values'] = array();
		if ( $values ){
			foreach ( $values as $value ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'data/value/update', 'value_id=' . $value->getId() ),
					'icon' => 'icon-edit',
				);
			
				$this->data['values'][] = array(
					'id' => $value->getId(),
					'name' => $value->getName(),
					'type' => $value->getType()->getName(),
					'value' => $value->getValue(),
					'action' => $action,
				);
			}
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . $this->request->get['filter_type'];
		}

		if (isset($this->request->get['filter_value'])) {
			$url .= '&filter_value=' . $this->request->get['filter_value'];
		}

		if ($order == 'asc') {
			$url .= '&order=desc';
		} else {
			$url .= '&order=asc';
		}
					
		$this->data['sort_name'] = $this->url->link('data/value', 'page=' . $page . '&sort=name' . $url );
		$this->data['sort_value'] = $this->url->link('data/value', 'page=' . $page . '&sort=value' . $url );
		
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . $this->request->get['filter_type'];
		}

		if (isset($this->request->get['filter_value'])) {
			$url .= '&filter_value=' . $this->request->get['filter_value'];
		}

		$url .= '&sort=' . $sort;
											
		$url .= '&order=' . $order;

		$pagination = new Pagination();
		$pagination->total = $value_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('data/value', '&page={page}' . $url, 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->data['filter_type_name'] = $filter_type_name;
		$this->data['filter_name'] = $filter_name;
		$this->data['filter_type'] = $filter_type;
		$this->data['filter_value'] = $filter_value;
		
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'data/value_list.tpl';
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
		
		if ( isset($this->error['error_value']) ) {
			$this->data['error_value'] = $this->error['error_value'];
		} else {
			$this->data['error_value'] = '';
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'data/value' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		//$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		//$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		
		// Entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_type'] = $this->language->get( 'entry_type' );
		$this->data['entry_value'] = $this->language->get( 'entry_value' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'data/value' );
		
		// Group
		if ( isset($this->request->get['value_id']) ){
			$value = $this->model_data_value->getValue( $this->request->get['value_id'] );
			
			if ( $value ){
				$this->data['action'] = $this->url->link( 'data/value/update', 'value_id=' . $value->getId() );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($value) ){
			$this->data['name'] = $value->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry type
		if ( isset($this->request->post['type']) ){
			$this->data['type'] = $this->request->post['type'];
		}elseif ( isset($value) ){
			$this->data['type'] = $value->getType()->getId();
		}else {
			$this->data['type'] = '';
		}

		$this->load->model('data/type');

		$types = $this->model_data_type->getTypes();
		
		$this->data['types'] = array();
		foreach ($types as $type) {
			$this->data['types'][] = array(
				'id' => $type->getId(),
				'name' => $type->getName(),
				);
		}

		// Entry value
		if ( isset($this->request->post['value']) ){
			$this->data['value'] = $this->request->post['value'];
		}elseif ( isset($value) ){
			$this->data['value'] = $value->getValue();
		}else {
			$this->data['value'] = '';
		}

		$this->template = 'data/value_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['value']) || strlen($this->request->post['value']) < 1 || strlen($this->request->post['value']) > 255 ){
			$this->error['error_value'] = $this->language->get( 'error_value' );
		}

		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 1 || strlen($this->request->post['name']) > 255 ){
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

	public function autocomplete() {
		$this->load->model( 'data/value' );


		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		if ( isset( $this->request->get['filter_type'] ) ) {
			$filter_type = $this->request->get['filter_type'];
			$sort = 'this.type.name';
		}else {
			$filter_type = null;
		}

		if ( isset( $this->request->get['filter_value'] ) ) {
			$filter_value = $this->request->get['filter_value'];
			$sort = 'value';
		}else {
			$filter_value = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			'filter_type' => $filter_type,
			'filter_value' => $filter_value,
			'sort' => $sort,
			);

		$value_data = $this->model_data_value->getValues( $data );

		$json = array();
		foreach ($value_data as $value) {
			$json[] = array(
				'name' => $value->getName(),
				'type' => $value->getType()->getName(),
				'value' => $value->getValue(),
				'id' => $value->getId(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>