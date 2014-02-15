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

	            $aComment = $oComment->formatToCache();

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

        $aComment = $lBaseComment->formatToCache();

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
}
?>