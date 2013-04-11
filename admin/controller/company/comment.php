<?php
class ControllerCompanyComment extends Controller {
	private $limit = 10;
	private $error = array();

	public function index() {
		$this->load->language( 'company/comment' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		if ( !isset( $this->request->get['post_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		$this->load->model( 'company/comment' );

		$this->getList();
	}

	public function insert() {
		$this->load->language( 'company/comment' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		if ( !isset( $this->request->get['post_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		$this->load->model( 'company/comment' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_comment->addComment( $this->request->get['post_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/comment', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/comment/insert', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] );

		$this->getForm();
	}

	public function update() {
		$this->load->language( 'company/comment' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		if ( !isset( $this->request->get['post_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		$this->load->model( 'company/comment' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		if ( !isset( $this->request->get['comment_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/comment', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_comment->editComment( $this->request->get['post_id'], $this->request->get['comment_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/comment', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/comment/update', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] . '&comment_id=' . $this->request->get['comment_id'] );

		$this->getForm();
	}

	public function delete(){
		$this->load->language( 'company/comment' );
		
		if ( !isset($this->request->get['company_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_company');
			
			$this->redirect( $this->url->link( 'company/company') );
		}

		if ( !isset( $this->request->get['post_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}
		
		$this->load->model( 'company/comment' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_company_comment->deleteComments( $this->request->get['post_id'], $this->request->post );
			$this->session->data['success'] = $this->language->get( 'success' );
			$this->redirect( $this->url->link( 'company/comment', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] ) );
		}

		$this->getList( );
	}

	public function getList() {
		// catch errors
		if ( isset( $this->session->data['success'] ) ) {
			$this->data['success'] = $this->session->data['success'];

			unset( $this->session->data['success'] );
		}else {
			$this->data['success'] = '';
		}

		if ( isset( $this->session->data['error_warning'] ) ) {
			$this->data['error_warning'] = $this->session->data['error_warning'];

			unset( $this->session->data['error_warning'] );
		} elseif ( isset( $this->error['error_warning'] ) ) {
			$this->data['error_warning'] = $this->error['error_warning'];
		}else {
			$this->data['error_warning'] = '';
		}

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_company' ),
			'href'      => $this->url->link( 'company/company' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/comment', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_author'] = $this->language->get( 'column_author' );
		$this->data['column_created'] = $this->language->get( 'column_created' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );

		// link
		$this->data['insert'] = $this->url->link( 'company/comment/insert', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] );
		$this->data['delete'] = $this->url->link( 'company/comment/delete', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] );
		$this->data['back'] = $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] );

		//company
		$this->load->model( 'company/company' );
		$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );
		if ( empty( $company ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		//post
		$post = $company->getPostById( $this->request->get['post_id'] );
		if ( empty( $post ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// comments
		$comments = $post->getComments();

		$this->data['comments'] = array();
		foreach ($comments as $comment) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get( 'text_edit' ),
				'href' => $this->url->link( 'company/comment/update', 'company_id=' . $company->getId() . '&post_id=' . $post->getId() . '&comment_id=' . $comment->getId() ),
				'icon' => 'icon-edit',
				);

			$this->data['comments'][] = array(
				'id' => $comment->getId(),
				'author' => $comment->getUser()->getPrimaryEmail()->getEmail(),
				'created' => $comment->getCreated()->format( 'd/m/Y - h:i:s' ),
				'status' => $comment->getStatus(),
				'action' => $action,
				);
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = count( $comments );
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'company/comment', '&page={page}' . '&company_id=' . $company->getId() . '&post_id=' . $post->getId(), 'SSl' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'company/comment_list.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	public function getForm() {
		// catch errors
		if ( isset( $this->session->data['error_warning'] ) ) {
			$this->data['error_warning'] = $this->session->data['error_warning'];

			unset( $this->session->data['error_warning'] );
		} elseif ( isset( $this->error['error_warning'] ) ) {
			$this->data['error_warning'] = $this->error['error_warning'];
		}else {
			$this->data['error_warning'] = '';
		}

		if ( isset( $this->error['error_author'] ) ) {
			$this->data['error_author'] = $this->error['error_author'];
		}else {
			$this->data['error_author'] = '';
		}

		if ( isset( $this->error['error_content'] ) ) {
			$this->data['error_content'] = $this->error['error_content'];
		}else {
			$this->data['error_content'] = '';
		}

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_company' ),
			'href'      => $this->url->link( 'company/company' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'company/post', $url . '&company_id=' . $this->request->get['company_id'] ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/comment', $url . '&company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_content'] = $this->language->get( 'entry_content' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'company/comment', $url . '&company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] );

		//company
		$this->load->model( 'company/company' );
		$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );
		if ( empty( $company ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		//post
		$post = $company->getPostById( $this->request->get['post_id'] );
		if ( empty( $post ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		// comment
		if ( isset( $this->request->get['comment_id'] ) ) {
			$comment = $post->getCommentById( $this->request->get['comment_id'] );
			if ( empty( $comment ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// author
		if ( isset( $comment ) ) {
			$user = $comment->getUser();
		}
		if ( isset( $this->request->post['author'] ) ) {
			$this->data['author'] = $this->request->post['author'];
		}elseif ( isset( $user ) ) {
			$this->data['author'] = $user->getUsername() . '(' . $user->getPrimaryEmail()->getEmail() . ')';
		}else {
			$this->data['author'] = '';
		}

		if ( isset( $this->request->post['user_id'] ) ) {
			$this->data['user_id'] = $this->request->post['user_id'];
		}elseif ( isset( $user ) ) {
			$this->data['user_id'] = $user->getId();
		}else {
			$this->data['user_id'] = '';
		}

		// content
		if ( isset( $this->request->post['post_content'] ) ) {
			$this->data['content'] = $this->request->post['post_content'];
		}elseif ( isset( $comment ) ) {
			$this->data['content'] = $comment->getContent();
		}else {
			$this->data['content'] = '';
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $comment ) ) {
			$this->data['status'] = $comment->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// template
		$this->template = 'company/comment_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		if ( !isset( $this->request->post['comment_content']) || strlen( trim( $this->request->post['comment_content'] ) ) < 1 || strlen( trim( $this->request->post['comment_content'] ) ) > 255 ) {
			$this->error['error_content'] = $this->language->get( 'error_content' );
		}

		if ( !isset( $this->request->post['user_id']) || empty( $this->request->post['user_id'] ) ) {
			$this->error['error_author'] = $this->language->get( 'error_author' );
		}

		if ( $this->error ) {
			return false;
		}else {
			return true;
		}
	}

	private function isValidateDelete() {
		return true;
	}
}
?>