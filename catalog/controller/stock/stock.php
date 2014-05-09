<?php  
class ControllerStockStock extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->data['heading_title'] = $this->config->get('config_title');

		if ( empty($this->request->get['stock_code']) ) return false;
		$sStockCode = $this->request->get['stock_code'];

		$this->load->model('stock/stock');
		$oStock = $this->model_stock_stock->getStock( array('code' => $sStockCode) );
		if ( empty($oStock) ) return false;

		if ( !$oStock->getRangePrice()[84] || !$oStock->getRangePrice()[364] ){
			$this->load->model('stock/exchange');
			$oStockExchanges = $this->model_stock_exchange->getExchange( array('stock_id' => $oStock->getId()) );
			if ( !$oStockExchanges ){
				return false;
			}
			$oStockExchanges->calculateRangePrice(84, $this->dm);
			$oStockExchanges->calculateRangePrice(364, $this->dm);
		}
		$this->data['stock'] = $oStock->formatToCache();

		$oMeta = $oStock->getMeta();
		$this->data['stock']['meta'] = $oMeta->formatToCache();
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/stock/stock.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/stock/stock.tpl';
		} else {
			$this->template = 'default/template/stock/stock.tpl';
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