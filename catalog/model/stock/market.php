<?php
use Document\Stock\Market;

class ModelStockMarket extends Model {
	public function getMarkets( $aData = array() ) {
        // $lStocks = $this->dm->getRepository('Document\Stock\Stock')->findAll();

        // foreach ($lStocks as $oStock) {
        //     $oStock->setExchanges(array());
        // }

        // $this->dm->flush();

		if ( empty($aData['start']) ) {
    		$aData['start'] = 0;
    	}

        if ( empty($aData['limit']) ){
            $aData['limit'] = 10;
        }

    	if ( empty($aData['sort']) ) {
            $aData['sort'] = 'order';
    	}

        if ( empty($aData['order']) ){
            $aData['order'] = 1;
        }
    		
    	return $this->dm->getRepository('Document\Stock\Market')->findAll()
            ->skip( $aData['start'] )
            ->limit( $aData['limit'] )
            ->sort( array($aData['sort'] => $aData['order']) );
	}
}
?>