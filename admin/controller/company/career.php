<?php
class ControllerCompanyCareer extends Controller {
	private $limit = 10;
	private $error = array();
	private $route = 'company/career';

	public function index() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/career' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_company' );
			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'] ) );
		}

		$this->load->model( 'company/career' );

		$this->getList();
	}

	public function insert() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/career' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_company' );
			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'] ) );
		}

		$this->load->model( 'company/career' );

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_career->addCareer( $this->request->get['company_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/career/insert', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' );

		$this->getForm();
	}

	public function update() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/career' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_company' );
			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'] ) );
		}

		$this->load->model( 'company/career' );

		if ( !isset( $this->request->get['career_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_company_career->editCareer( $this->request->get['career_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/career/update', 'token=' . $this->session->data['token']. '&company_id=' . $this->request->get['company_id'] . '&career_id=' . $this->request->get['career_id'], 'SSL' );

		$this->getForm();
	}

	public function delete() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/career' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_company' );
			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'] ) );
		}

		$this->load->model( 'company/career' );

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateDelete() ) {
			$this->model_company_career->deleteCareers( $this->request->get['company_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
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

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_company' ),
			'href'      => $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_user'] = $this->language->get( 'column_user' );
		$this->data['column_position'] = $this->language->get( 'column_position' );
		$this->data['column_updated'] = $this->language->get( 'column_updated' );
		$this->data['column_joined'] = $this->language->get( 'column_joined' );
		$this->data['column_action'] = $this->language->get( 'column_action' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );

		// link
		$this->data['insert'] = $this->url->link( 'company/career/insert', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'company/career/delete', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// career
		$careers = $this->model_company_career->getCareers( $this->request->get['company_id'], $data );
		$total_careers = count( $careers );

		$this->data['careers'] = array();
		foreach ($careers as $career) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get( 'text_edit' ),
				'href' => $this->url->link( 'company/career/update', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'] . '&career_id=' . $career->getId(), 'SSL' ),
				'icon' => 'icon-edit',
				);

			$this->data['careers'][] = array(
				'id' => $career->getId(),
				'user' => $career->getUser()->getUsername() . '(' . $career->getUser()->getPrimaryEmail()->getEmail() . ')',
				'position' => $career->getPosition()->getName(),
				'updated' => $career->getUpdated()->format( 'd/m/Y' ),
				'joined' => $career->getJoined()->format( 'd/m/Y' ),
				'action' => $action,
				);
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $total_careers;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'] . '&page={page}', 'SSL' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'company/career_list.tpl';

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

		if ( isset( $this->error['error_user'] ) ) {
			$this->data['error_user'] = $this->error['error_user'];
		}else {
			$this->data['error_user'] = '';
		}

		if ( isset( $this->error['error_position'] ) ) {
			$this->data['error_position'] = $this->error['error_position'];
		}else {
			$this->data['error_position'] = '';
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
       		'text'      => $this->language->get( 'text_company' ),
			'href'      => $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . $url, 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'] . $url, 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_user'] = $this->language->get( 'entry_user' );
		$this->data['entry_position'] = $this->language->get( 'entry_position' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['autocomplete_user'] = html_entity_decode( $this->url->link( 'user/user/searchUser', 'token=' . $this->session->data['token'], 'SSL' ) );

		// career
		if ( isset( $this->request->get['career_id'] ) ) {
			$career = $this->model_company_career->getCareer( $this->request->get['career_id'], $this->request->get['company_id'] );

			if ( empty( $career ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// user
		if ( isset( $this->request->post['user_id'] ) ) {
			$this->data['user_id'] = $this->request->post['user_id'];
		}elseif ( isset( $career ) ) {
			$this->data['user_id'] = $career->getUser()->getId();
		}else {
			$this->data['user_id'] = '';
		}
		if ( isset( $this->request->post['user'] ) ) {
			$this->data['user'] = $this->request->post['user'];
		}elseif ( isset( $career ) ) {
			$this->data['user'] = $career->getUser()->getUsername() . '(' . $career->getUser()->getPrimaryEmail()->getEmail() . ')';
		}else {
			$this->data['user'] = '';
		}

		// position
		if ( isset( $this->request->post['position'] ) ) {
			$this->data['position'] = $this->request->post['position'];
		}elseif ( isset( $career ) ) {
			$this->data['position'] = $career->getPosition()->getId();
		}else {
			$this->data['position'] = 0;
		}

		$this->load->model( 'company/position' );
		$positions = $this->model_company_position->getAllPositions();
		$this->data['positions'] = array();
		foreach ($positions as $position) {
			$this->data['positions'][] = array(
				'id' => $position->getId(),
				'name' => $position->getName(),
				);
		} 

		// template
		$this->template = 'company/career_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		if ( !isset( $this->request->post['user_id'] ) ) {
			$this->error['error_user'] = $this->language->get( 'error_user' );
		}else {
			$this->load->model( 'company/career' );
			if ( $this->request->get['career_id'] ) {
				if ( $this->model_company_career->isExistUser( $this->request->post['user_id'], $this->request->get['company_id'] ) && $this->model_company_career->getCareer( $this->request->get['career_id'], $this->request->get['company_id'] )->getId() != $this->request->post['user_id'] ) {
					$this->error['error_user'] = $this->language->get( 'error_exist_user' );
				}
			}elseif ( $this->model_company_career->isExistUser( $this->request->post['user_id'], $this->request->get['company_id'] ) ) {
				$this->error['error_user'] = $this->language->get( 'error_exist_user' );
			}
		}

		if ( !isset( $this->request->post['position'] ) ) {
			$this->error['position'] = $this->language->get( 'position' );
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