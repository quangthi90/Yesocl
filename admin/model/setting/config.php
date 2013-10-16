<?php
use Document\Setting\Config;

class ModelSettingConfig extends Model {
	public function addConfig( $data = array() ) {
		// Key is required && doesn't exist
		if ( !isset($data['key']) || empty($data['key']) || $this->isExistKey( $data['key'] ) ){
			return false;
		}

		// Value is required
		if ( !isset($data['value']) || empty($data['value']) ){
			return false;
		}

		$config = new Config();
		$config->setKey( $data['key'] );
		$config->setValue( $data['value'] );

		$this->dm->persist( $config );
		$this->dm->flush();

		return true;
	}

	public function editConfig( $config_id, $data = array() ) {
		// Key is required
		if ( !isset($data['key']) || empty($data['key']) || $this->isExistKey( $data['key'] ) ){
			return false;
		}

		// Value is required
		if ( !isset($data['value']) || empty($data['value']) ){
			return false;
		}

		$config = $this->getConfig( $config_id );

		// Key is Exist
		if ( $this->isExistKey( $data['key'] ) && $config->getKey != $data['key'] ) {
			return false;
		}

		$config->setKey( $data['key'] );
		$config->setValue( $data['value'] );

		$this->dm->persist( $config );
		$this->dm->flush();
		
		return true;
	}

	public function deleteConfig( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$config = $this->getConfig( $id );

				$this->dm->remove($config);
			}
		}
		
		$this->dm->flush();
	}

	public function getConfig( $config_id ) {
		$config = $this->dm->getRepository( 'Document\Setting\Config' )->find( $config_id );

		return $config;
	}

	public function getConfigs( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}
		
		$query = $this->dm->createQueryBuilder( 'Document\Setting\Config' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );

    	if ( isset( $data['filter_key'] ) ) {
    		$query->field( 'key' )->equals( new \MongoRegex('/' . trim( $data['filter_key'] ) . '.*/i') );
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

	public function getTotalConfigs( $data = array() ) {
		$query = $this->dm->createQueryBuilder( 'Document\Setting\Config' );

    	if ( isset( $data['filter_key'] ) ) {
    		$query->field( 'key' )->equals( new \MongoRegex('/' . trim( $data['filter_key'] ) . '.*/i') );
    	}
    		
    	return count( $query->getQuery()->execute() );
	}

	public function isExistKey( $key ) {
		$config = $this->dm->getRepository( 'Document\Setting\Config' )->findOneBy( array( 'key' => $key ) );

		if ( empty( $config ) ) {
			return false;
		}else {
			return true;
		}
	}

	public function load( $filter_key ) {
		$query = $this->dm->createQueryBuilder( 'Document\Setting\Config' );

    	$query->field( 'key' )->equals( new \MongoRegex('/' . trim( $filter_key ) . '.*/i') );
    		
    	$configs = $query->getQuery()->execute();

		foreach ($configs as $config) {
			$this->config->set( $config->getKey(), $config->getValue() );
		}
	}
}
?>