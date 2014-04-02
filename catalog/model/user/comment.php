<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelUserComment extends Model {
	public function getComments( $aData = array() ){
		$query = array();

		if ( empty($aData['page']) ){
			$aData['page'] = 0;
		}

		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['post_slug']) ){
			return array();
		}

		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.slug' => $aData['post_slug']
		));

		$oPost = null;
		if ( $lPosts ){
			$oPost = $lPosts->getPostBySlug( $aData['post_slug'] );
		}
		
		return $oPost->getComments( true );
	}

	public function getComment( $aData = array() ){
		if ( empty($aData['comment_id']) ){
			return array();
		}

		if ( !empty($aData['post_slug']) ){
			$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
				'posts.slug' => $aData['post_slug']
			));
		}else{
			$lPosts = $this->dm->getRepository('Document\Branch\Post')->findOneBy( array(
				'posts.comments.id' => $aData['comment_id']
			));
		}

		$oPost = null;
		if ( $lPosts ){
			$oPost = $lPosts->getPostBySlug( $aData['post_slug'] );
		}

		if ( !$oPost ){
			return null;
		}

		return $oPost->getCommentById( $aData['comment_id'] );
	}

	public function addComment( $aData = array() ){
		// Post is required
		if ( empty($aData['post_slug']) ){
			return false;
		}
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array(
			'posts.slug' => $aData['post_slug']
		));
		if ( !$lPosts ){
			return false;
		}
		$oPost = $lPosts->getPostBySlug( $aData['post_slug'] );
		if ( !$oPost ){
			return false;
		}

		// Author is required
		if ( empty($aData['user_id']) ) {
			return false;
		}
		$oUser = $this->dm->getRepository( 'Document\User\User' )->find( $aData['user_id'] );
		if ( empty($oUser) ) {
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
		$oComment->setContent( htmlentities($aData['content']) );
		$oComment->setStatus( $aData['status'] );
		$oComment->setPostAuthorId( $oPost->getUser()->getId() );
		$oComment->setPostOwnerId( $oPost->getOwnerId() );

		$oPost->addComment( $oComment );
		
		$this->dm->flush();

		// Update cache post for what's new
		$type = $this->config->get('post')['cache']['user'];
		$this->load->model('cache/post');
		$aData = array(
			'post_id' => $oPost->getId(),
			'type' => $type,
			'type_id' => $lPosts->getUser()->getId(),
			'view' => 0,
			'created' => $oComment->getCreated()
		);
		$this->model_cache_post->editPost( $aData );

		return array(
			'comment' => $oComment,
			'post' => $oPost
		);
	}

	public function editComment( $oComment_id, $aData = array() ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $oComment_id
		));

		if ( !$lPosts ){
			return false;
		}

		if ( empty($aData['post_slug']) ){
			return false;
		}

		$oPost = $lPosts->getPostBySlug( $aData['post_slug'] );

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $oComment_id );

		if ( !$oComment ){
			return false;
		}
		
		if ( !empty($aData['likerId']) ){
			$likerIds = $oComment->getLikerIds();

			$key = array_search( $aData['likerId'], $likerIds );
			
			if ( !$likerIds || $key === false ){
				$oComment->addLikerId( $aData['likerId'] );
			}else{
				unset($likerIds[$key]);
				$oComment->setLikerIds( $likerIds );
			}
		}

		if ( !empty($aData['content']) ){
			$oComment->setContent( htmlentities($aData['content']) );
		}

		$this->dm->flush();

		return $oComment;
	}

	public function deleteComment( $oComment_id, $aData = array(), $author_id ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.comments.id' => $oComment_id
		));

		if ( !$lPosts ){
			return false;
		}

		if ( empty($aData['post_slug']) ){
			return false;
		}

		$oPost = $lPosts->getPostBySlug( $aData['post_slug'] );

		if ( !$oPost ){
			return false;
		}

		$oComment = $oPost->getCommentById( $oComment_id );
		
		if ( $oComment->getUser()->getId() != $author_id ){
			return false;
		}

		$oPost->getComments()->removeElement( $oComment );

		$this->dm->flush();

		return true;
	}
}
?>