<?php
use Document\AbsObject\Comment;

class ModelUserComment extends Model {
	public function addComment( $post_id, $data = array() ) {
		// content is require
		if ( !isset($data['content']) || empty($data['content']) ){
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
		if ( !isset( $post_id ) ) {
			return false;
		}
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array( 
			'posts.id' => $post_id 
		));
		if ( !$posts ) {
			return false;
		}

		$post = $posts->getPostById( $post_id );
		if ( empty( $post ) ) {
			return false;
		}
		
		$comment = new Comment();
		$comment->setContent( $data['content'] );
		$comment->setUser( $author );
		$comment->setStatus( $data['status'] );
		
		$post->addComment( $comment );
		
		$this->dm->flush();
		
		return true;
	}

	public function editComment( $post_id, $comment_id, $data = array() ) {
		// content is require
		if ( !isset($data['content']) || empty($data['content']) ){
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
		
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array( 
			'posts.id' => $post_id
		));
		if ( !$posts ) {
			return false;
		}

		$post = $posts->getPostById( $post_id );
		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );
		if ( !$comment ){
			return false;
		}

		$comment->setContent( $data['content'] );
		$comment->setUser( $author );
		$comment->setStatus( $data['status'] );
		
		$this->dm->flush();
		
		return true;
	}

	public function deletePost( $post_id, $data = array() ) {
		if ( empty($data['id']) ){
			return false;
		}

		if ( empty($post_id) ){
			return false;
		}

		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array(
			'posts.id' => $post_id
		));

		if ( !$posts ){
			return false;
		}

		$post = $posts->getPostById( $post_id );

		if ( !$post ){
			return false;
		}
		
		foreach ( $data['id'] as $id ) {
			$comment = $post->getCommentById( $id );
			if ( $comment ) {
				$post->getComments()->removeElement( $comment );
			}
		}
		
		$this->dm->flush();

		return true;
	}
}
?>