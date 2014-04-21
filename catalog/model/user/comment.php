<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelUserComment extends Model {
	public function getComments( $aData = array(), $isReverse = false ){
		$oPosts = $this->dm->createQueryBuilder('Document\User\Posts')
			->field('posts.slug')->equals($aData['post_slug'])
		    // ->selectSlice('posts.comments', $aData['start'], $aData['limit'])
		    ->getQuery()
		    ->getSingleResult();

		if ( !$oPosts ) return null;

		$this->dm->clear();
		return $oPosts->getPostBySlug($aData['post_slug'])->getComments($isReverse);
	}

	public function getComment( $data = array() ){
		if ( empty($data['comment_id']) ){
			return array();
		}

		if ( !empty($data['post_slug']) ){
			$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
				'posts.slug' => $data['post_slug']
			));
		}else{
			$posts = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
				'posts.comments.id' => $data['comment_id']
			));
		}

		$post = null;
		if ( $posts ){
			$post = $posts->getPostBySlug( $data['post_slug'] );
		}

		if ( !$post ){
			return null;
		}

		return $post->getCommentById( $data['comment_id'] );
	}

	public function addComment( $data = array() ){
		// Post is required
		if ( empty($data['post_slug']) ){
			return false;
		}
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array(
			'posts.slug' => $data['post_slug']
		));
		if ( !$posts ){
			return false;
		}
		$post = $posts->getPostBySlug( $data['post_slug'] );
		if ( !$post ){
			return false;
		}

		// Author is required
		if ( empty($data['user_id']) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty($user) ) {
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
		$type = $this->config->get('post')['cache']['user'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $type,
			'type_id' => $posts->getUser()->getId(),
			'view' => 0,
			'created' => $comment->getCreated()
		);
		$this->model_cache_post->editPost( $data );

		return array(
			'comment' => $comment,
			'post' => $post
		);
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

	public function deleteComment( $comment_id, $data = array(), $author_id ){
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
		
		if ( $comment->getUser()->getId() != $author_id ){
			return false;
		}

		$post->getComments()->removeElement( $comment );

		$this->dm->flush();

		return true;
	}
}
?>