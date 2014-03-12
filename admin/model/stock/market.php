<?php
use Document\Stock\Market;

class ModelStockMarket extends Model {
	public function addMarket( $data = array() ) {
		// name is required & isn't exist
		if ( isset( $data['name'] ) && !$this->isExistName( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// code is required & isn't exist
		if ( isset( $data['code'] ) && !$this->isExistCode( $data['code'] ) ) {
			$this->data['code'] = strtolower( trim( $data['code'] ) );
		}else {
			return false;
		}

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$oMarket = new Market();
		$oMarket->setName( $data['name'] );
		$oMarket->setCode( $data['code'] );
		$oMarket->setStatus( $data['status'] );

		$this->dm->persist( $oMarket );
		$this->dm->flush();

		return true;
	}

	public function editMarket( $oMarket_id, $data = array() ) {
		// name is required
		if ( isset( $data['name'] ) ) {
			$this->data['name'] = strtolower( trim( $data['name'] ) );
		}else {
			return false;
		}

		// code is required
		if ( isset( $data['code'] ) ) {
			$this->data['code'] = strtolower( trim( $data['code'] ) );
		}else {
			return false;
		}

		// status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		$oMarket = $this->dm->getRepository( 'Document\Social\Market' )->find( $oMarket_id );
		if ( empty( $oMarket ) ) {
			return false;
		}

		// name is exist
		if ( $oMarket->getName() != $data['name'] && $this->isExistName( $data['name'] ) ) {
			return false;
		}
		// code is exist
		if ( $oMarket->getCode() != $data['code'] && $this->isExistCode( $data['code'] ) ) {
			return false;
		}

		$oMarket->setName( $data['name'] );
		$oMarket->setCode( $data['code'] );
		$oMarket->setStatus( $data['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteMarkets( $data = array() ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
				$oMarket = $this->dm->getRepository( 'Document\Social\Market' )->find( $id );

				if ( !empty( $oMarket ) ) {
					foreach ($oMarket->getUsers as $user) {
						$this->dm->remove( $user );
					}

					$this->dm->remove( $oMarket );
				}
			}
		}

		$this->dm->flush();
	}

	public function import( $file ){
		$this->load->model('tool\excel');
		$aDatas = $this->model_tool_excel->loadActiveSheet( $file['tmp_name'] );

		foreach ( $aDatas as $aData ) {
			# code...
		}
	}
}
?>