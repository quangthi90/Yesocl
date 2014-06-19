<?php
use Document\Stock\Post;

class ModelStockPost extends Model {
	/**
	 * Add Post of Stock to Database
	 * 2013/08/29
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	array data:
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
	public function addPost( $aData = array() ) {
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

		$this->dm->persist( $oPost );
		$this->dm->flush();

		// Add Image
		if ( !empty($aData['thumb']) ) {
			$oPost->setThumb( $aData['thumb'] );
		}elseif ( !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ) {
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
			'type_id' => new MongoId(),
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
	 *  string Post Slug or Post Id
	 *	array data:
	 *		- string Stock Code 	 								-- Required
	 *		- string User Author Slug 								-- Required
	 *		- string Title
	 *		- string Content 										-- Required
	 *		- string Upload Image link (root/image/data/upload)
	 *		- string Extension of Image
	 *		- array Slugs of User Tagged
	 *		- array Codes of Stock Tagged
	 *	bool is duplicate when user post in wall & tag stock
	 *	bool is Id when edit post by ID
	 * @return: bool
	 *	- object post: success
	 * 	- false: not success
	 */
	public function editPost( $sPostSlug, $aData = array(), $bIsId = false ) {
		if ( !$bIsId ) {
			$oPost = $this->dm->getRepository('Document\Stock\Post')->findOneBySlug( $sPostSlug );
		}else{
			$oPost = $this->dm->getRepository('Document\Stock\Post')->find( $sPostSlug );
		}

		if ( !$oPost ){
			return false;
		}

		if ( !empty($aData['thumb']) ) {
			$oPost->setThumb( $aData['thumb'] );
		}elseif ( !empty($aData['image_link']) && !empty($aData['extension']) && is_file($aData['image_link']) ){
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

		if ( isset($aData['stockTags']) ) {
			$oPost->setStockTags( $aData['stockTags'] );
		}

		if ( isset($aData['userTags']) ) {
			$oPost->setUserTags( $aData['userTags'] );
		}
		
		$this->dm->flush();

		// Notifications
		$this->load->model('tool/object');
		$this->model_tool_object->checkPostNotification( $oPost );
		
		return $oPost;
	}

	public function deletePost( $sPostSlug, $bIsId = false ) {
		if ( !$bIsId ){
			$oPost = $this->dm->getRepository('Document\Stock\Post')->findOneBySlug( $sPostSlug );
		}else{
			$oPost = $this->dm->getRepository('Document\Stock\Post')->find( $sPostSlug );
		}

		if ( !$oPost ){
			return false;
		}

		// Remove image
		if ( $oPost->getThumb() ){
			$this->load->model('tool/image');

			$sFolderLink = $this->config->get('stock')['default']['image_link'];
			$sFolderName = $this->config->get('post')['default']['image_folder'];
			$path = DIR_IMAGE . $sFolderLink . $oPost->getUser()->getId() . '/' . $sFolderName . '/' . $oPost->getId();
			
			// remove Image
			$this->model_tool_image->deleteDirectoryImage( $path );
		}
		
		$this->dm->remove( $oPost );
		
		$this->dm->flush();
		
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
		if ( !empty($aData['stock_code']) ){
			$query['stockTags'] = $aData['stock_code'];
		}

		$lPosts = $this->dm->getRepository('Document\Stock\Post')
			->findBy($query)
			->skip($aData['start'])
			->limit($aData['limit'])
			->sort(array('created' => -1));

		return $lPosts;
	}

	public function getPost( $aData = array(), $increase_viewer = false ){
		$query = array();
		if ( !empty($aData['post_id']) ){
			$oPost = $this->dm->getRepository('Document\Stock\Post')->find( $aData['post_id'] );
		}elseif ( !empty($aData['post_slug']) ){
			$oPost = $this->dm->getRepository('Document\Stock\Post')->findOneBySlug( $aData['post_slug'] );
		}

		if ( $oPost != null && $increase_viewer == true ){
			$oPost->setCountViewer( $oPost->getCountViewer() + 1 );
			$this->dm->flush();
		}

		return $oPost;
	}

	public function getStatisticTime( $sUserSlug ){
		if ( $sUserSlug == $this->customer->getSlug() ){
			$oUser = $this->customer->getUser();
		}else{
			$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserSlug );
		}

		if ( !$oUser ) return array();

		$aTimes = array();
		
		$lTimes = $this->dm->createQueryBuilder('Document\Stock\Post')
			->map("function() {
	            if ( this.title != null ){
	            	var y = this.created.getFullYear().toString(),
	            		m = (this.created.getMonth() + 1).toString(),
	            		time = new Date(m + '/1/' + y);
	                emit(time, 1);
	            }
	        }")
	        ->reduce('function(k, vals) {
		        var sum = 0;
		        for (var i in vals) {
		            sum++;
		        }
		        return sum;
		    }')
			->field('user.id')->equals( $oUser->getId() )
			->field('title')->notEqual( null )
			->getQuery()->execute();

		$aTimes = iterator_to_array($lTimes);

		$aTimes = array_map(function($aTime){
            return array(
                'time' => $aTime['_id']->sec,
                'count' => $aTime['value']
            );
        }, $aTimes);

        return $aTimes;
	}
}
?>