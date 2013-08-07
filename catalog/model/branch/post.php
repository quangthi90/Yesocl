<?php
class ModelBranchPost extends Doctrine {
	public function getPosts( $data = array() ){
		$this->load->model( 'tool/cache' );
		if ( !isset($data['start']) || empty($data['start']) ){
			$data['start'] = 0;
		}
		if ( !isset($data['limit']) || empty($data['limit']) ){
			$data['limit'] = 20;
		}

		if ( isset($data['branch_id']) && !empty($data['branch_id']) ){
			if ( $data['start'] >= 60 ){
				$branch = $this->dm->getRepository('Document\Branch\Branch')->find( $data['branch_id'] );

				if ( !$branch ){
					return null;
				}

				$results = $branch->getPosts()->toArray();
			}else{
				$results = $this->model_tool_cache->getLastPosts( $this->config->get('post')['type']['branch'], $data['branch_id'] );
			}

			$posts = array();
			foreach ( $results as $key => $post ) {
				if ( !$post ){
					continue;
				}

				if ( !is_array($post) ){
					$post = $post->formatToCache();
				}

				if ( $i < $data['start'] || $post['status'] == false ){
					continue;
				}elseif ( count($posts) == $data['limit'] ){
					break;
				}

				$posts[$post['id']] = $post;
			}

			return $posts;
		}
	}
}
?>