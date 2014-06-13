<?php
use Document\Branch\Post;

class ModelBranchPost extends Model {
	/**
	 * Add Post of Branch to Database
	 * 2013/08/29
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param:
	 *	- array data
	 * 	{
	 *		string user slug (author)
	 *		string title
	 *		string description
	 *		string content
	 *		string MongoID category
	 *		string image link
	 *		string extension
	 * 	}
	 * @return:
	 *	- object post: success
	 * 	- false: not success
	 */
	public function addPost( $aData = array() ) {
		// Check user author
		if ( empty($aData['author_id']) ){
			return false;
		}
		$oUserAuthor = $this->dm->getRepository('Document\User\User')->find( $aData['author_id'] );
		if ( !$oUserAuthor ){
			return false;
		}

		// Check category
		if ( !empty($aData['cat_slug']) ){
			$oCategory = $this->dm->getRepository('Document\Branch\Category')->findOneBySlug( $aData['cat_slug'] );
		}else if ( !empty($aData['category']) ) {
			$oCategory = $this->dm->getRepository('Document\Branch\Category')->find( $aData['category'] );
		}else {
			return false;
		}

		if ( !$oCategory ){
			return false;
		}

		$oBranch = $oCategory->getBranch();
		if ( !$oBranch ){
			return false;
		}

		// Check authentication
		$oTempBranch = $oUserAuthor->getBranchBySlug( $oBranch->getSlug() );
		if ( !$oTempBranch ){
			return false;
		}

		// Check title
		if ( empty($aData['title']) ){
			return false;
		}

		// Check description
		// if ( empty($aData['description']) ){
		// 	return false;
		// }

		// Check content
		if ( empty($aData['content']) ){
			return false;
		}

		// Encode html
		// $data['content'] = htmlentities( $data['content'] );
		// $data['title'] = htmlentities( $data['title'] );
		// $data['description'] = htmlentities( $data['description'] );

		$slug = $this->url->create_slug( $aData['title'] ) . new MongoId();

		$oPost = new Post();
		$oPost->setTitle( $aData['title'] );
		//$oPost->setDescription( $aData['description'] );
		$oPost->setContent( $aData['content'] );
		$oPost->setCategory( $oCategory );
		$oPost->setBranch( $oBranch );
		$oPost->setUser( $oUserAuthor );
		$oPost->setStatus( true );
		$oPost->setSlug( $slug );

		if ( !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ){
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $oBranch->getId() . '/' . $folder_name . '/' . $oPost->getId() . '/' . $avatar_name . '.' . $aData['extension'];
			$dest = DIR_IMAGE . $path;

			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($aData['image_link'], $dest) ){
				$oPost->setThumb( $path );
			}
		}

		if ( !empty($aData['stockTags']) ){
			$oPost->setStockTags( $aData['stockTags'] );
		}

		$this->dm->persist( $oPost );

		$this->dm->flush();

		$this->load->model('cache/post');
		$aData = array(
			'post_id' => $oPost->getId(),
			'type' => $this->config->get('post')['cache']['branch'],
			'type_id' => $oBranch->getId(),
			'view' => 0,
			'created' => $oPost->getCreated()
		);
		$this->model_cache_post->addPost( $aData );

