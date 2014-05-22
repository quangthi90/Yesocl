<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelUserComment extends Model {
	private $oPost = null;

	public function getComments( $aData = array(), $isReverse = false ){
		if ( empty($aData['post_slug']) ){
			return array();
		}

		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		$oPosts = $this->dm->createQueryBuilder('Document\User\Posts')
			->field('posts.slug')->equals($aData['post_slug'])
		    ->selectSlice('posts.comments', $aData['start'], $aData['limit'])
		    ->getQuery()
		    ->getSingleResult();

		if ( !$oPosts ) return null;

		$this->dm->clear();

		// Update permission
		$lComments = $oPosts->getPostBySlug($aData['post_slug'])->getComments($isReverse);
		$aComments = array();
		$idLoggedUser = $this->customer->getId();
		foreach ( $lComments as $oComment ) {
			if ( $idLoggedUser == $oComment->getUser()->getId() ) {
				$oComment->setCanDelete( true );
				$oComment->setCanEdit( true );
			}elseif ( $idLoggedUser == $oPost->getUser()->getId() || $idLoggedUser == $oPost->getOwnerId() ) {
				$oComment->setCanDelete( true );
			}

			$aComments[] = $oComment;
		}

		return $aComments;
	}

	public function getComment( $idComment ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $idComment
		));

		if ( !$lPosts ){
			return null;
		}

		$oPost = $lPosts->getPostByCommentId( $idComment );

		if ( !$oPost ){
			return null;
		}

		$this->oPost = $oPost;

		return $oPost->getCommentById( $idComment );
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

        if ( $oComment->getUser()->getId() == $this->customer->getId() ){
        	$oComment->setCanEdit( true );
        	$oComment->setCanDelete( true );
        }

		$this->oPost = $oPost;

		return $oComment;
	}

	public function editComment( $idComment, $data = array() ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $idComment
		));

		if ( !$lPosts ){
			return false;
		}

		$oPost = $lPosts->getPostByCommentId( $idComment );

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

		$this->oPost = $oPost;

		return $oComment;
	}

	public function deleteComment( $idComment, $author_id ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $idComment
		));

		if ( !$lPosts ){
			return false;
		}

		$oPost = $lPosts->getPostByCommentId( $idComment );

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $idComment );
		
		if ( $oComment->getUser()->getId() != $author_id ){
			return false;
		}

		$oPost->getComments()->removeElement( $oComment );

		$this->dm->flush();

		$this->oPost = $oPost;

		return $oPost->getComments()->count();
	}

	public function getTotalComments( $sPostSlug ){
		$oPost = $this->oPost;
		if ( $oPost && $oPost->getSlug() == $sPostSlug ){
			return $oPost->getComments()->count();
		}

		$oPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.slug' => $sPostSlug
		));

		if ( !$oPosts ){
			return -1;
		}

		$oPost = $oPosts->getPostBySlug( $sPostSlug );

		$this->oPost = $oPost;

		return $oPost->getComments()->count();
	}
}
?>