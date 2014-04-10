<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Model {
	public function getComments( $data = array() ){
		if ( empty($data['post_slug']) ){
			return array();
		}

		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );

		$comments = array();

		if ( $post ){
			$comments = $post->getComments();
		}
		
		return $comments;
	}

	public function getComment( $data ){
		if ( empty($data['comment_id']) ){
			return array();
		}

		if ( !empty($data['post_slug']) ){
			$post = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );
		}else{
			$post = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
				'comments.id' => $data['comment_id']
			));
		}

		if ( !$post ){
			return null;
		}

		return $post->getCommentById( $data['comment_id'] );
	}

	public function addComment( $data = array() ){
		// Author is required
		if ( empty($data['user_id']) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty($user) ) {
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
		if ( empty($data['content']) ) {
			return false;
		}

		// Status
		$data['status'] = true;

		$comment = new Comment();
		$comment->setUser( $user );
		// $comment->setContent( htmlentities($data['content']) );
		$comment->setContent( $data['content'] );
		$comment->setStatus( $data['status'] );

		$post->addComment( $comment );
		
		$this->dm->flush();

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['branch'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $type,
			'type_id' => $post->getBranch()->getId(),
			'view' => 0,
			'created' => $comment->getCreated()
		);
		$this->model_cache_post->editPost( $data );

		return array(
			'post' => $post,
			'comment' => $comment
		);
	}

	public function editComment( $comment_id, $data = array() ){
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );
		
		if ( !empty($data['likerId']) ){
			$likerIds = $comment->getLikerIds();

			$key = array_search( $data['likerId'], $likerIds );
			
			if ( !$likerIds || $key === false ){
				$comment->addLikerId( $data['likerId'] );
			}else{
				unset($likerIds[$key]);
				$comment->setLikerIds( $likerIds );
			}
		}

		if ( !empty($data['content']) ){
			// $comment->setContent( htmlentities($data['content']) );
			$comment->setContent( $data['content'] );
		}

		$this->dm->flush();

		return $comment;
	}

	public function deleteComment( $comment_id, $author_id ){
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );
		
		if ( $comment->getUser()->getId() != $author_id ){
			return false;
		}

		$post->getComments()->removeElement( $comment );

		$this->dm->flush();

		return true;
	}
}
?>