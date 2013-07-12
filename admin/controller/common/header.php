<?php 
class ControllerCommonHeader extends Controller {
	protected function index() {
		$this->data['title'] = $this->document->getTitle(); 
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = HTTPS_SERVER;
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
		
		$this->data['description'] = $this->document->getDescription();
		$this->data['keywords'] = $this->document->getKeywords();
		$this->data['links'] = $this->document->getLinks();	
		$this->data['styles'] = $this->document->getStyles();
		$this->data['scripts'] = $this->document->getScripts();
		$this->data['lang'] = $this->language->get('code');
		$this->data['direction'] = $this->language->get('direction');
		
		$this->load->language('common/header');

		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_logout'] = $this->language->get('text_logout');
		
		// User
		$this->data['text_users'] = $this->language->get('text_users');
		
		$this->data['text_group_manage'] = $this->language->get('text_group_manage');
		$this->data['text_group'] = $this->language->get('text_group');
		$this->data['text_group_type'] = $this->language->get('text_group_type');
		
		$this->data['text_user'] = $this->language->get('text_user');
		$this->data['text_user_group'] = $this->language->get('text_user_group');
		$this->data['text_user_manage'] = $this->language->get('text_user_manage');
		
		$this->data['text_admin'] = $this->language->get('text_admin');
		$this->data['text_admin_group'] = $this->language->get('text_admin_group');
		$this->data['text_admin_manage'] = $this->language->get('text_admin_manage');
		
		// Company
		$this->data['text_companies'] = $this->language->get('text_companies');
		$this->data['text_company'] = $this->language->get('text_company');
		$this->data['text_company_group'] = $this->language->get('text_company_group');

		// Branch
		$this->data['text_branchs'] = $this->language->get('text_branchs');
		$this->data['text_branch'] = $this->language->get('text_branch');
		$this->data['text_position'] = $this->language->get('text_position');
		$this->data['text_category'] = $this->language->get('text_category');
		
		// Attribute
		$this->data['text_attributes'] = $this->language->get('text_attributes');
		$this->data['text_attribute_group'] = $this->language->get('text_attribute_group');
		$this->data['text_attribute'] = $this->language->get('text_attribute');
		$this->data['text_attribute_type'] = $this->language->get('text_attribute_type');
		
		
		// System
		$this->data['text_system'] = $this->language->get('text_system');
		$this->data['text_admin'] = $this->language->get('text_admin');
		$this->data['text_admin_group'] = $this->language->get('text_admin_group');
		$this->data['text_admin_user'] = $this->language->get('text_admin_user');

		$this->data['text_design'] = $this->language->get('text_design');
		$this->data['text_layout'] = $this->language->get('text_layout');
		$this->data['text_action'] = $this->language->get('text_action');

		$this->data['text_setting'] = $this->language->get('text_setting');
		
		$this->data['text_localisation'] = $this->language->get('text_localisation');
		$this->data['text_country'] = $this->language->get('text_country');
		$this->data['text_city'] = $this->language->get('text_city');
		$this->data['text_district'] = $this->language->get('text_district');
		$this->data['text_ward'] = $this->language->get('text_ward');
		$this->data['text_street'] = $this->language->get('text_street');

		$this->data['text_data_list'] = $this->language->get('text_data_list');
		$this->data['text_type'] = $this->language->get('text_type');
		$this->data['text_value'] = $this->language->get('text_value');

		$this->data['home'] = $this->url->link('common/home');
		
		// Other
		$this->data['text_confirm'] = $this->language->get('text_confirm');
		
		//----------------------- Link -----------------------
		if (!$this->user->isLogged() || !isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token'])) {
			$this->data['logged'] = '';
			
			$this->data['home'] = $this->url->link('common/login', '', 'SSL');
		} else {
			$this->data['logged'] = sprintf($this->language->get('text_logged'), $this->user->getUserName());
			
			// Group
			$this->data['group_type'] = $this->url->link('group/type', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['group'] = $this->url->link('group/group', 'token=' . $this->session->data['token'], 'SSL');
			
			// User
			$this->data['user_group'] = $this->url->link('user/group', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['user'] = $this->url->link('user/user', 'token=' . $this->session->data['token'], 'SSL');
			
			// Attribute
			$this->data['attribute_type'] = $this->url->link('attribute/type', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['attribute_group'] = $this->url->link('attribute/group', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['attribute'] = $this->url->link('attribute/attribute', 'token=' . $this->session->data['token'], 'SSL');
			
			// Localisation
			$this->data['country'] = $this->url->link('localisation/country', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['city'] = $this->url->link('localisation/city', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['district'] = $this->url->link('localisation/district', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['ward'] = $this->url->link('localisation/ward', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['street'] = $this->url->link('localisation/street', 'token=' . $this->session->data['token'], 'SSL');
			
			// user profile
			$this->data['type'] = $this->url->link('data/type', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['value'] = $this->url->link('data/value', 'token=' . $this->session->data['token'], 'SSL');

			// Company
			$this->data['company_group'] = $this->url->link('company/group', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['company'] = $this->url->link('company/company', 'token=' . $this->session->data['token'], 'SSL');

			// Branch
			$this->data['branch'] = $this->url->link('branch/branch', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['branch_position'] = $this->url->link('branch/position', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['branch_category'] = $this->url->link('branch/category', 'token=' . $this->session->data['token'], 'SSL');

			// system
			$this->data['admin_group'] = $this->url->link('admin/group', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['admin'] = $this->url->link('admin/admin', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['layout'] = $this->url->link('design/layout', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['action'] = $this->url->link('design/action', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['group_action'] = $this->url->link('group/action', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['company_action'] = $this->url->link('company/action', 'token=' . $this->session->data['token'], 'SSL');

			$this->data['logout'] = $this->url->link('common/logout', 'token=' . $this->session->data['token'], 'SSL');
		}
		
		$this->template = 'common/header.tpl';
		
		$this->render();
	}
}
?>