<?php
use Document\Design\Layout;

class ModelDesignLayout extends Doctrine {
	public function addLayout( $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$layout = new Layout();
		$layout->setName( $data['name'] );

		$this->dm->persist( $layout );
		$this->dm->flush();
	}

	public function editLayout( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$layout = $this->dm->getRepository('Document\Design\Layout')->find( $id );
		
		if ( !$layout ){
			return false;
		}

		$layout->setName( $data['name'] ); 

		$this->dm->flush();
	}

	public function deleteLayout( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$layout = $this->dm->getRepository( 'Document\Design\Layout' )->find( $id );

				$values = $this->dm->getRepository( 'Document\Design\value' )->findBy( array( 'Layout.id' => $id ) );
				foreach ($values as $value) {
					$this->dm->remove($value);
				}

				$this->dm->remove($layout);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getLayout( $layout_id ) {
		return $this->dm->getRepository( 'Document\Design\Layout' )->find( $layout_id );
	}

	public function getLayouts( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$query = $this->dm->createQueryBuilder( 'Document\Design\Layout' )
    		->limit( $data['limit'] )
    		->skip( $data['start'] );
    		
    	return $query->getQuery()->execute();
	}

	public function getAllLayouts() {
		$query = $this->dm->createQueryBuilder( 'Document\Design\Layout' );
    		
    	return $query->getQuery()->execute();
	}
	
	public function getTotalLayouts() {
		$query = $this->dm->createQueryBuilder( 'Document\Design\Layout' );

		$layouts = $query->getQuery()->execute();

		return count($layouts);
	}
}
?>