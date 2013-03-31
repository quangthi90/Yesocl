<?php
class ControllerGroupComment extends Controller {
	private $error = array( );
	private $limit = 10;
 
	public function index(){
		$this->load->language( 'group/comment' );
		
		if ( !isset($this->request->get['post_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_post');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		
		$this->load->model( 'group/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'group/comment' );
		
		if ( !isset($this->request->get['post_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_post');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_comment->addComment( $this->request->post, $this->request->get['post_id'] ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			
				$this->redirect( $this->url->link( 'group/comment', 'post_id=' . $this->request->get['post_id'] ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/comment', 'post_id=' . $this->request->get['post_id'] ) );
		}

		$this->data['action'] = $this->url->link( 'group/comment/insert', 'post_id=' . $this->request->get['post_id'] );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'group/comment' );
		
		if ( isset($this->request->get['post_id']) ){
			$cancel = $this->url->link( 'group/comment', 'post_id=' . $this->request->get['post_id'] );
		}else {
			$cancel = $this->url->link( 'group/group');
		}

		if ( !isset($this->request->get['comment_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $cancel );
		}
		
		$this->load->model( 'group/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_comment->editComment( $this->request->get['comment_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_update');
			
				$this->redirect( $cancel );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $cancel );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'group/comment' );

		if ( isset($this->request->get['post_id']) ){
			$cancel = $this->url->link( 'group/comment', 'post_id=' . $this->request->get['post_id'] );
		}else {
			$cancel = $this->url->link( 'group/group');
		}
		
		$this->load->model( 'group/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_comment->deletePost( $this->request->post );
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $cancel );
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
		
		$this->load->model( 'group/post' );
		$post = $this->model_group_post->getPost( $this->request->get['post_id'] );
		if ( empty( $post ) ) {
			$this->session->data['error_warning'] = $this->language->get('error_post');
			$this->redirect( $this->url->link( 'group/group') );
		}

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
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'group/post', 'group_id=' . $this->model_group_post->getGroupId( $post->getId() ) ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/comment', 'post_id=' . $post->getId() ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
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
		$this->data['insert'] = $this->url->link( 'group/comment/insert', 'post_id=' . $post->getId() );
		$this->data['delete'] = $this->url->link( 'group/comment/delete', 'post_id=' . $post->getId() );
		$this->data['back'] = $this->url->link( 'group/post', 'group_id=' . $this->model_group_post->getGroupId( $post->getId() ) );

		// Comment
		$comments = $post->getComments();
		
		$post_total = 0;
		
		$this->data['comments'] = array();
		if ( $comments ){
			$comment_total = count( $comments );
			for ( $i = (($page - 1) * $this->limit); $i < ($comment_total - (($page - 1) * $this->limit)); $i++ ){
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/comment/update', 'comment_id=' . $comments[$i]->getId() . '&post_id=' . $post->getId() ),
					'icon' => 'icon-edit',
				);
			
				$this->data['comments'][] = array(
					'id' => $comments[$i]->getId(),
					'author' => $comments[$i]->getUser()->getFullname(),
					'created' => $comments[$i]->getCreated()->format( $this->language->get( 'date_time_format' ) ),
					'status' => $comments[$i]->getStatus(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $comment_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('group/comment', '&post_id=' . $post->getId() . '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'group/comment_list.tpl';
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

		$this->load->model( 'group/post' );
		$post = $this->model_group_post->getPost( $this->request->get['post_id'] );
		if ( empty( $post ) ) {
			$this->session->data['error_warning'] = $this->language->get('error_post');
			$this->redirect( $this->url->link( 'group/group') );
		}

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
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'group/post', 'group_id=' . $this->model_group_post->getGroupId( $post->getId() ) ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/comment', 'post_id=' . $post->getId() ),
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
		$this->data['entry_content'] = $this->language->get( 'entry_content' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_fullname'] = $this->language->get( 'entry_fullname' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'group/comment', 'post_id=' . $post->getId() );
		
		// comment
		if ( isset( $this->request->get['comment_id']) ){
			$comment = $post->getCommentById( $this->request->get['comment_id'] );

			if ( empty( $comment ) ){
				$this->redirect( $this->data['cancel'] );
			}
				
			$this->data['action'] = $this->url->link( 'group/comment/update', 'comment_id=' . $comment->getId() . '&post_id=' . $post->getId() );
		}

		// Entry content
		if ( isset($this->request->post['content']) ){
			$this->data['content'] = $this->request->post['content'];
		}elseif ( isset( $comment ) ){
			$this->data['content'] = $comment->getContent();
		}else {
			$this->data['content'] = '';
		}
		
		// Entry status
		if ( isset($this->request->post['status']) ){
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $comment ) ){
			$this->data['status'] = $comment->getStatus();
		}else {
			$this->data['status'] = 1;
		}
		
		// Entry author
		if ( isset( $comment ) ) {
			$user = $comment->getUser();
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

		$this->template = 'group/comment_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['content']) || strlen($this->request->post['content']) < 50 ){
			$this->error['error_content'] = $this->language->get( 'error_content' );
		}

		if ( !isset($this->request->post['user_id']) || empty( $this->request->post['user_id'] ) ){
			$this->error['error_author'] = $this->language->get( 'error_author' );
		}

		if ( $this->error ){
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