<?php
use Document\Stock\Market;

class ModelStockMarket extends Model {
	public function addMarket( $aDatas = array() ) {
		// name is required
		if ( !empty($aDatas['name']) ) {
			$aDatas['name'] = strtoupper( trim($aDatas['name']) );
		}else {
			return false;
		}

		// code is required
		if ( !empty($aDatas['code']) && !$this->getMarket($aDatas['code']) ) {
			$aDatas['code'] = strtoupper( trim($aDatas['code']) );
		}else {
			return false;
		}

		// status
		if ( empty($aDatas['status']) ) {
			$aDatas['status'] = false;
		}

		$oMarket = new Market();
		$oMarket->setName( $aDatas['name'] );
		$oMarket->setCode( $aDatas['code'] );
		$oMarket->setOrder( $aDatas['order'] );
		$oMarket->setStatus( $aDatas['status'] );

		$this->dm->persist( $oMarket );
		$this->dm->flush();

		return true;
	}

	public function editMarket( $oMarket_id, $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = strtoupper( trim($aData['name']) );
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oMarket = $this->dm->getRepository( 'Document\Stock\Market' )->find( $oMarket_id );
		if ( !$oMarket ) {
			return false;
		}

		$oMarket->setName( $aData['name'] );
		if ( !empty($aData['order']) ){
			$oMarket->setOrder( $aData['order'] );
		}
		$oMarket->setStatus( $aData['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteMarkets( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oMarket = $this->dm->getRepository('Document\Stock\Market')->find( $id );

				if ( $oMarket ) {
					$this->dm->remove( $oMarket );
				}
			}
		}

		$this->dm->flush();
	}

	public function getMarkets( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		if ( empty($aData['sort']) ){
			$aData['order'] = 'order';
			$aData['sort'] = 1;
		}

		return $this->dm->getRepository('Document\Stock\Market')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['order'] => $aData['sort']) );
	}

	public function getMarket( $aData = array() ){
		if ( !empty($aData['id']) ){
			return $this->dm->getRepository('Document\Stock\Market')->find( $aData['id'] );
		}elseif ( !empty($aData['code']) ){
			return $this->dm->getRepository('Document\Stock\Market')->findOneByCode( strtoupper(trim($aData['code'])) );
		}

		return null;
	}
}
?>