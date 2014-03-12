<?php
use Document\Stock\Stock;

class ModelStockStock extends Model {
	public function addNetwork( $data = array() ) {
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

		$network = new Network();
		$network->setName( $data['name'] );
		$network->setCode( $data['code'] );
		$network->setStatus( $data['status'] );

		$this->dm->persist( $network );
		$this->dm->flush();

		return true;
	}

	public function editNetwork( $network_id, $data = array() ) {
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

		$network = $this->dm->getRepository( 'Document\Social\Network' )->find( $network_id );
		if ( empty( $network ) ) {
			return false;
		}

		// name is exist
		if ( $network->getName() != $data['name'] && $this->isExistName( $data['name'] ) ) {
			return false;
		}
		// code is exist
		if ( $network->getCode() != $data['code'] && $this->isExistCode( $data['code'] ) ) {
			return false;
		}

		$network->setName( $data['name'] );
		$network->setCode( $data['code'] );
		$network->setStatus( $data['status'] );
		
		$this->dm->flush();

		return true;
	}

	public function deleteNetworks( $data = array() ) {
		if ( isset( $data['id'] ) ) {
			foreach ($data['id'] as $id) {
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

	public function import( $file ){
		$this->load->model('tool\excel');
		$aDatas = $this->model_tool_excel->loadActiveSheet( $file['tmp_name'] );

		foreach ( $aDatas as $aData ) {
			# code...
		}
	}
}
?>