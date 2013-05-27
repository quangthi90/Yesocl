<?php
use Document\Company\Comment;

class ModelCompanyComment extends Doctrine {
	public function addComment( $post_id, $data = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->findOneBy( array( 'posts.id' => $post_id ) );
		if ( empty( $company ) ) {
			return false;
		}

		// Post is required
		$post = $company->getPostById( $post_id );
		if ( empty( $post ) ) {
			return false;
		}

		// Author is required
		if ( !isset( $data['user_id'] ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Content is required
		if ( !isset( $data['comment_content'] ) || empty( $data['comment_content'] ) ) {
			return false;
		} 

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = 0;
		}

		$comment = new Comment();
		$comment->setUser( $user );
		$comment->setContent( $data['comment_content'] );
		$comment->setStatus( $data['status'] );

		$post->addComment( $comment );

		$this->dm->flush();

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateCachePost( $post );

		return true;
	}

	public function editComment( $post_id, $comment_id, $data = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->findOneBy( array( 'posts.id' => $post_id ) );
		if ( empty( $company ) ) {
			return false;
		}

		// Post is required
		$post = $company->getPostById( $post_id );
		if ( empty( $post ) ) {
			return false;
		}

		// Author is required
		if ( !isset( $data['user_id'] ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Content is required
		if ( !isset( $data['comment_content'] ) || empty( $data['comment_content'] ) ) {
			return false;
		} 

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = 0;
		}

		$comment = $post->getCommentById( $comment_id );
		$comment->setUser( $user );
		$comment->setContent( $data['comment_content'] );
		$comment->setStatus( $data['status'] );

		$this->dm->flush();

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateCachePost( $post );

		return true;
	}

	public function deleteComments( $post_id, $data = array() ) {
		if ( isset($data['id']) ) {
			$company = $this->dm->getRepository('Document\Company\Company')->findOneBy( array( 'posts.id' => $post_id ) );
			
			$post = $company->getPostById( $post_id );
			
			foreach ( $data['id'] as $id ) {
				$post->getComments()->removeElement( $post->getCommentById( $id ) );
			}
		}
		
		$this->dm->flush();
	}
}
?>