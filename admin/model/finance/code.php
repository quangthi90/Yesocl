<?php
use Document\Finance\Code;

class ModelFinanceCode extends Model {
	public function addCode( $aData = array() ) {
		// code is required
		if ( isset($aData['code']) ) {
			$aData['code'] = trim($aData['code']);
		}else {
			return false;
		}

		// finance is required
		if ( isset($aData['finance_id']) ) {
			$oFinance = $this->dm->getRepository( 'Document\Finance\Finance' )->find( $aData['finance_id'] );
			if ( !$oFinance ) {
				return false;
			}
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oCode = new Code();
		$oCode->setCode( $aData['code'] );
		$oCode->setFinance( $oFinance );
		$oCode->setStatus( $aData['status'] );

		$this->dm->persist( $oCode );
		$this->dm->flush();

		return true;
	}

	public function editCode( $id, $aData = array() ) {
		// code is required
		if ( isset($aData['code']) ) {
			$aData['code'] = trim($aData['code']);
		}else {
			return false;
		}

		// finance is required
		if ( isset($aData['finance_id']) ) {
			$oFinance = $this->dm->getRepository( 'Document\Finance\Finance' )->find( $aData['finance_id'] );
			if ( !$oFinance ) {
				return false;
			}
		}else {
			return false;
		}

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oCode = $this->dm->getRepository('Document\Finance\Code')->find( $id );
		if ( !$oCode ){
			return false;
		}
		$oCode->setCode( $aData['code'] );
		$oCode->setFinance( $oFinance );
		$oCode->setStatus( $aData['status'] == 'true' );

		$this->dm->persist( $oCode );
		$this->dm->flush();

		return true;
	}

	public function deleteCodes( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oCode = $this->dm->getRepository('Document\Finance\Code')->find( $id );

				if ( $oCode ) {
					$oCode->setDelete( true );
					// $this->dm->remove( $oCode );
				}
			}
		}

		$this->dm->flush();
	}

	public function getCodes( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		return $this->dm->getRepository('Document\Finance\Code')->findBy(array(
				'deleted' => false,
			))
			->skip( $aData['start'] )
			->limit( $aData['limit'] );
	}

	public function getAllCodes(){
		return $this->dm->getRepository('Document\Finance\Code')->findAll();
	}

	public function getCode( $id ){
		return $this->dm->getRepository('Document\Finance\Code')->find( $id );
	}

	public function getCodeByCode( $code ) {
		return $this->dm->getRepository('Document\Finance\Code')->findOneBy( array(
			'code' => new MongoRegex("/^" . trim($code) . "$/i"),
			));
	}
}
?>