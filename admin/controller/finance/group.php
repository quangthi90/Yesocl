<?php 
class ControllerFinanceGroup extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'finance/group';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/group' );
		$this->load->model( 'finance/group' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/group' );
		$this->load->model( 'finance/group' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiGroupForm() ){
			$this->model_finance_group->addGroup( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/group', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'finance/group/insert', 'token=' . $this->session->data['token'], 'sSL' );
		
		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'finance/group' );
		$this->load->model( 'finance/group' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiGroupForm(true) ){
			$this->model_finance_group->editGroup( $this->request->get['group_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/group', 'token=' . $this->session->data['token'], 'sSL') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'finance/group' );
		$this->load->model( 'finance/group' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValiGroupDelete() ){
			$this->model_finance_group->deleteGroups( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/group', 'token=' . $this->session->data['token'], 'sSL') );
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
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/group', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');

		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_order'] = $this->language->get('column_order');
		$this->data['column_status'] = $this->language->get('column_status');	
		$this->data['column_action'] = $this->language->get('column_action');
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');
		
		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		
		// Link
		$this->data['insert'] = $this->url->link( 'finance/group/insert', 'token=' . $this->session->data['token'], 'sSL' );
		$this->data['delete'] = $this->url->link( 'finance/group/delete', 'token=' . $this->session->data['token'], 'sSL' );

		// finance
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$lGroups = $this->model_finance_group->getGroups( $aData );
		
		$iGroupTotal = $lGroups->count();
		
		$this->data['groups'] = array();
		if ( $lGroups ){
			foreach ( $lGroups as $oGroup ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'finance/group/update', 'group_id=' . $oGroup->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['groups'][] = array(
					'id' => $oGroup->getId(),
					'name' => $oGroup->getName(),
					'order' => $oGroup->getOrder(),
					'status' => $oGroup->getStatus() ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $iGroupTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('finance/group', '&page={page}' . '&token=' . $this->session->data['token'], 'sSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'finance/group_list.tpl';
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

		if ( isset($this->error['error_order']) ) {
			$this->data['error_order'] = $this->error['error_order'];
		} else {
			$this->data['error_order'] = '';
		}

		$idGroup = $this->request->get['group_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/group', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		// Text	
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');
		
		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
		// Entry
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_order'] = $this->language->get('entry_order');
		$this->data['entry_status'] = $this->language->get('entry_status');
		
		// Link
		$this->data['cancel'] = $this->url->link( 'finance/group', 'token=' . $this->session->data['token'], 'sSL' );
		
		// finance
		if ( isset($this->request->get['group_id']) ){
			$oGroup = $this->model_finance_group->getGroup( $idGroup );
			if ( $oGroup ){
				$this->data['action'] = $this->url->link( 'finance/group/update', 'group_id=' . $idGroup . '&token=' . $this->session->data['token'], 'sSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oGroup) ){
			$this->data['name'] = $oGroup->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($oGroup) ){
			$this->data['order'] = $oGroup->getOrder();
		}else {
			$this->data['order'] = 0;
		}

		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($oGroup) ){
			$this->data['status'] = $oGroup->getStatus();
		}else {
			$this->data['status'] = true;
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'finance/group_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValiGroupForm( $bIsEdit = false ){
		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 3 || strlen($this->request->post['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}

		if ( !isset($this->request->post['order']) || strlen($this->request->post['order']) < 1 || strlen($this->request->post['order']) > 128 ){
			$this->error['error_order'] = $this->language->get( 'error_order' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}

	private function isValiGroupDelete(){
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