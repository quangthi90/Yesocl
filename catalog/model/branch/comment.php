<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Doctrine {
	public function getComments( $data = array() ){
		$this->load->model( 'tool/cache' );

		if ( !isset($data['start']) || empty($data['start']) ){
			$data['start'] = 0;
		}

		if ( !isset($data['limit']) || empty($data['limit']) ){
			$data['limit'] = 10;
		}

		if ( !isset($data['sort']) || empty($data['sort']) ){
			$data['sort'] = 'created';
		}

		if ( !isset($data['order']) || empty($data['order']) ){
			$data['order'] = 'ASC';
		}

		if ( !isset($data['branch_id']) || empty($data['branch_id']) ){
			return array();
		}

		if ( !isset($data['post_id']) || empty($data['post_id']) ){
			return array();
		}

		$comments = $this->model_tool_cache->getLastComments( $data['post_id'], $this->config->get('common')['type']['branch'], $data['branch_id'] );
		
		if ( $data['order'] != 'ASC' ) {
			$comments = krsort( $comments );
		} 

		return array_slice( $comments, count( $comments ) - $data['limit']*$data['start'] - $data['limit'], $data['limit']);
	}

	public function getComment( $Comment_id ){

	}

	public function addComment( $data = array() ){
		// Branch is required
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $data['type_id'] );
		if ( empty( $branch ) ) {
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
		if ( !isset( $data['content'] ) || empty( $data['content'] ) ) {
			return false;
		}

		// Status
		$data['status'] = true;

		$comment = new Comment();
		$comment->setUser( $user );
		$comment->setContent( $data['content'] );
		$comment->setStatus( $data['status'] );

		$post = $branch->getPostById( $data['post_id'] );
		$post->addComment( $comment );

		$this->dm->flush();
		
		//-- Update 50 last Comments
		$this->load->model('tool/cache');
		$this->model_tool_cache->updateLastComments( $this->config->get('comment')['type']['branch'], $branch->getId(), $post, $comment->getId() );

		return $comment->formatToCache();
	}
}
?>