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

		if ( !isset($data['page']) || empty($data['page']) ) {
			$data['page'] = 1;
		}else {
			$data['page'] = (int)$data['page'];
		}

		if ( $data['page'] > 5 ) {
			$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $data['branch_id'] );
			$post = $branch->getPostById( $data['post_id'] );
			$data = $post->getComments();
			$index = $data['page']*$data['limit'] - 1;
			$comments = array();
			if ( $index < count( $data ) ) {
				for ($i=0; $i < 10; $i++) { 
					$comments[] = array(
						'author' 		=> $data[$index]->getAuthor(),
						'content' 		=> html_entity_decode($data[$index]->getContent()),
						'created'		=> $data[$index]->getCreated()->format('h:i A d/m/Y'),
						'user_id'		=> $data[$index]->getUser()->getId(),
						'status'		=> $data[$index]->getStatus()
						);
				}
			}
			return $comments;
		}else {
			$comments = $this->model_tool_cache->getLastComments( $data['post_id'], $this->config->get('common')['type']['branch'], $data['branch_id'] );
			
			if ( $data['order'] != 'ASC' ) {
				$comments = krsort( $comments );
			} 

			if ( $data['page']*10 <= count($comments) ) {
				return array_slice( $comments, count( $comments ) - $data['limit']*$data['page'], $data['limit']);
			}else {
				if ( ($data['page']*10 - count($comments)) > 10 ) {
					return array();
				}else {
					return array_slice( $comments, 0, $data['limit'] + count( $comments ) - $data['limit']*$data['page'] );
				}
			}
		}
	}

	public function getComment( $Comment_id ){

	}

	public function addComment( $data = array() ){
		// Branch is required
		if ( empty($data['branch_slug']) ){
			return false;
		}

		$branch = $this->dm->getRepository('Document\Branch\Branch')->findOneBySlug( $data['branch_slug'] );
		if ( empty( $branch ) ) {
			return false;
		}

		// Author is required
		if ( empty($data['user_id']) ) {
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