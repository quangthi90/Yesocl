<?php
use Document\Group\Post;

class ModelGroupPost extends Doctrine {
	public function addPost( $data = array(), $group_id ) {
		if ( !isset($data['post']) ){
			return false;
		}
		$post_input = $data['post'];
		
		
		// title is require
		if ( !isset($post_input['title']) || empty($post_input['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($post_input['content']) || empty($post_input['content']) ){
			return false;
		}
		
		// author is require
		if ( !isset($post_input['author']) || empty($post_input['author']) ){
			return false;
		}
		
		$user = $this->dm->getRepository('Document\Group\Group')->findOneBy( array('email' => ))
		
		$post = new Post();
		$post->setTitle( $post_input['title'] );
		$post->setContent( $post_input['content'] );
		$post->setUser($user)
		
		$group_repository = $this->dm->getRepository('Document\Group\Group');
		
		$group = $group_repository->find( $group_id );
		$group->addPost( $post );
		
		$this->dm->flush();
		
		return true;
	}

	public function editPost( $id, $data = array() ) {
		if ( !isset($data['post']) ){
			return false;
		}
		$post_input = $data['post'];
		
		// Name is require
		if ( !isset($post_input['name']) || empty($post_input['name']) ){
			return false;
		}
		
		$group_repository = $this->dm->getRepository('Document\Group\Group');
		
		$group = $group_repository->findOneBy( array('posts.id' => $id) );
		
		foreach ( $group->getPosts() as $post ){
			if ( $post->getId() == $id ){
				$post->setName( $post_input['name'] );
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
}
?>