		return $oPost;
	}

	/**
	 * Edit Post of Branch to Database
	 * 2014/03/02
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param:
	 *	- string Post ID
	 *	- array data
	 * 	{
	 *		string title
	 *		string description
	 *		string content
	 *		string MongoID category ID
	 *		array image info
	 * 	}
	 * @return: bool
	 *	- object post: success
	 * 	- false: not success
	 */
	public function editPost( $oPost_slug, $aData = array() ) {
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $oPost_slug );

		if ( !$oPost ){
			return false;
		}

		$oBranch = $oPost->getBranch();

		if ( !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ){
			$folder_link = $this->config->get('branch')['default']['image_link'];
			$folder_name = $this->config->get('post')['default']['image_folder'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $oBranch->getId() . '/' . $folder_name . '/' . $oPost->getId() . '/' . $avatar_name . '.' . $aData['extension'];
			$dest = DIR_IMAGE . $path;

			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($aData['image_link'], $dest) ){
				$oPost->setThumb( $path );
			}
		}

		if ( !empty($aData['content']) ){
			// $oPost->setContent( htmlentities($aData['content']) );
			$oPost->setContent( $aData['content'] );
		}

		if ( !empty($aData['title']) ){
			// $oPost->setTitle( htmlentities($aData['title']) );
			$oPost->setTitle( $aData['title'] );
		}

		if ( !empty($aData['description']) ){
			// $oPost->setDescription( htmlentities($aData['description']) );
			$oPost->setDescription( $aData['description'] );
		}

		// Check category
		if ( !empty($aData['cat_slug']) ){
			$oCategory = $this->dm->getRepository('Document\Branch\Category')->findOneBySlug( $aData['cat_slug'] );
		}else if ( !empty($aData['category']) ) {
			$oCategory = $this->dm->getRepository('Document\Branch\Category')->find( $aData['category'] );
		}

		if ( isset($oCategory) && $oCategory ){
			$oPost->setCategory( $oCategory );
		}

		if ( !empty($aData['likerId']) ){
			$likerIds = $oPost->getLikerIds();
			$key = array_search( $aData['likerId'], $likerIds );

			if ( !$likerIds || $key === false ){
				$oPost->addLikerId( $aData['likerId'] );
			}else{
				unset($likerIds[$key]);
				$oPost->setLikerIds( $likerIds );
			}
		}

		if ( !empty($aData['stockTags']) ){
			$oPost->setStockTags( $aData['stockTags'] );
		}

		$this->dm->flush();

		return $oPost;
	}

	/**
	 * Delete post
	 * 2014/02/27
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
	public function deletePost( $sPostSlug ) {
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $sPostSlug );

		if ( !$oPost ){
			return true;
		}

		$this->dm->remove( $oPost );

		$this->dm->flush();

		//-- Update 6 last posts
		$this->load->model('tool/cache');

		$oPosts = $this->getPosts( array(
			'branch_id' => $branch_id,
			'category_id' => $aData['category_id'],
			'limit' => 6
		));

		$this->model_tool_cache->updateLastCategoryPosts(
			$this->config->get('post')['type']['branch'],
			$oPost->getBranch()->getId(),
			$oPost->getCategory()->getId(),
			$oPosts
		);

		return true;
	}

	public function getPosts( $aData = array() ){
		if (  empty($aData['start']) ){
			$aData['start'] = 0;
		}
		if ( empty($aData['limit']) ){
			$aData['limit'] = 20;
		}

		$query = array('deleted' => false);

		if ( !empty($aData['branch_id']) ){
			$query['branch.id'] = $aData['branch_id'];
		}

		if ( !empty($aData['category_id']) ){
			$query['category.id'] = $aData['category_id'];
		}

		if ( !empty($aData['category_ids']) ){
			$query['category.id'] = array('$in' => $aData['category_ids']);
		}

		if ( !empty($aData['post_ids']) ){
			$query['id'] = array('$in' => $aData['post_ids']);
		}elseif (isset($aData['post_ids']) ){
			return null;
		}

		if ( !empty($aData['stock_code']) ){
			$query['stockTags'] = $aData['stock_code'];
		}

		$results = $this->dm->getRepository('Document\Branch\Post')
			->findBy( $query )
			->skip($aData['start'])
			->limit($aData['limit'])
			->sort(array('created' => -1));

		return $results;
	}

	public function getPost( $aData = array(), $increase_viewer = false ){
		$oPost = null;

		if ( !empty($aData['post_id']) ){
			$oPost = $this->dm->getRepository('Document\Branch\Post')->find( $aData['post_id'] );
		}elseif ( !empty($aData['post_slug']) ){
			$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $aData['post_slug'] );
		}

		if ( $oPost != null && $increase_viewer == true ){
			$oPost->setCountViewer( $oPost->getCountViewer() + 1 );
			$this->dm->flush();
		}

		return $oPost;
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
			$oPosts = $this->getPosts(array(
				'branch_id' => $branch_id,
				'category_id' => $category_id,
				'limit' => $this->config->get('common')['block']['limit']
			));
			$results = $this->model_tool_cache->updateLastCategoryPosts(
				$this->config->get('post')['type']['branch'],
				$branch_id,
				$category_id,
				$oPosts
			);
		}

		return $results;
	}

	public function getPostBySlug( $sPostSlug ) {
		$oPost = $this->dm->getRepository('Document\Branch\Post')->findOneBySlug( $sPostSlug );

		return $oPost;
	}
}
?>