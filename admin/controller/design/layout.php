<?php 
class ControllerDesignLayout extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'design/layout' );
		$this->load->model( 'design/layout' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'design/layout' );
		$this->load->model( 'design/layout' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_design_layout->addlayout( $this->request->post );
			
			$this->session->design['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'design/layout') );
		}

		$this->data['action'] = $this->url->link( 'design/layout/insert' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'design/layout' );
		$this->load->model( 'design/layout' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_design_layout->editlayout( $this->request->get['layout_id'], $this->request->post );
			
			$this->session->design['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'design/layout') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'design/layout' );
		$this->load->model( 'design/layout' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_design_layout->deletelayout( $this->request->post );
			
			$this->session->design['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'design/layout') );
		}

		$this->getList( );
	}

	private function getList( ){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];

			unset( $this->session->design['error_warning'] );
		} elseif ( isset($this->session->design['error_warning']) ) {
			$this->data['error_warning'] = $this->session->design['error_warning'];
			
			unset( $this->session->design['error_warning'] );
		} else {
			$this->data['error_warning'] = '';
		}
		
		if ( isset($this->session->design['success']) ){
			$this->data['success'] = $this->session->design['success'];
		
			unset( $this->session->design['success'] );
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
			'href'      => $this->url->link( 'design/layout' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_action'] = $this->language->get( 'text_action' );
		$this->data['column_name'] = $this->language->get( 'column_name' );	
		$this->data['column_path'] = $this->language->get( 'column_path' );	
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
		$this->data['insert'] = $this->url->link( 'design/layout/insert' );
		$this->data['delete'] = $this->url->link( 'design/layout/delete' );

		$data = array(
			'limit' => $this->limit,
			'start' => $this->limit * ($page - 1)
		);

		$layouts = $this->model_design_layout->getlayouts( $data );
		
		$layout_total = $this->model_design_layout->getTotalLayouts();
		
		$this->data['layouts'] = array();
		if ( $layouts ){
			foreach ( $layouts as $layout ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'design/layout/update', 'layout_id=' . $layout->getId() ),
					'icon' => 'icon-edit',
				);
			
				$this->data['layouts'][] = array(
					'id' => $layout->getId(),
					'name' => $layout->getName(),
					'path' => $layout->getPath(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $layout_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('design/layout', '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'design/layout_list.tpl';
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
		
		if ( isset($this->session->design['success']) ){
			$this->data['success'] = $this->session->design['success'];
		
			unset( $this->session->design['success'] );
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
			'href'      => $this->url->link( 'design/layout' ),
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
		$this->data['entry_path'] = $this->language->get( 'entry_path' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'design/layout' );
		
		if ( isset($this->request->get['layout_id']) ){
			$layout = $this->model_design_layout->getlayout( $this->request->get['layout_id'] );
			
			if ( $layout ){
				$this->data['action'] = $this->url->link( 'design/layout/update', 'layout_id=' . $layout->getId() );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($layout) ){
			$this->data['name'] = $layout->getName();
		}else {
			$this->data['name'] = '';
		}

		$layouts = $this->model_design_layout->getAllLayouts();

		$ignore = array();
		foreach ( $layouts as $layout ) {
			$ignore[] = $layout->getPath();
		}

		// Entry path
		$this->data['paths'] = array();
		
		$files = glob(DIR_APPLICATION . 'controller/*/*.php');
		
		foreach ($files as $file) {
			$data = explode('/', dirname($file));
			
			$path = end($data) . '/' . basename($file, '.php');
			
			if (!in_array($path, $ignore)) {
				$this->data['paths'][] = $path;
			}
		}

		$this->template = 'design/layout_form.tpl';
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

	public function autocomplete() {
		$this->load->model( 'design/layout' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		$design = array(
			'filter_name' => $filter_name,
			'sort' => $sort,
			);

		$layout_design = $this->model_design_layout->getlayouts( $design );

		$json = array();
		foreach ($layout_design as $layout) {
			$json[] = array(
				'name' => $layout->getName(),
				'id' => $layout->getId(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>