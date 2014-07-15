<?php
use Document\Cache\Post;

use \MongoId;

class ModelCachePost extends Model {
	/**
	 * Add new cache Post
	 * 2013/08/25
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param:
	 *	- string Branch ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Post ID
	 *		string Created
	 *		string View
	 *		string Type of Post
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function addPost( $data = array() ) {
		if ( empty($data['post_id']) ){
			return false;
		}

		if ( empty($data['type']) ){
			return false;
		}

		if ( empty($data['type_id']) ){
			return false;
		}

		if ( !isset($data['view']) ){
			return false;
		}

		if ( empty($data['created']) ){
			return false;
		}

		if ( !isset($data['hasTitle']) ){
			return false;
		}

		$post = new Post();
		$post->setPostId( $data['post_id'] );
		$post->setType( $data['type'] );
		$post->setTypeId( $data['type_id'] );
		$post->setView( $data['view'] );
		$post->setCreated( $data['created'] );
		$post->setHasTitle( $data['hasTitle'] );

		$this->dm->persist( $post );
		$this->dm->flush();
	}

	/**
	 * Edit Cache Post
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param:
	 *	- string Branch ID
	 *	- array Thumb
	 *	- array data
	 * 	{
	 *		string Post ID
	 *		string Created
	 *		string View
	 *		string Type of Post
	 * 	}
	 * @return: bool
	 *	- true: success
	 * 	- false: not success
	 */
	public function editPost( $data = array() ) {
		if ( empty($data['post_id']) ){
			return false;
		}

		if ( empty($data['type']) ){
			return false;
		}

		if ( empty($data['type_id']) ){
			return false;
		}

		if ( !isset($data['view']) ){
			return false;
		}

		if ( empty($data['created']) ){
			return false;
		}

		if ( !isset($data['hasTitle']) ){
			return false;
		}

		$post = $this->dm->getRepository('Document\Cache\Post')->findOneByPostId( $data['post_id'] );

		if ( !$post ){
			$post = new Post();
		}

		$post->setPostId( $data['post_id'] );
		$post->setType( $data['type'] );

		$post->setTypeId( $data['type_id'] );
		$post->setView( $data['view'] );
		$post->setCreated( $data['created'] );
		$post->setHasTitle( $data['hasTitle'] );

		$this->dm->persist( $post );
		$this->dm->flush();
	}

