<?php
use Document\Group\Group,
	Document\Group\GroupMember;

use MongoId;

class ModelGroupGroup extends Model {
	public function addGroup( $data = array() ) {
		// Name is required
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		// summary is required
		if ( !isset($data['summary']) || empty($data['summary']) ){
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

		$slug = $this->url->create_slug( $data['name'] ) . '-' . new MongoId();
		
		$group = new group();
		$group->setAuthor( $user );
		$group->setName( $data['name'] );
		$group->setSummary( $data['summary'] );
		$group->setDescription( $data['description'] );
		$group->setType( $type );
		$group->setStatus( $data['status'] );
		$group->setWebsite( $data['website'] );
		$group->setSlug( $slug );

		// Category
		if ( isset($data['categories']) || !empty($data['categories']) ){
			$group->setCategories( array() );
			foreach ( $data['categories'] as $category_id ) {
				$category = $this->dm->getRepository('Document\Branch\Category')->find( $category_id );
				$group->addCategory( $category );
			}
		}

		// Branch
		if ( isset( $data['branch_id'] ) ) {
			$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $data['branch_id'] );
			$group->setBranch( $branch );
		}

		$group_member = new GroupMember();
		$group_member->setName( $this->config->get('group')['default']['group_member_name'] );
		$group_member->setStatus( true );
		$group_member->setCanDel( false );
		$this->dm->persist( $group_member );
		$group->addGroupMember( $group_member );

		$this->dm->persist( $group );
		$this->dm->flush();

		//-- create cache for branch
		$this->load->model('tool/cache');
		$this->model_tool_cache->setObject( $group, $this->config->get('post')['type']['group'] );

		return true;
	}

	public function editGroup( $id, $data = array() ) {
		// Name is required
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		// summary is required
		if ( !isset($data['summary']) || empty($data['summary']) ){
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

		// Category
		if ( isset($data['categories']) || !empty($data['categories']) ){
			$group->setCategories( array() );
			foreach ( $data['categories'] as $category_id ) {
				$category = $this->dm->getRepository('Document\Branch\Category')->find( $category_id );
				$group->addCategory( $category );
			}
		}

		// if ( $data['name'] != $group->getName() ){
			$slug = $this->url->create_slug( $data['name'] ) . '-' . new MongoId();

			$group->setSlug( $slug );
		// }

		$group->setAuthor( $user );
		$group->setName( $data['name'] );
		$group->setSummary( $data['summary'] );
		$group->setDescription( $data['description'] );
		$group->setType( $type );
		$group->setStatus( $data['status'] );
		$group->setWebsite( $data['website'] );

		$this->dm->flush();

		//-- create cache for group
		$this->load->model('tool/cache');
		$this->model_tool_cache->setObject( $group, $this->config->get('post')['type']['group'] );

		return true;
	}

	public function deleteGroup( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$group = $this->dm->getRepository( 'Document\Group\Group' )->find( $id );

				if ( !empty( $group ) ) {
					//-- remove cache of Branch
					$this->load->model('tool/cache');
					$this->model_tool_cache->deleteObject( $group->getSlug(), $this->config->get('post')['type']['group'] );

					$this->dm->remove($group);
				}
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
		
		return $this->dm->getRepository( 'Document\Group\Group' )->findAll()->limit( $data['limit'] )->skip( $data['start'] )->sort(array('created' => -1));
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