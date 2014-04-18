<?php
class ControllerApiStock extends Controller {
	public function getAllStocks() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

		$this->load->model('stock/stock');

		$lStocks = $this->model_stock_stock->getAllStocks();
		
		$aStocks = array();
		foreach ( $lStocks as $oStock ) {
			if ( !$oStock->getLastExchange() || !$oStock->getPreLastExchange() )
				continue;
			$aStocks[] = $oStock->formatToCache();
		}
		
		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'stocks' => $aStocks
        )));
	}

	public function addStocksToWatchList() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

		if ( empty($this->request->post['stock_ids']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Stock ID is empty!'
	        )));
		}

		$this->load->model('user/setting');

		$result = $this->model_user_setting->addStocksToWatchList( $this->customer->getId(), $this->request->post['stock_ids'] );
		
		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Add Stock to Watch List have error'
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	public function removeStockFromWatchList() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deney!'
	        )));
		}

		if ( empty($this->request->get['stock_id']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Stock ID is empty!'
	        )));
		}

		$this->load->model('user/setting');
		$result = $this->model_user_setting->removeStockFromWatchList( $this->customer->getId(), $this->request->get['stock_id'] );

		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Remove Stock have error!'
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}
}
?>