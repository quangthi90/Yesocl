<?php
use Document\Stock\Fund;

class ModelStockFund extends Model {
	public function addFund( $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		if ( empty($aData['order']) ){
			$aData['order'] = 0;
		}

		$oFund = new Fund();
		$oFund->setName( $aData['name'] );
		$oFund->setType( $aData['type'] );
		$oFund->setOrder( $aData['order'] );

		$this->dm->persist( $oFund );
		$this->dm->flush();

		return true;
	}

	public function editFund( $idFund, $aData = array() ) {
		// name is required
		if ( !empty($aData['name']) ) {
			$aData['name'] = trim($aData['name']);
		}else {
			return false;
		}

		$oFund = $this->dm->getRepository( 'Document\Stock\Fund' )->find( $idFund );
		if ( !$oFund ) {
			return false;
		}

		if ( empty($aData['order']) ){
			$aData['order'] = 0;
		}

		$oFund->setName( $aData['name'] );
		$oFund->setOrder( $aData['order'] );

		if ( !empty($aData['type']) ){
			$oFund->setType( $aData['type'] );
		}
		
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

	public function getAllFunds( $aData = array() ){
		return $this->dm->getRepository('Document\Stock\Fund')
			->findAll()
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