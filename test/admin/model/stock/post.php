<?php
use Document\Stock\Post;

use MongoId;

class ModelStockPost extends Model {
	/**
	 * Add new Post of Stock to Database
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Stock ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Title 		-- required
	 *		string Company ID 	-- required
	 *		string User ID 		-- required
	 *		string Description 	-- required
	 *		string Content 		-- required
	 *		bool Status
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function addPost( $stock_id, $data = array(), $thumb = array() ) {
		// Stock is required
		$stock = $this->dm->getRepository( 'Document\Stock\Stock' )->find( $stock_id );
		if ( empty( $stock ) ) {
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
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );
		$post->setStock( $stock );

		$this->dm->persist( $post );
		$this->dm->flush();
		
		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('stock')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $stock->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();
		
		//-- Update 6 last posts
		$type = $this->config->get('post')['cache']['stock'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $type,
			'type_id' => $stock->getId(),
			'view' => 0,
			'created' => $post->getCreated()
		);
		$this->model_cache_post->addPost( $data );
		
		return $post;
	}

	/**
	 * Edit Post of Stock to Database
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

		$post = $this->dm->getRepository('Document\Stock\Post')->find( $post_id );

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
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );

		$stock = $post->getStock();

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('stock')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $stock->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();
		
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
	public function deletePost( $stock_id, $data = array() ) {
		$this->load->model('tool/image');
		$this->load->model('cache/post');

		$this->model_cache_post->deletePost( $data );

		if ( isset($data['id']) ) {			
			foreach ( $data['id'] as $id ) {
				$post = $this->dm->getRepository('Document\Stock\Post')->find( $id );
				if ( !empty( $post ) ) {
					$folder_link = $this->config->get('stock')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $stock_id . '/' . $folder_name . '/' . $post->getId();
					
					$this->model_tool_image->deleteDirectoryImage( $path );
					
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
	 *	- string Stock ID
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
		if ( !empty($data['stock_id']) ){
			$query['stock.id'] = $data['stock_id'];
		}

		$results = $this->dm->getRepository('Document\Stock\Post')
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
	public function getPost( $post_id ){
		$result = $this->dm->getRepository('Document\Stock\Post')->find( $post_id );

		return $result;
	}
}
?>