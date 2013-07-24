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
		
		$user->addPost( $post );
		
		$this->dm->flush();

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}

		$this->dm->flush();

		$this->load->model('tool/cache');
		$folder_link = $this->config->get('user')['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();

		$this->model_tool_cache->setPost( $post, $path );
		
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
		
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array( 'posts.id' => $post_id ) );
		
		$post = $user->getPostById( $post_id );

		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $author );
		$post->setStatus( $data['status'] );

		$this->load->model('tool/image');
		if ( !empty($thumb) && $this->model_tool_image->isValidImage($thumb) ) {
			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();
			if ( $data['thumb'] = $this->model_tool_image->uploadImage($path, $avatar_name, $thumb) ) {
				$post->setThumb( $data['thumb'] );
			}
		}
		
		$this->dm->flush();

		$this->load->model('tool/cache');
		$folder_link = $this->config->get('user')['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();

		$this->model_tool_cache->setPost( $post, $path );

		$this->load->model('tool/cache');
		$folder_link = $this->config->get('user')['default']['cache_link'];
		$folder_name = $this->config->get('post')['default']['cache_folder'];
		$path = $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();

		$this->model_tool_cache->setPost( $post, $path );
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$user = $this->dm->getRepository('Document\User\User')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				$post = $user->getPostById( $id );
				if ( $post ){
					$folder_link = $this->config->get('user')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();
					
					// remove Image
					$this->load->model('tool/image');
					$this->model_tool_image->deleteDirectoryImage( $path );

					// remove cache
					$this->load->model('tool/cache');
					$folder_link = $this->config->get('user')['default']['cache_link'];
					$folder_name = $this->config->get('post')['default']['cache_folder'];
					$path = $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();

					$this->model_tool_cache->deletePost( $path );

					$user->getPosts()->removeElement( $post );
					break;
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
}
?>