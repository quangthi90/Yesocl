<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelUserComment extends Model {
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

		$user = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'posts.slug' => $data['post_slug']
		));

		$post = null;
		if ( $user ){
			$post = $user->getPostData()->getPostBySlug( $data['post_slug'] );
		}

		$comments = array();

		if ( $post ){
			foreach ( $post->getComments() as $key => $comment ) {
				if ( $key < $data['start'] ){
					continue;
				}

				if ( count($comments) == $data['limit'] ){
					break;
				}

				$comments[] = $comment;
			}
		}
		
		return $comments;
	}

	public function addComment( $data = array() ){
		// Post is required
		if ( empty($data['post_slug']) ){
			return false;
		}
		$user_info = $this->dm->getRepository('Document\User\User')->findOneBy( array(
			'posts.slug' => $data['post_slug']
		));
		if ( !$user_info ){
			return false;
		}
		$post = $user_info->getPostData()->getPostBySlug( $data['post_slug'] );
		if ( !$post ){
			return false;
		}

		// Author is required
		if ( empty($data['user_id']) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
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

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['user'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $type,
			'type_id' => $user_info->getId(),
			'view' => 0,
			'created' => $comment->getCreated()
		);
		$this->model_cache_post->editPost( $data );

		return $comment;
	}

	public function editComment( $comment_id, $data = array() ){
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $comment_id
		));

		if ( !$posts ){
			return false;
		}

		if ( empty($data['post_slug']) ){
			return false;
		}

		$post = $posts->getPostBySlug( $data['post_slug'] );

		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );

		if ( !$comment ){
			return false;
		}
		
		$likerIds = $comment->getLikerIds();

		$key = array_search( $data['likerId'], $likerIds );
		
		if ( !$likerIds || $key === false ){
			$comment->addLikerId( $data['likerId'] );
		}else{
			unset($likerIds[$key]);
			$comment->setLikerIds( $likerIds );
		}

		$this->dm->flush();

		return $comment;
	}
}
?>