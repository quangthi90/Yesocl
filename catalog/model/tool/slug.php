<?php
class ModelToolSlug extends Model {
	public function getSlug($slug, $arr_slugs) {
		$i = 1;
		$slug_output = $slug;
		while (true) {
			if ( !in_array($slug_output, $arr_slugs) ){
				return $slug_output;
			}
			$slug_output = $slug . '-' . $i;
			$i++;
		}
	}
}
?>