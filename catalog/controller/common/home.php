<?php  
class ControllerCommonHome extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		$this->data['heading_title'] = $this->config->get('config_title');

		$this->load->model( 'company/company' );
		$company = $this->model_company_company->getCompanyBySlug( $this->config->get('company')['default']['slug'] );

		if ( $company ){
			$company_posts = $company->getPosts();
		}

		$this->data['posts'] = array();
		foreach ( $company_posts as $post ) {
			$this->data['posts'][] = array(
				''
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',			
			// 'common/content_top',
			// 'common/content_bottom',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>