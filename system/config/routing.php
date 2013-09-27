<?php

// Branch
$_['routing']['BranchPage'] 	= 'branch/{branch_slug}/';
$_['routing']['CategoryPage'] 	= 'category/{category_slug}/';

// Post
$_['routing']['PostPage'] 		= '{post_type}/post/{post_slug}/';
$_['routing']['PostLike'] 		= '{post_type}/post/{post_slug}/like/';
$_['routing']['PostAdd'] 		= '{post_type}/{user_slug}/post/add/';

// Comment
$_['routing']['CommentList'] 	= '{post_type}/post/{post_slug}/comments/';
$_['routing']['CommentAdd']		= '{post_type}/post/{post_slug}/comment/add/';
$_['routing']['CommentLike']	= '{post_type}/post/{post_slug}/comment/{comment_id}/like/';

// Page
$_['routing']['RefreshPage'] 	= 'what-s-new/';
$_['routing']['HomePage']	 	= 'home/';
$_['routing']['WallPage']	 	= 'wall-page/{user_slug}/';
$_['routing']['ChangePassword']	= 'change-password/';
$_['routing']['Logout']			= 'logout/';
$_['routing']['SearchPage']		= 'search/';
$_['routing']['Search']			= 'search/{keyword}/';

// Friend
$_['routing']['FriendPage']		= 'friend/{user_slug}/';
$_['routing']['FriendRequest']	= 'friend/{user_slug}/request';

?>
