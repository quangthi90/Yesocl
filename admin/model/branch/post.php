<?php
use Document\Branch\Post;

use MongoId;

class ModelBranchPost extends Model {
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

		$oPost = new Post();
		$oPost->setSlug( $slug );
		$oPost->setTitle( $data['title'] );
		$oPost->setUser( $user );
		$oPost->setCategory( $category );
		$oPost->setDescription( $data['description'] );
		$oPost->setContent( $data['post_content'] );
		$oPost->setStatus( $data['status'] );
		$oPost->setBranch( $branch );

		if ( !empty($data['stocks']) ){
			$oPost->setStockTags( $data['stocks'] );
		}

		$this->dm->persist( $oPost );
		$this->dm->flush();
		
		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $branch->getId() . '/' . $folder_name . '/' . $oPost->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$oPost->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();
		
		//-- Update 6 last posts
		$this->load->model('tool/cache');

		$oPosts = $this->getPosts( array(
			'branch_id' => $branch_id,
			'category_id' => $data['category_id'],
			'limit' => 6
		));

		foreach ( $oPosts as $p ) {
			if ( $oPost->getId() == $p->getId() ){
				$this->model_tool_cache->updateLastCategoryPosts( 
					$this->config->get('post')['type']['branch'], 
					$branch->getId(), 
					$category->getId(), 
					$oPosts 
				);
			}
		}

		$type = $this->config->get('post')['cache']['branch'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $oPost->getId(),
			'type' => $type,
			'type_id' => $branch->getId(),
			'view' => 0,
			'created' => $oPost->getCreated()
		);
		$this->model_cache_post->addPost( $data );
		
		return $oPost;
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
	public function editPost( $oPost_id, $data = array(), $thumb = array() ) {
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

		$oPost = $this->dm->getRepository('Document\Branch\Post')->find( $oPost_id );

		if ( !$oPost ){
			return false;
		}

		// Check slug
		if ( $data['title'] != $oPost->getTitle() ){
			$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();

			$oPost->setSlug( $slug );
		}

		$oPost->setTitle( $data['title'] );
		$oPost->setUser( $user );
		$oPost->setCategory( $category );
		$oPost->setDescription( $data['description'] );
		$oPost->setContent( $data['post_content'] );
		$oPost->setStatus( $data['status'] );

		if ( !empty($data['stocks']) ){
			$oPost->setStockTags( $data['stocks'] );
		}

		$branch = $oPost->getBranch();

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $branch->getId() . '/' . $folder_name . '/' . $oPost->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$oPost->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();

		//-- Update 6 last posts
		$this->load->model('tool/cache');

		$oPosts = $this->getPosts( array(
			'branch_id' => $branch_id,
			'category_id' => $data['category_id'],
			'limit' => 6
		));
		
		foreach ( $oPosts as $p ) {
			if ( $oPost->getId() == $p->getId() ){
				$this->model_tool_cache->updateLastCategoryPosts( 
					$this->config->get('post')['type']['branch'], 
					$branch->getId(), 
					$category->getId(), 
					$oPosts 
				);
			}
		}
		
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
		$category_ids = array();

		$this->load->model('tool/image');
		$this->load->model('cache/post');

		$this->model_cache_post->deletePost( $data );

		if ( isset($data['id']) ) {			
			foreach ( $data['id'] as $id ) {
				$oPost = $this->dm->getRepository('Document\Branch\Post')->find( $id );
				if ( !empty( $oPost ) ) {
					$category_id = $oPost->getCategory()->getId();
					$category_ids[$category_id] = $category_id;

					$folder_link = $this->config->get('branch')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $branch_id . '/' . $folder_name . '/' . $oPost->getId();
					
					$this->model_tool_image->deleteDirectoryImage( $path );
					
					$this->dm->remove( $oPost );
				}
			}
		}
		
		$this->dm->flush();

		foreach ( $category_ids as $category_id ) {
			//-- Update 6 last posts
			$this->load->model('tool/cache');

			$oPosts = $this->getPosts( array(
				'branch_id' => $branch_id,
				'category_id' => $category_id,
				'limit' => 6
			));
			$this->model_tool_cache->updateLastCategoryPosts( 
				$this->config->get('post')['type']['branch'], 
				$branch_id, 
				$category_id, 
				$oPosts 
			);
		}

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

		if ( !empty($data['filter_title']) ){
			$query['title'] = new \MongoRegex('/' . trim( $data['filter_title'] ) . '/');
		}

		if ( !empty($data['filter_category']) ){
			$query['category.id'] = $data['filter_category'];
		}

		if ( !empty($data['filter_status']) ){
			$query['status'] = $data['filter_status'];
		}

		$results = $this->dm->getRepository('Document\Branch\Post')
			->findBy( $query )
			->skip( $data['start'] )
			->limit( $data['limit'] )
			->sort( array('created' => -1) );

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
	public function getPost( $oPost_id ){
		$result = $this->dm->getRepository('Document\Branch\Post')->find( $oPost_id );

		return $result;
	}
}
?>