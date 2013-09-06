<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Doctrine {
	public function getComments( $data = array() ){
		$this->load->model( 'tool/cache' );

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
		
		//-- Update 6 last posts
		$this->load->model('tool/cache');
		$this->load->model('branch/post');

		$posts = $this->model_branch_post->getPosts( array(
			'branch_id' => $post->getBranch()->getId(),
			'category_id' => $post->getCategory()->getId(),
			'limit' => 6
		));
		foreach ( $posts as $p ) {
			if ( $post->getId() == $p->getId() ){
				$this->model_tool_cache->updateLastCategoryPosts( 
					$this->config->get('post')['type']['branch'], 
					$post->getBranch()->getId(), 
					$post->getCategory()->getId(), 
					$posts 
				);
				break;
			}
		}

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