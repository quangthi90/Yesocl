<?php
use Document\Finance\Code;

class ModelFinanceCode extends Model {
	public function addCode( $aData = array() ) {
		// code is required & not exist
		if ( !isset($aData['code']) || $this->isExistCode($aData['code']) ) {
			return false;
		}else {
			$aData['code'] = trim($aData['code']);
		}

		// finance is required & not exist
		if ( isset($aData['finance_id']) ) {
			$oFinance = $this->dm->getRepository( 'Document\Finance\Finance' )->find( $aData['finance_id'] );
			if ( !$oFinance || $this->isExistFinance($aData['finance_id']) ) {
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
		// code is required & not exist
		if ( !isset($aData['code']) || $this->isExistCode($aData['code'], $id) ) {
			return false;
		}else {
			$aData['code'] = trim($aData['code']);
		}

		// finance is required & not exist
		if ( isset($aData['finance_id']) ) {
			$oFinance = $this->dm->getRepository( 'Document\Finance\Finance' )->find( $aData['finance_id'] );
			if ( !$oFinance || $this->isExistFinance($aData['finance_id'], $id) ) {
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
					$oCode->setDeleted( true );
					// $this->dm->remove( $oCode );
					$this->dm->flush();
				}
			}
		}
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
			'deleted' => false,
			));
	}

	public function getCodeByFinance( $finance_id ) {
		return $this->dm->getRepository('Document\Finance\Code')->findOneBy( array(
			'finance.id' => trim($finance_id),
			'deleted' => false,
			));
	}

	public function isExistCode( $code, $code_id = null ) {
		$oCode =  $this->getCodeByCode( $code );

		if ( !$oCode || (isset($code_id) && $oCode->getId() == $code_id) ) {
			return false;
		}else {
			return true;
		}
	}

	public function isExistFinance( $finance_id, $code_id = null ) {
		$oCode =  $this->getCodeByFinance( $finance_id );

		if ( !$oCode || (isset($code_id) && $oCode->getId() == $code_id) ) {
			return false;
		}else {
			return true;
		}
	}
}
?>