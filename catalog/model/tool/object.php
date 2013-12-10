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
	public function formatCommentOfPost( $base_comment, $post_slug, $post_type ){
		$this->load->model('user/user');
        $this->load->model('tool/image');

        if ( !$base_comment ){
        	return array();
        }

        $idCurrUserId = $this->customer->getId();

        if ( is_array($base_comment) ){
        	$comments = array();
        	$users = array();
	        foreach ( $base_comment as $comment_temp ) {
	            if ( in_array($this->customer->getId(), $comment_temp->getLikerIds()) ){
	                $liked = true;
	            }else{
	                $liked = false;
	            }

	            $comment = $comment_temp->formatToCache();

	            if ( empty($users[$comment['user_id']]) ){
	            	$user = $comment_temp->getUser()->formatToCache();
	            	$user['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] ); 
	            	$users[$user['id']] = $user;
	            }else{
	            	$user = $users[$comment['user_id']];
	            }
	            
	            $comment['avatar'] = $user['avatar'];

	            if ( $user && $user['username'] ){
	                $comment['author'] = $user['username'];
	            }else{
	                $comment['author'] = $comment['author'];
	            }

	            $comment['href_user'] = $this->extension->path('WallPage', array(
	                'user_slug' => $user['slug']
	            ));
	            $comment['href_like'] = $this->extension->path('CommentLike', array(
	                'post_slug' => $post_slug,
	                'post_type' => $post_type,
	                'comment_id' => $comment['id']
	            ));
	            $comment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
	                'post_slug' => $post_slug,
	                'post_type' => $post_type,
	                'comment_id' => $comment['id']
	            ));
	            $comment['href_edit'] = $this->extension->path('CommentEdit', array(
	                'post_slug' => $post_slug,
	                'post_type' => $post_type,
	                'comment_id' => $comment['id']
	            ));
	            
	            $comment['href_delete'] = $this->extension->path('CommentDelete', array(
	                'post_slug' => $post_slug,
	                'post_type' => $post_type,
	                'comment_id' => $comment['id']
	            ));
	            $comment['created'] = $comment['created']->format( $this->language->get('date_format_full') );
	            $comment['is_liked'] = $liked;

	            if ( $comment['user_id'] == $idCurrUserId ){
	            	$comment['is_owner'] = true;
	            }else{
	            	$comment['is_owner'] = false;
	            }

	            $comments[] = $comment;
	        }

	        return $comments;
	    }
        
        if ( in_array($this->customer->getId(), $base_comment->getLikerIds()) ){
            $liked = 1;
        }else{
            $liked = 0;
        }

        $comment = $base_comment->formatToCache();

    	$user = $base_comment->getUser()->formatToCache();
    	
    	$comment['avatar'] = $this->model_tool_image->getAvatarUser( $user['avatar'], $user['email'] ); 
    	
        if ( $user && $user['username'] ){
            $comment['author'] = $user['username'];
        }else{
            $comment['author'] = $comment['author'];
        }

        $comment['href_user'] = $this->extension->path('WallPage', array(
            'user_slug' => $user['slug']
        ));
        $comment['href_like'] = $this->extension->path('CommentLike', array(
            'post_slug' => $post_slug,
            'post_type' => $post_type,
            'comment_id' => $comment['id']
        ));
        $comment['href_liked_user'] = $this->extension->path('CommentGetLiker', array(
            'post_slug' => $post_slug,
            'post_type' => $post_type,
            'comment_id' => $comment['id']
        ));
        $comment['href_edit'] = $this->extension->path('CommentEdit', array(
            'post_slug' => $post_slug,
            'post_type' => $post_type,
            'comment_id' => $comment['id']
        ));
        
        $comment['href_delete'] = $this->extension->path('CommentDelete', array(
            'post_slug' => $post_slug,
            'post_type' => $post_type,
            'comment_id' => $comment['id']
        ));
        $comment['created'] = $comment['created']->format( $this->language->get('date_format_full') );
        $comment['is_liked'] = $liked;
        if ( $comment['user_id'] == $idCurrUserId ){
        	$comment['is_owner'] = true;
        }else{
        	$comment['is_owner'] = false;
        }

        return $comment;
	}
}
?>