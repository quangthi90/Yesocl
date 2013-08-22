<?php
use Document\Branch\Post;

use MongoId;

class ModelBranchPost extends Doctrine {
	/**
	 * Add new Post of Branch to Database
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
	public function addPost( $branch_id, $data = array(), $thumb = array() ) {
		// Branch is required
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->find( $branch_id );
		if ( empty( $branch ) ) {
			return false;
		}

		// Title is required
		if ( !isset( $data['title'] ) || empty( $data['title'] ) ) {
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

		// Category is required
		if ( !isset( $data['category_id'] ) ) {
			return false;
		}
		
		$category = $this->dm->getRepository( 'Document\Branch\Category' )->find( $data['category_id'] );
		if ( empty( $category ) ) {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// Content is required
		if ( !isset( $data['post_content'] ) || empty( $data['post_content'] ) ) {
			return false;
		}

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = $data['status'];
		}else {
			$data['status'] = false;
		}

		$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();

		$post = new Post();
		$post->setSlug( $slug );
		$post->setTitle( $data['title'] );
		$post->setUser( $user );
		$post->setCategory( $category );
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );
		$post->setBranch( $branch );

		$this->dm->persist( $post );
		$this->dm->flush();
		
		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $branch->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();
		
		//-- Update 6 last posts
		$this->load->model('tool/cache');

		$posts = $this->getPosts( array(
			'branch_id' => $branch_id,
			'category_id' => $data['category_id'],
			'limit' => 6
		));
		$this->model_tool_cache->updateLastCategoryPosts( 
			$this->config->get('post')['type']['branch'], 
			$branch->getId(), 
			$category->getId(), 
			$posts 
		);
		
		return $post;
	}

	/**
	 * Edit Post of Branch to Database
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post ID
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
	public function editPost( $post_id, $data = array(), $thumb = array() ) {
		// Title is required
		if ( !isset( $data['title'] ) || empty( $data['title'] ) ) {
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

		// Category is required
		if ( !isset( $data['category_id'] ) ) {
			return false;
		}
		$category = $this->dm->getRepository( 'Document\Branch\Category' )->find( $data['category_id'] );
		if ( empty( $category ) ) {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// Content is required
		if ( !isset( $data['post_content'] ) || empty( $data['post_content'] ) ) {
			return false;
		}
  		
		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = $data['status'];
		}else {
			$data['status'] = false;
		}

		$post = $this->dm->getRepository('Document\Branch\Post')->find( $post_id );

		if ( !$post ){
			return false;
		}

		// Check slug
		if ( $data['title'] != $post->getTitle() ){
			$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();

			$post->setSlug( $slug );
		}

		$post->setTitle( $data['title'] );
		$post->setUser( $user );
		$post->setCategory( $category );
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );

		$branch = $post->getBranch();

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $branch->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();

		//-- Update 6 last posts
		$this->load->model('tool/cache');

		$posts = $this->getPosts( array(
			'branch_id' => $branch_id,
			'category_id' => $data['category_id'],
			'limit' => 6
		));
		
		$this->model_tool_cache->updateLastCategoryPosts( 
			$this->config->get('post')['type']['branch'], 
			$branch->getId(), 
			$category->getId(), 
			$posts 
		);
		
		return true;
	}

	/**
	 * Delete Post by ID
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- array string Post ID
	 * @return: boolean
	 */
	public function deletePost( $branch_id, $data = array() ) {
		if ( isset($data['id']) ) {			
			foreach ( $data['id'] as $id ) {
				$post = $this->dm->getRepository('Document\Branch\Post')->find( $id );
				if ( !empty( $post ) ) {
					$folder_link = $this->config->get('branch')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $branch_id . '/' . $folder_name . '/' . $post->getId();
					
					$this->load->model('tool/image');
					$this->model_tool_image->deleteDirectoryImage( $path );

					// remove cache
					// $this->load->model('tool/cache');
					// $this->model_tool_cache->deletePost( $post->getSlug(), $this->config->get('post')['type']['branch'], $branch->getSlug() );

					$this->dm->remove( $post );
				}
			}
		}
		
		$this->dm->flush();

		return true;
	}

	/**
	 * Get Posts
	 * 2013/08/22
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: array data
	 *	- int limit
	 *	- int start
	 *	- string Branch ID
	 * @return: array object Posts
	 */
	public function getPosts( $data = array() ){
		if ( empty($data['limit']) ){
			$data['limit'] = 10;
		}

		if ( empty($data['start']) ){
			$data['start'] = 0;
		}

		$query = array();
		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}

		if ( !empty($data['category_id']) ){
			$query['category.id'] = $data['category_id'];
		}

		$results = $this->dm->getRepository('Document\Branch\Post')->findBy( $query )->sort(array(
			'created' => -1
		));

		return $results;
	}

	/**
	 * Get Post by ID
	 * 2013/08/22
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post ID
	 * @return: array object Posts
	 */
	public function getPost( $post_id ){
		$result = $this->dm->getRepository('Document\Branch\Post')->find( $post_id );

		return $result;
	}
}
?>