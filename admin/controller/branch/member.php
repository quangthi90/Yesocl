<?php
class ControllerBranchMember extends Controller {
	private $limit = 10;
	private $error = array();
	private $route = 'branch/member';

	public function index() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/member' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/member' );

		$this->getList();
	}

	public function insert() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/member' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/member' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		
		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		$url .= '&page=' . $page;

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_branch_member->add($this->request->get['branch_id'], $this->request->post) ) {
				$this->session->data['success'] = $this->language->get('success');
			}else {
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			}

			$this->redirect( $this->url->link( 'branch/member', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
		}

		$this->getList();
	}

	public function delete() {
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'branch/member' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'branch/member' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		
		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		$url .= '&page=' . $page;

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' ) {
			$this->model_branch_member->delete( $this->request->get['branch_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'branch/member', 'token=' . $this->session->data['token'] . $url, 'SSL' ) );
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

		if ( !empty($this->request->get['branch_id']) ){
			$url .= '&branch_id=' . $this->request->get['branch_id'];
		}

		$url .= '&page=' . $page;

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'branch/member', 'token=' . $this->session->data['token'], 'SSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_enable'] = $this->language->get( 'text_enable' );
		$this->data['text_disable'] = $this->language->get( 'text_disable' );

		// column
		$this->data['column_username'] = $this->language->get( 'column_username' );
		$this->data['column_fullname'] = $this->language->get( 'column_fullname' );
		$this->data['column_action'] = $this->language->get( 'column_action' );
		$this->data['column_email'] = $this->language->get( 'column_email' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// link
		$this->data['insert'] = $this->url->link( 'branch/member/insert', 'token=' . $this->session->data['token'] . $url, 'SSL' );
		$this->data['delete'] = $this->url->link( 'branch/member/delete', 'token=' . $this->session->data['token'] . $url, 'SSL' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
		);

		// branch
		$this->load->model('branch/branch');
		$branch_id = $this->request->get['branch_id'];
		$branch = $this->model_branch_branch->getBranch( $branch_id );

		if ( !$branch ){
			$this->session->data['error_warning'] = $this->language->get( 'error_branch_empty' );
			$this->redirect( $this->url->link( 'branch/branch', 'token=' . $this->session->data['token'], 'SSL' ) );
		}

		$lMembers = $branch->getMembers();

		$this->data['members'] = array();
		if ( $lMembers ){
			foreach ($lMembers as $oMember) {
				$this->data['members'][] = array(
					'id' 			=> $oMember->getId(),
					'username' 		=> $oMember->getUsername(),
					'fullname' 		=> $oMember->getFullname(),
					'email'			=> $oMember->getPrimaryEmail()->getEmail()
				);
			}
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $lMembers->count();
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'branch/member', 'token=' . $this->session->data['token'] . '&page={page}', 'SSL' );

		$this->data['pagination'] = $pagination->render();
		$this->data['token'] =  $this->session->data['token'];

		// template
		$this->template = 'branch/member_list.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		if ( empty( $this->request->post['member_id']) ) {
			$this->error['error_warning'] = $this->language->get('error_member_empty');
		}

		if ( $this->error ) {
			return false;
		}else {
			return true;
		}
	}
}
?>