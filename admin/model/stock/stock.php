<?php
use Document\Stock\Stock;

class ModelStockStock extends Model {
	public function addStock( $aData = array() ) {
		// name is required & isn't exist
		if ( !empty($aData['name']) ) {
			$this->data['name'] = strtoupper( trim($aData['name']) );
		}else {
			return false;
		}

		// code is required
		if ( isset( $aData['code'] ) && !$this->getStock(array('code' => $aData['code'])) ) {
			$this->data['code'] = strtoupper( trim($aData['code']) );
		}else {
			return false;
		}

		// status
		if ( !isset( $aData['status'] ) ) {
			$aData['status'] = 0;
		}

		$network = new Network();
		$network->setName( $aData['name'] );
		$network->setCode( $aData['code'] );
		$network->setStatus( $aData['status'] );

		$this->dm->persist( $network );
		$this->dm->flush();

		return true;
	}

	public function editNetwork( $network_id, $aData = array() ) {
		// name is required
		if ( isset( $aData['name'] ) ) {
			$this->data['name'] = strtoupper( trim( $aData['name'] ) );
		}else {
			return false;
		}

		// code is required
		if ( isset( $aData['code'] ) ) {
			$this->data['code'] = strtoupper( trim( $aData['code'] ) );
		}else {
			return false;
		}

		// status
		if ( !isset( $aData['status'] ) ) {
			$aData['status'] = 0;
		}

		$network = $this->dm->getRepository( 'Document\Social\Network' )->find( $network_id );
		if ( empty( $network ) ) {
			return false;
		}

		// name is exist
		if ( $network->getName() != $aData['name'] && $this->isExistName( $aData['name'] ) ) {
			return false;
		}
		// code is exist
		if ( $network->getCode() != $aData['code'] && $this->isExistCode( $aData['code'] ) ) {
			return false;
		}

		$network->setName( $aData['name'] );
		$network->setCode( $aData['code'] );
		$network->setStatus( $aData['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteNetworks( $aData = array() ) {
		if ( isset( $aData['id'] ) ) {
			foreach ($aData['id'] as $id) {
				$network = $this->dm->getRepository( 'Document\Social\Network' )->find( $id );

				if ( !empty( $network ) ) {
					foreach ($network->getUsers as $user) {
						$this->dm->remove( $user );
					}

					$this->dm->remove( $network );
				}
			}
		}

		$this->dm->flush();
	}

	public function getStock( $aData = array() ){
		if ( !empty($aData['id']) ){
			return $this->dm->getRepository('Document\Stock\Stock')->find( $aData['id'] );
		}elseif ( !empty($aData['code']) ){
			return $this->dm->getRepository('Document\Stock\Stock')->findOneByCode( strtoupper(trim($aData['code'])) );
		}

		return null;
	}

	public function importStock( $file ){
		$this->load->model('tool\excel');
		$aDatas = $this->model_tool_excel->loadActiveSheet( $file['tmp_name'] );

		foreach ( $aDatas as $aData ) {
			# code...
		}
	}
}
?>