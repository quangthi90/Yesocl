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

	public function setBranch( $branch ){
		
	}
}
?>