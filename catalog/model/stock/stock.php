<?php
use Document\Stock\Stock;

class ModelStockStock extends Model {
	public function getStocks( $aData = array() ) {
		if ( empty($aData['start']) ) {
    		$aData['start'] = 0;
    	}

        if ( empty($aData['limit']) ){
            $aData['limit'] = 10;
        }

    	if ( empty($aData['sort']) ) {
            $aData['sort'] = 'code';
    	}

        if ( empty($aData['order']) ){
            $aData['order'] = 1;
    		
    	return $this->dm->getRepository('Document\Stock\Stock')->findAll()
            ->skip( $aData['start'] )
            ->limit( $aData['limit'] )
            ->sort( $aData['sort'] => $aData['order'] );
	}
}
?>