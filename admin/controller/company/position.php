<?php
class ControllerCompanyPosition extends Controller {
	private $limit = 10;
	private $error = array();
	private $route = 'company/position';

	public function index() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/position' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/position' );

		$this->getList();
	}

	public function insert() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/position' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/position' );

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
			if ( $this->model_company_position->addPosition( $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/position', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/position/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$this->getForm();
	}

	public function update() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/position' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/position' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		$url .= '&page=' . $page;

		if ( !isset( $this->request->get['position_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/position', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_position->editPosition( $this->request->get['position_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/position', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/position/update', 'token=' . $this->session->data['token'] . $url . '&position_id=' . $this->request->get['position_id'], 'SSL' );

		$this->getForm();
	}

	public function delete() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/position' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/position' );

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateDelete() ) {
			$this->model_company_position->deletePositions( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'company/position', 'token=' . $this->session->data['token'], 'SSL' ) );
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
			'href'      => $this->url->link( 'company/position', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_position'] = $this->language->get( 'column_position' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// link
		$this->data['insert'] = $this->url->link( 'company/position/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'company/position/delete', 'token=' . $this->session->data['token'], 'SSL' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// position
		$positions = $this->model_company_position->getPositions( $data );
		$total_positions = $this->model_company_position->getTotalPositions( $data );

		$this->data['positions'] = array();
		foreach ($positions as $position) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get( 'text_edit' ),
				'href' => $this->url->link( 'company/position/update', 'token=' . $this->session->data['token'] . '&position_id=' . $position->getId(), 'SSL' ),
				'icon' => 'icon-edit',
				);

			$this->data['positions'][] = array(
				'id' => $position->getId(),
				'name' => $position->getName(),
				'status' => $position->getStatus(),
				'action' => $action,
				);
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $total_positions;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'company/position', 'token=' . $this->session->data['token'] . '&page={page}', 'SSL' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'company/position_list.tpl';

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
			'href'      => $this->url->link( 'company/position', 'token=' . $this->session->data['token'] . $url, 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_branch'] = $this->language->get( 'entry_branch' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'company/position', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['autocomplete_branch'] = html_entity_decode( $this->url->link( 'company/branch/autocomplete', 'token=' . $this->session->data['token'], 'SSL' ) );

		// position
		if ( isset( $this->request->get['position_id'] ) ) {
			$position = $this->model_company_position->getPosition( $this->request->get['position_id'] );

			if ( empty( $position ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// name
		if ( isset( $this->request->post['name'] ) ) {
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset( $position ) ) {
			$this->data['name'] = $position->getName();
		}else {
			$this->data['name'] = '';
		}

		// branch
		if ( isset( $this->request->post['branchs'] ) ) {
			$this->data['branchs'] = $this->request->post['branchs'];
		}elseif ( isset( $position ) ) {
			$this->data['branchs'] = array();
			foreach ($position->getBranchs() as $branch) {
				$this->data['branchs'][] = array(
					'id' => $branch->getId(),
					'name' => $branch->getName(),
					);
			}
		}else {
			$this->data['branchs'] = array();
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $position ) ) {
			$this->data['status'] = $position->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// template
		$this->template = 'company/position_form.tpl';

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
			if ( isset( $this->request->get['position_id'] ) ) {
				$this->load->model( 'company/position' );

				$position = $this->model_company_position->getPosition( $this->request->get['position_id'] );
				if ( !empty( $position ) ) {
					if ( $this->model_company_position->isExistName( $this->request->post['name'] ) && $position->getName() != strtolower( trim( $this->request->post['name'] ) ) ) {
						$this->error['error_name'] = $this->language->get( 'error_name_exist' );
					}
				}
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
	}
}
?>