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
			$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
				'posts.slug' => $data['post_slug']
			));
		}else{
			$lPosts = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
				'posts.comments.id' => $data['comment_id']
			));
		}

		$oPost = null;
		if ( $lPosts ){
			$oPost = $lPosts->getPostBySlug( $data['post_slug'] );
		}

		if ( !$oPost ){
			return null;
		}

		return $oPost->getCommentById( $data['comment_id'] );
	}

	public function addComment( $data = array() ){
		// Post is required
		if ( empty($data['post_slug']) ){
			return false;
		}
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array(
			'posts.slug' => $data['post_slug']
		));
		if ( !$lPosts ){
			return false;
		}
		$oPost = $lPosts->getPostBySlug( $data['post_slug'] );
		if ( !$oPost ){
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

		$oComment = new Comment();
		$oComment->setUser( $user );
		// $oComment->setContent( htmlentities($data['content']) );
		$oComment->setContent( $data['content'] );
		$oComment->setStatus( $data['status'] );

		$oPost->addComment( $oComment );
		
		$this->dm->flush();

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['user'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $oPost->getId(),
			'type' => $type,
			'type_id' => $lPosts->getUser()->getId(),
			'view' => 0,
			'created' => $oComment->getCreated()
		);
		$this->model_cache_post->editPost( $data );

		return array(
			'comment' => $oComment,
			'post' => $oPost
		);
	}

	public function editComment( $idComment, $data = array() ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $idComment
		));

		if ( !$lPosts ){
			return false;
		}

		if ( empty($data['post_slug']) ){
			return false;
		}

		$oPost = $lPosts->getPostBySlug( $data['post_slug'] );

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $idComment );

		if ( !$oComment ){
			return false;
		}
		
		if ( !empty($data['likerId']) ){
			$likerIds = $oComment->getLikerIds();

			$key = array_search( $data['likerId'], $likerIds );
			
			if ( !$likerIds || $key === false ){
				$oComment->addLikerId( $data['likerId'] );
			}else{
				unset($likerIds[$key]);
				$oComment->setLikerIds( $likerIds );
			}

			// Update notification
			if ( $oComment->getUser()->getId() != $this->customer->getId() ){
	            $this->load->model('user/notification');

	            if ( in_array($this->customer->getId(), $oComment->getLikerIds()) ){
	                $this->model_user_notification->addNotification(
	                    $oComment->getUser()->getSlug(),
	                    $data['likerId'],
	                    $this->config->get('common')['action']['like'],
	                    $oComment->getId(),
	                    $oPost->getSlug(),
	                    $this->config->get('common')['type']['branch'],
	                    $this->config->get('common')['object']['comment']
	                );
	            }else{
	                $this->model_user_notification->deleteNotification(
	                    $oComment->getUser()->getId(),
	                    $data['likerId'],
	                    $oComment->getId(),
	                    $this->config->get('common')['action']['like']
	                );
	            }
	        }
		}

		if ( !empty($data['content']) ){
			// $oComment->setContent( htmlentities($data['content']) );
			$oComment->setContent( $data['content'] );
		}

		$this->dm->flush();

		return $oComment;
	}

	public function deleteComment( $idComment, $data = array(), $author_id ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $idComment
		));

		if ( !$lPosts ){
			return false;
		}

		if ( empty($data['post_slug']) ){
			return false;
		}

		$oPost = $lPosts->getPostBySlug( $data['post_slug'] );

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $idComment );
		
		if ( $oComment->getUser()->getId() != $author_id ){
			return false;
		}

		$oPost->getComments()->removeElement( $oComment );

		$this->dm->flush();

		return true;
	}
}
?>