<?php
use Document\Group\Post;

class ModelGroupPost extends Doctrine {
	/**
	 * Add new Post of Group to Database
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Group ID
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
	public function addPost( $group_id, $data = array(), $thumb = array() ) {
		// title is require
		if ( !isset($data['title']) || empty($data['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($data['postcontent']) || empty($data['postcontent']) ){
			return false;
		}
		
		// author is require
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$user = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}

		// Group is required
		if ( !isset( $group_id ) ) {
			return false;
		}
		$group = $this->dm->getRepository('Document\Group\Group')->find( $group_id );
		if ( empty( $group ) ) {
			return false;
		}

		$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();
		
		$post = new Post();
		$post->setSlug( $slug );
		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $user );
		$post->setStatus( $data['status'] );

		if ( isset($data['category_id']) && !empty($data['category_id']) ){
			$category = $this->dm->getRepository('Document\Branch\Category')->find( $data['category_id'] );
			$post->setCategory( $category );
		}
		
		$group->addPost( $post );
		
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('group')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $group->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();

		//-- Update 60 last posts
		$this->load->model('tool/cache');
		$this->model_tool_cache->updateLastPosts( $this->config->get('post')['type']['group'], $group, $post->getSlug() );
		
		return true;
	}

	/**
	 * Edit Post of Group to Database
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
		// title is require
		if ( !isset($data['title']) || empty($data['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($data['postcontent']) || empty($data['postcontent']) ){
			return false;
		}
		
		// author is require
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$user = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}
		
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );
		
		$post = $group->getPostById( $post_id );

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
		$post->setContent( $data['postcontent'] );
		$post->setStatus( $data['status'] );

		if ( isset($data['category_id']) && !empty($data['category_id']) ){
			$category = $this->dm->getRepository('Document\Branch\Category')->find( $data['category_id'] );
			$post->setCategory( $category );
		}

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('group')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $group->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}
		
		$this->dm->flush();

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateLastPosts( $this->config->get('post')['type']['group'], $group, $post->getSlug() );
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				$post = $group->getPostById( $id );

				if ( !empty( $post ) ) {
					$folder_link = $this->config->get('group')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $group->getId() . '/' . $folder_name . '/' . $post->getId();
					
					$this->load->model('tool/image');
					$this->model_tool_image->deleteDirectoryImage( $path );

					// remove cache
					$this->load->model('tool/cache');
					$this->model_tool_cache->deletePost( $post->getSlug(), $this->config->get('post')['type']['group'], $group->getSlug() );

					$group->getPosts()->removeElement( $post );
				}
			}
		}
		
		$this->dm->flush();
	}

	

	public function isValidThumb( $file ) {
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = end(explode(".", $file["name"]));
		
		if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/png")) && ($file["size"] < 300000) && in_array($extension, $allowedExts)) {
  			if ($file["error"] > 0) {
    			return false;
    		}
  			else {
	    		return true;
    		}
  		}
		else {
  			return false;
  		}
	}

	public function uploadThumb( $group_id, $post_id, $thumb ) {
		$ext = end(explode(".", $thumb["name"]));
		$path = 'data/catalog/group/' . $group_id . '/post/' . $post_id . '/thumb.';
		if (file_exists( DIR_IMAGE . $path . '.jpg')) {
			unlink($path . '.jpg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.jpeg' ) ) {
			unlink($path . '.jpeg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.gif' ) ) {
			unlink($path . '.gif');
		}elseif ( file_exists( DIR_IMAGE . $path . '.png' ) ) {
			unlink($path . '.png' );
		}
		
		if ( !is_dir( DIR_IMAGE . 'data/catalog/group/' ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/group/' );
		}
		if ( !is_dir( DIR_IMAGE . 'data/catalog/group/' . $group_id ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/group/' . $group_id );
		}
		
		if ( !is_dir( DIR_IMAGE . 'data/catalog/group/' . $group_id . '/post' ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/group/' . $group_id . '/post' );
		}

		if ( !is_dir( DIR_IMAGE . 'data/catalog/group/' . $group_id . '/post/' . $post_id ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/group/' . $group_id . '/post/' . $post_id );
		}

		if ( move_uploaded_file( $thumb['tmp_name'], DIR_IMAGE . $path . $ext ) ) {
			return $path . $ext;
		}else {
			return false;
		}
	}

	public function delete_directory( $dirname ) {
  		if(is_dir($dirname)){
    		$files = glob( $dirname . '*', GLOB_MARK );
    		foreach( $files as $file )
      			$this->delete_directory( $file );
    		rmdir( $dirname );
  		}else
    		unlink( $dirname );
	}

	public function getPost( $post_id ) {
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( empty( $group ) ) {
			return false;
		}

		foreach ( $group->getPosts() as $post ){
			if ( $post->getId() == $post_id ){
				return $post;
			}
		}
	}

	public function getGroupId( $post_id ) {
		$group = $this->dm->getRepository('Document\Group\Group')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( !empty( $group ) ) {
			return $group->getId();
		}

		return false;
	}
}
?>