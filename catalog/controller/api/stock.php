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

		$lStocks = $this->model_stock_stock->getStocks();
		
		$aStocks = array();
		foreach ( $lStocks as $oStock ) {
			if ( $oStock->getExchanges()->count() == 0 ){
				continue;
			}
			$aStocks[] = $oStock->formatToCache();
		}
		
		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'stocks' => $aStocks
        )));
	}
}
?>