	/**
	 * Delete Post by ID
	 * 2013/07/24
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param:
	 *	- array string Post ID
	 * @return: boolean
	 */
	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$post = $this->dm->getRepository('Document\Cache\Post')->findOneByPostId( $id );
				if ( !empty( $post ) ) {
					$this->dm->remove( $post );
				}
			}
		}

		$this->dm->flush();

		return true;
	}

	/**
	 * Get Last Posts
	 * 2013/08/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: array data
	 *	- array string type IDs
	 *	- string order
	 * @return: list array Object Posts
	 */
	public function getPosts( $data = array() ){
		if ( empty($data['start']) ){
			$data['start'] = 0;
		}

		if ( empty($data['limit']) ){
			$data['limit'] = 20;
		}

		if ( empty($data['sort']) ){
			return null;
		}

		if ( empty($data['order']) ){
			$data['order'] = -1;
		}

		// Type ids
	  	if ( isset($data['type_ids']) ){
	   		$query['typeId'] = array('$in' => array_values($data['type_ids']) );
	  	}

	  	// Single type
	  	if ( !empty($data['type']) ){
	   		$query['type'] = $data['type'];
	  	}

	  	// Multi types
	  	if ( !empty($data['types']) ){
	   		$query['type'] = array('$in' => $data['types']);
	  	}

		if ( isset($data['hasTitle']) ){
			$query['hasTitle'] = (boolean)$data['hasTitle'];
		}

		if (isset($query)) {
			$cache_posts = $this->dm->getRepository('Document\Cache\Post')->findBy( $query )
				->skip( $data['start'] )
				->limit( $data['limit'] )
				->sort( array($data['sort'] => $data['order']) );
		}else {
			$cache_posts = $this->dm->getRepository('Document\Cache\Post')->findAll()
				->skip( $data['start'] )
				->limit( $data['limit'] )
				->sort( array($data['sort'] => $data['order']) );
		}

		$posts = array();

		foreach ( $cache_posts as $cache_post ) {
			$type = $cache_post->getType();
			if ( $type == $this->config->get('post')['cache']['user'] ){
				$object = $this->dm->getRepository('Document\\' . $type . '\Posts')->findOneBy( array('posts.id' => $cache_post->getPostId()) );
				if ( !$object ){
					$post = null;
				}else{
					$post = $object->getPostById( $cache_post->getPostId() );
				}
			}else{
				$post = $this->dm->getRepository('Document\\' . $type . '\Post')->find( $cache_post->getPostId() );
			}

			if ( !$post ){
				continue;
			}

			// $post['type'] = strtolower( $type );
			// $posts[] = $post->formatToCache();
			$posts[] = $post;
		}

		return $posts;
	}

	/**
	 * Update Cache Posts
	 * 2014/06/28
	 * @author: Vn3352 <vn3352@bommerdesign.com>
	 * @param: array data
	 * @return: array next query inf
	 */
	public function updateCachePosts( $data = array() ){
		$cache_posts = $this->dm->getRepository('Document\Cache\Post')->findAll();
$i = 0;
		foreach ( $cache_posts as $cache_post ) {
			$type = $cache_post->getType();
			if ( $type == $this->config->get('post')['cache']['user'] ){
				$object = $this->dm->getRepository('Document\\' . $type . '\Posts')->findOneBy( array('posts.id' => $cache_post->getPostId()) );
				if ( !$object ){$i++;
					$post = null;
					$this->dm->remove($cache_post);
				}else{
					$post = $object->getPostById( $cache_post->getPostId() );
				}
			}else{
				$post = $this->dm->getRepository('Document\\' . $type . '\Post')->find( $cache_post->getPostId() );
			}

			if ( !$post ){
				continue;
			}

			if ( $post->getTitle() == null ){
				$cache_post->setHasTitle( false );
			}else{
				$cache_post->setHasTitle( true );
			}
		}
// print($i); exit;
		$this->dm->flush();
		print("Update cache posts completed !"); exit;

		/*if ( !isset($data['start']) ){
			$start = 0;
		}else {
			$start = (int)$data['start'];
		}

		if ( !isset($data['limit']) ){
			$limit = 20;
		}else {
			$limit = (int)$data['limit'];
		}

		if ( !isset($data['sort']) ){
			$sort = 'created';
		}else {
			$sort = $data['sort'];
		}

		if ( !isset($data['order']) ){
			$order = -1;
		}else {
			$order = (int)$data['order'];
		}

	  	// GET BEFORE QUERY INF
	  	if ( !isset($data['type']) || !in_array($data['type'], $this->config->get('post')['type']) ){
	   		$type = $this->config->get('post')['type']['branch'];
	  	}else {
	  		$type = $data['type'];
	  	}

	  	if ( isset($data['isDone']) && $data['isDone'] == 1 ) {
	  		return $data;
	  	}

	  	// GET POST
		if ($type == $this->config->get('post')['type']['branch']) {
			$results = $this->dm->getRepository('Document\Branch\Post')
				->findAll()
				->skip($start)
				->limit($limit)
				->sort(array($sort => $order));
			$oPosts = $results;
		}elseif ($type == $this->config->get('post')['type']['stock']) {
			$results = $this->dm->getRepository('Document\Stock\Post')
				->findAll()
				->skip($start)
				->limit($limit)
				->sort(array($sort => $order));
			$oPosts = $results;
		}elseif ($type == $this->config->get('post')['type']['user']) {
			$results = $this->dm->getRepository('Document\User\Posts')
				->findAll()
				->skip($start)
				->limit($limit);
			$oPosts = array();
			foreach ($results as $value) {
				foreach ($value->getPosts() as $post) {
					$oPosts[] = $post;
				}
			}
		}

		// UPDATE TO CACHE POST
		foreach ($oPosts as $post) {
			$data = array();
			$data['post_id'] = $post->getId();
			$data['type'] = $this->config->get('post')['cache'][$type];
			if ($type == $this->config->get('post')['type']['user']) {
				$data['type_id'] = $post->getUser()->getId();
			}elseif ($type == $this->config->get('post')['type']['branch']) {
				$data['type_id'] = $post->getBranch()->getId();
			}elseif ($type == $this->config->get('post')['type']['stock']) {
				$data['type_id'] = new MongoId();
			}
			$data['view'] = $post->getCountViewer();
			$data['created'] = new \DateTime();
			$data['hasTitle'] = (strlen($post->getTitle()) > 0);

			$this->editPost($data);
		}

		// SET NEW QUERY INF
		$isDone = 0;
		if ($limit > count($results)) {
			$start = 0;
			if ($type == $this->config->get('post')['type']['user']) {
				$isDone = 1;
			}elseif ($type == $this->config->get('post')['type']['branch']) {
				$type = $this->config->get('post')['type']['stock'];
			}elseif ($type == $this->config->get('post')['type']['stock']) {
				$type = $this->config->get('post')['type']['user'];
			}
		}else {
			$start += $limit;
		}

		return array(
			'isDone' => $isDone,
			'start' => $start,
			'limit' => $limit,
			'type' => $type,
			'sort' => $sort,
			'order' => $order,
			);*/
	}
}
?>