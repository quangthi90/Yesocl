<?php
class ModelToolObject extends Model
{
	/**
	 * Format list comment to return to View
	 * 2013/11/22
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Post
	 * @return: Array Comment formated
	 */
	public function formatCommentOfPost( $lBaseComment, $sPostSlug, $sPostType ){
		$this->load->model('user/user');
        $this->load->model('tool/image');

        if ( !$lBaseComment ){
        	return array();
        }

        $idCurrUserId = $this->customer->getId();

        if ( is_array($lBaseComment) ){
        	$aComments = array();
        	$aUsers = array();
	        foreach ( $lBaseComment as $oComment ) {
	            if ( in_array($this->customer->getId(), $oComment->getLikerIds()) ){
	                $iLiked = true;
	            }else{
	                $iLiked = false;
	            }

	            $aComment = $oComment->formatToCache(false);

	            if ( empty($aUsers[$aComment['user_id']]) ){
	            	$aUser = $oComment->getUser()->formatToCache();
	            	$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] ); 
	            	$aUsers[$aUser['id']] = $aUser;
	            }else{
	            	$aUser = $aUsers[$aComment['user_id']];
	            }
	            
	            $aComment['avatar'] = $aUser['avatar'];

	            if ( $aUser && $aUser['username'] ){
	                $aComment['author'] = $aUser['username'];
	            }else{
	                $aComment['author'] = $aComment['author'];
	            }

	            $aComment['href_user'] = $this->path('WallPage', array(
	                'user_slug' => $aUser['slug']
	            ));
	            $aComment['href_like'] = $this->path('CommentLike', array(
	                'post_slug' => $sPostSlug,
	                'post_type' => $sPostType,
	                'comment_id' => $aComment['id']
	            ));
	            $aComment['href_liked_user'] = $this->path('CommentGetLiker', array(
	                'post_slug' => $sPostSlug,
	                'post_type' => $sPostType,
	                'comment_id' => $aComment['id']
	            ));
	            $aComment['is_liked'] = $iLiked;

	            if ( $aComment['user_id'] == $idCurrUserId ){
	            	$aComment['is_owner'] = true;
	            	$aComment['href_edit'] = $this->path('CommentEdit', array(
	                'post_slug' => $sPostSlug,
	                'post_type' => $sPostType,
	                'comment_id' => $aComment['id']
		            ));
		            $aComment['href_delete'] = $this->path('CommentDelete', array(
		                'post_slug' => $sPostSlug,
		                'post_type' => $sPostType,
		                'comment_id' => $aComment['id']
		            ));
	            
	            }else{
	            	$aComment['is_owner'] = false;
	            }

	            $date = $this->extension->getDatetimeFromNow( -2 );
		        if ( $aComment['created'] < $date ){
		        	$aComment['created_title'] = $this->extension->localizedDate(
		        		$aComment['created'],
		        		'full',
		        		'none',
		        		$this->extension->getCookie('language'),
		        		null,
		        		"cccc, d MMMM yyyy '" . gettext('at') . "' hh:ss"
		        	);
		        	$aComment['created_label'] = $this->extension->localizedDate(
		        		$aComment['created'],
		        		'full',
		        		'none',
		        		$this->extension->getCookie('language'),
		        		null,
		        		"d MMMM '" . gettext('at') . "' hh:ss"
		        	);
		        }else{
		        	$aComment['created_title'] = $aComment['created']->format('c');
		        	$aComment['created_label'] = null;
		        }

	            $aComments[] = $aComment;
	        }

