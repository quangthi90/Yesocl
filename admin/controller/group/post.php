<?php
class ControllerGroupPost extends Controller {
	private $error = array( );
	private $route = 'group/post';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_post->addPost( $this->request->get['branch_id'], $this->request->post, $this->request->files['thumb'] ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_insert' );
			}

			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->data['action'] = $this->url->link( 'group/post/insert', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$return = $this->model_group_post->editPost( $this->request->get['post_id'], $this->request->post, $this->request->files['thumb'] );

			if ( $return ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_edit' );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_post->deletePost( $this->request->post );
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
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
		
		$this->load->model( 'group/group' );
		$group = $this->model_group_group->getGroup( $this->request->get['group_id'] );
		if ( empty( $group ) ) {
			$this->redirect( $this->url->link( 'group/group', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_group' ),
			'href'      => $this->url->link( 'group/group', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/post', 'group_id=' . $group->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_title'] = $this->language->get( 'text_title' );
		$this->data['text_author'] = $this->language->get( 'text_author' );
		$this->data['text_created'] = $this->language->get( 'text_created' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_post'] = $this->language->get( 'text_post' );	
		$this->data['text_action'] = $this->language->get( 'text_action' );
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );

		// Column
		$this->data['column_thumb'] = $this->language->get( 'column_thumb' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'group/post/insert', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'group/post/delete', 'group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['back'] = $this->url->link( 'group/group', 'token=' . $this->session->data['token'], 'SSL' );

		// post
		$posts = $group->getPosts();
		
		$post_total = 0;
		
		$this->data['posts'] = array();
		if ( $posts ){
			$post_total = count($posts);
			foreach ($posts as $post) {
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/post/update', 'post_id=' . $post->getId() . '&group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
				
				$action[] = array(
					'text' => $this->language->get( 'text_comments' ),
					'href' => $this->url->link( 'group/comment', 'post_id=' . $post->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-list',
				);
				
				
				$this->data['posts'][] = array(
					'id' => $post->getId(),
					'thumb' => HTTP_IMAGE . $post->getThumb(),
					'title' => $post->getTitle(),
					'category' => $post->getCategory()->getName(),
					'author' => $post->getUser()->getPrimaryEmail()->getEmail(),
					'created' => $post->getCreated()->format( 'd/m/Y - h:i:s' ),
					'status' => $post->getStatus() == true ? $this->language->get( 'text_enabled' ) : $this->language->get( 'text_disabled' ),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $post_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('group/post', '&group_id=' . $this->request->get['group_id'] . '&token=' . $this->session->data['token'], 'SSL' . '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'group/post_list.tpl';
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
		
		// title
		if ( isset($this->error['error_title']) ) {
			$this->data['error_title'] = $this->error['error_title'];
		} else {
			$this->data['error_title'] = '';
		}
		
		// content
		if ( isset($this->error['error_content']) ) {
			$this->data['error_content'] = $this->error['error_content'];
		} else {
			$this->data['error_content'] = '';
		}
		
		// author
		if ( isset($this->error['error_author']) ) {
			$this->data['error_author'] = $this->error['error_author'];
		} else {
			$this->data['error_author'] = '';
		}

		// thumb
		if ( isset( $this->error['error_thumb'] ) ) {
			$this->data['error_thumb'] = $this->error['error_thumb'];
		}else {
			$this->data['error_thumb'] = '';
		}

		// category
		if ( isset( $this->error['error_category'] ) ) {
			$this->data['error_category'] = $this->error['error_category'];
		}else {
			$this->data['error_category'] = '';
		}

		$group_id = 0;
		if ( isset($this->request->get['group_id']) && !empty($this->request->get['group_id']) ){
			$group_id = $this->request->get['group_id'];
		}

		if ( $group_id == 0 ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			$this->redirect( $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL') );
		}

		// Link
		$this->data['cancel'] = $this->url->link( 'group/post', 'group_id=' . $group_id . '&token=' . $this->session->data['token'], 'SSL' );

		// image
		$this->data['img_default'] = HTTP_IMAGE . 'no_image.jpg';

		// Load model
		$this->load->model( 'group/group' );
		
		$group = $this->model_group_group->getGroup( $group_id );
		if ( !$group ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_group' );
			$this->redirect( $this->data['cancel'] );
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/post', 'group_id=' . $group->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_select_image'] = $this->language->get( 'text_select_image' );
		$this->data['text_change'] = $this->language->get( 'text_change' );
		$this->data['text_remove'] = $this->language->get( 'text_remove' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		
		// Entry
		$this->data['entry_title'] = $this->language->get( 'entry_title' );
		$this->data['entry_content'] = $this->language->get( 'entry_content' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_fullname'] = $this->language->get( 'entry_fullname' );
		$this->data['entry_category'] = $this->language->get( 'entry_category' );
		$this->data['entry_thumb'] = $this->language->get( 'entry_thumb' );
		
		// post
		if ( isset($this->request->get['post_id']) ){
			$post = $group->getPostById( $this->request->get['post_id'] );

			if ( empty( $post ) ) {
				$this->redirect( $this->data['cancel'] );
			}
				
			$this->data['action'] = $this->url->link( 'group/post/update', 'post_id=' . $post->getId() . '&group_id=' . $group->getId() . '&token=' . $this->session->data['token'], 'SSL' );
		}

		// Entry title
		if ( isset($this->request->post['title']) ){
			$this->data['title'] = $this->request->post['title'];
		}elseif ( isset($post) ){
			$this->data['title'] = $post->getTitle();
		}else {
			$this->data['title'] = '';
		}
		
		// Entry content
		if ( isset($this->request->post['postcontent']) ){
			$this->data['content'] = $this->request->post['postcontent'];
		}elseif ( isset($post) ){
			$this->data['content'] = $post->getContent();
		}else {
			$this->data['content'] = '';
		}

		// logo
		if ( isset( $post ) && trim( $post->getThumb() ) != '' ) {
			$this->data['img_thumb'] = HTTP_IMAGE . $post->getThumb();
		}else {
			$this->data['img_thumb'] = $this->data['img_default'];
		}
		
		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset($post) ){
			$this->data['status'] = $post->getStatus();
		}else {
			$this->data['status'] = 1;
		}
		
		// Entry author
		if ( isset( $post ) ) {
			$user = $post->getUser();
			$category = $post->getCategory();
		}
		if ( isset($this->request->post['author']) ){
			$this->data['author'] = $this->request->post['author'];
		}elseif ( isset( $user ) ){
			$this->data['author'] = $user->getUsername() . '(' . $user->getPrimaryEmail()->getEmail() . ')';
		}else {
			$this->data['author'] = '';
		}

		if ( isset($this->request->post['user_id']) ){
			$this->data['user_id'] = $this->request->post['user_id'];
		}elseif ( isset( $user ) ){
			$this->data['user_id'] = $user->getId();
		}else {
			$this->data['user_id'] = '';
		}

		// Category
		if ( isset($this->request->post['category_id']) ){
			$this->data['category_id'] = $this->request->post['category_id'];
		}elseif ( isset( $category ) ){
			$this->data['category_id'] = $category->getId();
		}else {
			$this->data['category_id'] = '';
		}

		$categories = $group->getCategories();
		$this->data['categories'] = array();
		foreach ( $categories as $category ) {
			$this->data['categories'][] = array(
				'id' => $category->getId(),
				'name' => $category->getName()
			);
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'group/post_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['title']) || strlen($this->request->post['title']) < 3 ){
			$this->error['error_title'] = $this->language->get( 'error_title' );
		}
		
		if ( !isset($this->request->post['postcontent']) || strlen($this->request->post['postcontent']) < 50 ){
			$this->error['error_content'] = $this->language->get( 'error_content' );
		}

		if ( !isset($this->request->post['user_id']) || empty( $this->request->post['user_id'] ) ){
			$this->error['error_author'] = $this->language->get( 'error_author' );
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