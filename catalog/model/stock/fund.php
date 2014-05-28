<?php
use Document\Stock\Fund;

class ModelStockFund extends Model {
	public function getAllFunds( $aData = array() ){
		if ( empty($aData['sort']) ){
			$aData['sort'] = 1;
		}

		if ( empty($aData['order']) ){
			$aData['order'] = 'order';
		}

		return $this->dm->getRepository('Document\Stock\Fund')
			->findAll()
			->sort( array($aData['order'] => $aData['sort']) );
	}
}
?>