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
		$post_data = $post->formatToCache();

		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_name . '/' . $post->getId() . '/';

		$file_name = $this->config->get('common')['default']['main_object_post'];
		$this->cache->set( $file_name, $post_data, $path );
		
		return $post_data;
	}

	/**
	 * Set last post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string type post ['branch', 'group', 'user']
	 *	- object type
	 *	- string Post ID
	 * @return: Array Object Post
	 */
	public function updateLastPosts($type_post = 'branch', $type, $post_id = 0) {
		$limit = 60;

		$posts = $type->getPosts();
		$post_length = count($posts);

		for ( $i = 0; $i < 60 && $i < $post_length; $i++ ){
			$post = $posts[$i];

			if ( $post->getId() == $post_id || $this->getPost($post->getId(), $type_post, $type->getId()) == null ){
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
	 *	- string Post ID
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type ID
	 * @return: Array Object Post
	 */
	public function getPost($post_id, $type_post, $type_id){
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_id . '/' . $folder_name . '/' . $post_id . '/';

		$file_name = $this->config->get('common')['default']['main_object_post'];
		return $this->cache->get($file_name, $path);
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
		
		for ( $i = 0; $i < 60 && $i < $comment_length; $i++ ){
			$comment = $comments[$i];
			
			if ( $comment->getId() == $comment_id || $this->getComment($comment->getId(), $post->getId(), $type_comment, $type_id) == null ){
				$this->setComment( $comment, $post->getId(), $type_comment, $type_id );
			}
		}

		return true;
	}

	/**
	 * Get comment of
	 *	- Branch
	 *	- Group
	 *	- User
	 * By ID
	 * 2013/08/05
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string comment ID
	 *	- string Post ID
	 *	- string type comment ['branch', 'group', 'user']
	 *	- string Type ID
	 * @return: Array Object comment
	 */
	public function getComment($comment_id, $post_id, $type_comment, $type_id){
		$folder_link = $this->config->get($type_comment)['default']['cache_link'];
		$post_folder = $this->config->get('post')['default']['cache_folder'];
		$folder_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link.$type_id.'/'.$post_folder.'/'.$post_id.'/'.$folder_name.'/';
		
		return $this->cache->get($comment_id, $path);
	}

	/**
	 * Delete comment
	 * 2013/08/05
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string comment ID
	 *	- string post ID
	 *	- string type comment ['branch', 'group', 'user']
	 *	- string Type ID
	 */
	public function deleteComment($comment_id, $post_id, $type_comment, $type_id){
		$folder_link = $this->config->get($type_comment)['default']['cache_link'];
		$post_folder = $this->config->get('post')['default']['cache_folder'];
		$folder_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link.$type_id.'/'.$post_folder.'/'.$post_id.'/'.$folder_name;
		
		$this->cache->delete( $comment_id, $path );
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
	 * Delete cache of 
	 *	- Branch
	 *	- Group
	 *	- User
	 * Include all cache follow Branch such as posts, comments...
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: Object Branch
	 * @return: Array Object Branch
	 */
	public function deleteObject( $object_id, $object_type = 'branch' ){
		//-- link of cache Folder of Branch --
		$cache_link = $this->config->get($object_type)['default']['cache_link'];
		//-- path of cache Folder of Branch --
		$cache_path = $cache_link . $object_id . '/';

		$this->load->model('tool/image');
		$this->model_tool_image->deleteDirectoryImage( DIR_CACHE . $cache_path );
	}
}
?>