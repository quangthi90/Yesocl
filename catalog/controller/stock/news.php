<?php  
class ControllerStockNews extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setDescription($this->config->get('config_meta_description'));		
		
		// set selected menu
		$this->session->setFlash( 'menu', 'stock' );

		// Title
		$this->data['heading_title'] = gettext('News of Stock');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/stock/news.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/stock/news.tpl';
		} else {
			$this->template = 'default/template/stock/news.tpl';
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