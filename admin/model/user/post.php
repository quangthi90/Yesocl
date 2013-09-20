<?php
use Document\User\Post,
	Document\User\Posts;

class ModelUserPost extends Model {
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

		$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();
		
		$post = new Post();
		$post->setSlug( $slug );
		$post->setTitle( $data['title'] );
		$post->setContent( $data['postcontent'] );
		$post->setUser( $author );
		$post->setStatus( $data['status'] );

		$posts = $user->getPostData();

		if ( !$posts ){
			$posts = new Posts();
			$this->dm->persist( $posts );
			$posts->setUser( $user );
		}

		$posts->addPost( $post );
		
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

		$type = $this->config->get('post')['cache']['user'];
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $type,
			'type_id' => $user_id,
			'view' => 0,
			'created' => $post->getCreated()
		);
		$this->model_cache_post->addPost( $data );
		
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
		
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array( 'posts.id' => $post_id ) );
		
		$post = $posts->getPostById( $post_id );

		if ( !$post ){
			return false;
		}

		// Check slug
		if ( $data['title'] != $post->getTitle() ){
			$slug = $this->url->create_slug( $data['title'] ) . '-' . new MongoId();

			$post->setSlug( $slug );
		}

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
		
		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$user = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.id' => $data['id'][0]) );
			}

			$this->load->model('tool/image');
			$this->load->model('cache/post');

			$this->model_cache_post->deletePost( $data );
			
			foreach ( $data['id'] as $id ) {
				$post = $user->getPostById( $id );
				if ( $post ){
					$folder_link = $this->config->get('user')['default']['image_link'];
					$folder_name = $this->config->get('post')['default']['image_folder'];
					$path = DIR_IMAGE . $folder_link . $user->getId() . '/' . $folder_name . '/' . $post->getId();
					
					// remove Image
					$this->model_tool_image->deleteDirectoryImage( $path );

					$user->getPosts(false)->removeElement( $post );
				}
			}
		}
		
		$this->dm->flush();
	}

	public function getPost( $post_id ) {
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array( 
			'posts.id' => $post_id 
		));

		if ( !$posts ) {
			return null;
		}

		return $posts->getPostById( $post_id );
	}

	public function getOwner( $post_id ) {
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array( 
			'posts.id' => $post_id 
		));

		if ( !$posts ) {
			return null;
		}

		return $posts->getUser();
	}
}
?>