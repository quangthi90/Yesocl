<?php 
class ControllerAttributeAttribute extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'attribute/attribute';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'attribute/attribute' );
		$this->load->model( 'attribute/attribute' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'attribute/attribute' );
		$this->load->model( 'attribute/attribute' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_attribute_attribute->addattribute( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
		}

		$this->data['action'] = $this->url->link( 'attribute/attribute/insert', 'token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_update')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'attribute/attribute' );
		$this->load->model( 'attribute/attribute' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_attribute_attribute->editattribute( $this->request->get['attribute_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'attribute/attribute' );
		$this->load->model( 'attribute/attribute' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_attribute_attribute->deleteattribute( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
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
			'href'      => $this->url->link( 'attribute/attribute', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_group'] = $this->language->get( 'text_group' );
		$this->data['text_type'] = $this->language->get( 'text_type' );
		$this->data['text_attribute'] = $this->language->get( 'text_attribute' );	
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
		$this->data['insert'] = $this->url->link( 'attribute/attribute/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'attribute/attribute/delete', 'token=' . $this->session->data['token'], 'SSL' );

		// attribute
		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$attributes = $this->model_attribute_attribute->getAttributes( $data );
		
		$attribute_total = $this->model_attribute_attribute->getTotalAttributes();
		
		$this->data['attributes'] = array();
		if ( $attributes ){
			foreach ( $attributes as $attribute ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'attribute/attribute/update', 'attribute_id=' . $attribute->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
				
				if ( $attribute->getHaveValue() == true ){
					$action[] = array(
						'text' => $this->language->get( 'text_values' ),
						'href' => $this->url->link( 'attribute/value', 'attribute_id=' . $attribute->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
						'icon' => 'icon-list',
					);
				}
			
				$this->data['attributes'][] = array(
					'id' => $attribute->getId(),
					'name' => $attribute->getName(),
					'group' => $attribute->getGroup()->getName(),
					'type' => $attribute->getType()->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $attribute_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('attribute/attribute', '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'attribute/attribute_list.tpl';
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
			'href'      => $this->url->link( 'attribute/attribute', 'token=' . $this->session->data['token'], 'SSL' ),
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
		$this->data['cancel'] = $this->url->link( 'attribute/attribute', 'token=' . $this->session->data['token'], 'SSL' );
		
		// attribute
		if ( isset($this->request->get['attribute_id']) ){
			$attribute = $this->model_attribute_attribute->getAttribute( $this->request->get['attribute_id'] );
			
			if ( $attribute ){
				$this->data['action'] = $this->url->link( 'attribute/attribute/update', 'attribute_id=' . $attribute->getId() . '&token=' . $this->session->data['token'], 'SSL' );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($attribute) ){
			$this->data['name'] = $attribute->getName();
		}else {
			$this->data['name'] = '';
		}
		
		// Entry required
		if ( isset($this->request->post['required']) ) {
			$this->data['required'] = $this->request->post['required'];
		}elseif ( isset($attribute) ) {
			$this->data['required'] = $attribute->getRequired();
		}else {
			$this->data['required'] = 0;
		}
		
		// Entry haveValue
		if ( isset($this->request->post['haveValue']) ) {
			$this->data['haveValue'] = $this->request->post['haveValue'];
		}elseif ( isset($attribute) ) {
			$this->data['haveValue'] = $attribute->gethaveValue();
		}else {
			$this->data['haveValue'] = 0;
		}
		
		// Entry Group
		$this->load->model( 'attribute/group' );
		
		$groups = $this->model_attribute_group->getGroups( );
		
		$this->data['groups'] = array();
		
		foreach ( $groups as $group ){
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName()
			);
		}
		
		if ( isset($this->request->post['group']) ) {
			$this->data['group_id'] = $this->request->post['group'];
		}elseif ( isset($attribute) && $attribute->getGroup() != null ) {
			$this->data['group_id'] = $attribute->getGroup()->getId();
		}else {
			$this->data['group_id'] = 0;
		}
		
		// Entry type
		$this->load->model( 'attribute/type' );
		
		$types = $this->model_attribute_type->getTypes();
		
		$this->data['types'] = array();
		
		foreach ( $types as $type ){
			$this->data['types'][] = array(
				'id' => $type->getId(),
				'name' => $type->getName()
			);
		}
		
		if ( isset($this->request->post['type']) ) {
			$this->data['type_id'] = $this->request->post['type'];
		}elseif ( isset($attribute) && $attribute->getType() != null ) {
			$this->data['type_id'] = $attribute->getType()->getId();
		}else {
			$this->data['type_id'] = 0;
		}

		$this->template = 'attribute/attribute_form.tpl';
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