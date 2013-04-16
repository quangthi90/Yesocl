<?php
class ControllerCompanyCompany extends Controller {
	private $limit = 10;
	private $error = array();
	private $route = 'company/company';

	public function index() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/company' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/company' );

		$this->getList();
	}

	public function insert() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/company' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/company' );

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
			if ( $this->model_company_company->addCompany( $this->request->post, $this->request->files['logo'] ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/company/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$this->getForm();
	}

	public function update() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/company' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/company' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];

			unset( $this->request->get['page'] );
		} else {
			$page = 1;
		}

		$url = '';
		$url .= '&page=' . $page;

		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( !isset( $this->request->files['logo'] ) ) {
				$this->request->files['logo'] = array();
			}

			if ( $this->model_company_company->editCompany( $this->request->get['company_id'], $this->request->post, $this->request->files['logo'] ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'company/company/update', 'token=' . $this->session->data['token'] . $url . '&company_id=' . $this->request->get['company_id'], 'SSL' );

		$this->getForm();
	}

	public function delete() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/company' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/company' );

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateDelete() ) {
			$this->model_company_company->deleteCompanies( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		$this->getList();
	}

	public function follower() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/company' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/company' );

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

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' ) {
			if ( isset( $this->request->get['query'] ) && $this->request->get['query'] == 'insert' ) {
				if ( !isset( $this->request->post['user_id'] ) || empty( $this->request->post['user_id'] ) ) {
					$this->data['error_warning'] = $this->language->get( 'error_follower' );
				}else {
					if ( !$this->model_company_company->addFollower( $this->request->get['company_id'], $this->request->post['user_id'] ) ) {
						$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
					}else {
						$this->session->data['success'] = $this->language->get( 'success' );

						$this->redirect( $this->url->link( 'company/company/follower', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
					}
				}
			}else {
				$this->model_company_company->removeFollowers( $this->request->get['company_id'], $this->request->post );

				$this->session->data['success'] = $this->language->get( 'success' );

				$this->redirect( $this->url->link( 'company/company/follower', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
			}
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_follower' ),
			'href'      => $this->url->link( 'company/company/follower', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ),
      		'separator' => ' :: '
   		);

		// heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );

		// column
		$this->data['column_fullname'] = $this->language->get( 'column_fullname' );
		$this->data['column_email'] = $this->language->get( 'column_email' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );

		// link
		$this->data['insert'] = $this->url->link( 'company/company/follower', 'token=' . $this->session->data['token'] . '&query=insert&company_id=' . $this->request->get['company_id'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'company/company/follower', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' );
		$this->data['back'] = $this->url->link( 'company/company' );
		$this->data['autocomplete_user'] = html_entity_decode( $this->url->link( 'user/user/searchUser', 'token=' . $this->session->data['token'], 'SSL' ) );

		// company
		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ) );
		}else {
			$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );

			if ( empty( $company ) ) {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

				$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ) );
			}
		}

		// followers
		$this->data['followers'] = array();
		foreach ( $company->getFollowers() as $follower ) {
			$this->data['followers'][] = array(
				'id' => $follower->getId(),
				'fullname' => $follower->getFullname(),
				'email' => $follower->getPrimaryEmail()->getEmail(),
				);
		}

		// id
		if ( isset( $this->request->post['user_id'] ) ) {
			$this->data['user_id'] = $this->request->post['user_id'];
		}else {
			$this->data['user_id'] = '';
		}

		// user
		if ( isset( $this->request->post['user'] ) ) {
			$this->data['user'] = $this->request->post['user'];
		}else {
			$this->data['user'] = '';
		}

		// template
		$this->template = 'company/company_follower.tpl';

		// children
		$this->children = array(
			'common/header',
			'common/footer',
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	public function relativeCompany() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'company/company' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'company/company' );

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

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' ) {
			if ( isset( $this->request->get['query'] ) && $this->request->get['query'] == 'insert' ) {
				if ( !isset( $this->request->post['company_id'] ) || empty( $this->request->post['company_id'] ) ) {
					$this->data['error_warning'] = $this->language->get( 'error_relative' );
				}else {
					if ( !$this->model_company_company->addRelativeCompany( $this->request->get['company_id'], $this->request->post['company_id'] ) ) {
						$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
					}else {
						$this->session->data['success'] = $this->language->get( 'success' );

						$this->redirect( $this->url->link( 'company/company/relativeCompany', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
					}
				}
			}else {
				$this->model_company_company->removeRelativeCompanies( $this->request->get['company_id'], $this->request->post );

				$this->session->data['success'] = $this->language->get( 'success' );

				$this->redirect( $this->url->link( 'company/company/relativeCompany', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' ) );
			}
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_relative_company' ),
			'href'      => $this->url->link( 'company/company/relativeCompany', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id']. 'SSL' ),
      		'separator' => ' :: '
   		);

		// heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );

		// column
		$this->data['column_company'] = $this->language->get( 'column_company' );
		$this->data['column_owner'] = $this->language->get( 'column_owner' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );

		// link
		$this->data['insert'] = $this->url->link( 'company/company/relativeCompany', 'token=' . $this->session->data['token'] . '&query=insert&company_id=' . $this->request->get['company_id'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'company/company/relativeCompany', 'token=' . $this->session->data['token'] . '&company_id=' . $this->request->get['company_id'], 'SSL' );
		$this->data['back'] = $this->url->link( 'company/company' );

		$this->data['autocomplete_company'] = html_entity_decode( $this->url->link( 'company/company/autocomplete', 'token=' . $this->session->data['token'], 'SSL' ) );
		
		// company
		if ( !isset( $this->request->get['company_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ) );
		}else {
			$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );

			if ( empty( $company ) ) {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

				$this->redirect( $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ) );
			}
		}

		// relativies
		$this->data['relativies'] = array();
		foreach ( $company->getRelativeCompanies() as $relative ) {
			$this->data['relativies'][] = array(
				'id' => $relative->getId(),
				'name' => $relative->getName(),
				'owner' => $relative->getOwner()->getPrimaryEmail()->getEmail(),
				);
		}

		// id
		if ( isset( $this->request->post['company_id'] ) ) {
			$this->data['company_id'] = $this->request->post['company_id'];
		}else {
			$this->data['company_id'] = '';
		}

		// company
		if ( isset( $this->request->post['company'] ) ) {
			$this->data['company'] = $this->request->post['company'];
		}else {
			$this->data['company'] = '';
		}

		// template
		$this->template = 'company/company_relative.tpl';

		// children
		$this->children = array(
			'common/header',
			'common/footer',
			);

		// render
		$this->response->setOutput( $this->render() );
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
			'href'      => $this->url->link( 'company/company', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_company'] = $this->language->get( 'column_company' );
		$this->data['column_owner'] = $this->language->get( 'column_owner' );
		$this->data['column_group'] = $this->language->get( 'column_group' );
		$this->data['column_created'] = $this->language->get( 'column_created' );
		$this->data['column_status'] = $this->language->get( 'column_status' );
		$this->data['column_action'] = $this->language->get( 'column_action' );
		$this->data['column_logo'] = $this->language->get( 'column_logo' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// link
		$this->data['insert'] = $this->url->link( 'company/company/insert', 'token=' . $this->session->data['token'], 'SSL' );
		$this->data['delete'] = $this->url->link( 'company/company/delete', 'token=' . $this->session->data['token'], 'SSL' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// company
		$companies = $this->model_company_company->getCompanies( $data );
		$total_companies = $this->model_company_company->getTotalCompanies( $data );

		$this->data['companies'] = array();
		if ( count( $companies ) ) {
			foreach ($companies as $company) {
				$action = array();

				$action[] = array(
					'text' => $this->language->get( 'text_post' ),
					'href' => $this->url->link( 'company/post', 'token=' . $this->session->data['token'] . '&company_id=' . $company->getId(), 'SSL' ),
					'icon' => 'icon-list',
					);

				$action[] = array(
					'text' => $this->language->get( 'text_career' ),
					'href' => $this->url->link( 'company/career', 'token=' . $this->session->data['token'] . '&company_id=' . $company->getId(), 'SSL' ),
					'icon' => 'icon-list',
					);

				$action[] = array(
					'text' => $this->language->get( 'text_follower' ),
					'href' => $this->url->link( 'company/company/follower', 'token=' . $this->session->data['token'] . '&company_id=' . $company->getId(), 'SSL' ),
					'icon' => 'icon-list',
					);

				$action[] = array(
					'text' => $this->language->get( 'text_relative_company' ),
					'href' => $this->url->link( 'company/company/relativeCompany', 'token=' . $this->session->data['token'] . '&company_id=' . $company->getId(), 'SSL' ),
					'icon' => 'icon-list',
					);

				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'company/company/update', 'token=' . $this->session->data['token'] . '&company_id=' . $company->getId(), 'SSL' ),
					'icon' => 'icon-edit',
					);

				$this->data['companies'][] = array(
					'id' => $company->getId(),
					'logo' => HTTP_IMAGE . $company->getLogo(),
					'name' => $company->getName(),
					'owner' => $company->getOwner()->getPrimaryEmail()->getEmail(),
					'group' => $company->getGroup()->getName(),
					'created' => $company->getCreated()->format( 'd/m/Y' ),
					'status' => $company->getStatus(),
					'action' => $action,
					);
			}
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $total_companies;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . '&page={page}', 'SSL' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'company/company_list.tpl';

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

		if ( isset( $this->error['error_logo'] ) ) {
			$this->data['error_logo'] = $this->error['error_logo'];
		}else {
			$this->data['error_logo'] = '';
		}

		if ( isset( $this->error['error_owner'] ) ) {
			$this->data['error_owner'] = $this->error['error_owner'];
		}else {
			$this->data['error_owner'] = '';
		}

		if ( isset( $this->error['error_group'] ) ) {
			$this->data['error_group'] = $this->error['error_group'];
		}else {
			$this->data['error_group'] = '';
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
		$url .= '&page=' . $page;

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . $url, 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_logo'] = $this->language->get( 'entry_logo' );
		$this->data['entry_status'] = $this->language->get( 'entry_status' );
		$this->data['entry_group'] = $this->language->get( 'entry_group' );
		$this->data['entry_owner'] = $this->language->get( 'entry_owner' );
		$this->data['entry_description'] = $this->language->get( 'entry_description' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'company/company', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['autocomplete_user'] = html_entity_decode( $this->url->link( 'user/user/searchUser', 'token=' . $this->session->data['token'], 'SSL' ) );

		// image 
		$this->data['img_default'] = HTTP_IMAGE . 'no_image.jpg';

		// company
		if ( isset( $this->request->get['company_id'] ) ) {
			$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );

			if ( empty( $company ) ) {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// name
		if ( isset( $this->request->post['name'] ) ) {
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset( $company ) ) {
			$this->data['name'] = $company->getName();
		}else {
			$this->data['name'] = '';
		}

		// owner
		if ( isset( $this->request->post['owner'] ) ) {
			$this->data['owner'] = $this->request->post['owner'];
		}elseif ( isset( $company ) ) {
			$this->data['owner'] = $company->getOwner()->getPrimaryEmail()->getEmail();
		}else {
			$this->data['owner'] = '';
		}

		if ( isset( $this->request->post['user_id'] ) ) {
			$this->data['user_id'] = $this->request->post['user_id'];
		}elseif ( isset( $company ) ) {
			$this->data['user_id'] = $company->getOwner()->getId();
		}else {
			$this->data['user_id'] = '';
		}

		// logo
		if ( isset( $company ) && trim( $company->getLogo() ) != '' ) {
			$this->data['img_logo'] = HTTP_IMAGE . $company->getLogo();
		}else {
			$this->data['img_logo'] = $this->data['img_default'];
		}

		// group
		$this->load->model( 'company/group' );
		$groups = $this->model_company_group->getAllGroups();
		$this->data['groups'] = array();
		foreach ($groups as $group) {
			$this->data['groups'][] = array(
				'id' => $group->getId(),
				'name' => $group->getName(),
				);
		}
		if ( isset( $this->request->post['group'] ) ) {
			$this->data['group'] = $this->request->post['group'];
		}elseif ( isset( $company ) ) {
			$this->data['group'] = $company->getGroup()->getId();
		}else {
			$this->data['group'] = '';
		}

		// description
		if ( isset( $this->request->post['description'] ) ) {
			$this->data['description'] = $this->request->post['description'];
		}elseif ( isset( $company ) ) {
			$this->data['description'] = $company->getDescription();
		}else {
			$this->data['description'] = '';
		}

		// status
		if ( isset( $this->request->post['status'] ) ) {
			$this->data['status'] = $this->request->post['status'];
		}elseif ( isset( $company ) ) {
			$this->data['status'] = $company->getStatus();
		}else {
			$this->data['status'] = 1;
		}

		// template
		$this->template = 'company/company_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		$this->load->model( 'company/company' );
		if ( !isset( $this->request->post['name']) || strlen( trim( $this->request->post['name'] ) ) < 1 || strlen( trim( $this->request->post['name'] ) ) > 128  ) {
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}else {
			if ( isset( $this->request->get['company_id'] ) ) {
				$company = $this->model_company_company->getCompany( $this->request->get['company_id'] );
				if ( !empty( $company ) ) {
					if ( $this->model_company_company->isExistName( $this->request->post['name'] ) && $company->getName() != strtolower( trim( $this->request->post['name'] ) ) ) {
						$this->error['error_name'] = $this->language->get( 'error_name_exist' );
					}
				}
			}
		}

		if ( isset( $this->request->files['logo'] ) && !empty( $this->request->files['logo'] ) ) {
			if ( !$this->model_company_company->isValidLogo( $this->request->files['logo'] ) ) {
				$this->error['error_logo'] = $this->language->get( 'error_logo');
			}
		}

		if ( !isset( $this->request->post['description']) || strlen( trim( $this->request->post['description'] ) ) < 50 || strlen( trim( $this->request->post['description'] ) ) > 256 ) {
			$this->error['error_description'] = $this->language->get( 'error_description' );
		}

		if ( !isset( $this->request->post['user_id']) || empty( $this->request->post['user_id'] ) ) {
			$this->error['error_owner'] = $this->language->get( 'error_owner' );
		}

		if ( !isset( $this->request->post['group']) || empty( $this->request->post['group'] ) ) {
			$this->error['error_group'] = $this->language->get( 'error_group' );
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

		$this->load->model( 'company/company' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		$data = array(
			'sort' => $sort,
			'filter_name' => $filter_name,
			'start' => 0,
			'limit' => 10,
			);

		$companies = $this->model_company_company->getCompanies( $data );

		$json = array();
		foreach ( $companies as $company ) {
			$json[] = array(
				'id' => $company->getId(),
				'name' => $company->getName(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>