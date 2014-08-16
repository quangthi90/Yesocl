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
		$this->data['text_social_network'] = $this->language->get('text_social_network');

		$this->data['text_admin'] = $this->language->get('text_admin');
		$this->data['text_admin_group'] = $this->language->get('text_admin_group');
		$this->data['text_admin_manage'] = $this->language->get('text_admin_manage');

		$this->data['text_user_list'] = $this->language->get('text_user_list');

		// Company
		$this->data['text_companies'] = $this->language->get('text_companies');
		$this->data['text_company'] = $this->language->get('text_company');
		$this->data['text_company_group'] = $this->language->get('text_company_group');

		// Stock
		$this->data['text_stocks'] = $this->language->get('text_stocks');
		$this->data['text_import'] = $this->language->get('text_import');
		$this->data['text_stock'] = $this->language->get('text_stock');
		$this->data['text_trading'] = $this->language->get('text_trading');
		$this->data['text_market'] = $this->language->get('text_market');
		$this->data['text_fund'] = $this->language->get('text_fund');

		// Finance
		$this->data['text_finances'] = $this->language->get('text_finances');
		$this->data['text_finance'] = $this->language->get('text_finance');
		$this->data['text_fi_group'] = $this->language->get('text_fi_group');
		$this->data['text_date'] = $this->language->get('text_date');
		$this->data['text_code'] = $this->language->get('text_code');
		$this->data['text_function'] = $this->language->get('text_function');
		$this->data['text_report'] = $this->language->get('text_report');
		$this->data['text_export'] = $this->language->get('text_export');

		// Branch
		$this->data['text_branches'] = $this->language->get('text_branches');
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
			$this->data['social_network'] = $this->url->link('social/network', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['user_list'] = $this->url->link('user/list', 'token=' . $this->session->data['token'], 'SSL');

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

			// Stock
			$this->data['stock_import'] = $this->url->link('stock/stock/import', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['trading_import'] = $this->url->link('stock/exchange/import', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['stock_market'] = $this->url->link('stock/market', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['stock'] = $this->url->link('stock/stock', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['stock_fund'] = $this->url->link('stock/fund', 'token=' . $this->session->data['token'], 'SSL');

			// Finance
			$this->data['finance'] = $this->url->link('finance/finance', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_group'] = $this->url->link('finance/group', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_code'] = $this->url->link('finance/code', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_import'] = $this->url->link('finance/finance/import', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_function'] = $this->url->link('finance/function', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_date'] = $this->url->link('finance/date', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_report'] = $this->url->link('finance/report', 'token=' . $this->session->data['token'], 'SSL');
			$this->data['finance_export'] = $this->url->link('finance/export', 'token=' . $this->session->data['token'], 'SSL');

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