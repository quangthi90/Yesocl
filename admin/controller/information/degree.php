<?php 
class ControllerInformationDegree extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'information/degree' );
		$this->load->model( 'information/degree' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'information/degree' );
		$this->load->model( 'information/degree' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_information_degree->addDegree( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'information/degree') );
		}

		$this->data['action'] = $this->url->link( 'information/degree/insert' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'information/degree' );
		$this->load->model( 'information/degree' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_information_degree->editDegree( $this->request->get['degree_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'information/degree') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'information/degree' );
		$this->load->model( 'information/degree' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_information_degree->deleteDegree( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'information/degree') );
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
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'information/degree' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		//$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['column_name'] = $this->language->get( 'column_name' );	
		$this->data['column_action'] = $this->language->get( 'column_action' );
		//$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		//$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'information/degree/insert' );
		$this->data['delete'] = $this->url->link( 'information/degree/delete' );

		// Group
		$degrees = $this->model_information_degree->getDegrees( );
		
		$degree_total = $this->model_information_degree->getTotalDegrees();
		
		$this->data['degrees'] = array();
		if ( $degrees ){
			foreach ( $degrees as $degree ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'information/degree/update', 'degree_id=' . $degree->getId() ),
					'icon' => 'icon-edit',
				);
			
				$this->data['degrees'][] = array(
					'id' => $degree->getId(),
					'name' => $degree->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $degree_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('information/degree', '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'information/degree_list.tpl';
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
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'information/degree' ),
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
		
		// Link
		$this->data['cancel'] = $this->url->link( 'information/degree' );
		
		// Group
		if ( isset($this->request->get['degree_id']) ){
			$degree = $this->model_information_degree->getDegree( $this->request->get['degree_id'] );
			
			if ( $degree ){
				$this->data['action'] = $this->url->link( 'information/degree/update', 'degree_id=' . $degree->getId() );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($degree) ){
			$this->data['name'] = $degree->getName();
		}else {
			$this->data['name'] = '';
		}

		$this->template = 'information/degree_form.tpl';
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