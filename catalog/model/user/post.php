<?php
class ModelUserPost extends Doctrine {
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