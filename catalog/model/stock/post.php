<?php
use Document\Stock\Post;

class ModelStockPost extends Model {
	/**
	 * Add Post of Stock to Database
	 * 2013/08/29
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	array data:
	 *		- string Stock Code 	 								-- Required
	 *		- string User Author Slug 								-- Required
	 *		- string Title
	 *		- string Content 										-- Required
	 *		- string Upload Image link (root/image/data/upload)
	 *		- string Extension of Image
	 *		- array Slugs of User Tagged
	 *		- array Codes of Stock Tagged
	 * @return: bool
	 *	- object post: success
	 * 	- null: not success
	 */
	public function addPost( $aData = array(), $bIsDuplicate = false ) {
		if ( empty($aData['stock_code']) ){
			return null;
		}
		$oStock = $this->dm->getRepository('Document\Stock\Stock')->findOneByCode( $aData['stock_code'] );
		if ( !$oStock ){
			return null;
		}

		if ( empty($aData['author_id']) ){
			return null;
		}
		$oAuthor = $this->dm->getRepository('Document\User\User')->find( $aData['author_id'] );
		if ( !$oAuthor ){
			return null;
		}

		if ( empty($aData['content']) ){
			return null;
		}

		// Encode html
		// $aData['content'] = htmlentities( $aData['content'] );
		// $aData['title'] = htmlentities( $aData['title'] );

		$slug = (!empty($aData['title']) ? $this->url->create_slug( $aData['title'] ) . '-' : '') . new MongoId();
		
		$oPost = new Post();
		$oPost->setStock( $oStock );
		$oPost->setContent( $aData['content'] );
		$oPost->setUser( $oAuthor );
		$oPost->setStatus( true );
		$oPost->setSlug( $slug );

		if ( !empty($aData['title']) ){
			$oPost->setTitle( $aData['title'] );
		}

		if ( !empty($aData['stockTags']) ){
			$oPost->setStockTags( $aData['stockTags'] );
		}

		if ( $bIsDuplicate ){
			$oPost->setThumb( $aData['thumb'] );
		}

		$this->dm->persist( $oPost );
		$this->dm->flush();

		// Add Image
		if ( !$bIsDuplicate && !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ){
			$sFolderLink = $this->config->get('user')['default']['image_link'];
			$sFolderName = $this->config->get('post')['default']['image_folder'];
			$sAvatarName = $this->config->get('post')['default']['avatar_name'];
			$path = $sFolderLink . $oAuthor->getId() . '/' . $sFolderName . '/' . $oPost->getId() . '/' . $sAvatarName . '.' . $aData['extension'];
			$dest = DIR_IMAGE . $path;
			
			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($aData['image_link'], $dest) ){
				$oPost->setThumb( $path );
			}

			$this->dm->flush();
		}

		// Cache post for what's new
		$this->load->model('cache/post');
		$aData = array(
			'post_id' => $oPost->getId(),
			'type' => $this->config->get('post')['cache']['stock'],
			'type_id' => $oStock->getId(),
			'view' => 0,
			'created' => $oPost->getCreated()
		);
		$this->model_cache_post->addPost( $aData );
		
		return $oPost;
	}

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
	public function editPost( $sPostSlug, $aData = array() ) {
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $sPostSlug) );
		
		if ( !$lPosts ){
			return false;
		}
		
		$oPost = $lPosts->getPostBySlug( $sPostSlug );

		if ( !$oPost ){
			return false;
		}

		if ( !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ){
			$sFolderLink = $this->config->get('user')['default']['image_link'];
			$sFolderName = $this->config->get('post')['default']['image_folder'];
			$sAvatarName = $this->config->get('post')['default']['avatar_name'];
			$path = $sFolderLink . $oPost->getUser()->getId() . '/' . $sFolderName . '/' . $oPost->getId() . '/' . $sAvatarName . '.' . $aData['extension'];
			$dest = DIR_IMAGE . $path;
			
			$this->load->model('tool/image');
			if ( $this->model_tool_image->moveFile($aData['image_link'], $dest) ){
				$oPost->setThumb( $path );
			}
		}

		if ( empty($aData['image_link']) && empty($aData['extension']) ){
			$oPost->setThumb( null );
		}

		if ( !empty($aData['content']) ){
			// $oPost->setContent( htmlentities($aData['content']) );
			$oPost->setContent( $aData['content'] );
		}

		if ( !empty($aData['title']) ){
			// $oPost->setTitle( htmlentities($aData['title']) );
			$oPost->setTitle( $aData['title'] );
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

		$oPost->setStockTags( $aData['stockTags'] );
		$oPost->setUserTags( $aData['userTags'] );
		
		$this->dm->flush();

		// Notifications
		$this->load->model('tool/object');
		$this->model_tool_object->checkPostNotification( $oPost );
		
		return $oPost;
	}

	public function deletePost( $sPostSlug ) {
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( array('posts.slug' => $sPostSlug) );

		if ( !$lPosts ){
			return false;
		}
		
		$oPost = $lPosts->getPostBySlug( $sPostSlug );

		if ( !$oPost ){
			return false;
		}

		// Remove image
		if ( $oPost->getThumb() ){
			$this->load->model('tool/image');

			$sFolderLink = $this->config->get('user')['default']['image_link'];
			$sFolderName = $this->config->get('post')['default']['image_folder'];
			$path = DIR_IMAGE . $sFolderLink . $oPost->getUser()->getId() . '/' . $sFolderName . '/' . $oPost->getId();
			
			// remove Image
			$this->model_tool_image->deleteDirectoryImage( $path );
		}
		
		$lPosts->getPosts(false)->removeElement( $oPost );
		
		$this->dm->flush();
		
		return true;
	}

	public function getPost( $aData = array(), $increase_viewer = false ){
		$query = array();
		if ( !empty($aData['post_id']) ){
			$query['posts.id'] = $aData['post_id'];
		}elseif ( !empty($aData['post_slug']) ){
			$query['posts.slug'] = $aData['post_slug'];
		}

		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy( $query );

		if ( !$lPosts ){
			return null;
		}

		$oPost = null;
		if ( !empty($aData['post_id']) ){
			$oPost =  $lPosts->getPostById( $aData['post_id'] );
		}

		if ( !empty($aData['post_slug']) ){
			$oPost = $lPosts->getPostBySlug( $aData['post_slug'] );
		}

		if ( $oPost != null && $increase_viewer == true ){
			$oPost->setCountViewer( $oPost->getCountViewer() + 1 );
			$this->dm->flush();
		}

		return $oPost;
	}

	public function getPostBySlug( $sPostSlug ){
		$lPosts = $this->dm->getRepository('Document\User\Posts')->findOneBy(array(
			'posts.slug' => $sPostSlug
		));

		if ( !$lPosts ){
			return null;
		}

		return $lPosts->getPostBySlug( $sPostSlug );
	}
}
?>