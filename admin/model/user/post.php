<?php
use Document\User\Post;

class ModelUserPost extends Doctrine {
	public function addPost( $data = array(), $user_id, $thumb = array() ) {
		// title is require
		if ( !isset($data['title']) || empty($data['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($data['postcontent']) || empty($data['postcontent']) ){
			return false;
		}
		
		// author is require
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$author = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $author ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}

		// Group is required
		if ( !isset( $user_id ) ) {
			return false;
		}
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );
		if ( empty( $user ) ) {
			return false;
		}
		
		$post = new Post();
		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $author );
		$post->setStatus( $data['status'] );

		if ( !empty( $thumb ) ) {
			if ( $data['thumb'] = $this->uploadThumb( $user->getId(), $post->getId(), $thumb ) ) {
				$post->setThumb( $data['thumb'] );
			}
		}
		
		$user->addPost( $post );
		
		$this->dm->flush();
		
		return true;
	}

	public function editPost( $post_id, $data = array(), $thumb = array() ) {
		// title is require
		if ( !isset($data['title']) || empty($data['title']) ){
			return false;
		}
		
		// content is require
		if ( !isset($data['postcontent']) || empty($data['postcontent']) ){
			return false;
		}
		
		// author is require
		if ( !isset($data['user_id']) || empty($data['user_id']) ){
			return false;
		}
		$author = $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		if ( empty( $author ) ) {
			return false;
		}

		// status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = false;
		}

		// thumb
		if ( isset($thumb) && $thumb['name'] != '' ) {
  			if ( !$this->isValidThumb( $thumb ) ) {
  				return false;
  			}
  		}
		else {
			$thumb = array();
  		}
		
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );
		
		$post = $user->getPostById( $post_id );

		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $author );
		$post->setStatus( $data['status'] );

		if ( count($thumb) > 0 ) {
			if ( $data['thumb'] = $this->uploadThumb( $user->getId(), $post->getId(), $thumb ) ) {
				$post->setThumb( $data['thumb'] );
			}else {
				$post->setThumb( '' );
			}
		}
		
		$this->dm->flush();
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$user = $this->dm->getRepository('Document\User\User')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				foreach ( $user->getPosts() as $post ){
					if ( $post->getId() == $id ){
						$user->getPosts()->removeElement( $post );
						break;
					}
				}
			}
		}
		
		$this->dm->flush();
	}

	public function getPost( $post_id ) {
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( empty( $user ) ) {
			return false;
		}

		foreach ( $user->getPosts() as $post ){
			if ( $post->getId() == $post_id ){
				return $post;
			}
		}
	}

	public function getUserId( $post_id ) {
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );

		if ( !empty( $user ) ) {
			return $user->getId();
		}

		return false;
	}

	public function isValidThumb( $file ) {
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

	public function uploadThumb( $user_id, $post_id, $thumb ) {
		$ext = end(explode(".", $thumb["name"]));
		$path = 'data/catalog/user/' . $user_id . '/post/' . $post_id . '/thumb.';
		if (file_exists( DIR_IMAGE . $path . '.jpg')) {
			unlink($path . '.jpg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.jpeg' ) ) {
			unlink($path . '.jpeg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.gif' ) ) {
			unlink($path . '.gif');
		}elseif ( file_exists( DIR_IMAGE . $path . '.png' ) ) {
			unlink($path . '.png' );
		}

		if ( !is_dir( DIR_IMAGE . 'data/catalog/user/' ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/user/' );
		}
		if ( !is_dir( DIR_IMAGE . 'data/catalog/user/' . $user_id ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/user/' . $user_id );
		}
		
		if ( !is_dir( DIR_IMAGE . 'data/catalog/user/' . $user_id . '/post' ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/user/' . $user_id . '/post' );
		}

		if ( !is_dir( DIR_IMAGE . 'data/catalog/user/' . $user_id . '/post/' . $post_id ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/user/' . $user_id . '/post/' . $post_id );
		}

		if ( move_uploaded_file( $thumb['tmp_name'], DIR_IMAGE . $path . $ext ) ) {
			return $path . $ext;
		}else {
			return false;
		}
	}

	public function delete_directory( $dirname ) {
  		if(is_dir($dirname)){
    		$files = glob( $dirname . '*', GLOB_MARK );
    		foreach( $files as $file )
      			$this->delete_directory( $file );
    		rmdir( $dirname );
  		}else
    		unlink( $dirname );
	}
}
?>