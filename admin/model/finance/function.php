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
		$oFunction->setFunction( $this->reformatFunction($aData['function']) );

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
		$oFunction->setFunction( $this->reformatFunction($aData['function']) );

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

	private function isOperator( $token ) {
		$aOperators = array( '+', '-', '*', '/' );

		return in_array($token, $aOperators);
	}

	public function isValidateFunction( $function ) {
		$function = trim( $this->reformatFunction( $function ) );

		// SPIT TO ARRAY
		$arrFunction = explode(' ', $function);

		// VALIDATE PARENTHESES
		$iCount = 0;
		foreach ($arrFunction as $key => $token) {
			if ( $token == '(' ) {
				$iCount++;
			}elseif ( $token == ')' ) {
				$iCount--;
			}
		}
		if ( $iCount ) {
			return false;
		}

		// VALIDATE LAST TOKEN
		if ( count( $arrFunction ) ) {
			if ( $this->isOperator( $arrFunction[count( $arrFunction ) - 1] ) ) {
				return false;
			}
		}

		return true;
	}

	public function reformatFunction( $function ) {
		// 1. REMOVE BACKSPACE
		$function = str_replace(' ', '', $function);

		// 2. ADD BACKSPACE
		$aSearch = array( "+", "-", "*", "/", "(", ")" );
		foreach ($aSearch as $tmp) {
			$function = str_replace($tmp, " " . $tmp . " ", $function);
		}

		// 3. REMOVE BACKSPACE
		$function = str_replace("  ", " ", $function);

		return trim( $function );
	}

	public function getFunctionDetail( $function ) {
		// SPIT TO ARRAY
		$arrFunction = explode(' ', $function);

		$results = array();
		foreach ($arrFunction as $token) {
			$tmp = explode('@', $token);

			if ( $tmp[0] == '' && isset( $tmp[1] ) ) {
				$oFinance = $this->dm->getRepository('Document\Finance\Finance')->find( $tmp[1] );
				if ($oFinance) {
					$results[] = array(
						'label' => $oFinance->getName(),
						'value' => $tmp[1],
						);
				}else {
					$results[] = array(
						'label' => 'Error',
						'value' => $tmp[1],
						);
				}
			}else {
				$results[] = array(
					'label' => $tmp[0],
					'value' => $tmp[0],
					);
			}
		}

		return $results;
	}
}
?>