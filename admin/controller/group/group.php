<?php 
class ControllerGroupGroup extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'group/group' );
		$this->load->model( 'group/group' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'group/group' );
		$this->load->model( 'group/group' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_group->addGroup( $this->request->post ) === false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
				$this->redirect( $this->url->link('group/group') );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->data['action'] = $this->url->link( 'group/group/insert' );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'group/group' );
		$this->load->model( 'group/group' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_group_group->editgroup( $this->request->get['group_id'], $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'group/group' );
		$this->load->model( 'group/group' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_group->deletegroup( $this->request->post );
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/group') );
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
			'href'      => $this->url->link( 'group/group' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_group'] = $this->language->get( 'text_group' );
		$this->data['text_author'] = $this->language->get( 'text_author' );	
		$this->data['text_email'] = $this->language->get( 'text_email' );
		$this->data['text_created'] = $this->language->get( 'text_created' );
		$this->data['text_type'] = $this->language->get( 'text_type' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
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
		$this->data['insert'] = $this->url->link( 'group/group/insert' );
		$this->data['delete'] = $this->url->link( 'group/group/delete' );

		// Group
		$groups = $this->model_group_group->getGroups();
		
		$group_total = $this->model_group_group->getTotalGroups();
		
		$this->data['groups'] = array();
		if ( $groups ){
			foreach ( $groups as $group ){
				$action = array();
			
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/group/update', 'group_id=' . $group->getId() ),
					'icon' => 'icon-edit',
				);
				
				$action[] = array(
					'text' => $this->language->get( 'text_posts' ),
					'href' => $this->url->link( 'group/post', 'group_id=' . $group->getId() ),
					'icon' => 'icon-list',
				);
			
				$this->data['groups'][] = array(
					'id' => $group->getId(),
					'name' => $group->getName(),
					'author' => $group->getAuthor()->getFullname(),
					'email' => $group->getAuthor()->getPrimaryEmail()->getEmail(),
					'created' => $group->getCreated()->format('m/d/Y'),
					'type' => $group->getType()->getName(),
					'status' => $group->getStatus() === true ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $group_total;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('group/group', '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'group/group_list.tpl';
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
		
		if ( isset($this->error['error_author']) ) {
			$this->data['error_author'] = $this->error['error_author'];
		} else {
			$this->data['error_author'] = '';
		}
		
		if ( isset($this->error['error_name']) ) {
			$this->data['error_name'] = $this->error['error_name'];
		} else {
			$this->data['error_name'] = '';
		}
		
		if ( isset($this->error['error_sumary']) ) {
			$this->data['error_sumary'] = $this->error['error_sumary'];
		} else {
			$this->data['error_sumary'] = '';
		}
		
		if ( isset($this->error['error_description']) ) {
			$this->data['error_description'] = $this->error['error_description'];
		} else {
			$this->data['error_description'] = '';
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/group' ),
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
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_fullname'] = $this->language->get( 'entry_fullname' );
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_sumary'] = $this->language->get( 'entry_sumary' );
		$this->data['entry_description'] = $this->language->get( 'entry_description' );
		$this->data['entry_website'] = $this->language->get( 'entry_website' );
		$this->data['entry_type'] = $this->language->get( 'entry_type' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'group/group' );
		
		// Group
		if ( isset($this->request->get['group_id']) ){
			$group = $this->model_group_group->getGroup( $this->request->get['group_id'] );
			
			if ( $group ){
				$this->data['action'] = $this->url->link( 'group/group/update', 'group_id=' . $group->getId() );	
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}
		
		// Entry author
		if ( isset($this->request->post['author']) ){
			$this->data['author'] = $this->request->post['author'];
		}elseif ( isset($group) ){
			$this->data['author'] = $group->getAuthor()->getPrimaryEmail()->getEmail();
		}else {
			$this->data['author'] = '';
		}

		if ( isset($this->request->post['user_id']) ){
			$this->data['user_id'] = $this->request->post['user_id'];
		}elseif ( isset($group) ){
			$this->data['user_id'] = $group->getAuthor()->getId();
		}else {
			$this->data['user_id'] = '';
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($group) ){
			$this->data['name'] = $group->getName();
		}else {
			$this->data['name'] = '';
		}
		
		// Entry sumary
		if ( isset($this->request->post['sumary']) ){
			$this->data['sumary'] = $this->request->post['sumary'];
		}elseif ( isset($group) ){
			$this->data['sumary'] = $group->getsumary();
		}else {
			$this->data['sumary'] = '';
		}
		
		// Entry description
		if ( isset($this->request->post['description']) ){
			$this->data['description'] = $this->request->post['description'];
		}elseif ( isset($group) ){
			$this->data['description'] = $group->getdescription();
		}else {
			$this->data['description'] = '';
		}
		
		// Entry website
		if ( isset($this->request->post['website']) ){
			$this->data['website'] = $this->request->post['website'];
		}elseif ( isset($group) ){
			$this->data['website'] = $group->getwebsite();
		}else {
			$this->data['website'] = '';
		}
		
		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($group) ){
			$this->data['status'] = $group->getstatus();
		}else {
			$this->data['status'] = 1;
		}
		
		// Entry type
		$this->load->model( 'group/type' );
		
		$types = $this->model_group_type->getTypes();
		
		$this->data['types'] = array();
		
		foreach ( $types as $type ){
			$this->data['types'][] = array(
				'id' => $type->getId(),
				'name' => $type->getName()
			);
		}
		
		if ( isset($this->request->post['type']) ) {
			$this->data['type_id'] = $this->request->post['type'];
		}elseif ( isset($group) && $group->getType() != null ) {
			$this->data['type_id'] = $group->getType()->getId();
		}else {
			$this->data['type_id'] = 0;
		}

		$this->template = 'group/group_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset( $this->request->post['user_id'] ) || empty( $this->request->post['user_id'] ) ){
			$this->error['error_author'] = $this->language->get( 'error_author' );
		}

		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 3 || strlen($this->request->post['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}
		
		if ( !isset($this->request->post['sumary']) || strlen($this->request->post['sumary']) < 50 ){
			$this->error['error_sumary'] = $this->language->get( 'error_sumary' );
		}
		
		if ( !isset($this->request->post['description']) || strlen($this->request->post['description']) < 50 ){
			$this->error['error_description'] = $this->language->get( 'error_description' );
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