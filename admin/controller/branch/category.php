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
			$this->model_branch_category->addCategory( $this->request->post );
			
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
		$this->data['column_branch'] = $this->language->get( 'column_branch' );
		$this->data['column_order'] = $this->language->get( 'column_order' );
		$this->data['column_category'] = $this->language->get( 'column_category' );
		$this->data['column_action'] = $this->language->get( 'column_action' );
		
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
			'start' => $this->limit * ($page - 1),
		);

		$categories = $this->model_branch_category->getCategories( $data );
		
		$oCategory_total = $this->model_branch_category->getTotalCategories();
		
		$this->data['categories'] = array();
		
		if ( $categories ){
			foreach ( $categories as $oCategory ){
				$action = array();

				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'branch/category/update', 'category_id=' . $oCategory->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
				
				$this->data['categories'][] = array(
					'id' => $oCategory->getId(),
					'name' => $oCategory->getName(),
					'parent' => $oCategory->getParent() != null ? $oCategory->getParent()->getName() : 'Root',
					'branch' => $oCategory->getBranch()->getName(),
					'order' => $oCategory->getOrder(),
					'action' => $action
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $oCategory_total;
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
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		// Text	
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		
		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
		// Entry
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_branch'] = $this->language->get('entry_branch');
		$this->data['entry_order'] = $this->language->get('entry_order');
		$this->data['entry_parent'] = $this->language->get('entry_parent');
		$this->data['entry_is_stock'] = $this->language->get('entry_is_stock');
		
		// Link
		$this->data['cancel'] = $this->url->link( 'branch/category', 'token=' . $this->session->data['token'], 'SSL' );
		
		if ( isset($this->request->get['category_id']) ){
			$oCategory = $this->model_branch_category->getcategory( $this->request->get['category_id'] );
			
			if ( $oCategory ){
				$this->data['category'] = $this->url->link( 'branch/category/update', 'category_id=' . $oCategory->getId() . '&token=' . $this->session->data['token'], 'SSL' );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oCategory) ){
			$this->data['name'] = $oCategory->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry branch
		if ( isset($this->request->post['branch_id']) ){
			$this->data['branch_id'] = $this->request->post['branch_id'];
		}elseif ( isset($oCategory) && $oCategory->getBranch() ){
			$this->data['branch_id'] = $oCategory->getBranch()->getId();
		}else {
			$this->data['branch_id'] = 0;
		}

		$this->load->model('branch/branch');
		$branches = $this->model_branch_branch->getAllBranches();

		$this->data['branches'] = array();
		foreach ( $branches as $branch ) {
			$this->data['branches'][] = array(
				'id' => $branch->getId(),
				'name' => $branch->getName()
			);
		}

		// Entry order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($oCategory) ){
			$this->data['order'] = $oCategory->getOrder();
		}else {
			$this->data['order'] = 0;
		}

		// Entry parent
		if ( isset($this->request->post['parent_id']) ){
			$this->data['parent_id'] = $this->request->post['parent_id'];
		}elseif ( isset($oCategory) && $oCategory->getParent() ){
			$this->data['parent_id'] = $oCategory->getParent()->getId();
		}else {
			$this->data['parent_id'] = 0;
		}

		$this->data['parents'] = array();
		if ( $this->data['branch_id'] != 0 ){
			$idBranch = $this->data['branch_id'];
		}elseif ( count($this->data['branches']) > 0 ){
			$idBranch = $this->data['branches'][0]['id'];
		}else{
			$idBranch = 0;
		}

		// Entry is Stock
		if ( !empty($this->request->post['isBranch']) ){
			$this->data['isBranch'] = $this->request->post['isBranch'];
		}elseif ( $oCategory ){
			$this->data['isBranch'] = $oCategory->getIsBranch();
		}else {
			$this->data['isBranch'] = false;
		}
		
		/*if ( $idBranch != 0 ){
			$oCategory_id = isset($oCategory) ? $oCategory->getId() : 0;
			$this->load->model('branch/category');
			$parents = $this->model_branch_category->getAllCategories( array('branch_id' => $this->data['branch_id']) );
			foreach ( $parents as $parent ) {
				if ( $parent->getId() == $oCategory_id ){
					continue;
				}
				$this->data['parents'][] = array(
					'id' => $parent->getId(),
					'name' => $parent->getName()
				);
			}
		}*/

		$this->data['get_categories_link'] = html_entity_decode( $this->url->link('branch/category/getCategories', 'token=' . $this->session->data['token'], 'SSL') );

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

	public function getCategories(){
		$json = array();
		$json[] = array(
			'id' => 0,
			'name' => 'Root'
		);
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && isset($this->request->post['branch_id']) ){
			$this->load->model('branch/category');
			$categories = $this->model_branch_category->getAllCategories( array('branch_id' => $this->request->post['branch_id']) );

			if ($categories){
				foreach ( $categories as $oCategory ) {
					$json[] = array(
						'id' => $oCategory->getId(),
						'name' => $oCategory->getName()
					);
				}
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>