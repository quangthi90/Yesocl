<?php
use Document\AbsObject\Comment;

use MongoId;

class ModelBranchComment extends Doctrine {
	/**
	 * Add new Comment of Post in Branch to Database
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Branch ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Title 		-- required
	 *		string Company ID 	-- required
	 *		string User ID 		-- required
	 *		string Category ID 	-- required
	 *		string Description 	-- required
	 *		string Content 		-- required
	 *		bool Status
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function addComment( $post_id, $data = array() ) {
		// Branch is required
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->findOneBy( array(
			'posts.id' => $post_id
		));
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
		if ( isset( $data['status'] ) ) {
			$data['status'] = $data['status'];
		}else {
			$data['status'] = false;
		}

		$comment = new Comment();
		$comment->setUser( $user );
		$comment->setContent( $data['Comment_content'] );
		$comment->setStatus( $data['status'] );

		$post = $branch->getPostById( $post_id );
		$post->addComment( $comment );

		$this->dm->flush();
		
		//-- Update 50 last Comments
		$this->load->model('tool/cache');
		$this->model_tool_cache->updateLastComments( $this->config->get('comment')['type']['branch'], $branch->getId(), $post, $comment->getId() );
		
		return true;
	}

	/**
	 * Edit Comment of Post in Branch to Database
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Comment ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Title 		-- required
	 *		string Company ID 	-- required
	 *		string User ID 		-- required
	 *		string Category ID 	-- required
	 *		string Description 	-- required
	 *		string Content 		-- required
	 *		bool Status
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function editComment( $post_id, $comment_id, $data = array() ) {
		// Branch is required
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->findOneBy( array( 
			'posts.comments.id' => $comment_id
		));
		if ( empty( $branch ) ) {
			return false;
		}

		// Post is required
		$post = $branch->getPostById( $post_id );
		if ( !$post ){
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
		if ( isset( $data['status'] ) ) {
			$data['status'] = $data['status'];
		}else {
			$data['status'] = false;
		}

		$comment = $post->getCommentById( $comment_id );

		$comment->setUser( $user );
		$comment->setContent( $data['comment_content'] );
		$comment->setStatus( $data['status'] );

		$this->dm->flush();

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateLastComments( $this->config->get('comment')['type']['branch'], $branch->getId(), $post, $comment_id );
		
		return true;
	}

	public function deleteComment( $post_id, $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$branch = $this->dm->getRepository('Document\Branch\Branch')->findOneBy( array('posts.comments.id' => $data['id'][0]) );
				if ( !$branch ){
					return false;
				}

				$post = $branch->getPostById( $post_id );
				if ( !$post ){
					return false;
				}
			}
			
			foreach ( $data['id'] as $id ) {
				$comment = $post->getCommentById( $id );
				if ( !empty( $comment ) ) {
					// remove cache
					$this->load->model('tool/cache');
					$this->model_tool_cache->deleteComment( $id, $this->config->get('comment')['type']['branch'], $branch->getId(), $post->getId() );

					$post->getComments()->removeElement( $comment );
				}
			}
		}
		
		$this->dm->flush();

		return true;
	}
}
?>