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

		$branch->addPost( $post );

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

		//-- Update 60 last posts
		$this->load->model('tool/cache');
		$this->model_tool_cache->updateLastPosts( $this->config->get('post')['type']['branch'], $branch, $post_id );
		
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
		// Branch is required
		$branch = $this->dm->getRepository( 'Document\Branch\Branch' )->findOneBy( array( 'posts.id' => $post_id ) );
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

		$post = $branch->getPostById( $post_id );

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

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateLastPosts( $this->config->get('post')['type']['branch'], $branch, $post_id );
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$branch = $this->dm->getRepository('Document\Branch\Branch')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				$post = $branch->getPostById( $id );
				if ( !empty( $post ) ) {
					$folder_link = $this->config->get('branch')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $branch->getId() . '/' . $folder_name . '/' . $post->getId();
					
					$this->load->model('tool/image');
					$this->model_tool_image->deleteDirectoryImage( $path );

					// remove cache
					$this->load->model('tool/cache');
					$this->model_tool_cache->deletePost( $id, $this->config->get('post')['type']['branch'], $branch->getId() );

					$branch->getPosts()->removeElement( $post );
				}
			}
		}
		
		$this->dm->flush();

		return true;
	}
}
?>