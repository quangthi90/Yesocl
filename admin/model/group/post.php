<?php
use Document\Group\Post;

class ModelGroupPost extends Doctrine {
	public function addPost( $data = array(), $group_id ) {
		// title is require
		if ( !isset($data['title']) || empty($data['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($data['postcontent']) || empty($data['postcontent']) ){
			return false;
		}
		
		// author is require
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$user = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}

		// Group is required
		if ( !isset( $group_id ) ) {
			return false;
		}
		$group = $this->dm->getRepository('Document\Group\Group')->find( $group_id );
		if ( empty( $group ) ) {
			return false;
		}
		
		$post = new Post();
		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $user );
		$post->setStatus( $data['status'] );

		if ( isset($data['category_id']) && !empty($data['category_id']) ){
			$category = $this->dm->getRepository('Document\Branch\Category')->find( $data['category_id'] );
			$post->setCategory( $category );
		}
		
		$group->addPost( $post );
		
		$this->dm->flush();
		
		return true;
	}

	public function editPost( $post_id, $data = array() ) {
		// title is require
		if ( !isset($data['title']) || empty($data['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($data['postcontent']) || empty($data['postcontent']) ){
			return false;
		}
		
		// author is require
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$user = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}
		
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );
		
		foreach ( $group->getPosts() as $post ){
			if ( $post->getId() == $post_id ){
				$post->setTitle( $data['title'] );
				$post->setContent( $data['postcontent'] );
				$post->setUser( $user );
				$post->setStatus( $data['status'] );

				if ( isset($data['category_id']) && !empty($data['category_id']) ){
					$category = $this->dm->getRepository('Document\Branch\Category')->find( $data['category_id'] );
					$post->setCategory( $category );
				}
		
				break;
			}
		}
		
		$this->dm->flush();
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $group->getPosts() as $post ){
					if ( $post->getId() == $id ){
						$group->getPosts()->removeElement( $post );
						break;
					}
				}
			}
		}
		
		$this->dm->flush();
	}

	public function getPost( $post_id ) {
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( empty( $group ) ) {
			return false;
		}

		foreach ( $group->getPosts() as $post ){
			if ( $post->getId() == $post_id ){
				return $post;
			}
		}
	}

	public function getGroupId( $post_id ) {
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( !empty( $group ) ) {
			return $group->getId();
		}

		return false;
	}
}
?>