<?php
class ModelCompanyPost extends Doctrine {
	public function getPost( $post_id, $paging ){
		$post = $this->cache->get( "$post_id.$paging" );

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

			$this->load->model('tool/cache');
			$this->model_tool_cache->updateCachePost( $post );

			$post = $this->cache->get( "$post_id.$paging" );
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