	        return $aComments;
	    }
        
        if ( in_array($this->customer->getId(), $lBaseComment->getLikerIds()) ){
            $iLiked = 1;
        }else{
            $iLiked = 0;
        }

        $aComment = $lBaseComment->formatToCache(false);

    	$aUser = $lBaseComment->getUser()->formatToCache();
    	
    	$aComment['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] ); 
    	
        if ( $aUser && $aUser['username'] ){
            $aComment['author'] = $aUser['username'];
        }else{
            $aComment['author'] = $aComment['author'];
        }

        $aComment['href_user'] = $this->path('WallPage', array(
            'user_slug' => $aUser['slug']
        ));
        $aComment['href_like'] = $this->path('CommentLike', array(
            'post_slug' => $sPostSlug,
            'post_type' => $sPostType,
            'comment_id' => $aComment['id']
        ));
        $aComment['href_liked_user'] = $this->path('CommentGetLiker', array(
            'post_slug' => $sPostSlug,
            'post_type' => $sPostType,
            'comment_id' => $aComment['id']
        ));
        
        $aComment['is_liked'] = $iLiked;
        if ( $aComment['user_id'] == $idCurrUserId ){
        	$aComment['is_owner'] = true;
        	$aComment['href_edit'] = $this->path('CommentEdit', array(
	            'post_slug' => $sPostSlug,
	            'post_type' => $sPostType,
	            'comment_id' => $aComment['id']
	        ));
	        $aComment['href_delete'] = $this->path('CommentDelete', array(
	            'post_slug' => $sPostSlug,
	            'post_type' => $sPostType,
	            'comment_id' => $aComment['id']
	        ));
        
        }else{
        	$aComment['is_owner'] = false;
        }

        $date = $this->extension->getDatetimeFromNow( -2 );
        if ( $aComment['created'] < $date ){
        	$aComment['created_title'] = $this->extension->localizedDate(
        		$aComment['created'],
        		'full',
        		'none',
        		$this->extension->getCookie('language'),
        		null,
        		"cccc, d MMMM yyyy '" . gettext('at') . "' hh:ss"
        	);
        	$aComment['created_label'] = $this->extension->localizedDate(
        		$aComment['created'],
        		'full',
        		'none',
        		$this->extension->getCookie('language'),
        		null,
        		"d MMMM '" . gettext('at') . "' hh:ss"
        	);
        }else{
        	$aComment['created_title'] = $aComment['created']->format('c');
        	$aComment['created_label'] = null;
        }

        return $aComment;
	}

	/**
	 * Format List Object Posts to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: list object Posts
	 * @return: Array List Objects Posts formated
	 */
	public function formatPosts( $lPosts, $isReturnUser = true ) {
		$aPosts = array();
		$aUsers = array();
		foreach ( $lPosts as $oPost ) $aPosts[] = $this->formatPost( $oPost, $aUsers );

		if ( !$isReturnUser ){
			return $aPosts;
		}
		
		return array(
			'posts' => $aPosts,
			'users' => $aUsers
		);
	}

	/**
	 * Format Post to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Post
	 * @return: Array Object Post formated
	 */
	public function formatPost( $oPost, &$aUsers = array() ) {
		$this->load->model('tool/image');
		$aPost = $oPost->formatToCache();

		// check user liked
		$aLikerIds = $oPost->getLikerIds();
		if ( in_array($this->customer->getId(), $aLikerIds) ){
			$aPost['isLiked'] = true;
		}else{
			$aPost['isLiked'] = false;
		}

		if ( empty($aUsers[$aPost['user_id']]) ){
			$oUser = $oPost->getUser();
			$aUser = $oUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUsers[$aUser['id']] = $aUser;
		}

		$aPost['user'] = $aUsers[$aPost['user_id']];
		$aPost['is_owner'] = true;

		// Check owner
        // If post of wall & owner = false ==> user A post on all of user B
        // If post of branch ==> user A post on any Branch
        switch ( $aPost['type'] ) {
            case $this->config->get('common')['type']['user']:
                if ( $oPost->getUser()->getId() != $oPost->getOwnerId() ){
                	$oOwner = $this->dm->getRepository('Document\User\User')->find( $oPost->getOwnerId() );
                    $aPost['is_owner'] = false;
                    $aPost['owner'] = array(
                        'username' => $oOwner->getUsername(),
                        'href' => $this->path( "WallPage", array('user_slug' => $oOwner->getSlug()) )
                    );
                }

                // Check permission
                if ( $oPost->getUser()->getId() == $this->customer->getId() ){
                	$aPost['can_delete'] = true;
                	$aPost['can_edit'] = true;
                }elseif ( $oPost->getOwnerId() == $this->customer->getId() ){
                	$aPost['can_delete'] = true;
                }

                // thumb
				if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 330, 246 );
				}
                break;

            case $this->config->get('common')['type']['branch']:
                $oCategory = $oPost->getCategory();

                $aPost['is_owner'] = false;
                $aPost['owner'] = array(
                    'username' => $oCategory->getName(),
                    'href' => $this->path("BranchCategory", array('category_slug' => $oCategory->getSlug()) )
                );

                if ( $oPost->getUser()->getId() == $this->customer->getId() ){
                	$aPost['can_delete'] = true;
                	$aPost['can_edit'] = true;
                }

                // thumb
				if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 330, 246 );
				}else{
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
				}
                break;
        }

		return $aPost;
	}

	/**
	 * Format List Object Comment to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Comment
	 * @return: Array List Object Comment formated
	 */
	public function formatComments( $lComments, $isReturnUser = true ) {
		$aComments = array();
		$aUsers = array();

		foreach ( $lComments as $oComment ) {
			$aComments[] = $this->formatComment( $oComment, $aUsers );
		}

		if ( !$isReturnUser ) return $aComments;

		return array(
			'comments' => $aComments,
			'users' => $aUsers
		);
	}

	/**
	 * Format Object Comment to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Comment
	 * @return: Array Object Comment formated
	 */
	public function formatComment( $oComment, &$aUsers = array() ) {
		$aComment = $oComment->formatToCache();
		if ( empty($aUsers[$aComment['user_id']]) ){
			$this->load->model('tool/image');
			
			$oUser = $oComment->getUser();
			$aUser = $oUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUsers[$aUser['id']] = $aUser;
		}
		$aComment['user'] = $aUsers[$aComment['user_id']];

		return $aComment;
	}

	// Generate url
	public function path( $path, $params = array() ){
        $routing = $this->config->get('routing')[$path];
        $parts = explode( '/', $routing );

        foreach ( $params as $key => $param ) {
            $index = array_search( "{".$key."}", $parts );
            if ( $index !== false ){
                $parts[$index] = $param;
            }
        }

        if ( count($params) == 0 ){
            foreach ( $parts as $key => $data ) {
                if ( preg_match('/^{/', $data) && preg_match('/}$/', $data) ){
                    array_splice($parts, $key, 1);
                }
            }
        }
        
        return HTTPS_SERVER . implode('/', $parts);
    }
}
?>