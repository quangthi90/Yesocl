<?php
class ModelToolCache extends Model {
	public function setPost($object, $folder) {
		$list_post_data = $object->formatToCache();

		foreach ( $list_post_data as $post_data ) {
			$this->cache->set( $post_data['page'], $post_data['object'], $folder );
		}
		
		return $list_post_data;
	}

	public function getPost($paging = 1, $folder){
		return $this->cache->get($paging, $folder);
	}

	public function deletePost($folder){
		$this->load->model('tool/image');
		$this->model_tool_image->deleteDirectoryImage(DIR_CACHE . $folder);
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
		$cache_path = $cache_link . $branch->getId() . '/';

		$this->load->model('tool/image');
		$this->model_tool_image->deleteDirectoryImage( $cache_path );
	}
}
?>