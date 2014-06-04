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
			$aUser['fr_status'] = $this->checkFriendStatus( $this->customer->getId(), $aUser['id'] );
			$aUser['fl_status'] = $this->checkFollowerStatus( $this->customer->getId(), $aUser['id'] );
			$aUsers[$aUser['id']] = $aUser;
		}

		$aPost['user'] = $aUsers[$aPost['user_id']];
		$aPost['is_owner'] = true;

		// Check owner
        // If post of wall & owner = false ==> user A post on all of user B
        // If post of branch ==> user A post on any Branch
        switch ( $aPost['type'] ) {
            case $this->config->get('common')['type']['user']:
                if ( $oPost->getOwnerSlug() && $oPost->getUser()->getSlug() != $oPost->getOwnerSlug() ){
                	$oOwner = $this->dm->getRepository('Document\User\User')->findOneBySlug( $oPost->getOwnerSlug() );
                	if ( $oOwner ){
	                    $aPost['is_owner'] = false;
	                    $aPost['owner'] = array(
	                        'username' => $oOwner->getUsername(),
	                        'href' => $this->path( "WallPage", array('user_slug' => $oOwner->getSlug()) )
	                    );
	                }
                }

                // Check permission
                if ( $oPost->getUser()->getId() == $this->customer->getId() ){
                	$aPost['can_delete'] = true;
                	$aPost['can_edit'] = true;
                }elseif ( $oPost->getOwnerSlug() == $this->customer->getSlug() ){
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

            case $this->config->get('common')['type']['stock']:
                if ( $oPost->getUser()->getId() == $this->customer->getId() ){
                	$aPost['can_delete'] = true;
                	$aPost['can_edit'] = true;
                }

                // thumb
				if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], 330, 246 );
				}else{
					$aPost['image'] = null;
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
			$aUser['fr_status'] = $this->checkFriendStatus( $this->customer->getId(), $aUser['id'] );
			$aUser['fl_status'] = $this->checkFollowerStatus( $this->customer->getId(), $aUser['id'] );
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

    /**
	 * Check post to add notification
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Post
	 * @return: Bool
	 */
	public function checkPostNotification( $oPost ) {
		$aNotis = array();

		$aPost = $oPost->formatToCache();

		// Check user A post on wall of user B
		if ( $aPost['type'] == 'user' && $oPost->getOwnerSlug() != $oPost->getUser()->getSlug() ) {
			$aNotis[$oPost->getOwnerSlug()] = array(
				'user_id' => $oPost->getOwnerSlug(),
				'actor' => $oPost->getUser(),
				'action' => $this->config->get('common')['action']['post'],
				'object_id' => $oPost->getId(),
				'slug' => $oPost->getSlug(),
				'type' => $this->config->get('common')['type']['user'],
				'object' => $this->config->get('common')['object']['wall']
			);
		}

		// Check User tags
		$aUserTags = $oPost->getUserTags();
		foreach ( $aUserTags as $sUserSlug ) {
			$aNotis[$sUserSlug] = array(
				'user_id' => $sUserSlug,
				'actor' => $oPost->getUser(),
				'action' => $this->config->get('common')['action']['tag'],
				'object_id' => $oPost->getId(),
				'slug' => $oPost->getSlug(),
				'type' => $this->config->get('common')['type']['user'],
				'object' => $this->config->get('common')['object']['post']
			);
		}

		$this->load->model('user/notification');
		// Disabled all notifications
		$this->model_user_notification->disabledNotifications( $oPost->getId() );
		foreach ( $aNotis as $aNoty ) {
			$this->model_user_notification->addNotification(
				$aNoty['user_id'],
				$aNoty['actor'],
				$aNoty['action'],
				$aNoty['object_id'],
				$aNoty['slug'],
				$aNoty['type'],
				$aNoty['object']
			);
		}

		return true;
	}

	/**
	 * Check Comment to add notification
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Post, MongoID Comment ID
	 * @return: Bool
	 */
	public function checkCommentNotification( $oPost, $idComment ) {
		$aNotis = array();
		$aPost = $oPost->formatToCache();
		$oComment = $oPost->getCommentById( $idComment );

		// Check user A comment on post in wall of user B
		if ( $oPost->getOwnerSlug() && $oPost->getOwnerSlug() != $oComment->getUser()->getSlug() && $oPost->getUser()->getSlug() != $oComment->getUser()->getSlug() ) {
			$aNotis[$oPost->getOwnerSlug()] = array(
				'user_id' => $oPost->getOwnerSlug(),
				'actor' => $oComment->getUser(),
				'action' => $this->config->get('common')['action']['comment'],
				'object_id' => $idComment,
				'slug' => $oPost->getSlug(),
				'type' => $aPost['type'],
				'object' => $this->config->get('common')['object']['post']
			);
		}

		// Check user A comment on post of User B
		if ( $oPost->getUser()->getId() != $oComment->getUser()->getId() ) {
			$aNotis[$oPost->getUser()->getSlug()] = array(
				'user_id' => $oPost->getUser()->getSlug(),
				'actor' => $oComment->getUser(),
				'action' => $this->config->get('common')['action']['comment'],
				'object_id' => $idComment,
				'slug' => $oPost->getSlug(),
				'type' => $aPost['type'],
				'object' => $this->config->get('common')['object']['post']
			);
		}

		// Check user of old comments
		$lComments = $oPost->getComments();
		foreach ( $lComments as $_oComment ) {
			if ( $oComment->getUser()->getId() != $_oComment->getUser()->getId() ){
				$aNotis[$_oComment->getUser()->getSlug()] = array(
					'user_id' => $_oComment->getUser()->getSlug(),
					'actor' => $oComment->getUser(),
					'action' => $this->config->get('common')['action']['comment'],
					'object_id' => $idComment,
					'slug' => $oPost->getSlug(),
					'type' => $aPost['type'],
					'object' => $this->config->get('common')['object']['post']
				);
			}
		}

		// Check user tag in post
		$aUserTags = $oPost->getUserTags();
		foreach ( $aUserTags as $sUserSlug ) {
			if ( $sUserSlug != $oComment->getUser()->getSlug() ){
				$aNotis[$sUserSlug] = array(
					'user_id' => $sUserSlug,
					'actor' => $oComment->getUser(),
					'action' => $this->config->get('common')['action']['comment'],
					'object_id' => $idComment,
					'slug' => $oPost->getSlug(),
					'type' => $aPost['type'],
					'object' => $this->config->get('common')['object']['post']
				);
			}
		}

		$this->load->model('user/notification');
		// Disabled all notifications
		$this->model_user_notification->disabledNotifications( $oPost->getId() );
		foreach ( $aNotis as $aNoty ) {
			$this->model_user_notification->addNotification(
				$aNoty['user_id'],
				$aNoty['actor'],
				$aNoty['action'],
				$aNoty['object_id'],
				$aNoty['slug'],
				$aNoty['type'],
				$aNoty['object']
			);
		}

		return true;
	}

	/**
	 * Check status of 2 users
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoId User A
	 * 	MongoId User B
	 * @return: int
	 *	1: me
	 *	2: friend
	 *	3: sent request make friend
	 *	4: not relationship
	 *	-1: not found User B
	 */
	private $oFriendAs = null;
	public function checkFriendStatus( $idUserA, $idUserB ){
		// me
		if ( $idUserA == $idUserB ){
            return 1;
        
        }

        if ( $this->oFriendAs && $this->oFriendAs->getUser()->getId() == $idUserA ) {
			$oFriendAs = $this->oFriendAs;
		}else{
			$oFriendAs = $this->dm->getRepository('Document\Friend\Friends')->findOneBy(array(
				'user.id' => $idUserA
			));
			$this->oFriendAs = $oFriendAs;
		}

		if ( $oFriendAs && $oFriendAs->getFriendByUserId($idUserB) ) {
	        return 2;
		}

		$oUserB = $this->dm->getRepository('Document\User\User')->find( $idUserB );

        if ( !$oUserB ) {
        	return -1;
        }

		if ( $oUserB->getFriendRequests() && in_array($idUserA, $oUserB->getFriendRequests()) ) {
            return 3;
        }

    	return 4;
	}

	/**
	 * Check User A has follow User B
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	MongoId User A
	 * 	MongoId User B
	 * @return: int
	 *		1: me
	 *		2: Follower
	 *		3: not relationship
	 *		-1: not found User B
	 */
	private $oFollowerAs = null;
	public function checkFollowerStatus( $idUserA, $idUserB ){
		// me
		if ( $idUserA == $idUserB ){
            return 1;
        }

        $oUserB = $this->dm->getRepository('Document\User\User')->find( $idUserB );

        if ( !$oUserB ){
        	return -1;
        }

        if ( $this->oFollowerAs && $this->oFollowerAs->getUser()->getId() == $idUserA ) {
        	$oFollowerAs = $this->oFollowerAs;
        }else{
        	$oFollowerAs = $this->dm->getRepository('Document\Friend\Followers')->findOneBy(array(
				'user.id' => $idUserA
			));
			$this->oFollowerAs = $oFollowerAs;
        }

		if ( !$oFollowerAs ){
			return 3;
		}

        if ( $oFollowerAs->getFollowingByUserId($idUserB) ){
            return 2;
        }

    	return 3;
	}
}
?>