<?php
class ControllerCompanyPost extends Controller {
	private $limit = 10;
	private $error = array();

	public function index() {
		$this->load->language( 'company/post' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		$this->load->model( 'company/post' );

		$this->getList();
	}

	public function insert() {
		$this->load->language( 'company/post' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		$this->load->model( 'company/post' );

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
			if ( $this->model_company_post->addPost( $this->request->get['company_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/post/insert', 'company_id=' . $this->request->get['company_id'] );

		$this->getForm();
	}

	public function update() {
		$this->load->language( 'company/post' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset($this->request->get['company_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_company');
			
			$this->redirect( $this->url->link( 'company/company') );
		}

		$this->load->model( 'company/post' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		if ( !isset( $this->request->get['post_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_post->editPost( $this->request->get['post_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/post/update', 'company_id=' . $this->request->get['company_id'] . '&post_id=' . $this->request->get['post_id'] );

		$this->getForm();
	}

	public function delete(){
		$this->load->language( 'company/post' );
		
		if ( !isset($this->request->get['company_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_company');
			
			$this->redirect( $this->url->link( 'company/company') );
		}
		
		$this->load->model( 'company/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_company_post->deletePost( $this->request->post );
			$this->session->data['success'] = $this->language->get( 'success' );
			$this->redirect( $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ) );
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
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/post', 'company_id=' . $this->request->get['company_id'] ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_post'] = $this->language->get( 'column_post' );
		$this->data['column_author'] = $this->language->get( 'column_author' );
		$this->data['column_created'] = $this->language->get( 'column_created' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );

		// link
		$this->data['insert'] = $this->url->link( 'company/post/insert', 'company_id=' . $this->request->get['company_id'] );
		$this->data['delete'] = $this->url->link( 'company/post/delete', 'company_id=' . $this->request->get['company_id'] );
		$this->data['back'] = $this->url->link( 'company/company' );

		//company
		$this->load->model( 'company/company' );
		$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );
		if ( empty( $company ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company' ) );
		}

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// post
		$posts = $company->getPosts();

		$this->data['posts'] = array();
		foreach ($posts as $post) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get( 'text_edit' ),
				'href' => $this->url->link( 'company/post/update', 'company_id=' . $company->getId() . '&post_id=' . $post->getId() ),
				'icon' => 'icon-edit',
				);

			$this->data['posts'][] = array(
				'id' => $post->getId(),
				'title' => $post->getTitle(),
				'author' => $post->getUser()->getPrimaryEmail()->getEmail(),
				'created' => $post->getCreated()->format( 'dd/mm/YY - h:i:s' ),
				'status' => $post->getStatus(),
				'action' => $action,
				);
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = count( $posts );
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'company/post', '&page={page}', 'SSl' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'company/post_list.tpl';

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

		if ( isset( $this->error['error_title'] ) ) {
			$this->data['error_title'] = $this->error['error_title'];
		}else {
			$this->data['error_title'] = '';
		}

		if ( isset( $this->error['error_author'] ) ) {
			$this->data['error_author'] = $this->error['error_author'];
		}else {
			$this->data['error_author'] = '';
		}

		if ( isset( $this->error['error_category'] ) ) {
			$this->data['error_category'] = $this->error['error_category'];
		}else {
			$this->data['error_category'] = '';
		}

		if ( isset( $this->error['error_description'] ) ) {
			$this->data['error_description'] = $this->error['error_description'];
		}else {
			$this->data['error_description'] = '';
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
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/post', $url . '&company_id=' . $this->request->get['company_id'] ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_title'] = $this->language->get( 'entry_title' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_category'] = $this->language->get( 'entry_category' );
		$this->data['entry_description'] = $this->language->get( 'entry_description' );
		$this->data['entry_content'] = $this->language->get( 'entry_content' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'company/post', $url . '&company_id=' . $this->request->get['company_id'] );

		// company
		$this->load->model( 'company/company' );
		$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );

		if ( empty( $company ) ) {
			$this->redirect( $this->url->link( 'company/company' ) );
		}

		if ( isset( $this->request->get['post_id'] ) ) {
			$post = $company->getPostById( $this->request->get['post_id'] );
			if ( empty( $post ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// title
		if ( isset( $this->request->post['title'] ) ) {
			$this->data['title'] = $this->request->post['title'];
		}elseif ( isset( $post ) ) {
			$this->data['title'] = $post->getTitle();
		}else {
			$this->data['title'] = '';
		}

		// author
		if ( isset( $post ) ) {
			$user = $post->getUser();
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

		// category
		$this->load->model( 'company/category' );
		$categories = $this->model_company_category->getCategories();
		$this->data['categories'] = array();
		foreach ($categories as $category) {
			$this->data['categories'][] = array(
				'id' => $category->getId(),
				'name' => $category->getName(),
				);
		}
		if ( isset( $this->request->post['category'] ) ) {
			$this->data['category'] = $this->request->post['category'];
		}elseif ( isset( $post ) ) {
			$this->data['category'] = $post->getCategory()->getId();
		}else {
			$this->data['category'] = '';
		}

		// description
		if ( isset( $this->request->post['description'] ) ) {
			$this->data['description'] = $this->request->post['description'];
		}elseif ( isset( $post ) ) {
			$this->data['description'] = $post->getDescription();
		}else {
			$this->data['description'] = '';
		}

		// content
		if ( isset( $this->request->post['post_content'] ) ) {
			$this->data['content'] = $this->request->post['post_content'];
		}elseif ( isset( $post ) ) {
			$this->data['content'] = $post->getContent();
		}else {
			$this->data['content'] = '';
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $post ) ) {
			$this->data['status'] = $post->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// template
		$this->template = 'company/post_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		if ( !isset( $this->request->post['title']) || strlen( trim( $this->request->post['title'] ) ) < 1 || strlen( trim( $this->request->post['title'] ) ) > 256  ) {
			$this->error['error_title'] = $this->language->get( 'error_title' );
		}

		if ( !isset( $this->request->post['description']) || strlen( trim( $this->request->post['description'] ) ) < 50 || strlen( trim( $this->request->post['description'] ) ) > 256 ) {
			$this->error['error_description'] = $this->language->get( 'error_description' );
		}

		if ( !isset( $this->request->post['post_content']) || strlen( trim( $this->request->post['post_content'] ) ) < 50 ) {
			$this->error['error_content'] = $this->language->get( 'error_content' );
		}

		if ( !isset( $this->request->post['category']) || empty( $this->request->post['category'] ) ) {
			$this->error['error_category'] = $this->language->get( 'error_category' );
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