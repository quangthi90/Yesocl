<?php
class ControllerCompanyGroup extends Controller {
	private $limit = 10;
	private $error = array();

	public function index() {
		$this->load->language( 'company/group' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/group' );

		$this->getList();
	}

	public function insert() {
		$this->load->language( 'company/group' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/group' );

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
			if ( $this->model_company_group->addGroup( $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/group', $url ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/group/insert', $url );

		$this->getForm();
	}

	public function update() {
		$this->load->language( 'company/group' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/group' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		if ( !isset( $this->request->get['group_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/group' ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_group->editGroup( $this->request->get['group_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/group', $url ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/group/update', $url . '&group_id=' . $this->request->get['group_id'] );

		$this->getForm();
	}

	public function delete() {
		$this->load->language( 'company/group' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/group' );

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateDelete() ) {
			$this->model_company_group->deleteGroups( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'company/group' ) );
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
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/group' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_group'] = $this->language->get( 'column_group' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// link
		$this->data['insert'] = $this->url->link( 'company/group/insert' );
		$this->data['delete'] = $this->url->link( 'company/group/delete' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// group
		$groups = $this->model_company_group->getGroups( $data );
		$total_groups = $this->model_company_group->getTotalGroups( $data );

		$this->data['groups'] = array();
		foreach ($groups as $group) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get( 'text_edit' ),
				'href' => $this->url->link( 'company/group/update', 'group_id=' . $group->getId() ),
				'icon' => 'icon-edit',
				);

			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName(),
				'status' => $group->getStatus(),
				'action' => $action,
				);
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $total_groups;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'company/group', '&page={page}', 'SSl' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'company/group_list.tpl';

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

		if ( isset( $this->error['error_description'] ) ) {
			$this->data['error_description'] = $this->error['error_description'];
		}else {
			$this->data['error_description'] = '';
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
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/group', $url ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_description'] = $this->language->get( 'entry_description' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'company/group', $url );

		// group
		if ( isset( $this->request->get['group_id'] ) ) {
			$group = $this->model_company_group->getGroup( $this->request->get['group_id'] );

			if ( empty( $group ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// name
		if ( isset( $this->request->post['name'] ) ) {
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset( $group ) ) {
			$this->data['name'] = $group->getName();
		}else {
			$this->data['name'] = '';
		}

		// description
		if ( isset( $this->request->post['description'] ) ) {
			$this->data['description'] = $this->request->post['description'];
		}elseif ( isset( $group ) ) {
			$this->data['description'] = $group->getDescription();
		}else {
			$this->data['description'] = '';
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $group ) ) {
			$this->data['status'] = $group->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// template
		$this->template = 'company/group_form.tpl';

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
		}else {
			if ( isset( $this->request->get['group_id'] ) ) {
				$this->load->model( 'company/group' );

				$group = $this->model_company_group->getGroup( $this->request->get['group_id'] );
				if ( !empty( $group ) ) {
					if ( $this->model_company_group->isExistName( $this->request->post['name'] ) && $group->getName() != strtolower( trim( $this->request->post['name'] ) ) ) {
						$this->error['error_name'] = $this->language->get( 'error_name_exist' );
					}
				}else {
					if ( $this->model_company_group->isExistName( $this->request->post['name'] ) ) {
						$this->error['error_name'] = $this->language->get( 'error_name_exist' );
					}
				}
			}
		}

		if ( !isset( $this->request->post['description']) || strlen( trim( $this->request->post['description'] ) ) < 50 || strlen( trim( $this->request->post['description'] ) ) > 256 ) {
			$this->error['error_description'] = $this->language->get( 'error_description' );
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
	}
}
?>