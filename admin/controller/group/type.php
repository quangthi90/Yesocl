<?php 
class ControllerGroupType extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'group/type';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'group/type' );
		$this->load->model( 'group/type' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'group/type' );
		$this->load->model( 'group/type' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_group_type->addType( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('group/type', 'token=' . $this->session->data['token'], 'SSL') );
		}

		$this->data['action'] = $this->url->link( 'group/type/insert', 'token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'group/type' );
		$this->load->model( 'group/type' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_group_type->editType( $this->request->get['type_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('group/type', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'group/type' );
		$this->load->model( 'group/type' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_type->deleteType( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('group/type', 'token=' . $this->session->data['token'], 'SSL') );
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
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/type', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_type'] = $this->language->get( 'text_type' );	
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
		$this->data['insert'] = $this->url->link( 'group/type/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'group/type/delete', 'token=' . $this->session->data['token'], 'SSL' );

		// type
		$types = $this->model_group_type->getTypes( );
		
		$type_total = $this->model_group_type->getTotalTypes();
		
		$this->data['types'] = array();
		if ( $types ){
			foreach ( $types as $type ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/type/update', 'type_id=' . $type->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['types'][] = array(
					'id' => $type->getId(),
					'name' => $type->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $type_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('group/type', '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'group/type_list.tpl';
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
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/type', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		
		// Entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'group/type', 'token=' . $this->session->data['token'], 'SSL' );
		
		// type
		if ( isset($this->request->get['type_id']) ){
			$type = $this->model_group_type->getType( $this->request->get['type_id'] );
			
			if ( $type ){
				$this->data['action'] = $this->url->link( 'group/type/update', 'type_id=' . $type->getId() . '&token=' . $this->session->data['token'], 'SSL' );	
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

		$this->template = 'group/type_form.tpl';
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