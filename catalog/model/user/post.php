<?php
use Document\User\Post,
	Document\User\Posts;

class ModelUserPost extends Model {
	/**
	 * Add Post of User to Database
	 * 2013/08/29
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	array data:
	 *		- string User Wall Slug (user_slug) 					-- Required
	 *		- string User Author Slug (author_id)					-- Required
	 *		- string Title (title)
	 *		- string Content (content)								-- Required
	 *		- string Upload Image link (image_link) (root/image/data/upload)
	 *		- string Extension of Image (extension)
	 *		- array Slugs of User Tagged (userTags)
	 *		- array Codes of Stock Tagged (stockTags)
	 * @return: bool
	 *	- object post: success
	 * 	- null: not success
	 */
	public function addPost( $aData = array() ) {
		if ( empty($aData['user_slug']) ){
			return null;
		}
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $aData['user_slug'] );
		if ( !$oUser ){
			return null;
		}

		if ( empty($aData['author_id']) ){
			return null;
		}
		if ( $aData['author_id'] != $oUser->getId() ){
			$oAuthor = $this->dm->getRepository('Document\User\User')->find( $aData['author_id'] );
		}else{
			$oAuthor = $oUser;
		}
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
		$oPost->setContent( $aData['content'] );
		$oPost->setUser( $oAuthor );
		$oPost->setStatus( true );
		$oPost->setSlug( $slug );
		$oPost->setUserTags( $aData['userTags'] );
		$oPost->setStockTags( $aData['stockTags'] );

		if ( !empty($aData['title']) ){
			$oPost->setTitle( $aData['title'] );
		}

		$lPosts = $oUser->getPostData();

		if ( !$lPosts ){
			$lPosts = new Posts();
			$this->dm->persist( $lPosts );
			$lPosts->setUser( $oUser );
		}

		$lPosts->addPost( $oPost );
		
		$this->dm->flush();

		// Add Image
		if ( !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ){
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
		$aCacheData = array(
			'post_id' => $oPost->getId(),
			'type' => $this->config->get('post')['cache']['user'],
			'type_id' => $oUser->getId(),
			'view' => 0,
			'created' => $oPost->getCreated()
		);
		$this->model_cache_post->addPost( $aCacheData );

		// Notifications
		$this->load->model('tool/object');
		$this->model_tool_object->checkPostNotification( $oPost );

		// Duplicate post for Stock
		if ( !empty($aData['stockTags']) ){
			$this->load->model('stock/post');
			$aData['thumb'] = $oPost->getThumb();
			$oStockPost = $this->model_stock_post->addPost( $aData );
			$oPost->setStockPostId( $oStockPost->getId() );
			$this->dm->flush();
		}
		
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
		}elseif ( empty($aData['image_link']) && empty($aData['extension']) ) {
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

		$oPost->setUserTags( $aData['userTags'] );
		$oPost->setStockTags( $aData['stockTags'] );
		
		$this->dm->flush();

		// Update Stock Post
		if ( $oPost->getStockPostId() ) {
			$this->load->model('stock/post');
			$aData['thumb'] = $oPost->getThumb();
			$this->model_stock_post->editPost( $oPost->getStockPostId(), $aData, true );
		}

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

		$this->load->model('stock/post');
		$this->model_stock_post->deletePost( $oPost->getStockPostId(), true );
		
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

	public function getPosts( $aData = array() ){
		if ( empty($aData['user_slug']) ) return null;

		if ( $aData['user_slug'] == $this->customer->getSlug() ){
			$oUser = $this->customer->getUser();
		}else{
			$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $aData['user_slug'] );
			if ( empty($oUser) ) return null;
		}

		if (  empty($aData['start']) ){
			$aData['start'] = 0;
		}
		if ( empty($aData['limit']) ){
			$aData['limit'] = 15;
		}

		$oPosts = $oUser->getPostData();
		if ( empty($oPosts) ) return null;

		$lPosts = $oPosts->getPosts(false)->filter( function($oPost) {
            if ( !$oPost->getTitle() || $oPost->getUser()->getId() != $oUser->getId() ){
                return false;
            }
            if ( !empty($aData['start_time']) && !empty($aData['end_time']) ){
            	if ( $oPost->getCreated() < $aData['start_time'] || $oPost->getCreated() > $aData['end_time'] )
            		return false;
            }
            return true;
        });

        $aPosts = $lPosts->toArray();

        if ( empty($aData['start_time']) && empty($aData['end_time']) ){
			usort($aPosts, function ($a, $b){
			    if ( $a->getCountViewer() == $b->getCountViewer() ) {
			        return 0;
			    }
			    return ($a->getCountViewer() > $b->getCountViewer()) ? -1 : 1;
			});
		}

		return array(
			'total' => $lPosts->count(),
			'posts' => array_slice($aPosts, $aData['start'], $aData['limit'])
		);
	}

	public function getStatisticTime( $sUserSlug ){
		if ( $sUserSlug == $this->customer->getSlug() ){
			$oUser = $this->customer->getUser();
		}else{
			$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserSlug );
		}

		if ( !$oUser ) return array();

		$oPosts = $oUser->getPostData();

		if ( !$oPosts ) return array();

		$aTimes = array();
		$oPosts->getPosts(false)->forAll( function($key, $oPost) use (&$aTimes) {
            if ( !$oPost->getTitle() || $oPost->getUser()->getId() != $this->customer->getId() ){
                return true;
            }
            $time = $oPost->getCreated()->format('Ym');
            $aTimes[$time][] = $oPost->getCreated()->setTime(00, 00)->getTimestamp();
            return true;
        });

        $aTimes = array_map(function($aTime){
            return array(
                'time' => $aTime[0],
                'count' => count($aTime)
            );
        }, $aTimes);

        return $aTimes;
	}
}
?>