<?php
use Document\Social\Network;

class ModelSocialNetwork extends Model {
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

	public function getNetwork( $network_id ) {
		return $this->dm->getRepository( 'Document\Social\Network' )->find( $network_id );
	}

	public function getAllNetworks() {
		return $this->dm->getRepository( 'Document\Social\Network' )->findAll();
	}

	public function getNetworks( $data = array() ) {
		if ( isset( $data['start'] ) && $data['start'] >= 0 ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) && $data['limit'] > 0 ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 10;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Social\Network' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

		if ( isset( $data['filter_name'] ) ) {
			$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
		}

		if ( isset( $data['sort'] ) ) {
			if ( isset( $data['order'] ) && $data['order'] == 'desc' ) {
    			$query->sort( $data['sort'], 'desc' );
    		}else {
    			$query->sort( $data['sort'], 'asc' );
    		}
		}

		return $query->getQuery()->execute();
	}

	public function getTotalNetworks( $data = array() ) {
		$query = $this->dm->createQueryBuilder( 'Document\Social\Network' );

		if ( isset( $data['filter_name'] ) ) {
    		$query->field( 'name' )->equals( new \MongoRegex('/' . trim( $data['filter_name'] ) . '.*/i') );
    	}

		return count( $query->getQuery()->execute() );
	}

	public function isExistName( $name ) {
		$network = $this->dm->getRepository( 'Document\Social\Network' )->findOneBy( array( 'name' => strtolower( trim( $name ) ) ) );

		if ( !empty( $network ) ) {
			return true;
		}else {
			return false;
		}
	}

	public function isExistCode( $code ) {
		$network = $this->dm->getRepository( 'Document\Social\Network' )->findOneBy( array( 'code' => strtolower( trim( $code ) ) ) );

		if ( !empty( $network ) ) {
			return true;
		}else {
			return false;
		}
	}
}
?>