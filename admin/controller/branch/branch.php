<?php
class ControllerBranchBranch extends Controller {
	private $limit = 10;
	private $error = array();
	private $route = 'branch/branch';

	public function index() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/branch' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/branch' );

		$this->getList();
	}

	public function insert() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/branch' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/branch' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= '&page=' . $page;

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( !isset( $this->request->files['logo'] ) ) {
				$this->request->files['logo'] = array();
			}

			if ( $this->model_branch_branch->addBranch($this->request->post, $this->request->files['logo']) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_insert' );
			}

			$this->redirect( $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'branch/branch/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$this->getForm();
	}

	public function update() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/branch' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/branch' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= '&page=' . $page;

		if ( !isset( $this->request->get['branch_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_update' );

			$this->redirect( $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( !isset( $this->request->files['logo'] ) ) {
				$this->request->files['logo'] = array();
			}

			if ( $this->model_branch_branch->editBranch($this->request->get['branch_id'], $this->request->post, $this->request->files['logo']) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'branch/branch/update', 'token=' . $this->session->data['token'] . $url . '&branch_id=' . $this->request->get['branch_id'], 'SSL' );

		$this->getForm();
	}

	public function delete() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/branch' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/branch' );

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateDelete() ) {
			$this->model_branch_branch->deleteBranches( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->getList();
	}

	private function getList() {
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
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_branch'] = $this->language->get( 'column_branch' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );
		$this->data['column_order'] = $this->language->get( 'column_order' );
		$this->data['column_logo'] = $this->language->get( 'column_logo' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// link
		$this->data['insert'] = $this->url->link( 'branch/branch/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'branch/branch/delete', 'token=' . $this->session->data['token'], 'SSL' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// branch
		$branches = $this->model_branch_branch->getBranches( $data );

		$this->data['branches'] = array();
		if ( $branches ){
			foreach ($branches as $branch) {
				$action = array();

				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'branch/branch/update', 'token=' . $this->session->data['token'] . '&branch_id=' . $branch->getId(), 'SSL' ),
					'icon' => 'icon-edit',
				);

				$action[] = array(
					'text' => $this->language->get( 'button_post' ),
					'href' => $this->url->link( 'branch/post', 'token=' . $this->session->data['token'] . '&branch_id=' . $branch->getId(), 'SSL' ),
					'icon' => 'icon-list',
				);

				$action[] = array(
					'text' => $this->language->get( 'button_members' ),
					'href' => $this->url->link( 'branch/member', 'token=' . $this->session->data['token'] . '&branch_id=' . $branch->getId(), 'SSL' ),
					'icon' => 'icon-user',
				);

				$this->data['branches'][] = array(
					'id' 		=> $branch->getId(),
					'name' 		=> $branch->getName(),
					'status' 	=> $branch->getStatus(),
					'order' 	=> $branch->getOrder(),
					'logo' 		=> HTTP_IMAGE . $branch->getLogo(),
					'action' 	=> $action,
				);
			}
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $branches->count();
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'] . '&page={page}', 'SSL' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'branch/branch_list.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function getForm() {
		// catch errors
		if ( isset( $this->session->data['error_warning'] ) ) {
			$this->data['error_warning'] = $this->session->data['error_warning'];

			unset( $this->session->data['error_warning'] );
		} elseif ( isset( $this->error['error_warning'] ) ) {
			$this->data['error_warning'] = $this->error['error_warning'];
		}else {
			$this->data['error_warning'] = '';
		}

		if ( isset( $this->error['error_name'] ) ) {
			$this->data['error_name'] = $this->error['error_name'];
		}else {
			$this->data['error_name'] = '';
		}

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= '&page=' . $page;

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'] . $url, 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_order'] = $this->language->get( 'entry_order' );
		$this->data['entry_logo'] = $this->language->get( 'entry_logo' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		// branch
		if ( isset( $this->request->get['branch_id'] ) ) {
			$branch = $this->model_branch_branch->getBranch( $this->request->get['branch_id'] );

			if ( empty( $branch ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// name
		if ( isset( $this->request->post['name'] ) ) {
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset( $branch ) ) {
			$this->data['name'] = $branch->getName();
		}else {
			$this->data['name'] = '';
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $branch ) ) {
			$this->data['status'] = $branch->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// order
		if ( isset($this->request->post['order']) ){
			$this->data['order'] = $this->request->post['order'];
		}elseif ( isset($branch) ){
			$this->data['order'] = $branch->getOrder();
		}else {
			$this->data['order'] = 0;
		}

		// logo
		if ( isset( $branch ) && trim( $branch->getLogo() ) != '' ) {
			$this->data['img_logo'] = HTTP_IMAGE . $branch->getLogo();
		}else {
			$this->data['img_logo'] = $this->data['img_default'];
		}

		// template
		$this->template = 'branch/branch_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
		);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		if ( !isset( $this->request->post['name']) || strlen( trim( $this->request->post['name'] ) ) < 1 || strlen( trim( $this->request->post['name'] ) ) > 128  ) {
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}

		if ( isset( $this->request->files['logo'] ) && !empty( $this->request->files['logo'] ) && $this->request->files['logo']['size'] > 0 ) {
			$this->load->model('tool/image');
			if ( !$this->model_tool_image->isValidImage( $this->request->files['logo'] ) ) {
				$this->error['error_logo'] = $this->language->get( 'error_logo');
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

	public function autocomplete() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		$data = array(
			'filter_name' => $filter_name,
			);

		$this->load->model( 'branch/branch' );
		$branches = $this->model_branch_branch->getBranches( $data );

		$json = array();
		foreach ($branches as $branch) {
			$json[] = array(
				'name' => $branch->getName(),
				'id' => $branch->getId(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function getCategory() {
		if ( isset( $this->request->get['branch_id'] ) ) {
			$branch_id = $this->request->get['branch_id'];
		}else {
			return null;
		}

		$this->load->model( 'branch/branch' );
		$branch = $this->model_branch_branch->getBranch( $branch_id );
		
		$json = array();
		foreach ($branch->getCategories() as $category) {
			$json[] = array(
				'name' => $category->getName(),
				'id' => $category->getId(),
			);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>