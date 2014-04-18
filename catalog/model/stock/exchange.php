<?php
use Document\Stock\Exchange;

class ModelStockExchange extends Model {
	public function getExchange( $aData = array() ){
		$query = array();
		if ( !empty($aData['exchange_id']) ){
			$query['exchanges.id'] = $aData['exchange_id'];
		}elseif ( !empty($aData['stock_id']) ){
			$query['stock.id'] = $aData['stock_id'];
		}else{
			return null;
		}

		return $this->dm->getRepository('Document\Stock\Exchanges')->findOneBy( $query );
	}
}
?>