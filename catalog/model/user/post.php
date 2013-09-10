<?php
class ModelUserPost extends Doctrine {
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
		$user = $this->dm->getRepository('Document\User\User')->findOneBy( array('posts.slug' => $post_slug) );

		if ( !$user ){
			return false;
		}
		
		$post = $user->getPostBySlug( $data['post_slug'] );

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

	public function getPost( $post_id, $paging ){
		$this->load->model('tool/cache');
		$post = $this->model_tool_cache->getPost( $post_id, $paging );

		if ( !$post ){
			$user = $this->dm->getRepository('Document\User\User')->findOneBy( array(
				'posts.id' => $post_id
			));
		
			if ( !$user ){
				return null;
			}

			$post = $user->getPostById( $post_id );

			if ( !$post ){
				return null;
			}

			$post = $this->model_tool_cache->setPost( $post );
		}
		
		return $post;
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