<?php
use Document\User\Post;

class ModelUserPost extends Doctrine {
	public function addPost( $data = array(), $user_id ) {
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
		$author = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $author ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}

		// Group is required
		if ( !isset( $user_id ) ) {
			return false;
		}
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );
		if ( empty( $user ) ) {
			return false;
		}
		
		$post = new Post();
		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $author );
		$post->setStatus( $data['status'] );
		
		$user->addPost( $post );
		
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
		$author = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $author ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}
		
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );
		
		foreach ( $user->getPosts() as $post ){
			if ( $post->getId() == $post_id ){
				$post->setTitle( $data['title'] );
				$post->setContent( $data['postcontent'] );
				$post->setUser( $author );
				$post->setStatus( $data['status'] );
				break;
			}
		}
		
		$this->dm->flush();
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$user = $this->dm->getRepository('Document\User\User')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $user->getPosts() as $post ){
					if ( $post->getId() == $id ){
						$user->getPosts()->removeElement( $post );
						break;
					}
				}
			}
		}
		
		$this->dm->flush();
	}

	public function getPost( $post_id ) {
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( empty( $user ) ) {
			return false;
		}

		foreach ( $user->getPosts() as $post ){
			if ( $post->getId() == $post_id ){
				return $post;
			}
		}
	}

	public function getUserId( $post_id ) {
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( !empty( $user ) ) {
			return $user->getId();
		}

		return false;
	}
}
?>