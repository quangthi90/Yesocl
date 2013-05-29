<?php
class ModelToolCache extends Model {
	public function updateCachePost($object) {
		$list_post_data = $object->formatToCache();

		foreach ( $list_post_data as $post_data ) {
			$this->cache->delete( $object->getId() . '.' . $post_data['page'] );
			$this->cache->set( $object->getId() . '.' . $post_data['page'], $post_data['object'] );
		}

		return $data;
	}

	public function updateCacheUser($object) {
		$object_data = $object->formatToCache();

		$this->cache->delete( $object->getId() );
		$this->cache->set( $object->getId(), $object_data );

		return $list_object_data;
	}
}
?>