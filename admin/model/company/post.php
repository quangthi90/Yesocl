<?php
use Document\Company\Post;

use MongoId;

class ModelCompanyPost extends Doctrine {
	public function addPost( $company_id, $data = array(), $thumb = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->find( $company_id );
		if ( empty( $company ) ) {
			return false;
		}

		// Title is required
		if ( !isset( $data['title'] ) || empty( $data['title'] ) ) {
			return false;
		}

		// Author is required
		if ( !isset( $data['user_id'] ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Category is required
		if ( !isset( $data['category'] ) ) {
			return false;
		}
		$category = $this->dm->getRepository( 'Document\Company\Category' )->find( $data['category'] );
		if ( empty( $category ) ) {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// Content is required
		if ( !isset( $data['post_content'] ) || empty( $data['post_content'] ) ) {
			return false;
		} 

		// thumb
		if ( isset( $thumb ) && $thumb['size'] > 0 ) {
  			if ( !$this->isValidThumb( $thumb ) ) {
  				return false;
  			}
  		}
		else {
			$thumb = array();
  		}

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = 0;
		}

		$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();

		$post = new Post();
		$post->setSlug( $slug );
		$post->setTitle( $data['title'] );
		$post->setUser( $user );
		$post->setCategory( $category );
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );

		$company->addPost( $post );

		$this->dm->flush();

		if ( !empty( $thumb ) ) {
			if ( $data['thumb'] = $this->uploadThumb( $company->getId(), $post->getId(), $thumb ) ) {
				$post->setThumb( $data['thumb'] );
			}else {
				$post->setThumb( '' );
			}
			$this->dm->flush();
		}

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateCachePost( $post );

		return true;
	}

	public function editPost( $post_id, $data = array(), $thumb = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->findOneBy( array( 'posts.id' => $post_id ) );
		if ( empty( $company ) ) {
			return false;
		}

		// Title is required
		if ( !isset( $data['title'] ) || empty( $data['title'] ) ) {
			return false;
		}

		// Author is required
		if ( !isset( $data['user_id'] ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Category is required
		if ( !isset( $data['category'] ) ) {
			return false;
		}
		$category = $this->dm->getRepository( 'Document\Company\Category' )->find( $data['category'] );
		if ( empty( $category ) ) {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// Content is required
		if ( !isset( $data['post_content'] ) || empty( $data['post_content'] ) ) {
			return false;
		} 

		// thumb
		if ( isset( $thumb ) ) {
  			if ( !$this->isValidThumb( $thumb ) ) {
  				return false;
  			}
  		}
		else {
			$thumb = array();
  		}

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = 0;
		}

		$post = $company->getPostById( $post_id );

		// Check slug
		if ( $data['title'] != $post->getTitle() ){
			$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();

			$post->setSlug( $slug );
		}

		$post->setTitle( $data['title'] );
		$post->setUser( $user );
		$post->setCategory( $category );
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );

		$this->dm->flush();

		if ( !empty( $thumb ) ) {
			if ( $data['thumb'] = $this->uploadThumb( $company->getId(), $post->getId(), $thumb ) ) {
				$post->setThumb( $data['thumb'] );
			}else {
				$post->setThumb( '' );
			}
			$this->dm->flush();
		}

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateCachePost( $post );

		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$company = $this->dm->getRepository('Document\Company\Company')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				$post = $company->getPostById( $id );
				if ( !empty( $post ) ) {
					$this->delete_directory( DIR_IMAGE . '/data/catalog/company/' . $company->getId() . '/post/' . $post->getId() );
					$company->getPosts()->removeElement( $post );
				}
			}
		}
		
		$this->dm->flush();

		$this->load->model( 'tool/cache' );
		$this->model_tool_cache->updateCachePost( $post );
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

	public function uploadThumb( $company_id, $post_id, $thumb ) {
		$ext = end(explode(".", $thumb["name"]));
		$path = 'data/catalog/company/' . $company_id . '/post/' . $post_id . '/thumb.';
		if (file_exists( DIR_IMAGE . $path . '.jpg')) {
			unlink($path . '.jpg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.jpeg' ) ) {
			unlink($path . '.jpeg');
		}elseif ( file_exists( DIR_IMAGE . $path . '.gif' ) ) {
			unlink($path . '.gif');
		}elseif ( file_exists( DIR_IMAGE . $path . '.png' ) ) {
			unlink($path . '.png' );
		}

		if ( !is_dir( DIR_IMAGE . 'data/catalog/company/' . $company_id ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/company/' . $company_id );
		}

		if ( !is_dir( DIR_IMAGE . 'data/catalog/company/' . $company_id . '/post' ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/company/' . $company_id . '/post' );
		}

		if ( !is_dir( DIR_IMAGE . 'data/catalog/company/' . $company_id . '/post/' . $post_id ) ) {
			mkdir( DIR_IMAGE . 'data/catalog/company/' . $company_id . '/post/' . $post_id );
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