<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Model {
	public function getComments( $aData = array(), $isReverse = false ){
		if ( empty($aData['post_slug']) ){
			return array();
		}

		$oPost = $this->dm->createQueryBuilder('Document\Branch\Post')
			->field('slug')->equals($aData['post_slug'])
		    // ->selectSlice('comments', $aData['start'], $aData['limit'])
		    ->getQuery()
		    ->getSingleResult();

		if ( !$oPost ) return array();

		$this->dm->clear();
		return $oPost->getComments($isReverse);
	}

	public function getComment( $idComment ){
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
			'comments.id' => $aData['comment_id']
		));

		if ( !$oPost ){
			return null;
		}

		return $oPost->getCommentById( $idComment );
	}

	public function addComment( $aData = array() ){
		// Author is required
		if ( empty($aData['user_id']) ) {
			return false;
		}
		$oUser = $this->dm->getRepository( 'Document\User\User' )->find( $aData['user_id'] );
		if ( empty($oUser) ) {
			return false;
		}

		// Post is required
		if ( empty($aData['post_slug']) ){
			return false;
		}
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $aData['post_slug'] );
		if ( !$oPost ){
			return false;
		}

		// Content is required
		if ( empty($aData['content']) ) {
			return false;
		}

		// Status
		$aData['status'] = true;

		$oComment = new Comment();
		$oComment->setUser( $oUser );
		// $oComment->setContent( htmlentities($aData['content']) );
		$oComment->setContent( $aData['content'] );
		$oComment->setStatus( $aData['status'] );

		$oPost->addComment( $oComment );
		
		$this->dm->flush();

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['branch'];
		$this->load->model('cache/post');
		$aData = array(
			'post_id' => $oPost->getId(),
			'type' => $type,
			'type_id' => $oPost->getBranch()->getId(),
			'view' => 0,
			'created' => $oComment->getCreated()
		);
		$this->model_cache_post->editPost( $aData );

		// Add notification
        $this->load->model('user/notification');
        
        if ( $this->customer->getSlug() != $oPost->getUser()->getSlug() ){
            $this->model_user_notification->addNotification(
                $oPost->getUser()->getSlug(),
                $oUser,
                $this->config->get('common')['action']['comment'],
                $oComment->getId(),
                $oPost->getSlug(),
                $this->config->get('common')['type']['branch'],
                $this->config->get('common')['object']['post']
            );
        }

        if ( !empty($this->request->post['tags']) ){
            $aUserSlugs = $this->request->post['tags'];

            foreach ( $aUserSlugs as $sUserSlug ) {
                $this->model_user_notification->addNotification(
                    $sUserSlug,
                    $oUser,
                    $this->config->get('common')['action']['tag'],
                    $oComment->getId(),
                    $oPost->getSlug(),
                    $this->config->get('common')['type']['branch'],
                    $this->config->get('common')['object']['comment']
                );
            }
        }

		return $oComment;
	}

	public function editComment( $idComment, $aData = array() ){
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBy(array(
			'comments.id' => $idComment
		));

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $idComment );
		
		if ( !empty($aData['likerId']) ){
			$likerIds = $oComment->getLikerIds();

			$key = array_search( $aData['likerId'], $likerIds );
			
			if ( !$likerIds || $key === false ){
				$oComment->addLikerId( $aData['likerId'] );
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
	                    $aData['likerId'],
	                    $this->config->get('common')['action']['like'],
	                    $oComment->getId(),
	                    $oPost->getSlug(),
	                    $this->config->get('common')['type']['branch'],
	                    $this->config->get('common')['object']['comment']
	                );
	            }else{
	                $this->model_user_notification->deleteNotification(
	                    $oComment->getUser()->getId(),
	                    $aData['likerId'],
	                    $oComment->getId(),
	                    $this->config->get('common')['action']['like']
	                );
	            }
	        }
		}

		if ( !empty($aData['content']) && $oComment->getUser()->getId() == $aData['author_id'] ){
			// $oComment->setContent( htmlentities($aData['content']) );
			$oComment->setContent( $aData['content'] );
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