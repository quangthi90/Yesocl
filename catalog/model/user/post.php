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
		$user = $this->dm->getRepository('Document\User\User')->findOneBySlug( $data['user_slug'] );
		if ( !$user ){
			return false;
		}

		if ( empty($data['author_id']) ){
			return false;
		}
		$author = $this->dm->getRepository('Document\User\User')->find( $data['author_id'] );
		if ( !$author ){
			return false;
		}

		if ( empty($data['content']) ){
			return false;
		}

		// Encode html
		$data['content'] = htmlentities( $data['content'] );
		$data['title'] = htmlentities( $data['title'] );

		$slug = (!empty($data['title']) ? $this->url->create_slug( $data['title'] ) . '-' : '') . new MongoId();
		
		$post = new Post();
		$post->setContent( $data['content'] );
		$post->setUser( $author );
		$post->setStatus( true );
		$post->setSlug( $slug );
		$post->setOwnerId( $user->getId() );

		if ( !empty($data['title']) ){
			$post->setTitle( $data['title'] );
		}

		if ( !empty($data['image_link']) && !empty($data['extension']) && is_file($data['image_link']) ){
			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $author->getId() . '/' . $folder_name . '/' . $post->getId() . '/' . $avatar_name . '.' . $data['extension'];
			$dest = DIR_IMAGE . $path;
			
			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($data['image_link'], $dest) ){
				$post->setThumb( $path );
			}
		}

		$posts = $user->getPostData();

		if ( !$posts ){
			$posts = new Posts();
			$this->dm->persist( $posts );
			$posts->setUser( $user );
		}

		$posts->addPost( $post );
		
		$this->dm->flush();

		$this->load->model('cache/post');
		$data = array(
			'post_id' => $post->getId(),
			'type' => $this->config->get('post')['cache']['user'],
			'type_id' => $user->getId(),
			'view' => 0,
			'created' => $post->getCreated()
		);
		$this->model_cache_post->addPost( $data );
		
		return $post;
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
	public function editPost( $post_slug, $data = array() ) {
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $post_slug) );
		
		if ( !$posts ){
			return false;
		}
		
		$post = $posts->getPostBySlug( $post_slug );

		if ( !$post ){
			return false;
		}

		if ( !empty($data['image_link']) && !empty($data['extension']) && is_file($data['image_link']) ){
			$folder_link = $this->config->get('user')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $post->getUser()->getId() . '/' . $folder_name . '/' . $post->getId() . '/' . $avatar_name . '.' . $data['extension'];
			$dest = DIR_IMAGE . $path;
			
			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($data['image_link'], $dest) ){
				$post->setThumb( $path );
			}
		}

		if ( !empty($data['content']) ){
			$post->setContent( htmlentities($data['content']) );
		}

		if ( !empty($data['title']) ){
			$post->setTitle( htmlentities($data['title']) );
		}
		
		if ( !empty($data['likerId']) ){
			$likerIds = $post->getLikerIds();

			$key = array_search( $data['likerId'], $likerIds );
			
			if ( !$likerIds || $key === false ){
				$post->addLikerId( $data['likerId'] );
			}else{
				unset($likerIds[$key]);
				$post->setLikerIds( $likerIds );
			}
		}
		
		$this->dm->flush();
		
		return $post;
	}

	public function deletePost( $post_slug ) {
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $post_slug) );

		if ( !$posts ){
			return false;
		}
		
		$post = $posts->getPostBySlug( $post_slug );

		if ( !$post ){
			return false;
		}
		
		$posts->getPosts(false)->removeElement( $post );
		
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

		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( $query );

		if ( !$posts ){
			return null;
		}

		$post = null;
		if ( !empty($data['post_id']) ){
			$post =  $posts->getPostById( $data['post_id'] );
		}

		if ( !empty($data['post_slug']) ){
			$post = $posts->getPostBySlug( $data['post_slug'] );
		}

		if ( $post != null && $increase_viewer == true ){
			$post->setCountViewer( $post->getCountViewer() + 1 );
			$this->dm->flush();
		}

		return $post;
	}

	public function getPostBySlug( $post_slug ){
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.slug' => $post_slug
		));

		if ( !$posts ){
			return null;
		}

		return $posts->getPostBySlug( $post_slug );
	}
}
?>