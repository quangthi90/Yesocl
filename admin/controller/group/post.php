<?php 
use Document\Group\Post;
use Document\User\User;

class ControllerGroupPost extends Controller {
	private $error = array( );
 
	public function index(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_post->addPost( $this->request->post, $this->request->get['group_id'] ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			
				$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
		}

		$this->data['action'] = $this->url->link( 'group/post/insert', 'group_id=' . $this->request->get['group_id'] );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_post->editPost( $this->request->get['post_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_update');
			
				$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_post->deletePost( $this->request->post );
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_group' ),
			'href'      => $this->url->link( 'group/group' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/post' ),
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
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'group/post/insert', 'group_id=' . $this->request->get['group_id'] );
		$this->data['delete'] = $this->url->link( 'group/post/delete', 'group_id=' . $this->request->get['group_id'] );
		$this->data['back'] = $this->url->link( 'group/group' );

		// post
		$posts = $group->getPosts();
		
		$post_total = 0;
		
		$this->data['posts'] = array();
		if ( $posts ){
			$post_total = count($posts);
			for ( $i = (($page - 1) * $limit); $i < ($post_total - (($page - 1) * $limit)); $i++ ){
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/post/update', 'post_id=' . $posts[$i]->getId() . '&group_id=' . $this->request->get['group_id'] ),
					'icon' => 'icon-edit',
				);
				
				$action[] = array(
					'text' => $this->language->get( 'text_comments' ),
					'href' => $this->url->link( 'group/comment', 'post_id=' . $posts[$i]->getId() ),
					'icon' => 'icon-list',
				);
				
				
				$user = $posts[$i]->getUser();
				
				$author = '';
				
				if ( $user ){
					$author = $user->getFullname();
				}
			
				$this->data['posts'][] = array(
					'id' => $posts[$i]->getId(),
					'title' => $posts[$i]->getTitle(),
					'author' => $author,
					'created' => $posts[$i]->getCreated()->format( $this->language->get('date_time_format') ),
					'status' => $posts[$i]->getStatus(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $post_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('sale/customer', '&page={page}', 'SSL');
			
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/post' ),
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
		$this->data['entry_title'] = $this->language->get( 'entry_title' );
		$this->data['entry_content'] = $this->language->get( 'entry_content' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_fullname'] = $this->language->get( 'entry_fullname' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] );
		
		// Load model
		$this->load->model( 'group/group' );
		
		$group = $this->model_group_group->getGroup( $this->request->get['group_id'] );
		
		// post
		if ( isset($this->request->get['post_id']) ){
			if ( $group && $group->getPosts() ){
				$post = $group->getPostById( $this->request->get['post_id'] );
				
				$this->data['action'] = $this->url->link( 'group/post/update', 'post_id=' . $this->request->get['post_id'] . '&group_id=' . $this->request->get['group_id'] );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
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
		if ( isset($this->request->post['content']) ){
			$this->data['content'] = $this->request->post['content'];
		}elseif ( isset($post) ){
			$this->data['content'] = $post->getContent();
		}else {
			$this->data['content'] = '';
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
		}
		if ( isset($this->request->post['author']) ){
			$this->data['author'] = $this->request->post['author'];
		}elseif ( isset( $user ) ){
			$this->data['author'] = $user->getPrimaryEmail()->getEmail();
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

		if ( isset( $user ) ){
			$this->data['fullname'] = $user->getFullname();
		}else {
			$this->data['fullname'] = '';
		}

		$this->template = 'group/post_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['title']) || strlen($this->request->post['title']) < 3 || strlen($this->request->post['title']) > 128 ){
			$this->error['error_title'] = $this->language->get( 'error_title' );
		}
		
		if ( !isset($this->request->post['content']) || strlen($this->request->post['content']) < 50 ){
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