<?php
class ModelToolImage extends Model {
	public function resize($filename, $width, $height, $scale = false) {
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
			if ( $scale == false ){
				$image->resize($width, $height);
			}else{
				$image->scale($width, $height);
			}
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

	public function getAvatarUser( $_avatar, $_email ){
		$avatar = $this->resize( $_avatar, 180, 180 );

		if ( $avatar ){
			return $avatar;
		}

		return $this->getGavatar( $_email, 180 );
	}

	public function isValidImage( $file ) {
		$allowedType = array("image/gif", "image/jpeg", "image/jpg", "image/png");
		
		if ( $file["size"] < 500000 && in_array($file["type"], $allowedType) && !$file['error'] ) {
	    	return true;
  		}

  		return false;
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

    public function upload( $path, $name, $param_name ) {
        //Option for upload:
    	$options = array(
            'script_url' => HTTP_SERVER,
            'upload_dir' => DIR_IMAGE.'/data/upload/',
            'upload_url' => HTTP_IMAGE . $path,
            'user_dirs' => false,
            'mkdir_mode' => 0755,
            'param_name' => $param_name,
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => array(
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE'
            ),
            'access_control_allow_headers' => array(
                'Content-Type',
                'Content-Range',
                'Content-Disposition'
            ),
            // Enable to provide file downloads via GET requests to the PHP script:
            //     1. Set to 1 to download files via readfile method through PHP
            //     2. Set to 2 to send a X-Sendfile header for lighttpd/Apache
            //     3. Set to 3 to send a X-Accel-Redirect header for nginx
            // If set to 2 or 3, adjust the upload_url option to the base path of
            // the redirect parameter, e.g. '/files/'.
            'download_via_php' => false,
            // Read files in chunks to avoid memory limits when download_via_php
            // is enabled, set to 0 to disable chunked reading of files:
            'readfile_chunk_size' => 10 * 1024 * 1024, // 10 MiB
            // Defines which files can be displayed inline when downloaded:
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Defines which files (based on their names) are accepted for upload:
            'accept_file_types' => '/.+$/i',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            // The maximum number of files for the upload directory:
            'max_number_of_files' => null,
            // Image resolution restrictions:
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to false to disable rotating images based on EXIF meta data:
            'orient_image' => true,
            'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images:
                /*
                '' => array(
                    'max_width' => 1920,
                    'max_height' => 1200,
                    'jpeg_quality' => 95
                ),
                */
                // Uncomment the following to create medium sized images:
                /*
                'medium' => array(
                    'max_width' => 800,
                    'max_height' => 600,
                    'jpeg_quality' => 80
                ),
                */
                'thumbnail' => array(
                    // Uncomment the following to use a defined directory for the thumbnails
                    // instead of a subdirectory based on the version identifier.
                    // Make sure that this directory doesn't allow execution of files if you
                    // don't pose any restrictions on the type of uploaded files, e.g. by
                    // copying the .htaccess file from the files directory for Apache:
                    //'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/thumb/',
                    //'upload_url' => $this->get_full_url().'/thumb/',
                    // Uncomment the following to force the max
                    // dimensions and e.g. create square thumbnails:
                    //'crop' => true,
                    'max_width' => 450,
                    'max_height' => 400
                )
            )
        );

        $upload = new Upload( $options );

    	switch ($upload->get_server_var('REQUEST_METHOD')) {
            case 'OPTIONS':
            case 'HEAD':
                $upload->head();
                break;
            case 'GET':
                $upload->get();
                break;
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $upload->post( true, $name );
                break;
            case 'DELETE':
                $upload->delete();
                break;
            default:
                $upload->header('HTTP/1.1 405 Method Not Allowed');
        }
    }
}
?>