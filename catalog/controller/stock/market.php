<?php  
class ControllerStockMarket extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}
// print(date('m/d/Y h:i:s', 1214524800)); exit;
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
		$this->data['watch_list'] = array_reverse($this->data['watch_list']);

		$sStockCode = $this->config->get('branch')['code']['stock'];
		$this->load->model('branch/branch');
		$oBranch = $this->model_branch_branch->getBranch( array('branch_code' => $sStockCode) );

		$lPosts = null;
		if ( $oBranch ){
			$lCategories = $oBranch->getCategories();
			$aCategoryIds = array();
			foreach ( $lCategories as $oCategory ) {
				if ( $oCategory->getIsBranch() ) $aCategoryIds[] = $oCategory->getId();
			}
			if ( count($aCategoryIds) > 0 ){
				$this->load->model('branch/post');
				$lPosts = $this->model_branch_post->getPosts(array(
					'limit' => 3,
					'branch_id' => $oBranch->getId(),
					'category_ids' => $aCategoryIds
				));
			}
		}

		$this->data['news'] = array();
		$aUsers = array();
		$this->load->model('tool/image');
		if ( $lPosts ){
			foreach ( $lPosts as $oPost ) {
				$aPost = $oPost->formatToCache();

				// check user liked
				if ( in_array($this->customer->getId(), $oPost->getLikerIds()) ){
					$aPost['isUserLiked'] = true;
				}else{
					$aPost['isUserLiked'] = false;
				}
				// thumb
				if ( isset($aPost['thumb']) && !empty($aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
				}else{
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
				}
				$this->data['news'][] = $aPost;

				if ( empty($aUsers[$aPost['user_id']]) ){
					$oUser = $oPost->getUser();
					$aUser = $oUser->formatToCache();
					$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
					$aUsers[$aUser['id']] = $aUser;
				}
			}
		}

		$this->data['users'] = $aUsers;

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