<?php
class ModelToolCache extends Model {
	public function updateCache($object) {
		$this->load->model('tool/image');
		$data = $object->formatToCache( $this->model_tool_image, $this->url );

		$this->cache->delete( $object->getId() );
		$this->cache->set( $object->getId(), $data );

		return $data;
	}
}
?>