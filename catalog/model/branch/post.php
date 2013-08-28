<?php
class ModelBranchPost extends Doctrine {
	/**
	 * Edit Post of Branch to Database
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
		$post = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $post_slug );

		if ( !$post ){
			return false;
		}

		if ( !empty($data['likerId']) ){
			$likerIds = $post->getLikerIds();
			if ( !in_array($data['likerId'], $likerIds) ){
				$post->addLikerId( $data['likerId'] );
			}
		}

		$this->dm->flush();

		//-- Update 6 last posts
		$this->load->model('tool/cache');

		$posts = $this->getPosts( array(
			'branch_id' => $branch_id,
			'category_id' => $data['category_id'],
			'limit' => 6
		));
		
		foreach ( $posts as $p ) {
			if ( $post->getId() == $p->getId() ){
				$this->model_tool_cache->updateLastCategoryPosts( 
					$this->config->get('post')['type']['branch'], 
					$post->getBranch()->getId(), 
					$post->getCategory()->getId(), 
					$posts 
				);
			}
		}
		
		return $post;
	}

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
		}elseif ( !empty($data['post_slug']) ){
			return $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $data['post_slug'] );
		}

		return null;
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