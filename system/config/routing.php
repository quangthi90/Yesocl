<?php

// Branch
$_['routing']['BranchPage'] 	= 'branch/{branch_slug}/';
$_['routing']['CategoryPage'] 	= 'category/{category_slug}/';

// Post
$_['routing']['PostPage'] 		= '{post_type}/post/{post_slug}/';
$_['routing']['PostLike'] 		= '{post_type}/post/{post_slug}/like';
$_['routing']['PostAdd'] 		= '{post_type}/{user_slug}/post/add';
$_['routing']['PostGetLiker'] 	= '{post_type}/{user_slug}/post/{post_slug}/get-liker';

// Comment
$_['routing']['CommentList'] 	= '{post_type}/post/{post_slug}/comments/';
$_['routing']['CommentAdd']		= '{post_type}/post/{post_slug}/comment/add/';
$_['routing']['CommentLike']	= '{post_type}/post/{post_slug}/comment/{comment_id}/like';
$_['routing']['CommentGetLiker']= '{post_type}/post/{post_slug}/comment/{comment_id}/get-liker';

// Page
$_['routing']['RefreshPage'] 	= 'what-s-new';
$_['routing']['HomePage']	 	= 'home';
$_['routing']['WallPage']	 	= 'wall-page/{user_slug}';
$_['routing']['ChangePassword']	= 'change-password';
$_['routing']['Logout']			= 'logout';

?>
