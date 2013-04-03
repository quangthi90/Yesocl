<?php
use Document\Design\Action;

class ModelDesignAction extends Doctrine {
	public function addAction( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		if ( !isset($data['code']) || empty($data['code']) ){
			return false;
		}
		
		$action = new Action();
		$action->setName( $data['name'] );
		$action->setCode( $data['code'] );

		$this->dm->persist( $action );
		$this->dm->flush();
	}

	public function editAction( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		if ( !isset($data['code']) || empty($data['code']) ){
			return false;
		}
		
		$action = $this->dm->getRepository('Document\Design\Action')->find( $id );
		
		if ( !$action ){
			return false;
		}

		$action->setName( $data['name'] ); 
		$action->setCode( $data['code'] );

		$this->dm->flush();
	}

	public function deleteAction( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$action = $this->dm->getRepository( 'Document\Design\Action' )->find( $id );

				$this->dm->remove($action);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getAction( $action_id ) {
		return $this->dm->getRepository( 'Document\Design\Action' )->find( $action_id );
	}

	public function getActions( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Design\Action' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );
    		
    	return $query->getQuery()->execute();
	}

	public function getAllActions() {
		$query = $this->dm->createQueryBuilder( 'Document\Design\Action' );
    		
    	return $query->getQuery()->execute();
	}
	
	public function getTotalActions() {
		$query = $this->dm->createQueryBuilder( 'Document\Design\Action' );

		$actions = $query->getQuery()->execute();

		return count($actions);
	}
}
?>