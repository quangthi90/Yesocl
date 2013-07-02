<?php 
class ControllerBranchCategory extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'branch/category';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/category' );
		$this->load->model( 'branch/category' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/category' );
		$this->load->model( 'branch/category' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_branch_category->addcategory( $this->request->post );
			
			$this->session->branch['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->data['category'] = $this->url->link( 'branch/category/insert', 'token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'branch/category' );
		$this->load->model( 'branch/category' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_branch_category->editcategory( $this->request->get['category_id'], $this->request->post );
			
			$this->session->branch['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' ) );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'branch/category' );
		$this->load->model( 'branch/category' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_branch_category->deletecategory( $this->request->post );
			
			$this->session->branch['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->getList( );
	}

	private function getList( ){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];

			unset( $this->session->branch['error_warning'] );
		} elseif ( isset($this->session->branch['error_warning']) ) {
			$this->data['error_warning'] = $this->session->branch['error_warning'];
			
			unset( $this->session->branch['error_warning'] );
		} else {
			$this->data['error_warning'] = '';
		}
		
		if ( isset($this->session->branch['success']) ){
			$this->data['success'] = $this->session->branch['success'];
		
			unset( $this->session->branch['success'] );
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
			'href'      => $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_category'] = $this->language->get( 'text_category' );
		$this->data['column_name'] = $this->language->get( 'column_name' );	
		$this->data['column_parent'] = $this->language->get( 'column_parent' );
		$this->data['column_order'] = $this->language->get( 'column_order' );
		$this->data['column_category'] = $this->language->get( 'column_category' );
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
		$this->data['insert'] = $this->url->link( 'branch/category/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'branch/category/delete', 'token=' . $this->session->data['token'], 'SSL' );

		$data = array(
			'limit' => $this->limit,
			'start' => $this->limit * ($page - 1)
		);

		$categorys = $this->model_branch_category->getcategorys( $data );
		
		$category_total = $this->model_branch_category->getTotalcategorys();
		
		$this->data['categorys'] = array();
		
		if ( $categorys ){
			foreach ( $categorys as $category ){
				$data = array();
				
				if ( $category->getCode() == $this->config->get('category_view') ){
					continue;
				}

				$data[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'branch/category/update', 'category_id=' . $category->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['categorys'][] = array(
					'id' => $category->getId(),
					'name' => $category->getName(),
					'code' => $category->getCode(),
					'order' => $category->getOrder(),
					'category' => $data,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('branch/category', '&page={page}', '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'branch/category_list.tpl';
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
		
		if ( isset($this->session->branch['success']) ){
			$this->data['success'] = $this->session->branch['success'];
		
			unset( $this->session->branch['success'] );
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
			'href'      => $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' ),
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
		$this->data['entry_branch'] = $this->language->get( 'entry_branch' );
		$this->data['entry_order'] = $this->language->get( 'entry_order' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' );
		
		if ( isset($this->request->get['category_id']) ){
			$category = $this->model_branch_category->getcategory( $this->request->get['category_id'] );
			
			if ( $category ){
				$this->data['category'] = $this->url->link( 'branch/category/update', 'category_id=' . $category->getId() . '&token=' . $this->session->data['token'], 'SSL' );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($category) ){
			$this->data['name'] = $category->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry branch
		if ( isset($this->request->post['branch_id']) ){
			$this->data['branch_id'] = $this->request->post['branch_id'];
		}elseif ( isset($category) && $category->getBranch() ){
			$this->data['branch_id'] = $category->getBranch()->getId();
		}else {
			$this->data['branch_id'] = 0;
		}

		$this->load->model('branch/branch');
		$branchs = $this->model_branch_branch->getAllBranchs();

		$this->data['branchs'] = array();
		foreach ( $branchs as $branch ) {
			$this->data['branchs'][] = array(
				'id' => $branch->getId(),
				'name' => $branch->getName()
			);
		}

		// Entry order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($category) ){
			$this->data['order'] = $category->getOrder();
		}else {
			$this->data['order'] = 0;
		}

		$this->template = 'branch/category_form.tpl';

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

		if ( !isset($this->request->post['code']) || strlen($this->request->post['code']) < 3 || strlen($this->request->post['code']) > 20 ){
			$this->error['error_code'] = $this->language->get( 'error_code' );
		}

		$categorys = $this->model_branch_category->getcategoryByCode( strtolower(trim($this->request->post['code'])) );
		// print("<pre>"); var_dump($categorys); exit;
		if ( count($categorys) > 1 || (count($categorys) == 1 && (!isset($this->request->get['category_id']) || !array_key_exists($this->request->get['category_id'], $categorys->toArray()))) ){
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