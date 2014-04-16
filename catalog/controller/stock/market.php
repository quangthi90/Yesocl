<?php  
class ControllerStockMarket extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		// Market Code
		$sMaketCode = '';
		if ( !empty($this->request->get['market_code']) ) {
			$sMaketCode = $this->request->get['market_code'];
		}

		$this->load->model('stock/market');
		$this->load->model('stock/exchange');
		$this->load->model('user/setting');
		$this->load->model('stock/stock');

		// All Markets
		$lMarkets = $this->model_stock_market->getMarkets();

		if ( !$lMarkets ) {
			return false;
		}

		$this->data['markets'] = array();
		$oMarket = null;
		$aMarkets = array();

		foreach ( $lMarkets as $key => $oMarket ) {
			$aMarkets[] = $oMarket;
			if ( $sMaketCode == $oMarket->getCode() ){
				$aMarkets[0] = $oMarket;
			}
			$this->data['markets'][] = $oMarket->formatToCache();
		}

		// Current Market
		$oCurrMarket = $aMarkets[0];

		$this->data['curr_market_id'] = $oCurrMarket->getId();

		// Stock info of Market
		$oStock = $oCurrMarket->getStockMarket();

		$this->data['stock'] = $oStock->formatToCache();
		$this->data['stock']['range_price'] = array(
			'84' => $oStock->getRangePriceByDay( 84, $this->dm ),
			'364' => $oStock->getRangePriceByDay( 364, $this->dm )
		);

		// Watch list - User Stocks
		$oLoggedUser = $this->customer->getUser();
		$oSetting = $this->model_user_setting->getSettingByUser( $oLoggedUser->getId() );
		$lStocks = array();
		if ( $oSetting ){
			$lStocks = $oSetting->getStocks();
		}
		$this->data['watch_list'] = array();
		foreach ( $lStocks as $oStock ) {
			$this->data['watch_list'][] = $oStock->formatToCache();
		}

		// set selected menu
		$this->session->setFlash( 'menu', 'stock' );	
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/stock/market.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/stock/market.tpl';
		} else {
			$this->template = 'default/template/stock/market.tpl';
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