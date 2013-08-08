<?php
class ModelToolCache extends Model {
	/**
	 * Get All Branch
	 * 2013/08/06
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @return: Array Object Branch
	 */
	public function getAllBranchIds(){
		//-- link of cache Folder of Branch --
		$cache_link = $this->config->get('branch')['default']['cache_link'];
		
		$branch_ids = $this->getFolderNames( DIR_CACHE . $cache_link );
		
		$branchs = array();
		foreach ( $branch_ids as $branch_id ) {
			$branch = $this->getObject( $branch_id );
			if ( $branch['status'] == true ){
				$branchs[$branch_id] = $branch;
			}
		}

		return $branchs;
	}

	/**
	 * Create cache for 
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: Object Branch
	 * @return: Array Object Branch
	 */
	public function getObject( $object_id, $object_type = 'branch' ){
		//-- link of cache Folder of Branch
		$cache_link = $this->config->get($object_type)['default']['cache_link'];
		//-- path of cache Folder of Branch
		$cache_path = $cache_link . $object_id;
		//-- name of cache file of Branch
		$file_name = $this->config->get('common')['default']['main_object_cache'];
		//-- call cache function in library
		return $this->cache->get( $file_name, $cache_path );
	}

	/**
	 * Create cache for
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: Object Branch
	 * @return: Array Object Branch
	 */
	public function setObject( $object, $object_type = 'branch' ){
		$object_data = $object->formatToCache();
		
		//-- link of cache Folder of Branch
		$cache_link = $this->config->get($object_type)['default']['cache_link'];
		//-- path of cache Folder of Branch
		$cache_path = $cache_link . $object->getId() . '/';
		//-- name of cache file of Branch
		$file_name = $this->config->get('common')['default']['main_object_cache'];
		//-- call cache function in library
		$this->cache->set( $file_name, $object_data, $cache_path );

		return $object_data;
	}

	/**
	 * Get cache Post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post ID
	 *	- string type post ['branch', 'group', 'user']
	 *	- string type ID
	 * @return: Array Object Post
	 */
	public function getPost($post_id, $type_post = 'branch', $type_id) {
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_post_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_post_name . '/' . $post_id;
		
		$file_name = $this->config->get('common')['default']['main_object_post'];
		$post = $this->cache->get( $file_name, $path );
		
		return $post;
	}

	/**
	 * Get last post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type ID
	 * @return: Array Object Post
	 */
	public function getLastPosts($type_post = 'branch', $type_id) {
		//-- link of cache Folder of Branch
		$cache_link = $this->config->get($type_post)['default']['cache_link'];
		//-- cache post folder name
		$folder_post_name = $this->config->get('post')['default']['cache_folder'];
		//-- path of cache Folder of Branch
		$cache_path = DIR_CACHE . $cache_link . $type_id . '/' . $folder_post_name . '/';

		$post_ids = $this->getFolderNames( $cache_path );

		$posts = array();
		foreach ( $post_ids as $post_id ) {
			$posts[$post_id] = $this->getPost( $post_id, $type_post, $type_id );
		}

		return $posts;
	}

	/**
	 * Get cache Comment of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Comment ID
	 *	- string Post ID
	 *	- string type post ['branch', 'group', 'user']
	 *	- string type ID
	 * @return: Array Object Post
	 */
	public function getComment($comment_id, $post_id, $type_post = 'branch', $type_id) {
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_post_name = $this->config->get('post')['default']['cache_folder'];
		$folder_comment_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_post_name . '/' . $post_id . '/' . $folder_comment_name;
		
		$post = $this->cache->get( $comment_id, $path );
		
		return $post;
	}

	/**
	 * Get last comment of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/08/09
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type ID
	 *	- string Post ID
	 * @return: Array Object Post
	 */
	public function getLastComments($post_id, $type_post = 'branch', $type_id) {
		//-- link of cache Folder of Branch
		$cache_link = $this->config->get($type_post)['default']['cache_link'];
		//-- cache post folder name
		$folder_post_name = $this->config->get('post')['default']['cache_folder'];
		//-- cache comment folder name
		$folder_comment_name = $this->config->get('comment')['default']['cache_folder'];
		//-- path of cache Folder of Branch
		$cache_path = DIR_CACHE . $cache_link . $type_id . '/' . $folder_post_name . '/' . $post_id . '/' . $folder_comment_name . '/';

		$comment_ids = $this->getFolderNames( $cache_path );

		$comments = array();
		foreach ( $comment_ids as $comment_id ) {
			$comments[$comment_id] = $this->getComment( $comment_id, $post_id, $type_post, $type_id );
		}

		return $comments;
	}

	public function getFolderNames( $path ){
		$files = scandir( $path );
		$folders = array();
		foreach ( $files as $file ) {
			if ( $file == '.' || $file == '..' || !is_dir($path . $file) ){
				continue;
			}
			$folders[] = $file;
		}
		return $folders;
	}
}
?>