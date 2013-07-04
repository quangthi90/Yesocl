<?php
use Document\Design\Action,
	Document\Design\Layout,
	Document\Setting\Config;

class ModelDesignAction extends Doctrine {
	public function addAction( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}

		if ( !isset($data['code']) || empty($data['code']) ){
			return false;
		}
		$data['code'] = strtolower(trim($data['code']));
		
		$action = new Action();
		$action->setName( $data['name'] );
		$action->setCode( $data['code'] );
		if ( isset($data['order']) && !empty($data['order']) ){
			$action->setOrder( $data['order'] );
		}

		$config = new Config();
		$config->setKey( $this->config->get( 'action_title' ) . $data['code'] );
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
		
		$action = $this->dm->getRepository('Document\Design\Action')->find( $id );
		
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
				$action = $this->dm->getRepository( 'Document\Design\Action' )->find( $id );
				
				// if action = 'view' ==> not del
				if ( $action->getCode() == $this->config->get('action_view') ){
					continue;
				}

				$layouts = $this->dm->getRepository( 'Document\Design\Layout' )->findBy( array('actions.id' => $id) );
				foreach ( $layouts as $layout ) {
					$layout->removeAction( $id );
				}

				$groups = $this->dm->getRepository( 'Document\Admin\Group' )->findBy( array('permissions.actions.id' => $id) );
				foreach ( $groups as $group ) {
					$permissions = $group->getPermissionByActionId( $id );
					foreach ( $permissions as $permission ) {
						$group->getPermissions()->removeElement( $permission );
					}
				}

				$config = $this->dm->getRepository('Document\Setting\Config')->findOneByKey( $this->config->get( 'action_title' ) . $action->getCode() );
				if ( $config ){
					$this->dm->remove( $config );
				}

				$this->dm->remove( $action );
			}
		}
		
		$this->dm->flush();
	}
	
	public function getAction( $action_id ) {
		$action = $this->dm->getRepository( 'Document\Design\Action' )->find( $action_id );
		return $action;
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
    		->skip( $data['start'] )
    		->sort( 'order' );
    	
    	return $query->getQuery()->execute();
	}

	public function getAllActions() {
		$query = $this->dm->createQueryBuilder( 'Document\Design\Action' )->sort( 'order' );
    		
    	return $query->getQuery()->execute();
	}
	
	public function getTotalActions() {
		$query = $this->dm->createQueryBuilder( 'Document\Design\Action' );

		$actions = $query->getQuery()->execute();

		return count($actions);
	}

	public function getActionByCode( $code ){
		return $this->dm->getRepository( 'Document\Design\Action' )->findBy( array('code' => $code) );
	}
}
?>