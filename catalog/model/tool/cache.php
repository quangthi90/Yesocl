<?php
class ModelToolCache extends Model {
	/**
	 * Get All Branch
	 * 2013/08/06
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @return: Array Object Branch
	 */
	public function getAllBranch(){
		//-- link of cache Folder of Branch --
		$cache_link = $this->config->get('branch')['default']['cache_link'];
		$file_name = $this->config->get('common')['default']['main_object_cache'];
	}
}
?>