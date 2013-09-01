<?php

$_['routing']['BranchPage'] 	= 'branch/{branch_slug}/';
$_['routing']['CategoryPage'] 	= 'category/{category_slug}/';
$_['routing']['PostPage'] 		= '{post_type}/post/{post_slug}/';
$_['routing']['PostLike'] 		= '{post_type}/post/{post_slug}/like';
$_['routing']['CommentList'] 	= '{post_type}/post/{post_slug}/comments/';
$_['routing']['CommentAdd']		= '{post_type}/post/{post_slug}/comment/add/';
$_['routing']['CommentLike']	= '{post_type}/post/{post_slug}/comment/{comment_id}/like';

$_['route']['BranchPage'] 		= 'branch/categories';
$_['route']['CategoryPage']		= 'branch/category';
$_['route']['PostPage'] 		= 'post/detail';
$_['route']['PostLike']			= 'post/post/like';
$_['route']['CommentList'] 		= 'post/comment/getComments';
$_['route']['CommentAdd']		= 'post/comment/addComment';
$_['route']['CommentLike']		= 'post/comment/like';

?>
