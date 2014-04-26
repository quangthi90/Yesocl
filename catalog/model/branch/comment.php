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

	public function getComment( $idComment ){
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
			'comments.id' => $data['comment_id']
		));

		if ( !$oPost ){
			return null;
		}

		return $oPost->getCommentById( $idComment );
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

		$oComment = new Comment();
		$oComment->setUser( $user );
		// $oComment->setContent( htmlentities($data['content']) );
		$oComment->setContent( $data['content'] );
		$oComment->setStatus( $data['status'] );

		$oPost->addComment( $oComment );
		
		$this->dm->flush();

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['branch'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $oPost->getId(),
			'type' => $type,
			'type_id' => $oPost->getBranch()->getId(),
			'view' => 0,
			'created' => $oComment->getCreated()
		);
		$this->model_cache_post->editPost( $data );

		return array(
			'post' => $oPost,
			'comment' => $oComment
		);
	}

	public function editComment( $idComment, $data = array() ){
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $idComment
		));

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $idComment );
		
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

	public function deleteComment( $idComment, $author_id ){
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $idComment
		));

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