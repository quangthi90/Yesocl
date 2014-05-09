<?php
use Document\Stock\Stock;

class ModelStockStock extends Model {
    public function getStock( $aData = array() ){
        $query = array('deleted' => false);

        if ( !empty($aData['id']) ){
            $query['id'] = $aData['id'];
        }elseif ( !empty($aData['code']) ){
            $query['code'] = strtoupper(trim($aData['code']));
        }else{
            return null;
        }

        return $this->dm->getRepository('Document\Stock\Stock')->findOneBy( $query );
    }
    
	public function getStocks( $aData = array() ) {
        $query = array('deleted' => false);

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
        }
    		
    	return $this->dm->getRepository('Document\Stock\Stock')->findBy($query)
            ->skip( $aData['start'] )
            ->limit( $aData['limit'] )
            ->sort( array($aData['sort'] => $aData['order']) );
	}

    public function getAllStocks( $aData = array() ) {
         $query = array('deleted' => false);

        if ( !empty($aData['market_id']) ){
            $query['market.id'] = $aData['market_id'];
        }

        if ( empty($aData['sort']) ) {
            $aData['sort'] = 'code';
        }

        if ( empty($aData['order']) ){
            $aData['order'] = 1;
        }
            
        return $this->dm->getRepository('Document\Stock\Stock')->findBy($query)
            ->sort( array($aData['sort'] => $aData['order']) );
    }
}
?>