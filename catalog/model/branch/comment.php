<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Model {
	public function getComments( $data = array(), $isReverse = false ){
		if ( empty($data['post_slug']) ){
			return array();
		}

		$oPost = $this->dm->createQueryBuilder('Document\Branch\Post')
			->field('slug')->equals($data['post_slug'])
		    // ->selectSlice('comments', $aData['start'], $aData['limit'])
		    ->getQuery()
		    ->getSingleResult();

		if ( !$oPost ) return array();

		$this->dm->clear();
		return $oPost->getComments($isReverse);
	}

	public function getComment( $data ){
		if ( empty($data['comment_id']) ){
			return array();
		}

		if ( !empty($data['post_slug']) ){
			$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );
		}else{
			$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
				'comments.id' => $data['comment_id']
			));
		}

		if ( !$oPost ){
			return null;
		}

		return $oPost->getCommentById( $data['comment_id'] );
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
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );
		if ( !$oPost ){
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

		$oPost->addComment( $comment );
		
		$this->dm->flush();

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['branch'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $oPost->getId(),
			'type' => $type,
			'type_id' => $oPost->getBranch()->getId(),
			'view' => 0,
			'created' => $comment->getCreated()
		);
		$this->model_cache_post->editPost( $data );

		return array(
			'post' => $oPost,
			'comment' => $comment
		);
	}

	public function editComment( $comment_id, $data = array() ){
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$oPost ){
			return false;
		}

		$comment = $oPost->getCommentById( $comment_id );
		
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
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $comment_id
		));

		if ( !$oPost ){
			return false;
		}

		$comment = $oPost->getCommentById( $comment_id );
		
		if ( $comment->getUser()->getId() != $author_id ){
			return false;
		}

		$oPost->getComments()->removeElement( $comment );

		$this->dm->flush();

		return true;
	}
}
?>