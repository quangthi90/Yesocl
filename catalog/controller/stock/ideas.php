<?php  
class ControllerStockIdeas extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		if ( empty($this->request->get['stock_code']) ) {
			return false;
		}

		$this->data['stock_code'] = $this->request->get['stock_code'];
		$this->data['post_type'] = $this->config->get('common')['type']['stock'];

		$this->document->setDescription($this->config->get('config_meta_description'));		
		
		// set selected menu
		$this->session->setFlash( 'menu', 'stock' );

		// Title
		$this->data['heading_title'] = gettext('Ideas of Stock');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/stock/ideas.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/stock/ideas.tpl';
		} else {
			$this->template = 'default/template/stock/ideas.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>