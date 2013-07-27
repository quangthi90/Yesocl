<?php
class ModelToolCache extends Model {
	/**
	 * Create cache for Post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- object Post
	 *	- string type post ['branch', 'group', 'user']
	 *	- string type ID
	 * @return: Array Object Post
	 */
	public function setPost($post, $type_post = 'branch', $type_id) {
		$list_post_data = $post->formatToCache();

		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_name . '/' . $post->getId() . '/';

		foreach ( $list_post_data as $post_data ) {
			$this->cache->set( $post_data['page'], $post_data['object'], $path );
		}
		
		return $list_post_data;
	}

	/**
	 * Set 60 last post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string type post ['branch', 'group', 'user']
	 *	- object type
	 * @return: Array Object Post
	 */
	public function updateLastPosts($type_post = 'branch', $type, $post_id = 0) {
		$limit = 60;

		$posts = $type->getPosts();
		$post_length = count($posts);

		for ( $i = 0; $i < 60 && $i < $post_length; $i++ ){
			$post = $posts[$i];

			if ( $post->getId() == $post_id || $this->getPost(1, $post->getId(), $type_post, $type->getId()) == null ){
				$this->setPost( $post, $type_post, $type->getId() );
			}
		}

		return true;
	}

	/**
	 * Get post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * By ID
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- int page of comment (50 comments / page)
	 *	- string Post ID
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type ID
	 * @return: Array Object Post
	 */
	public function getPost($paging = 1, $post_id, $type_post, $type_id){
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_name . '/' . $post_id . '/';

		return $this->cache->get($paging, $path);
	}

	/**
	 * Delete Post
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post ID
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type ID
	 */
	public function deletePost($post_id, $type_post, $type_id){
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_name . '/' . $post_id . '/';
		
		$this->load->model('tool/image');
		$this->model_tool_image->deleteDirectoryImage(DIR_CACHE . $path);
	}

	public function setUser($object) {
		$object_data = $object->formatToCache();

		$this->cache->delete( $object->getId(), $this->config->get('cache')['folder']['user'] );
		$this->cache->set( $object->getId(), $object_data, $this->config->get('cache')['folder']['user'] );

		return $object_data;
	}

	public function getUser($user_id){
		return $this->cache->get($user_id, $this->config->get('cache')['folder']['user']);
	}

	/**
	 * Create cache for Branch
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: Object Branch
	 * @return: Array Object Branch
	 */
	public function setBranch( $branch ){
		$object_data = $branch->formatToCache();
		
		//-- link of cache Folder of Branch --
		$cache_link = $this->config->get('branch')['default']['cache_link'];
		//-- path of cache Folder of Branch --
		$cache_path = $cache_link . $branch->getId() . '/';
		//-- name of cache file of Branch
		$file_name = $this->config->get('common')['default']['main_object_cache'];
		//-- call cache function in library
		$this->cache->set( $file_name, $object_data, $cache_path );

		return $object_data;
	}

	/**
	 * Delete cache of Branch
	 * Include all cache follow Branch such as posts, comments...
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: Object Branch
	 * @return: Array Object Branch
	 */
	public function deleteBranch( $branch_id ){
		//-- link of cache Folder of Branch --
		$cache_link = $this->config->get('branch')['default']['cache_link'];
		//-- path of cache Folder of Branch --
		$cache_path = $cache_link . $branch_id . '/';

		$this->load->model('tool/image');
		$this->model_tool_image->deleteDirectoryImage( DIR_CACHE . $cache_path );
	}
}
?>