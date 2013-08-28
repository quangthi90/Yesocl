<?php
class ModelBranchPost extends Doctrine {
	public function getPosts( $data = array() ){
		$this->load->model( 'tool/cache' );
		if (  empty($data['start']) ){
			$data['start'] = 0;
		}
		if ( empty($data['limit']) ){
			$data['limit'] = 20;
		}

		$query = array('deleted' => false);

		if ( !empty($data['branch_id']) ){
			$query['branch.id'] = $data['branch_id'];
		}

		if ( !empty($data['category_id']) ){
			$query['category.id'] = $data['category_id'];
		}

		$results = $this->dm->getRepository('Document\Branch\Post')
			->findBy( $query )
			->skip($data['start'])
			->limit($data['limit'])
			->sort(array('created' => -1));

		return $results;
	}

	public function getPost( $data = array() ){
		if ( !empty($data['post_id']) ){
			return $this->dm->getRepository('Document\Branch\Post')->find( $data['post_id'] );
		}else{
			return $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );
		}
	}

	public function getLastPostByCategory( $branch_id, $category_id ){
		$this->load->model('tool/cache');

		$results = $this->model_tool_cache->getLastCategoryPosts(
			$this->config->get('post')['type']['branch'],
			$branch_id,
			$category_id
		);
		
		if ( count($results) == 0 ){
			$this->load->model('branch/post');
			$posts = $this->getPosts(array(
				'branch_id' => $branch_id,
				'category_id' => $category_id,
				'limit' => $this->config->get('common')['block']['limit']
			));
			$results = $this->model_tool_cache->updateLastCategoryPosts(
				$this->config->get('post')['type']['branch'],
				$branch_id,
				$category_id,
				$posts
			);
		}
		
		return $results;
	}
}
?>