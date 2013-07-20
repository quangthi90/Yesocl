<?php
class ModelToolCache extends Model {
	public function setPost($object) {
		$list_post_data = $object->formatToCache();

		foreach ( $list_post_data as $post_data ) {
			$this->cache->delete( $object->getId() . '.' . $post_data['page'], $this->config->get('cache')['folder']['post'] );
			$this->cache->set( $object->getId() . '.' . $post_data['page'], $post_data['object'], $this->config->get('cache')['folder']['post'] );
		}
		
		return $list_post_data;
	}

	public function getPost($post_id, $paging = 1){
		return $this->cache->get("$post_id.$paging", $this->config->get('cache')['folder']['post']);
	}

	public function deletePost($post_id){
		$stop = false;
		$i = 1;
		while ( $stop == false ) {
			if ( $this->cache->get("$post_id.$i", $this->config->get('cache')['folder']['post']) ){
				$this->cache->delete("$post_id.$i", $this->config->get('cache')['folder']['post']);
			}else{
				$stop = true;
			}
		}
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
}
?>