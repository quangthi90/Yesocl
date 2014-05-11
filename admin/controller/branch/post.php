<?php
class ControllerBranchPost extends Controller {
	private $limit = 10;
	private $error = array();
	private $route = 'branch/post';

	public function index() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/post' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/post' );

		$this->getList();
	}

	public function insert() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/post' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/post' );

		$url = '';

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		if ( !empty($this->request->get['page']) ) {
			$url .= '&page=' . $this->request->get['page'];
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( !isset( $this->request->files['thumb'] ) ) {
				$this->request->files['thumb'] = array();
			}

			if ( $this->model_branch_post->addPost( $this->request->get['branch_id'], $this->request->post, $this->request->files['thumb'] ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_insert' );
			}

			$this->redirect( $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'branch/post/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$this->getForm();
	}

	public function update() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/post' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset($this->request->get['branch_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_branch');
			
			$this->redirect( $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->load->model( 'branch/post' );

		$url = '';

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		if ( !empty($this->request->get['page']) ) {
			$url .= '&page=' . $this->request->get['page'];
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( !isset( $this->request->files['thumb'] ) ) {
				$this->request->files['thumb'] = array();
			}
			
			$return = $this->model_branch_post->editPost( $this->request->get['post_id'], $this->request->post, $this->request->files['thumb'] );

			if ( $return ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_edit' );
			}

			$this->redirect( $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		if ( !empty($this->request->get['post_id']) ) {
			$url .= '&post_id=' . $this->request->get['post_id'];
		}

		// action
		$this->data['action'] = $this->url->link( 'branch/post/update', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$this->getForm();
	}

	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/post' );
		
		$this->load->model( 'branch/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$url = '';

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		if ( !empty($this->request->get['page']) ) {
			$url .= '&page=' . $this->request->get['page'];
		}

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_branch_post->deletePost( $this->request->get['branch_id'], $this->request->post );
			$this->session->data['success'] = $this->language->get( 'success' );
			$this->redirect( $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
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

		if (isset($this->request->get['filter_title'])) {
			$filter_title = $this->request->get['filter_title'];
		} else {
			$filter_title = null;
		}

		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		$url = '';

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . $this->request->get['filter_title'];
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}		
		$url .= '&page=' . $page;

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_branch' ),
			'href'      => $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url, 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_none'] = $this->language->get( 'text_none' );

		// column
		$this->data['column_post'] = $this->language->get( 'column_post' );
		$this->data['column_author'] = $this->language->get( 'column_author' );
		$this->data['column_created'] = $this->language->get( 'column_created' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );
		$this->data['column_thumb'] = $this->language->get( 'column_thumb' );
		$this->data['column_category'] = $this->language->get( 'column_category' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );
		$this->data['button_filter'] = $this->language->get( 'button_filter' );

		// link
		$this->data['insert'] = $this->url->link( 'branch/post/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['delete'] = $this->url->link( 'branch/post/delete', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['back'] = $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' );

		$data = array(
			'branch_id' => $this->request->get['branch_id'],
			'filter_title' => $filter_title,
			'filter_category' => $filter_category,
			'filter_status' => $filter_status,
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
		);

		// post
		$posts = $this->model_branch_post->getPosts( $data );

		$this->data['posts'] = array();
		foreach ($posts as $post) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get( 'text_comment' ),
				'href' => $this->url->link( 'branch/comment', 'token=' . $this->session->data['token'] . '&post_id=' . $post->getId() . $url, 'SSL' ),
				'icon' => 'icon-list',
				);

			$action[] = array(
				'text' => $this->language->get( 'text_edit' ),
				'href' => $this->url->link( 'branch/post/update', 'token=' . $this->session->data['token'] . '&post_id=' . $post->getId() . $url, 'SSL' ),
				'icon' => 'icon-edit',
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

		$url = '';

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . $this->request->get['filter_title'];
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = count( $posts );
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL' );

		$this->data['pagination'] = $pagination->render();

		$this->load->model('branch/category');
		$lCategories = $this->model_branch_category->getAllCategories( array('branch_id' => $this->request->get['branch_id']) );
		$this->data['categories'] = array();
		foreach ( $lCategories as $oCategory ) {
			$this->data['categories'][] = array(
				'id' => $oCategory->getId(),
				'name' => $oCategory->getName()
			);
		}

		$this->data['filter_title'] = $filter_title;
		$this->data['filter_category'] = $filter_category;
		$this->data['filter_status'] = $filter_status;

		$this->data['token'] = $this->session->data['token'];
		$this->data['branch_id'] = $this->request->get['branch_id'];

		$this->data['autocomplete_name'] = html_entity_decode( $this->url->link('branch/post/autocompleteName', 'token=' . $this->session->data['token'], 'SSL') );

		// template
		$this->template = 'branch/post_list.tpl';

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

		if ( isset( $this->error['error_thumb'] ) ) {
			$this->data['error_thumb'] = $this->error['error_thumb'];
		}else {
			$this->data['error_thumb'] = '';
		}

		$url = '';

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		// page
		if ( !empty($this->request->get['page']) ) {
			$url .= '&page=' . $this->request->get['page'];
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_branch' ),
			'href'      => $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url . '&branch_id=' . $this->request->get['branch_id'], 'SSl' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );
		$this->data['text_select_image'] = $this->language->get( 'text_select_image' );
		$this->data['text_change'] = $this->language->get( 'text_change' );
		$this->data['text_remove'] = $this->language->get( 'text_remove' );

		// entry
		$this->data['entry_title'] = $this->language->get( 'entry_title' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_author'] = $this->language->get( 'entry_author' );
		$this->data['entry_category'] = $this->language->get( 'entry_category' );
		$this->data['entry_description'] = $this->language->get( 'entry_description' );
		$this->data['entry_content'] = $this->language->get( 'entry_content' );
		$this->data['entry_thumb'] = $this->language->get( 'entry_thumb' );
		$this->data['entry_tag_stock'] = $this->language->get( 'entry_tag_stock' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['autocomplete_user'] = html_entity_decode( $this->url->link( 'user/user/searchUser', 'token=' . $this->session->data['token'], 'SSL' ) );
		
		// image
		$this->data['img_default'] = HTTP_IMAGE . 'no_image.jpg';

		if ( isset( $this->request->get['post_id'] ) ) {
			$post = $this->model_branch_post->getPost( $this->request->get['post_id'] );

			if ( empty($post) ) {
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
			$category = $post->getCategory();
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

		// Category
		if ( isset($this->request->post['category_id']) ){
			$this->data['category_id'] = $this->request->post['category_id'];
		}elseif ( isset( $category ) ){
			$this->data['category_id'] = $category->getId();
		}else {
			$this->data['category_id'] = '';
		}

		$this->load->model( 'branch/branch' );
		$branch = $this->model_branch_branch->getBranch( $this->request->get['branch_id'] );
		
		if ( $branch ){
			$categories = $branch->getCategories();
		}else{
			$categories = array();
		}

		$this->data['categories'] = array();
		foreach ( $categories as $category ) {
			$this->data['categories'][] = array(
				'id' => $category->getId(),
				'name' => $category->getName()
			);
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

		// logo
		if ( isset( $post ) && trim( $post->getThumb() ) != '' ) {
			$this->data['img_thumb'] = HTTP_IMAGE . $post->getThumb();
		}else {
			$this->data['img_thumb'] = $this->data['img_default'];
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $post ) ) {
			$this->data['status'] = $post->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		$this->data['token'] = $this->session->data['token'];

		// template
		$this->template = 'branch/post_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		$this->load->model( 'branch/post' );

		if ( !isset( $this->request->post['title']) || strlen( trim( $this->request->post['title'] ) ) < 1 || strlen( trim( $this->request->post['title'] ) ) > 256  ) {
			$this->error['error_title'] = $this->language->get( 'error_title' );
		}

		if ( !isset( $this->request->post['description']) || strlen( trim( $this->request->post['description'] ) ) < 10 || strlen( trim( $this->request->post['description'] ) ) > 256 ) {
			$this->error['error_description'] = $this->language->get( 'error_description' );
		}

		if ( !isset( $this->request->post['post_content']) || strlen( trim( $this->request->post['post_content'] ) ) < 50 ) {
			$this->error['error_content'] = $this->language->get( 'error_content' );
		}

		if ( !isset( $this->request->post['category_id']) || empty( $this->request->post['category_id'] ) ) {
			$this->error['error_category'] = $this->language->get( 'error_category' );
		}

		if ( !isset( $this->request->post['user_id']) || empty( $this->request->post['user_id'] ) ) {
			$this->error['error_author'] = $this->language->get( 'error_author' );
		}

		if ( isset( $this->request->files['thumb'] ) && !empty( $this->request->files['thumb'] ) && $this->request->files['thumb']['size'] > 0 ) {
			$this->load->model('tool/image');
			if ( !$this->model_tool_image->isValidImage( $this->request->files['thumb'] ) ) {
				$this->error['error_thumb'] = $this->language->get( 'error_thumb');
			}
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

	public function autocompleteName() {
		$this->load->model( 'branch/post' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_title'] ) ) {
			$filter_title = $this->request->get['filter_title'];
		}else {
			$filter_title = null;
		}

		$data = array(
			'filter_title' => $filter_title
		);

		$lPosts = $this->model_branch_post->getPosts( $data );

		$json = array();
		foreach ( $lPosts as $oPost ) {
			$json[] = array(
				'name' => html_entity_decode( $oPost->getName() ),
				'id' => $oPost->getId(),
			);
		}

		$this->response->setOutput( json_encode($json) );
	}
}
?>