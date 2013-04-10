<?php
use Document\Group\Comment;

class ModelGroupComment extends Doctrine {
	public function addComment( $data = array(), $post_id ) {
		// content is require
		if ( !isset($data['content']) || empty($data['content']) ){
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
		if ( !isset( $post_id ) ) {
			return false;
		}
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );
		if ( empty( $group ) ) {
			return false;
		}

		$post = $group->getPostById( $post_id );
		if ( empty( $post ) ) {
			return false;
		}
		
		$comment = new Comment();
		$comment->setContent( $data['content'] );
		$comment->setUser( $user );
		$comment->setStatus( $data['status'] );
		
		$post->addComment( $comment );
		
		$this->dm->flush();
		
		return true;
	}

	public function editComment( $comment_id, $data = array() ) {
		// content is require
		if ( !isset($data['content']) || empty($data['content']) ){
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
		
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.comments.id' => $comment_id ) );
		if ( empty( $group ) ) {
			return false;
		}

		foreach ( $group->getPosts() as $post ){
			$comment = $post->getCommentById( $comment_id );
			if ( !empty( $comment ) ) {
				$comment->setContent( $data['content'] );
				$comment->setUser( $user );
				$comment->setStatus( $data['status'] );
				break;
			}
		}
		
		$this->dm->flush();
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array('posts.comments.id' => $data['id'][0]) );
			}else {
				return false;
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $group->getPosts() as $post ){
					$comment = $post->getCommentById( $id );
					if ( !empty( $comment ) ) {
						$post->getComments()->removeElement( $comment );
						break;
					}
				}
			}
		}else {
			return false;
		}
		
		$this->dm->flush();
	}
}
?>