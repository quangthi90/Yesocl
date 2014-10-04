<?php
class ModelToolObject extends Model
{
	private $aUsers = array();

	/**
	 * Format List Object Posts to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: list object Posts
	 * @return: Array List Objects Posts formated
	 */
	public function formatPosts( $lPosts, $isReturnUser = true, $bIsMustImage = false, $with = 330, $height = 246, $options = array() ) {
		$aPosts = array();

		foreach ( $lPosts as $oPost ) 
			$aPosts[] = $this->formatPost( $oPost, $bIsMustImage, $with, $height, $options );

		if ( !$isReturnUser ){
			return $aPosts;
		}
		
		return array(
			'posts' => $aPosts,
			'users' => $this->aUsers
		);
	}

	/**
	 * Format Post to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Post
	 * @return: Array Object Post formated
	 */
	public function formatPost( $oPost, $bIsMustImage = false, $with = 330, $height = 246, $options = array() ) {
		$this->load->model('tool/image');
		$aPost = $oPost->formatToCache();

		// check user liked
		$aLikerIds = $oPost->getLikerIds();
		if ( !empty($aLikerIds) && in_array($this->customer->getId(), $aLikerIds) ){
			$aPost['isLiked'] = true;
		}else{
			$aPost['isLiked'] = false;
		}

		if ( empty($this->aUsers[$aPost['user_id']]) ){
			$aUser = $this->formatUser( $oPost->getUser() );
			$this->aUsers[$aUser['id']] = $aUser;
		}

		$lComments = $oPost->getComments();
		$aComments = $lComments->slice($lComments->count() - 3, 3);
		$aPost['comments'] = $this->formatComments( $aComments, false );

		$aPost['user'] = $this->aUsers[$aPost['user_id']];
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
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], $with, $height );
				}elseif ( $bIsMustImage ){
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], $with, $height );
				}else{
					$aPost['image'] = null;
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
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], $with, $height );
				}else{
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], $with, $height );
				}
                break;

            case $this->config->get('common')['type']['stock']:
            	if ( count($oPost->getStockTags()) > 0 ){
	            	$aPost['is_owner'] = false;
	            	// SHOW CURRENT STOCK CODE
            		if (isset( $options['current_stock'] )) {
		                $aPost['owner'] = array(
		                    'username' => $options['current_stock'],
		                    'href' => $this->path("StockPage", array('stock_code' => $options['current_stock']) )
		                );
            		}else {
		                $aPost['owner'] = array(
		                    'username' => $oPost->getStockTags()[0],
		                    'href' => $this->path("StockPage", array('stock_code' => $oPost->getStockTags()[0]) )
		                );
            		}
	            }

                if ( $oPost->getUser()->getId() == $this->customer->getId() ){
                	$aPost['can_delete'] = true;
                	$aPost['can_edit'] = true;
                }

                // thumb
				if ( !empty($aPost['thumb']) && is_file(DIR_IMAGE . $aPost['thumb']) ){
					$aPost['image'] = $this->model_tool_image->resize( $aPost['thumb'], $with, $height );
				}elseif ( $bIsMustImage ){
					$aPost['image'] = $this->model_tool_image->resize( $this->config->get('no_image')['branch']['post'], $with, $height );
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

		foreach ( $lComments as $oComment ) {
			$aComments[] = $this->formatComment( $oComment );
		}

		if ( !$isReturnUser ) return $aComments;

		return array(
			'comments' => $aComments,
			'users' => $this->aUsers
		);
	}

	/**
	 * Format Object Comment to Array
	 * 2014/04/30
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Comment
	 * @return: Array Object Comment formated
	 */
	public function formatComment( $oComment ) {
		$aComment = $oComment->formatToCache();
		if ( empty($this->aUsers[$aComment['user_id']]) ){
			$this->load->model('tool/image');
			
			$aUser = $this->formatUser( $oComment->getUser() );
			$this->aUsers[$aUser['id']] = $aUser;
		}
		$aComment['user'] = $this->aUsers[$aComment['user_id']];

		return $aComment;
	}

	/**
	 * Format Object Room Message to Array
	 * 2014/09/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Room Message
	 * @return: Array Object Room Message formated
	 */
	public function formatRoom( $oRoomMessage, $iwidth = 65, $iheight = 65 ) {
		$oLoggedUser = $this->customer->getUser();

		$aRoomMessage = $oRoomMessage->formatToCache( $oLoggedUser, $iwidth, $iheight );
		$oLastMessage = $oRoomMessage->getMessages()->last();
		$aRoomMessage['last_message'] = $this->formatMessage( $oLastMessage, $oRoomMessage->getLastUser($oLoggedUser), $iwidth, $iheight );

		return $aRoomMessage;
	}

	/**
	 * Format List Object Messages to Array
	 * 2014/09/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: List Object Messages
	 * @return: Array List Object Messages formated
	 */
	public function formatMessages( $lMessages, $iwidth = 60, $iheight = 60 ) {
		$aMessages = array();
		foreach ( $lMessages as $oMessage ) {
			$aMessages[] = $this->formatMessage( $oMessage, null, $iwidth, $iheight );
		}

		return $aMessages;
	}

	/**
	 * Format Object Message to Array
	 * 2014/09/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object Message
	 * @return: Array Object Message formated
	 */
	public function formatMessage( $oMessage, $oRoomUser = null, $iwidth = 60, $iheight = 60 ) {
		$aMessage = $oMessage->formatToCache();

		$oUser = $oMessage->getAuthor();
		$idUser = $oUser->getId();
		if ( $oRoomUser !== null && empty($this->aUsers[$oRoomUser->getId()]) ) {
			$idUser = $oRoomUser->getId();
			$this->aUsers[$idUser] = $this->formatUser( $oRoomUser, $iwidth, $iheight );
		
		} elseif ( empty($this->aUsers[$idUser]) ) {
			$this->aUsers[$idUser] = $this->formatUser( $oUser, $iwidth, $iheight );
		}
		
		$aMessage['user'] = $this->aUsers[$idUser];

		return $aMessage;
	}

	/**
	 * Format Object User to Array
	 * 2014/09/26
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: object User
	 * @return: Array Object User formated
	 */
	public function formatUser( $oUser, $iwidth = 50, $iheight = 50 ) {
		$this->load->model('tool/image');
		
		$aUser = $oUser->formatToCache();
		$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'], $iwidth, $iheight );
		$aUser['fr_status'] = $this->checkFriendStatus( $this->customer->getId(), $aUser['id'] );
		$aUser['fl_status'] = $this->checkFollowerStatus( $this->customer->getId(), $aUser['id'] );

		return $aUser;
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
		if ( $aPost['type'] == 'user' && $oPost->getOwnerSlug() && $oPost->getOwnerSlug() != $oPost->getUser()->getSlug() ) {
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
		if ( $aUserTags ){
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
		}

		$this->load->model('user/notification');
		// Disabled all notifications
		$this->model_user_notification->disabledNotifications( $oPost->getId() );
		// Add notifications again
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