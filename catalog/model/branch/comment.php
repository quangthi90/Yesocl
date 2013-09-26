<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Model {
	public function getComments( $data = array() ){
		$query = array();

		if ( empty($data['page']) ){
			$data['page'] = 1;
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
			$query_comments = $post->getComments( true );
			$total = count( $query_comments );

			$start = ($data['page'] - 1) * $data['limit'];

			if ( $start < 0 ){
				$start = 0;
			}
			for ( $i = $start; $i < $total; $i++ ) {
				if ( count($comments) == $data['limit'] ){
					break;
				}

				$comments[] = $query_comments[$i]->formatToCache();
			}
		}

		return array_reverse($comments);
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
}
?>