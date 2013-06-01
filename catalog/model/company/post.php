<?php
class ModelCompanyPost extends Doctrine {
	public function getPost( $post_id, $paging ){
		$this->load->model('tool/cache');
		$post = $this->model_tool_cache->getPost( $post_id, $paging );

		if ( !$post ){
			$company = $this->dm->getRepository('Document\Company\Company')->findOneBy( array(
				'posts.id' => $post_id
			));
		
			if ( !$company ){
				return null;
			}

			$post = $company->getPostById( $post_id );

			if ( !$post ){
				return null;
			}

			$post = $this->model_tool_cache->setPost( $post );
		}
		
		return $post;
	}

	public function getPostBySlug( $post_slug ){
		$company = $this->dm->getRepository('Document\Company\Company')->findOneBy(array(
			'posts.slug' => $post_slug
		));

		if ( !$company ){
			return null;
		}

		$post = $company->getPostBySlug( $post_slug );

		if ( !$post ){
			return null;
		}

		return $post;
	}
}
?>