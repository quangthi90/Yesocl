<?php
class ControllerUserComment extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'user/comment';
 
	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'user/comment' );
		
		if ( !isset($this->request->get['post_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_post');
			
			$this->redirect( $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'user/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'user/comment' );
		
		if ( !isset($this->request->get['post_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_post');
			
			$this->redirect( $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'user/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_user_comment->addComment( $this->request->get['post_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			
				$this->redirect( $this->url->link( 'user/comment', 'post_id=' . $this->request->get['post_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'user/comment', 'post_id=' . $this->request->get['post_id'] . '&token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->data['action'] = $this->url->link( 'user/comment/insert', 'post_id=' . $this->request->get['post_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		
		$this->getForm( );
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'user/comment' );
		
		if ( isset($this->request->get['post_id']) ){
			$cancel = $this->url->link( 'user/comment', 'post_id=' . $this->request->get['post_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		}else {
			$cancel = $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL');
		}

		if ( !isset($this->request->get['comment_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_user');
			
			$this->redirect( $cancel );
		}
		
		$this->load->model( 'user/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_user_comment->editComment( $this->request->get['post_id'], $this->request->get['comment_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_update');
			
				$this->redirect( $cancel );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $cancel );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}
		
		$this->load->language( 'user/comment' );

		if ( isset($this->request->get['post_id']) ){
			$cancel = $this->url->link( 'user/comment', 'post_id=' . $this->request->get['post_id'] . '&token=' . $this->session->data['token'], 'SSL' );
		}else {
			$cancel = $this->url->link('user/group', 'token=' . $this->session->data['token'], 'SSL');
		}
		
		$this->load->model( 'user/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_user_comment->deleteComment( $this->request->get['post_id'], $this->request->post );
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

		// Get Post ID
		$idPost = 0;
		if ( isset($this->request->get['post_id']) && !empty($this->request->get['post_id']) ){
			$idPost = $this->request->get['post_id'];
		}

		// Check Post exist
		if ( $idPost == 0 ){
			$this->session->data['error_warning'] = $this->language->get('error_post');
			$this->redirect( $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL') );
		}
		
		$this->load->model( 'user/comment' );
		$this->load->model( 'user/post' );

		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		$lComments = $this->model_user_comment->getComments( $idPost, $aData );

		$oUser = $this->model_user_post->getOwner( $idPost );

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_user' ),
			'href'      => $this->url->link( 'user/user', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'user/post', 'user_id=' . $oUser->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'user/comment', 'post_id=' . $idPost . '&token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_author'] = $this->language->get( 'text_author' );
		$this->data['text_content'] = $this->language->get( 'text_content' );
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
		$this->data['insert'] = $this->url->link( 'user/comment/insert', 'post_id=' . $idPost . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'user/comment/delete', 'post_id=' . $idPost . '&token=' . $this->session->data['token'], 'SSL' );
		$this->data['back'] = $this->url->link( 'user/post', 'user_id=' . $oUser->getId() . '&token=' . $this->session->data['token'], 'SSL' );

		// Comment
		$iTotalComment = 0;
		$this->data['comments'] = array();
		if ( $lComments ){
			$iTotalComment = $this->model_user_comment->getTotalComment( $idPost );
			foreach ( $lComments as $oComment ){
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'user/comment/update', 'comment_id=' . $oComment->getId() . '&post_id=' . $idPost . '&token=' . $this->session->data['token'], 'SSL' ),
					'icon' => 'icon-edit',
				);
			
				$this->data['comments'][] = array(
					'id' => $oComment->getId(),
					'author' => $oComment->getUser()->getFullname(),
					'created' => $oComment->getCreated()->format( $this->language->get( 'date_time_format' ) ),
					'content' => strlen($oComment->getContent()) < 50 ? $oComment->getContent() : substr($oComment->getContent(), 0, 50) . '...',
					'status' => $oComment->getStatus() ? $this->language->get( 'text_enabled' ) : $this->language->get( 'text_disabled' ),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $iTotalComment;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('user/comment', '&post_id=' . $idPost . '&page={page}' . '&token=' . $this->session->data['token'], 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'user/comment_list.tpl';
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

		$this->load->model( 'user/post' );
		$oUser = $this->model_user_post->getOwner( $this->request->get['post_id'] );
		$post = $oUser->getPostData()->getPostById( $this->request->get['post_id'] );

		if ( empty( $post ) ) {
			$this->session->data['error_warning'] = $this->language->get('error_post');
			$this->redirect( $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL') );
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_user' ),
			'href'      => $this->url->link( 'user/user', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'user/post', 'user_id=' . $oUser->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'user/comment', 'post_id=' . $post->getId() . '&token=' . $this->session->data['token'], 'SSL' ),
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
		$this->data['cancel'] = $this->url->link( 'user/comment', 'post_id=' . $post->getId() . '&token=' . $this->session->data['token'], 'SSL' );
		
		// comment
		if ( isset( $this->request->get['comment_id']) ){
			$comment = $post->getCommentById( $this->request->get['comment_id'] );

			if ( empty( $comment ) ){
				$this->redirect( $this->data['cancel'] );
			}
				
			$this->data['action'] = $this->url->link( 'user/comment/update', 'comment_id=' . $comment->getId() . '&post_id=' . $post->getId() . '&token=' . $this->session->data['token'], 'SSL' );
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
			$author = $comment->getUser();
		}
		if ( isset($this->request->post['author']) ){
			$this->data['author'] = $this->request->post['author'];
		}elseif ( isset( $author ) ){
			$this->data['author'] = $author->getUsername() . '(' . $author->getPrimaryEmail()->getEmail() . ')';
		}else {
			$this->data['author'] = '';
		}

		if ( isset($this->request->post['user_id']) ){
			$this->data['user_id'] = $this->request->post['user_id'];
		}elseif ( isset( $author ) ){
			$this->data['user_id'] = $author->getId();
		}else {
			$this->data['user_id'] = '';
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'group/comment_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
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