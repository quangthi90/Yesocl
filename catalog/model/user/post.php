<?php
use Document\User\Post,
	Document\User\Posts;

class ModelUserPost extends Model {
	/**
	 * Add Post of User to Database
	 * 2013/08/29
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Liker ID (User ID)
	 * 	}
	 * @return: bool
	 *	- object post: success
	 * 	- false: not success
	 */
	public function addPost( $data = array() ) {
		if ( empty($data['user_slug']) ){
			return false;
		}
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $data['user_slug'] );
		if ( !$oUser ){
			return false;
		}

		if ( empty($data['author_id']) ){
			return false;
		}
		if ( $data['author_id'] != $oUser->getId() ){
			$oAuthor = $this->dm->getRepository('Document\User\User')->find( $data['author_id'] );
		}else{
			$oAuthor = $oUser;
		}
		if ( !$oAuthor ){
			return false;
		}

		if ( empty($data['content']) ){
			return false;
		}

		// Encode html
		// $data['content'] = htmlentities( $data['content'] );
		// $data['title'] = htmlentities( $data['title'] );

		$slug = (!empty($data['title']) ? $this->url->create_slug( $data['title'] ) . '-' : '') . new MongoId();
		
		$oPost = new Post();
		$oPost->setContent( $data['content'] );
		$oPost->setUser( $oAuthor );
		$oPost->setStatus( true );
		$oPost->setSlug( $slug );

		if ( !empty($data['title']) ){
			$oPost->setTitle( $data['title'] );
		}

		if ( !empty($data['stockTags']) ){
			$oPost->setStockTags( $data['stockTags'] );
		}

		if ( !empty($data['userTags']) ){
			$oPost->setUserTags( $data['userTags'] );
		}

		$lPosts = $oUser->getPostData();

		if ( !$lPosts ){
			$lPosts = new Posts();
			$this->dm->persist( $lPosts );
			$lPosts->setUser( $oUser );
		}

		$lPosts->addPost( $oPost );
		
		$this->dm->flush();

		// Add Image
		if ( !empty($data['image_link']) && !empty($data['extension']) && is_file($data['image_link']) ){
			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $oAuthor->getId() . '/' . $folder_name . '/' . $oPost->getId() . '/' . $avatar_name . '.' . $data['extension'];
			$dest = DIR_IMAGE . $path;
			
			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($data['image_link'], $dest) ){
				$oPost->setThumb( $path );
			}

			$this->dm->flush();
		}

		// Cache post for what's new
		$this->load->model('cache/post');
		$data = array(
			'post_id' => $oPost->getId(),
			'type' => $this->config->get('post')['cache']['user'],
			'type_id' => $oUser->getId(),
			'view' => 0,
			'created' => $oPost->getCreated()
		);
		$this->model_cache_post->addPost( $data );

		// Notifications
		$this->load->model('tool/object');
		$this->model_tool_object->checkPostNotification( $oPost );
		
		return $oPost;
	}

	/**
	 * Edit Post of User to Database
	 * 2013/08/29
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string Post ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Liker ID (User ID)
	 * 	}
	 * @return: bool
	 *	- object post: success
	 * 	- false: not success
	 */
	public function editPost( $sPostSlug, $data = array() ) {
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $sPostSlug) );
		
		if ( !$lPosts ){
			return false;
		}
		
		$oPost = $lPosts->getPostBySlug( $sPostSlug );

		if ( !$oPost ){
			return false;
		}

		if ( !empty($data['image_link']) && !empty($data['extension']) && is_file($data['image_link']) ){
			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $oPost->getUser()->getId() . '/' . $folder_name . '/' . $oPost->getId() . '/' . $avatar_name . '.' . $data['extension'];
			$dest = DIR_IMAGE . $path;
			
			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($data['image_link'], $dest) ){
				$oPost->setThumb( $path );
			}
		}

		if ( empty($data['image_link']) && empty($data['extension']) ){
			$oPost->setThumb( null );
		}

		if ( !empty($data['content']) ){
			// $oPost->setContent( htmlentities($data['content']) );
			$oPost->setContent( $data['content'] );
		}

		if ( !empty($data['title']) ){
			// $oPost->setTitle( htmlentities($data['title']) );
			$oPost->setTitle( $data['title'] );
		}
		
		if ( !empty($data['likerId']) ){
			$likerIds = $oPost->getLikerIds();

			$key = array_search( $data['likerId'], $likerIds );
			
			if ( !$likerIds || $key === false ){
				$oPost->addLikerId( $data['likerId'] );
			}else{
				unset($likerIds[$key]);
				$oPost->setLikerIds( $likerIds );
			}
		}

		$oPost->setStockTags( $data['stockTags'] );
		$oPost->setUserTags( $data['userTags'] );
		
		$this->dm->flush();

		// Notifications
		$this->load->model('tool/object');
		$this->model_tool_object->checkPostNotification( $oPost );
		
		return $oPost;
	}

	public function deletePost( $sPostSlug ) {
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $sPostSlug) );

		if ( !$lPosts ){
			return false;
		}
		
		$oPost = $lPosts->getPostBySlug( $sPostSlug );

		if ( !$oPost ){
			return false;
		}

		// Remove image
		if ( $oPost->getThumb() ){
			$this->load->model('tool/image');

			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$path = DIR_IMAGE . $folder_link . $oPost->getUser()->getId() . '/' . $folder_name . '/' . $oPost->getId();
			
			// remove Image
			$this->model_tool_image->deleteDirectoryImage( $path );
		}
		
		$lPosts->getPosts(false)->removeElement( $oPost );
		
		$this->dm->flush();
		
		return true;
	}

	public function getPost( $data = array(), $increase_viewer = false ){
		$query = array();
		if ( !empty($data['post_id']) ){
			$query['posts.id'] = $data['post_id'];
		}elseif ( !empty($data['post_slug']) ){
			$query['posts.slug'] = $data['post_slug'];
		}

		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( $query );

		if ( !$lPosts ){
			return null;
		}

		$oPost = null;
		if ( !empty($data['post_id']) ){
			$oPost =  $lPosts->getPostById( $data['post_id'] );
		}

		if ( !empty($data['post_slug']) ){
			$oPost = $lPosts->getPostBySlug( $data['post_slug'] );
		}

		if ( $oPost != null && $increase_viewer == true ){
			$oPost->setCountViewer( $oPost->getCountViewer() + 1 );
			$this->dm->flush();
		}

		return $oPost;
	}

	public function getPostBySlug( $sPostSlug ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.slug' => $sPostSlug
		));

		if ( !$lPosts ){
			return null;
		}

		return $lPosts->getPostBySlug( $sPostSlug );
	}
}
?>