<?php
use Document\Group\Group;

class ModelGroupGroup extends Doctrine {
	public function addGroup( $data = array() ) {
		// Name is required
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		// sumary is required
		if ( !isset($data['sumary']) || empty($data['sumary']) ){
			return false;
		}
		
		// description is required
		if ( !isset($data['description']) || empty($data['description']) ){
			return false;
		}
		
		// email is required
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( !$user ){
			return false;
		}
		
		// type is required
		if ( !isset($data['type']) || empty($data['type']) ){
			return false;
		}
		$type = $this->dm->getRepository('Document\group\Type')->find( $data['type'] );
		if ( !$type ){
			return false;
		}

		// Status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		// Website
		if ( !isset( $data['website'] ) ) {
			$data['website'] = '';
		}
		
		$group = new group();
		$group->setAuthor( $user );
		$group->setName( $data['name'] );
		$group->setSumary( $data['sumary'] );
		$group->setDescription( $data['description'] );
		$group->setType( $type );
		$group->setStatus( $data['status'] );
		$group->setWebsite( $data['website'] );

		// Branch
		if ( isset( $data['branch_id'] ) ) {
			$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $data['branch_id'] );
			$group->setBranch( $branch );
		}

		$this->dm->persist( $group );
		$this->dm->flush();
	}

	public function editGroup( $id, $data = array() ) {
		// Name is required
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		// sumary is required
		if ( !isset($data['sumary']) || empty($data['sumary']) ){
			return false;
		}
		
		// description is required
		if ( !isset($data['description']) || empty($data['description']) ){
			return false;
		}
		
		// email is required
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( !$user ){
			return false;
		}
		
		// type is required
		if ( !isset($data['type']) || empty($data['type']) ){
			return false;
		}
		$type = $this->dm->getRepository('Document\group\Type')->find( $data['type'] );
		if ( !$type ){
			return false;
		}

		// Status
		if ( !isset( $data['status'] ) ) {
			$data['status'] = 0;
		}

		// Website
		if ( !isset( $data['website'] ) ) {
			$data['website'] = '';
		}
		
		$group = $this->dm->getRepository('Document\Group\Group')->find( $id );
		
		if ( !$group ){
			return false;
		}

		// Branch
		if ( isset( $data['branch_id'] ) ) {
			$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $data['branch_id'] );
			$group->setBranch( $branch );
		}

		$group->setAuthor( $user );
		$group->setName( $data['name'] );
		$group->setSumary( $data['sumary'] );
		$group->setDescription( $data['description'] );
		$group->setType( $type );
		$group->setStatus( $data['status'] );
		$group->setWebsite( $data['website'] );

		$this->dm->flush();
	}

	public function deleteGroup( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$group = $this->dm->getRepository( 'Document\Group\Group' )->find( $id );

				$this->dm->remove($group);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getGroup( $group_id ) {
		return $this->dm->getRepository( 'Document\Group\Group' )->find( $group_id );
	}

	public function getGroups( $data = array() ) {
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}
		
		return $this->dm->getRepository( 'Document\Group\Group' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}

	public function getGroupByPostId( $post_id ){
		return $this->dm->getRepository( 'Document\Group\Group' )->findOneBy( array('posts.id' => $post_id) );
	}
	
	public function getTotalGroups() {
		$groups = $this->dm->getRepository( 'Document\Group\Group' )->findAll();

		return count($groups);
	}
}
?>