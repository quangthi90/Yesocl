<?php
use Document\AbsObject\Comment;

class ModelUserComment extends Doctrine {
	public function addComment( $data = array(), $post_id ) {
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
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );
		if ( empty( $user ) ) {
			return false;
		}

		$post = $user->getPostById( $post_id );
		if ( empty( $post ) ) {
			return false;
		}
		
		$comment = new Comment();
		$comment->setContent( $data['content'] );
		$comment->setUser( $author );
		$comment->setStatus( $data['status'] );
		
		$post->addComment( $comment );
		
		$this->dm->flush();
		
		//-- Update 50 last Comments
		$this->load->model('tool/cache');
		$this->model_tool_cache->updateLastComments( $this->config->get('comment')['type']['user'], $user->getSlug(), $post, $comment->getId() );
		
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
		
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.comments.id' => $comment_id ) );
		if ( empty( $user ) ) {
			return false;
		}

		foreach ( $user->getPosts() as $post ){
			$comment = $post->getCommentById( $comment_id );
			if ( !empty( $comment ) ) {
				$comment->setContent( $data['content'] );
				$comment->setUser( $author );
				$comment->setStatus( $data['status'] );
				break;
			}
		}
		
		$this->dm->flush();

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateLastComments( $this->config->get('comment')['type']['user'], $user->getSlug(), $post, $comment_id );
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$user = $this->dm->getRepository('Document\User\User')->findOneBy( array('posts.comments.id' => $data['id'][0]) );
				
				if ( !$user ){
					return false;
				}

				$post = $this->dm->getRepository('Document\User\Post')->findOneBy( array('comments.id' => $data['id'][0]) );
				
				if ( !$post ){
					return false;
				}
			}else {
				return false;
			}
			
			foreach ( $data['id'] as $id ) {
				$comment = $post->getCommentById( $id );
				if ( !empty( $comment ) ) {
					// remove cache
					$this->load->model('tool/cache');
					$this->model_tool_cache->deleteComment( $id, $post->getSlug(), $this->config->get('comment')['type']['user'], $user->getSlug() );

					$post->getComments()->removeElement( $comment );
				}
			}
		}else {
			return false;
		}
		
		$this->dm->flush();

		return true;
	}
}
?>