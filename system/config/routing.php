<?php

// Branch
$_['routing']['BranchPage'] 					= 'branch/{branch_slug}/';
$_['routing']['CategoryPage'] 					= 'category/{category_slug}/';

// Post
$_['routing']['PostPage'] 						= '{post_type}/post/{post_slug}/';
$_['routing']['PostLike'] 						= '{post_type}/post/{post_slug}/like/';
$_['routing']['PostAdd'] 						= '{post_type}/{user_slug}/post/add/';
$_['routing']['PostGetLiker'] 					= '{post_type}/post/{post_slug}/get-liker';

// Comment
$_['routing']['CommentList'] 					= '{post_type}/post/{post_slug}/comments/';
$_['routing']['CommentAdd']						= '{post_type}/post/{post_slug}/comment/add/';
$_['routing']['CommentLike']					= '{post_type}/post/{post_slug}/comment/{comment_id}/like/';
$_['routing']['CommentGetLiker']				= '{post_type}/post/{post_slug}/comment/{comment_id}/get-liker';

// Page
$_['routing']['RefreshPage'] 					= 'what-s-new/';
$_['routing']['WelcomePage']					= '';
$_['routing']['HomePage']	 					= 'home/';
$_['routing']['WallPage']	 					= 'wall-page/{user_slug}/';
$_['routing']['ChangePassword']					= 'change-password/';
$_['routing']['Logout']							= 'logout/';
$_['routing']['SearchPage']						= 'search/';
$_['routing']['Search']							= 'search/{keyword}/';
$_['routing']['Login']							= 'login/';
$_['routing']['ChangeAvatar']					= 'change-avatar/';
$_['routing']['LostPass']						= 'lost_password/';

// Ajax
$_['routing']['AjaxLogin']						= 'login/ajax/';
$_['routing']['AjaxRegister']					= 'register/ajax/';

// Profile
$_['routing']['ProfilePage']					= 'profile/';
$_['routing']['ProfileEditInfo']				= 'profile/update-information/';
$_['routing']['ProfileEditSummary']				= 'profile/update-summary/';
$_['routing']['ProfileRemoveEducation']			= 'profile/remove-education/{education_id}/';
$_['routing']['ProfileEditEducation']			= 'profile/update-education/{education_id}/';
$_['routing']['ProfileAddEducation']			= 'profile/add-education/';

// Friend
$_['routing']['FriendPage']						= 'friend/{user_slug}/';
$_['routing']['RequestPage']					= 'friend/request/';
$_['routing']['MakeFriend']						= 'friend/request/{user_slug}/';
$_['routing']['ConfirmFriend']					= 'friend/confirm/{user_slug}/';
$_['routing']['IgnoreFriend']					= 'friend/ignore/{user_slug}/';

//Upload
$_['routing']['UploadFile'] 					= 'upload/';

// Data Value
$_['routing']['LocationAutoComplete']			= 'data/location/';
$_['routing']['LocationAutoCompleteRoute']		= 'data/location/{keyword}/';
$_['routing']['IndustryAutoComplete']			= 'data/industry/';
$_['routing']['IndustryAutoCompleteRoute']		= 'data/industry/{keyword}/';
$_['routing']['DegreeAutoComplete']				= 'data/degree/';
$_['routing']['DegreeAutoCompleteRoute']		= 'data/degree/{keyword}/';
$_['routing']['SchoolAutoComplete']				= 'data/school/';
$_['routing']['SchoolAutoCompleteRoute']		= 'data/school/{keyword}/';
$_['routing']['FieldOfStudyAutoComplete']		= 'data/field-of-study/';
$_['routing']['FieldOfStudyAutoCompleteRoute']	= 'data/field-of-study/{keyword}/';

?>
