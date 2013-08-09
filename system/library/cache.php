<?php
class Cache { 
	private $expire = 3600; 

  	public function __construct() {
		$files = glob(DIR_CACHE . 'cache.*');
		
		if ($files) {
			foreach ($files as $file) {
				$time = substr(strrchr($file, '.'), 1);

      			if ($time < time()) {
					if (file_exists($file)) {
						unlink($file);
					}
      			}
    		}
		}
  	}

	public function get($key, $folder = '') {
		$files = glob(DIR_CACHE . $folder . '/cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');

		if ($files) {
			$cache = file_get_contents($files[0]);
			
			return unserialize($cache);
		}

		return null;
	}

  	public function set($key, $value, $folder = '') {
    	$this->delete($key, $folder);

    	$folder_names = explode('/', $folder);
		$path = DIR_CACHE;
		
		foreach ( $folder_names as $folder_name ) {
			$path .= $folder_name . '/';
			if ( !is_dir( $path ) ) {
				mkdir( $path );
			}
		}
		
		$file = DIR_CACHE . $folder . '/cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.' . (time() + $this->expire);
    	
		$handle = fopen($file, 'w');

    	fwrite($handle, serialize($value));
		
    	fclose($handle);
  	}
	
  	public function delete($key, $folder = '') {
		$files = glob(DIR_CACHE . $folder . '/cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');
		
		if ($files) {
    		foreach ($files as $file) {
      			if (file_exists($file)) {
					unlink($file);
				}
    		}
		}
  	}
}
?>