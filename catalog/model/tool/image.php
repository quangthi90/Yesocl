<?php
class ModelToolImage extends Model {
	public function resize($filename, $width, $height) {
		if (!file_exists(DIR_IMAGE . $filename) || !is_file(DIR_IMAGE . $filename)) {
			return;
		} 
		
		$info = pathinfo($filename);
		$extension = $info['extension'];
		
		$old_image = $filename;
		$new_image = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
		
		if (!file_exists(DIR_IMAGE . $new_image) || (filemtime(DIR_IMAGE . $old_image) > filemtime(DIR_IMAGE . $new_image))) {
			$path = '';
			
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
				
				if (!file_exists(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}		
			}
			
			$image = new Image(DIR_IMAGE . $old_image);
			$image->resize($width, $height);
			$image->save(DIR_IMAGE . $new_image);
		}
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			return HTTPS_IMAGE . $new_image;
		} else {
			return HTTP_IMAGE . $new_image;
		}	
	}

	public function getGavatar( $email, $size = 100 ){
		return "http://www.gravatar.com/avatar/" . md5( $email ) . "?s=" . $size;
	}

	public function deleteDirectoryImage( $dirname ) {
  		if(is_dir($dirname)){
    		$files = glob( $dirname . '*', GLOB_MARK );
    		foreach( $files as $file )
      			$this->deleteDirectoryImage( $file );
    		rmdir( $dirname );
  		}else{
    		unlink( $dirname );
    	}
	}

	public function isValidImage( $file ) {
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = end(explode(".", $file["name"]));

		if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/png")) && ($file["size"] < 300000) && in_array($extension, $allowedExts)) {
  			if ($file["error"] > 0) {
    			return false;
    		}
  			else {
	    		return true;
    		}
  		}
		else {
  			return false;
  		}
	}

	public function uploadImage( $folder, $filename, $thumb ) {
		$ext = end(explode(".", $thumb["name"]));

		if (file_exists( DIR_IMAGE . $path . '.jpg')) {
			unlink($path . '.jpg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.jpeg' ) ) {
			unlink($path . '.jpeg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.gif' ) ) {
			unlink($path . '.gif');
		}elseif ( file_exists( DIR_IMAGE . $path . '.png' ) ) {
			unlink($path . '.png' );
		}

		$folder_names = explode('/', $folder);
		$path = DIR_IMAGE;
		
		foreach ( $folder_names as $folder_name ) {
			$path .= $folder_name . '/';
			if ( !is_dir( $path ) ) {
				mkdir( $path );
			}
		}
		
		$image_path = $folder . '/' . $filename . '.' . $ext;
		// var_dump($image_path); exit;
		if ( move_uploaded_file( $thumb['tmp_name'], DIR_IMAGE . $image_path ) ) {
			return $image_path;
		}else {
			return false;
		}
	}

	public function getAvatarUser( $_avatar, $_email ){
		$avatar = $this->resize( $_avatar, 180, 180 );

		if ( $avatar ){
			return $avatar;
		}

		return $this->getGavatar( $_email, 180 );
	}
}
?>