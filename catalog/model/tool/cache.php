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
	 * Set last comment of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/08/05
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string type comment ['branch', 'group', 'user']
	 *	- string type ID
	 *	- object Post
	 *	- string Comment ID
	 * @return: Array Object comment
	 */
	public function updateLastComments($type_comment = 'branch', $type_id, $post, $comment_id = 0) {
		$limit = 50;

		$comments = $post->getComments();
		$comment_length = count($comments);
		
		for ( $i = 0; $i < 50 && $i < $comment_length; $i++ ){
			$comment = $comments[$i];
			
			if ( $comment->getId() == $comment_id || $this->getComment($comment->getId(), $post->getId(), $type_comment, $type_id) == null ){
				$this->setComment( $comment, $post->getId(), $type_comment, $type_id );
			}
		}

		return true;
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
		
		$comment = $this->cache->get( $comment_id, $path );
		return $comment;
	}

	/**
	 * Create cache for Comment of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/08/05
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- object Comment
	 *	- string Post ID
	 *	- string type Comment ['branch', 'group', 'user']
	 *	- string type ID
	 * @return: Array Object comment
	 */
	public function setComment($comment, $post_id, $type_comment = 'branch', $type_id) {
		$comment_data = $comment->formatToCache();
		
		$folder_link = $this->config->get($type_comment)['default']['cache_link'];
		$post_folder = $this->config->get('post')['default']['cache_folder'];
		$folder_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link.$type_id.'/'.$post_folder.'/'.$post_id.'/'.$folder_name.'/';
		
		$this->cache->set( $comment->getId(), $comment_data, $path );
		
		return $comment_data;
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

		$comment_caches = $this->getFilesNames( $cache_path );

		$comments = array();
		foreach ( $comment_caches as $filename ) {
			$comment_id = explode('.', $filename);
			$comments[$comment_id[1]] = $this->getComment( $comment_id[1], $post_id, $type_post, $type_id );
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

	public function getFilesNames( $path ){
		$mix_files = scandir( $path );
		$files = array();
		foreach ( $mix_files as $file ) {
			if ( $file == '.' || $file == '..' || !is_file($path . $file) ){
				continue;
			}
			$files[] = $file;
		}
		return $files;
	}
}
?>