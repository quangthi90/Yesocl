<?php
class ControllerSettingConfig extends Controller {
	private $limit = 10;
	private $error = array();

	public function index() {
		$this->load->language( 'setting/config' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'setting/config' );

		$this->getList();
	}

	public function insert() {
		$this->load->language( 'setting/config' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'setting/config' );

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
			if ( $this->model_setting_config->addConfig( $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'setting/config', $url ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'setting/config/insert', $url );

		$this->getForm();
	}

	public function update() {
		$this->load->language( 'setting/config' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'setting/config' );

		// page
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];

			unset( $this->request->get['page'] );
		} else {
			$page = 1;
		}

		$url = '';
		$url .= 'page=' . $page;

		if ( !isset( $this->request->get['config_id'] ) ) {
			$this->session->data['error_warning'] = $this->language->get( 'error_warning' );

			$this->redirect( $this->url->link( 'setting/config' ) );
		}

		// request
		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateForm() ) {
			if ( $this->model_setting_config->editConfig( $this->request->get['config_id'], $this->request->post ) ) {
				$this->session->data['success'] = $this->language->get( 'success' );
			}else {
				$this->session->data['error_warning'] = $this->language->get( 'error_warning' );
			}

			$this->redirect( $this->url->link( 'setting/config', $url ) );
		}

		// action
		$this->data['action'] = $this->url->link( 'setting/config/update', $url . '&config_id=' . $this->request->get['config_id'] );

		$this->getForm();
	}

	public function delete() {
		$this->load->language( 'setting/config' );

		$this->document->setTitle( $this->language->get( 'heading_title' ) );

		$this->load->model( 'setting/config' );

		if ( $this->request->server['REQUEST_METHOD'] == 'POST' && $this->isValidateDelete() ) {
			$this->model_setting_config->deleteConfig( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'success' );

			$this->redirect( $this->url->link( 'setting/config' ) );
		}

		$this->getList();
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
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'setting/config' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );

		// column
		$this->data['column_key'] = $this->language->get( 'column_key' );
		$this->data['column_value'] = $this->language->get( 'column_value' );
		$this->data['column_action'] = $this->language->get( 'column_action' );

		// button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );

		// link
		$this->data['insert'] = $this->url->link( 'setting/config/insert' );
		$this->data['delete'] = $this->url->link( 'setting/config/delete' );

		$data = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit,
			);

		// config
		$configs = $this->model_setting_config->getConfigs( $data );
		$total_configs = $this->model_setting_config->getTotalConfigs( $data );

		$this->data['configs'] = array();
		foreach ($configs as $config) {
			$action = array();

				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'setting/config/update', 'config_id=' . $config->getId() ),
					'icon' => 'icon-edit',
					);

				$this->data['configs'][] = array(
					'id' => $config->getId(),
					'key' => $config->getKey(),
					'value' => $config->getValue(),
					'action' => $action,
					);
		}

		// pagination
		$pagination = new Pagination();
		$pagination->total = $total_configs;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get( 'text_pagination' );
		$pagination->url = $this->url->link( 'setting/config', '&page={page}', 'SSl' );

		$this->data['pagination'] = $pagination->render();

		// template
		$this->template = 'setting/config_list.tpl';

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

		if ( isset( $this->error['error_key'] ) ) {
			$this->data['error_key'] = $this->error['error_key'];
		}else {
			$this->data['error_key'] = '';
		}

		if ( isset( $this->error['error_value'] ) ) {
			$this->data['error_value'] = $this->error['error_value'];
		}else {
			$this->data['error_value'] = '';
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
			'href'      => $this->url->link( 'setting/config', $url ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// entry
		$this->data['entry_key'] = $this->language->get( 'entry_key' );
		$this->data['entry_value'] = $this->language->get( 'entry_value' );

		// button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );

		// link
		$this->data['cancel'] = $this->url->link( 'setting/config', $url );

		// config
		if ( isset( $this->request->get['config_id'] ) ) {
			$config = $this->model_setting_config->getConfig( $this->request->get['config_id'] );
		}

		// key
		if ( isset( $this->request->post['key'] ) ) {
			$this->data['key'] = $this->request->post['key'];
		}elseif ( isset( $config ) ) {
			$this->data['key'] = $config->getKey();
		}else {
			$this->data['key'] = '';
		}

		// value
		if ( isset( $this->request->post['value'] ) ) {
			$this->data['value'] = $this->request->post['value'];
		}elseif ( isset( $config ) ) {
			$this->data['value'] = $config->getValue();
		}else {
			$this->data['value'] = '';
		}

		// template
		$this->template = 'setting/config_form.tpl';

		// childs
		$this->children = array(
			'common/header',
			'common/footer'
			);

		// render
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm() {
		if ( !isset( $this->request->post['key']) || strlen( trim( $this->request->post['key'] ) ) < 1 || strlen( trim( $this->request->post['key'] ) ) > 128  ) {
			$this->error['error_key'] = $this->language->get( 'error_key' );
		}else {
			$this->load->model( 'setting/config' );
			if ( isset( $this->request->get['config_id'] ) ) {
				$config = $this->model_setting_config->getConfig( $this->request->get['config_id'] );
				if ( !empty( $config ) ) {
					if ( $this->model_setting_config->isExistKey( $this->request->post['key'] ) && $config->getKey() != strtolower( trim( $this->request->post['key'] ) ) ) {
						$this->error['error_key'] = $this->language->get( 'error_key_exist' );
					}
				}
			}else {
				if ( $this->model_setting_config->isExistKey( $this->request->post['key'] ) ) {
					$this->error['error_key'] = $this->language->get( 'error_key_exist' );
				}
			}
		}

		if ( !isset( $this->request->post['value']) || strlen( trim( $this->request->post['value'] ) ) < 1 ) {
			$this->error['error_value'] = $this->language->get('error_value');
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

	public function isExistKey() {

	}
}
?>