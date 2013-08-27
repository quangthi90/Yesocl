<?php
use Document\Cache\Post;

use MongoId;

class ModelCachePost extends Doctrine {
	/**
	 * Add new cache Post
	 * 2013/08/25
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Branch ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Post ID
	 *		string Created
	 *		string View
	 *		string Type of Post
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function addPost( $data = array() ) {
		if ( empty($data['post_id']) ){
			return false;
		}
		
		if ( empty($data['type']) ){
			return false;
		}

		if ( empty($data['type_id']) ){
			return false;
		}
		
		if ( !isset($data['view']) ){
			return false;
		}
		
		if ( empty($data['created']) ){
			return false;
		}
		
		$post = new Post();
		$post->setPostId( $data['post_id'] );
		$post->setType( $data['type'] );
		$post->setTypeId( $data['type_id'] );
		$post->setView( $data['view'] );
		$post->setCreated( $data['created'] );
		
		$this->dm->persist( $post );
		$this->dm->flush();
	}

	/**
	 * Edit Cache Post
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Branch ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Post ID
	 *		string Created
	 *		string View
	 *		string Type of Post
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function editPost( $data = array() ) {
		if ( empty($data['post_id']) ){
			return false;
		}

		if ( empty($data['type']) ){
			return false;
		}

		if ( empty($data['type_id']) ){
			return false;
		}

		if ( !isset($data['view']) ){
			return false;
		}

		if ( empty($data['created']) ){
			return false;
		}

		$post = $this->dm->getRepository('Document\Cache\Post')->findOneByPostId( $data['post_id'] );

		if ( !$post ){
			$post = new Post();
		}

		$post->setPostId( $data['post_id'] );
		$post->setType( $data['type'] );

		$post->setTypeId( $data['type_id'] );
		$post->setView( $data['view'] );
		$post->setCreated( $data['created'] );

		$this->dm->persist( $post );
		$this->dm->flush();
	}

	/**
	 * Delete Post by ID
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- array string Post ID
	 * @return: boolean
	 */
	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$post = $this->dm->getRepository('Document\Cache\Post')->findOneByPostId( $id );
				if ( !empty( $post ) ) {
					$this->dm->remove( $post );
				}
			}
		}
		
		$this->dm->flush();

		return true;
	}
}
?>