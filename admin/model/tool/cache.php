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
	 *	- string type Slug
	 * @return: Array Object Post
	 */
	public function setPost($post, $type_post = 'branch', $type_slug) {
		$post_data = $post->formatToCache();

		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_slug . '/' . $folder_name . '/' . $post->getSlug() . '/';

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
	 *	- string Post Slug
	 * @return: Array Object Post
	 */
	public function updateLastPosts($type_post = 'branch', $type, $post_slug = '') {
		$limit = 60;

		$posts = $type->getPosts();
		$post_length = count($posts);

		for ( $i = 0; $i < 60 && $i < $post_length; $i++ ){
			$post = $posts[$i];

			if ( $post->getSlug() == $post_slug || $this->getPost($post->getSlug(), $type_post, $type->getSlug()) == null ){
				$this->setPost( $post, $type_post, $type->getSlug() );
			}
		}

		return true;
	}

	/**
	 * Get post of
	 *	- Branch
	 *	- Group
	 *	- User
	 * By Slug
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post Slug
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type Slug
	 * @return: Array Object Post
	 */
	public function getPost($post_slug, $type_post, $type_slug){
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_slug . '/' . $folder_name . '/' . $post_slug . '/';

		$file_name = $this->config->get('common')['default']['main_object_post'];
		return $this->cache->get($file_name, $path);
	}

	/**
	 * Delete Post
	 * 2013/07/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post Slug
	 *	- string type post ['branch', 'group', 'user']
	 *	- string Type Slug
	 */
	public function deletePost($post_slug, $type_post, $type_slug){
		$folder_link = $this->config->get($type_post)['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $type_slug . '/' . $folder_name . '/' . $post_slug . '/';
		
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
	 *	- string Post Slug
	 *	- string type Comment ['branch', 'group', 'user']
	 *	- string type Slug
	 * @return: Array Object comment
	 */
	public function setComment($comment, $post_slug, $type_comment = 'branch', $type_slug) {
		$comment_data = $comment->formatToCache();
		
		$folder_link = $this->config->get($type_comment)['default']['cache_link'];
		$post_folder = $this->config->get('post')['default']['cache_folder'];
		$folder_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link.$type_slug.'/'.$post_folder.'/'.$post_slug.'/'.$folder_name;
		
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
	 *	- string type Slug
	 *	- object Post
	 *	- string Comment Slug
	 * @return: Array Object comment
	 */
	public function updateLastComments($type_comment = 'branch', $type_slug, $post, $comment_id = 0) {
		$limit = 50;

		$comments = $post->getComments();
		$comment_length = count($comments);

		$post_data = $post->formatToCache();

		$this->setPost( $post, $type_comment, $type_slug );
		
		for ( $i = 0; $i < $limit && $i < $comment_length; $i++ ){
			$comment = $comments[$i];
			
			if ( $comment->getId() == $comment_id || $this->getComment($comment->getId(), $post->getSlug(), $type_comment, $type_slug) == null ){
				$this->setComment( $comment, $post->getSlug(), $type_comment, $type_slug );
			}
		}

		return true;
	}

	/**
	 * Get comment of
	 *	- Branch
	 *	- Group
	 *	- User
	 * By Slug
	 * 2013/08/05
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string comment Slug
	 *	- string Post Slug
	 *	- string type comment ['branch', 'group', 'user']
	 *	- string Type Slug
	 * @return: Array Object comment
	 */
	public function getComment($comment_slug, $post_slug, $type_comment, $type_slug){
		$folder_link = $this->config->get($type_comment)['default']['cache_link'];
		$post_folder = $this->config->get('post')['default']['cache_folder'];
		$folder_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link.$type_slug.'/'.$post_folder.'/'.$post_slug.'/'.$folder_name.'/';
		
		return $this->cache->get($comment_slug, $path);
	}

	/**
	 * Delete comment
	 * 2013/08/05
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string comment Slug
	 *	- string post Slug
	 *	- string type comment ['branch', 'group', 'user']
	 *	- string Type Slug
	 */
	public function deleteComment($comment_slug, $post_slug, $type_comment, $type_slug){
		$folder_link = $this->config->get($type_comment)['default']['cache_link'];
		$post_folder = $this->config->get('post')['default']['cache_folder'];
		$folder_name = $this->config->get('comment')['default']['cache_folder'];
		$path = $folder_link.$type_slug.'/'.$post_folder.'/'.$post_slug.'/'.$folder_name;
		
		$this->cache->delete( $comment_slug, $path );
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
		$cache_path = $cache_link . $object->getSlug() . '/';
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
	public function deleteObject( $object_slug, $object_type = 'branch' ){
		//-- link of cache Folder of Branch --
		$cache_link = $this->config->get($object_type)['default']['cache_link'];
		//-- path of cache Folder of Branch --
		$cache_path = $cache_link . $object_slug . '/';

		$this->load->model('tool/image');
		$this->model_tool_image->deleteDirectoryImage( DIR_CACHE . $cache_path );
	}
}
?>