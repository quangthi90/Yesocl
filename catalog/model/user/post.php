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
	public function addPost( $data = array(), $thumb = array() ) {
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

		$slug = (!empty($data['title']) ? $this->url->create_slug( $data['title'] ) . '-' : '') . new MongoId();
		
		$post = new Post();
		$post->setContent( $data['content'] );
		$post->setUser( $author );
		$post->setStatus( true );
		$post->setSlug( $slug );

		if ( !empty($data['title']) ){
			$post->setTitle( $data['title'] );
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
			'type_id' => $author->getId(),
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
	public function editPost( $post_slug, $data = array(), $thumb = array() ) {
		$posts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $post_slug) );

		if ( !$posts ){
			return false;
		}
		
		$post = $posts->getPostBySlug( $data['post_slug'] );

		if ( !$post ){
			return false;
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

	public function getPost( $data = array() ){
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

		if ( !empty($data['post_id']) ){
			return $posts->getPostById( $data['post_id'] );
		}

		if ( !empty($data['post_slug']) ){
			return $posts->getPostBySlug( $data['post_slug'] );
		}

		return null;
	}

	public function getPostBySlug( $post_slug ){
		$user = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'posts.slug' => $post_slug
		));

		if ( !$user ){
			return null;
		}

		$post = $user->getPostBySlug( $post_slug );

		if ( !$post ){
			return null;
		}

		return $post;
	}
}
?>