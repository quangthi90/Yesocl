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
		$comment->setContent( $data['content'] );
		$comment->setStatus( $data['status'] );

		$post = $this->dm->getRepository('Document\Branch\Post')->find( $post_id );
		$post->addComment( $comment );

		$this->dm->flush();
		
		//-- Update 6 last posts
		$this->load->model('tool/cache');
		$this->load->model('branch/post');

		$posts = $this->model_branch_post->getPosts( array(
			'branch_id' => $post->getBranch()->getId(),
			'category_id' => $post->getCategory()->getId(),
			'limit' => 6
		));
		foreach ( $posts as $p ) {
			if ( $post->getId() == $p->getId() ){
				$this->model_tool_cache->updateLastCategoryPosts( 
					$this->config->get('post')['type']['branch'], 
					$post->getBranch()->getId(), 
					$post->getCategory()->getId(), 
					$posts 
				);
				break;
			}
		}

		$type = $this->config->get('post')['cache']['branch'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $type,
			'view' => 0,
			'created' => $comment->getCreated()
		);
		$this->model_cache_post->editPost( $data );
		
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
		// Post is required
		$post = $this->dm->getRepository('Document\Branch\Post')->find( $post_id );
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
		$comment->setContent( $data['content'] );
		$comment->setStatus( $data['status'] );

		$this->dm->flush();

		// $this->load->model( 'tool/cache' );
		// $this->model_tool_cache->updateLastComments( $this->config->get('comment')['type']['branch'], $branch->getSlug(), $post, $comment_id );
		
		return true;
	}

	public function deleteComment( $post_id, $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$post = $this->dm->getRepository('Document\Branch\Post')->find( $post_id );
				if ( !$post ){
					return false;
				}
			}
			
			foreach ( $data['id'] as $id ) {
				$comment = $post->getCommentById( $id );
				if ( !empty( $comment ) ) {
					// remove cache
					// $this->load->model('tool/cache');
					// $this->model_tool_cache->deleteComment( $id, $post->getSlug(), $this->config->get('comment')['type']['branch'], $branch->getSlug() );

					$post->getComments()->removeElement( $comment );
				}
			}
		}
		
		$this->dm->flush();

		if ( $post ){
			//-- Update 6 last posts
			$this->load->model('tool/cache');
			$this->load->model('branch/post');

			$posts = $this->model_branch_post->getPosts( array(
				'branch_id' => $post->getBranch()->getId(),
				'category_id' => $post->getCategory()->getId(),
				'limit' => 6
			));
			$this->model_tool_cache->updateLastCategoryPosts( 
				$this->config->get('post')['type']['branch'], 
				$post->getBranch()->getId(), 
				$post->getCategory()->getId(), 
				$posts 
			);
		}

		return true;
	}
}
?>