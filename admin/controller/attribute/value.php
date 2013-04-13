<?php 
use Document\Attribute\Value;

class ControllerAttributeValue extends Controller {
	private $error = array( );
 
	public function index(){
		$this->load->language( 'attribute/value' );
		
		if ( !isset($this->request->get['attribute_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_attribute');
			
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		
		$this->load->model( 'attribute/value' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'attribute/value' );
		
		if ( !isset($this->request->get['attribute_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_attribute');
			
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'attribute/value' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_attribute_value->addValue( $this->request->post, $this->request->get['attribute_id'] ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			
				$this->redirect( $this->url->link( 'attribute/value', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'attribute/value', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->data['action'] = $this->url->link( 'attribute/value/insert', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'attribute/value' );
		
		if ( !isset($this->request->get['attribute_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_attribute');
			
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'attribute/value' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_attribute_value->editValue( $this->request->get['value_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_update');
			
				$this->redirect( $this->url->link( 'attribute/value', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'attribute/value', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'attribute/value' );
		
		if ( !isset($this->request->get['attribute_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_attribute');
			
			$this->redirect( $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'attribute/value' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_attribute_value->deleteValue( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'attribute/value', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->getList( );
	}

	private function getList( ){
		// Limit
		$limit = $this->config->get('config_admin_limit');
		
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
		
		$this->load->model( 'attribute/attribute' );
		$attribute = $this->model_attribute_attribute->getAttribute( $this->request->get['attribute_id'] );

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'attribute/value', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_value'] = $this->language->get( 'text_value' );	
		$this->data['text_action'] = $this->language->get( 'text_action' );
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'attribute/value/insert', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'attribute/value/delete', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['back'] = $this->url->link( 'attribute/attribute', 'token=' . $this->session->data['token'], 'SSL' );

		// value
		$values = $attribute->getValues();
		
		$value_total = 0;
		
		$this->data['values'] = array();
		if ( $values ){
			$value_total = count($values);
			for ( $i = (($page - 1) * $limit); $i < ($value_total - (($page - 1) * $limit)); $i++ ){
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'attribute/value/update', 'value_id=' . $values[$i]->getId() . '&attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['values'][] = array(
					'id' => $values[$i]->getId(),
					'name' => $values[$i]->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $value_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('sale/customer', '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'attribute/value_list.tpl';
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
			'href'      => $this->url->link( 'attribute/value', 'token=' . $this->session->data['token'], 'SSL' ),
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
		$this->data['entry_attributes'] = $this->language->get( 'entry_attributes' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'attribute/value', 'attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		
		// Load model
		$this->load->model( 'attribute/attribute' );
		
		$attribute = $this->model_attribute_attribute->getAttribute( $this->request->get['attribute_id'] );
		
		// Value
		$value = new Value();
		if ( isset($this->request->get['value_id']) ){
			if ( $attribute ){
				foreach ( $attribute->getValues() as $value ){
					if ( $value->getId() == $this->request->get['value_id'] ){
						break;
					}
				}
				
				$this->data['action'] = $this->url->link( 'attribute/value/update', 'value_id=' . $this->request->get['value_id'] . '&attribute_id=' . $this->request->get['attribute_id'] . '&token=' . $this->session->data['token'], 'SSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['value']['name']) ){
			$this->data['name'] = $this->request->post['value']['name'];
		}elseif ( isset($value) ){
			$this->data['name'] = $value->getName();
		}else {
			$this->data['name'] = '';
		}
		
		// Attribute reference
		$results = $this->model_attribute_attribute->getAttributes( array('group_id' => $attribute->getGroup()->getId()) );
		
		$this->data['attributes'] = array();
		
		foreach ( $results as $result ){
			if ( $result->getId() === $attribute->getId() ){
				continue;
			}
			
			$checked = '';
			
			if ( $value->getReferenceAttributeById($result->getId()) !== null ){
				$checked = 'checked="checked"';
			}
			
			$this->data['attributes'][] = array(
				'id' => $result->getId(),
				'name' => $result->getName(),
				'checked' => $checked
			);
		}

		$this->template = 'attribute/value_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['value']['name']) || strlen($this->request->post['value']['name']) < 3 || strlen($this->request->post['value']['name']) > 128 ){
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