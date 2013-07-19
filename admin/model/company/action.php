<?php
use Document\Company\Action,
	Document\Setting\Config;

class ModelCompanyAction extends Doctrine {
	public function addAction( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$action = new Action();
		$action->setName( $data['name'] );
		$action->setCode( $data['code'] );
		if ( isset($data['order']) && !empty($data['order']) ){
			$action->setOrder( $data['order'] );
		}

		$config = new Config();
		$config->setKey( $this->config->get( 'company_action_title' ) . $data['code'] );
		$config->setValue( $data['code'] );
		$this->dm->persist( $config );

		$this->dm->persist( $action );
		$this->dm->flush();
	}

	public function editAction( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$action = $this->dm->getRepository('Document\Company\Action')->find( $id );

		if ( !$action ){
			return false;
		}

		$action->setName( $data['name'] ); 
		if ( isset($data['order']) && !empty($data['order']) ){
			$action->setOrder( $data['order'] );
		}

		$this->dm->flush();
	}

	public function deleteAction( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$action = $this->dm->getRepository( 'Document\Company\Action' )->find( $id );

				$config = $this->dm->getRepository('Document\Setting\Config')->findOneByKey( $this->config->get( 'company_action_title' ) . $action->getCode() );
				if ( $config ){
					$this->dm->remove( $config );
				}

				$this->dm->remove($action);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getAction( $action_id ) {
		return $this->dm->getRepository( 'Document\Company\Action' )->find( $action_id );
	}

	public function getActions( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Company\Action' )->findAll()
			->limit( $data['limit'] )->skip( $data['start'] )->sort( array('order' => 1) );
	}

	public function getAllActions( $data = array() ) {
		return $this->dm->getRepository( 'Document\Company\Action' )->findAll()->sort( array('order' => 1) );
	}
	
	public function getTotalActions() {
		$actions = $this->dm->getRepository( 'Document\Company\Action' )->findAll();

		return count($actions);
	}

	public function getActionByCode( $code ){
		return $this->dm->getRepository( 'Document\Company\Action' )->findBy( array('code' => $code) );
	}
}
?>