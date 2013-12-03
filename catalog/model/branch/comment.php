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

		return $comment;
	}

	public function editComment( $comment_id, $data = array() ){
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );
		
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

	public function deleteComment( $comment_id, $data = array() ){
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$post ){
			return false;
		}

		$comment = $post->getCommentById( $comment_id );
		
		if ( $comment->getUser()->getId() != $this->customer->getId() ){
			return false;
		}

		$post->getComments()->removeElement( $comment );

		$this->dm->flush();

		return true;
	}
}
?>