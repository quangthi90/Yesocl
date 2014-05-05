<?php
use Document\Stock\Fund;

class ModelStockFund extends Model {
	public function addFund( $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = strtoupper( trim($aData['name']) );
		}else {
			return false;
		}

		// code is required
		if ( !empty($aData['code']) && !$this->getFund($aData['code']) ) {
			$aData['code'] = strtoupper( trim($aData['code']) );
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		// stock
		if ( !empty($aData['stock']) ){
			$aData['stock'] = $this->dm->getRepository('Document\Stock\Stock')->findOneByCode(new \MongoRegex('/' . strtoupper(trim($aData['stock'])) . '.*/i'));
		}

		$oFund = new Fund();
		$oFund->setName( $aData['name'] );
		$oFund->setCode( $aData['code'] );
		$oFund->setOrder( $aData['order'] );
		$oFund->setStockFund( $aData['stock'] );
		$oFund->setStatus( $aData['status'] );

		$this->dm->persist( $oFund );
		$this->dm->flush();

		return true;
	}

	public function editFund( $idFund, $aData = array() ) {
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

		$oFund = $this->dm->getRepository( 'Document\Stock\Fund' )->find( $idFund );
		if ( !$oFund ) {
			return false;
		}

		$oFund->setName( $aData['name'] );
		if ( !empty($aData['order']) ){
			$oFund->setOrder( $aData['order'] );
		}

		if ( !empty($aData['stock']) ){
			if ( !$oFund->getStockFund() || $oFund->getStockFund()->getCode() != $aData['stock'] ){
				$oStock = $this->dm->getRepository('Document\Stock\Stock')->findOneByCode( new \MongoRegex('/' . strtoupper(trim($aData['stock'])) . '.*/i') );
				$oFund->setStockFund( $oStock );
			}
		}
		$oFund->setStatus( $aData['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteFunds( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oFund = $this->dm->getRepository('Document\Stock\Fund')->find( $id );

				if ( $oFund ) {
					$this->dm->remove( $oFund );
				}
			}
		}

		$this->dm->flush();
	}

	public function getFunds( $aData = array() ){
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

		return $this->dm->getRepository('Document\Stock\Fund')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] )
			->sort( array($aData['order'] => $aData['sort']) );
	}

	public function getFund( $aData = array() ){
		if ( !empty($aData['id']) ){
			return $this->dm->getRepository('Document\Stock\Fund')->find( $aData['id'] );
		}elseif ( !empty($aData['code']) ){
			return $this->dm->getRepository('Document\Stock\Fund')->findOneByCode( strtoupper(trim($aData['code'])) );
		}

		return null;
	}
}
?>