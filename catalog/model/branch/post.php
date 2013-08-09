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

			$this->load->model('user/user');
			$users = array();

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

				if ( !array_key_exists($post['user_id'], $users) ){
					$users[$post['user_id']] = $this->model_user_user->getUser( $post['user_id'] );
				}

				$user = $users[$post['user_id']];

				if ( $user ){
					$post['user'] = array(
						'slug' => $user['slug'],
						'avatar' => $user['avatar'],
						'email' => $user['email']
					);
					$post['author'] = $user['username'] != null ? $user['username'] : $post['author'];
				}

				$posts[$post['id']] = $post;
			}

			return $posts;
		}
	}

	public function getPost( $post_id ){

	}

	public function getTotalComments( $post_id, $branch_id ) {
		$this->load->model( 'tool/cache' );

		//-- link of cache Folder of Branch
		$cache_link = $this->config->get( $this->config->get('common')['type']['branch'] )['default']['cache_link'];
		//-- cache post folder name
		$folder_post_name = $this->config->get('post')['default']['cache_folder'];
		//-- cache comment folder name
		$folder_comment_name = $this->config->get('comment')['default']['cache_folder'];
		//-- path of cache Folder of Branch
		$cache_path = DIR_CACHE . $cache_link . $branch_id . '/' . $folder_post_name . '/' . $post_id . '/' . $folder_comment_name . '/';
//echo '<pre>';var_dump($cache_path);exit();
		return count( $this->model_tool_cache->getFilesNames( $cache_path ) );
	}
}
?>