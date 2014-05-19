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

	            $aComment['href_user'] = $this->extension->path('WallPage', array(
	                'user_slug' => $aUser['slug']
	            ));
	            $aComment['href_like'] = $this->extension->path('CommentLike', array(
	                'post_slug' => $sPostSlug,
	                'post_type' => $sPostType,
	                'comment_id' => $aComment['id']
	            ));
	            $aComment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
	                'post_slug' => $sPostSlug,
	                'post_type' => $sPostType,
	                'comment_id' => $aComment['id']
	            ));
	            $aComment['is_liked'] = $iLiked;

	            if ( $aComment['user_id'] == $idCurrUserId ){
	            	$aComment['is_owner'] = true;
	            	$aComment['href_edit'] = $this->extension->path('CommentEdit', array(
	                'post_slug' => $sPostSlug,
	                'post_type' => $sPostType,
	                'comment_id' => $aComment['id']
		            ));
		            $aComment['href_delete'] = $this->extension->path('CommentDelete', array(
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

        $aComment['href_user'] = $this->extension->path('WallPage', array(
            'user_slug' => $aUser['slug']
        ));
        $aComment['href_like'] = $this->extension->path('CommentLike', array(
            'post_slug' => $sPostSlug,
            'post_type' => $sPostType,
            'comment_id' => $aComment['id']
        ));
        $aComment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
            'post_slug' => $sPostSlug,
            'post_type' => $sPostType,
            'comment_id' => $aComment['id']
        ));
        
        $aComment['is_liked'] = $iLiked;
        if ( $aComment['user_id'] == $idCurrUserId ){
        	$aComment['is_owner'] = true;
        	$aComment['href_edit'] = $this->extension->path('CommentEdit', array(
	            'post_slug' => $sPostSlug,
	            'post_type' => $sPostType,
	            'comment_id' => $aComment['id']
	        ));
	        $aComment['href_delete'] = $this->extension->path('CommentDelete', array(
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

		// thumb
		if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
			$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 400, 250 );
		}else{
			$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], 400, 250 );
		}

		if ( empty($aUsers[$aPost['user_id']]) ){
			$oUser = $oPost->getUser();
			$aUser = $oUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUsers[$aUser['id']] = $aUser;
		}

		$aPost['user'] = $aUsers[$aPost['user_id']];

		// Check owner
        // If post of wall & owner = false ==> user A post on all of user B
        // If post of branch ==> user A post on any Branch
        switch ( $aPost['type'] ) {
            case $this->config->get('common')['type']['user']:
                if ( $oPost->getUser()->getId() != $oPost->getOwnerId() ){
                    $aPost['is_owner'] = false;
                    $aPost['owner'] = array(
                        'username' => $aOwner['username'],
                        'href' => $this->extension->path( "WallPage", array('user_slug' => $aOwner['slug']) )
                    );
                }
                break;

            case $this->config->get('common')['type']['branch']:
                $oCategory = $oPost->getCategory();

                $aPost['is_owner'] = false;
                $aPost['owner'] = array(
                    'username' => $oCategory->getName(),
                    'href' => $this->extension->path("BranchCategory", array('branch_slug' => $oCategory->getSlug()) )
                );
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
}
?>