<?php
use Document\Finance\Formual;

class ModelFinanceFunction extends Model {
	public function addFunction( $aData = array() ) {
		// name is required
		if ( !isset($aData['name']) ) {
			return false;
		}else {
			$aData['name'] = trim($aData['name']);
		}

		// function is required
		if ( !isset($aData['function']) || !$this->isValidateFunction($aData['function']) ) {
			return false;
		}else {
			$aData['function'] = trim($aData['function']);
		}

		$oFunction = new Formual();
		$oFunction->setName( $aData['name'] );
		$oFunction->setFunction( $aData['function'] );

		$this->dm->persist( $oFunction );
		$this->dm->flush();

		return true;
	}

	public function editFunction( $id, $aData = array() ) {
		// name is required
		if ( !isset($aData['name']) ) {
			return false;
		}else {
			$aData['name'] = trim($aData['name']);
		}

		// function is required
		if ( !isset($aData['function']) || !$this->isValidateFunction($aData['function']) ) {
			return false;
		}else {
			$aData['function'] = trim($aData['function']);
		}

		$oFunction = $this->dm->getRepository('Document\Finance\Formual')->find( $id );
		if ( !$oFunction ){
			return false;
		}
		$oFunction->setName( $aData['name'] );
		$oFunction->setFunction( $aData['function'] );

		$this->dm->persist( $oFunction );
		$this->dm->flush();

		return true;
	}

	public function deleteFunctions( $aData = array() ) {
		if ( !empty($aData['id']) ) {
			foreach ($aData['id'] as $id) {
				$oFunction = $this->dm->getRepository('Document\Finance\Formual')->find( $id );

				if ( $oFunction ) {
					$oFunction->setDeleted( true );
					$this->dm->flush();
				}
			}
		}
	}

	public function getFunctions( $aData = array() ){
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		return $this->dm->getRepository('Document\Finance\Formual')->findBy(array(
				'deleted' => false,
			))
			->skip( $aData['start'] )
			->limit( $aData['limit'] );
	}

	public function getAllFunctions(){
		return $this->dm->getRepository('Document\Finance\Formual')->findAll();
	}

	public function getFunction( $id ){
		return $this->dm->getRepository('Document\Finance\Formual')->find( $id );
	}

	public function isValidateFunction( $function ) {
		return true;
	}
}
?>