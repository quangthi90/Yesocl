<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Doctrine {
	public function getComments( $data = array() ){
		$query = array();

		if ( empty($data['start']) ){
			$data['start'] = 0;
		}

		if ( empty($data['limit']) ){
			$data['limit'] = 10;
		}

		if ( empty($data['post_slug']) ){
			return array();
		}

		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );

		$comments = array();

		if ( $post ){
			foreach ( $post->getComments() as $key => $comment ) {
				if ( $key < $data['start'] ){
					continue;
				}

				if ( count($comments) == $data['limit'] ){
					break;
				}

				$comments[] = $comment->formatToCache();
			}
		}

		return $comments;
	}

	public function getComment( $Comment_id ){

	}

	public function addComment( $data = array() ){
		// Author is required
		if ( empty($data['user_id']) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Post is required
		if ( empty($data['post_slug']) ){
			return false;
		}
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );
		if ( !$post ){
			return false;
		}

		// Content is required
		if ( !isset( $data['content'] ) || empty( $data['content'] ) ) {
			return false;
		}

		// Status
		$data['status'] = true;

		$comment = new Comment();
		$comment->setUser( $user );
		$comment->setContent( $data['content'] );
		$comment->setStatus( $data['status'] );

		$post->addComment( $comment );
		
		$this->dm->flush();

		return $comment->formatToCache();
	}

	public function editComment( $comment_id, $data = array() ){
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );
		
		if ( !empty($data['likerId']) && !in_array($data['likerId'], $comment->getLikerIds()) ){
			$comment->addLikerId( $data['likerId'] );
		}

		$this->dm->flush();

		return $comment;
	}
}
?>