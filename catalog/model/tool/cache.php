<?php
class ModelToolCache extends Model {
	public function updateCachePost($object) {
		$list_object_data = $object->formatToCache();

		foreach ( $list_object_data as $object_data ) {
			$this->cache->delete( $object->getId() . '.' . $object_data['page'] );
			$this->cache->set( $object->getId() . '.' . $object_data['page'], $object_data['object'] );
		}

		return $list_object_data;
	}

	public function updateCacheUser($object) {
		$object_data = $object->formatToCache();

		$this->cache->delete( $object->getId() );
		$this->cache->set( $object->getId(), $object_data['object'] );

		return $list_object_data;
	}
}
?>