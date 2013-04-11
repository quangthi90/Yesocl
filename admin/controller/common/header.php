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
		$this->data['text_company_post_category'] = $this->language->get('text_company_post_category');
		
		// Attribute
		$this->data['text_attributes'] = $this->language->get('text_attributes');
		$this->data['text_attribute_group'] = $this->language->get('text_attribute_group');
		$this->data['text_attribute'] = $this->language->get('text_attribute');
		$this->data['text_attribute_type'] = $this->language->get('text_attribute_type');
		
		
		// System
		$this->data['text_system'] = $this->language->get('text_system');
		
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
		// Group
		$this->data['group_type'] = $this->url->link('group/type');
		$this->data['group'] = $this->url->link('group/group');
		
		// User
		$this->data['user_group'] = $this->url->link('user/group');
		$this->data['user'] = $this->url->link('user/user');

		// Company
		$this->data['company_group'] = $this->url->link('company/group');
		$this->data['company'] = $this->url->link('company/company');
		$this->data['company_post_category'] = $this->url->link('company/category');
		
		// Attribute
		$this->data['attribute_type'] = $this->url->link('attribute/type');
		$this->data['attribute_group'] = $this->url->link('attribute/group');
		$this->data['attribute'] = $this->url->link('attribute/attribute');
		
		// Localisation
		$this->data['country'] = $this->url->link('localisation/country');
		$this->data['city'] = $this->url->link('localisation/city');
		$this->data['district'] = $this->url->link('localisation/district');
		$this->data['ward'] = $this->url->link('localisation/ward');
		$this->data['street'] = $this->url->link('localisation/street');
		
		// user profile
		$this->data['type'] = $this->url->link('data/type');
		$this->data['value'] = $this->url->link('data/value');
		
		
		$this->template = 'common/header.tpl';
		
		$this->render();
	}
}
?>