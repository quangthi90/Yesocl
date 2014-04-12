<?php
use Document\Stock\Exchange;

class ModelStockExchange extends Model {
	public function getMaxMinPrice($iDay, $oStock) {
        $oLastExchange = $oStock->getLastExchange();
        $oTimeLimit = $oLastExchange->getCreated();
        date_sub($oTimeLimit, date_interval_create_from_date_string($iDay . ' days'));
        
        $aExchanges = $oStock->getExchanges()->toArray();
        $aExchanges = array_reverse($aExchanges);
        foreach ($aExchanges as $oExchange) {
            if ( $oExchange->getCreated() < $oTimeLimit ){
                exit;
            }

            var_dump($oExchange->getCreated());
            print("<br>");
        }
        exit;
    }
}
?>