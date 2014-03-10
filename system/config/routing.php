<?php

// Branch
$_['routing']['BranchCategories'] 				= 'branch/categories/{branch_slug}/';
$_['routing']['BranchCategory']					= 'branch/category/{category_slug}/';
$_['routing']['BranchList']		 				= 'branch/list/';
$_['routing']['BranchDetail'] 					= 'branch/detail/{branch_slug}';

// Post
$_['routing']['PostPage'] 						= '{post_type}/post/{post_slug}/';
$_['routing']['PostLike'] 						= '{post_type}/post/{post_slug}/like/';
$_['routing']['PostAdd'] 						= '{post_type}/{user_slug}/post/add/';
$_['routing']['PostGetLiker'] 					= '{post_type}/post/{post_slug}/get-liker/';
$_['routing']['PostDelete'] 					= '{post_type}/post/{post_slug}/delete/';
$_['routing']['PostEdit'] 						= '{post_type}/post/{post_slug}/edit/';

// Comment
$_['routing']['CommentList'] 					= '{post_type}/post/{post_slug}/comments/';
$_['routing']['CommentAdd']						= '{post_type}/post/{post_slug}/comment/add/';
$_['routing']['CommentLike']					= '{post_type}/post/{post_slug}/comment/{comment_id}/like/';
$_['routing']['CommentGetLiker']				= '{post_type}/post/{post_slug}/comment/{comment_id}/get-liker/';
$_['routing']['CommentDelete']					= '{post_type}/post/{post_slug}/comment/{comment_id}/delete/';
$_['routing']['CommentEdit']					= '{post_type}/post/{post_slug}/comment/{comment_id}/edit/';

// Page
$_['routing']['RefreshPage'] 					= 'what-s-new/';
$_['routing']['WelcomePage']					= '';
$_['routing']['HomePage']	 					= 'home/';
$_['routing']['WallPage']	 					= 'wall-page/{user_slug}/';
$_['routing']['ChangePassword']					= 'change-password/';
$_['routing']['Logout']							= 'logout/';
$_['routing']['SearchPage']						= 'search/{keyword}/';
$_['routing']['FriendTypeahead']				= 'search/typeahead/friend/{keyword}/';
$_['routing']['PostTypeahead']					= 'search/typeahead/post/{keyword}/';
$_['routing']['Login']							= 'login/';
$_['routing']['LostPass']						= 'lost_password/';
$_['routing']['ActiveAccount']					= 'active/send/{token}/';
$_['routing']['ReActiveAccount']				= 'active/resend/';
$_['routing']['AjaxLogin']						= 'login-ajax/';
$_['routing']['AjaxRegister']					= 'register/ajax/';

// Profile
$_['routing']['ProfilePage']					= 'profile/page/{user_slug}/';
$_['routing']['ProfileEdit']					= 'profile/edit/';
$_['routing']['ProfileEditInfo']				= 'profile/update-information/';
$_['routing']['ProfileEditSummary']				= 'profile/update-summary/';
$_['routing']['ProfileRemoveEducation']			= 'profile/remove-education/{education_id}/';
$_['routing']['ProfileEditEducation']			= 'profile/update-education/{education_id}/';
$_['routing']['ProfileAddEducation']			= 'profile/add-education/';
$_['routing']['ProfileRemoveExperience']		= 'profile/remove-experience/{experience_id}/';
$_['routing']['ProfileEditExperience']			= 'profile/update-experience/{experience_id}/';
$_['routing']['ProfileAddExperience']			= 'profile/add-experience/';
$_['routing']['ProfileAddSkill']				= 'profile/add-skill/';
$_['routing']['ProfileRemoveSkill']				= 'profile/remove-skill/{skill_id}/';
$_['routing']['FaceBookConnect']				= 'facebookcnt/';
$_['routing']['CompleteRegister']				= 'profile/complete-register/';

// Friend
$_['routing']['FriendPage']						= 'friend/page/{user_slug}/';
$_['routing']['GetAllFriends']					= 'friend/get-all/';
$_['routing']['MakeFriend']						= 'friend/request/{user_slug}/';
$_['routing']['ConfirmFriend']					= 'friend/confirm/{user_slug}/';
$_['routing']['UnFriend']						= 'friend/remove/{user_slug}/';
$_['routing']['IgnoreFriend']					= 'friend/ignore/{user_slug}/';

// Follow
$_['routing']['FollowPage']						= 'follow/page/{user_slug}/';
$_['routing']['FollowPost']						= 'follow/list-posts/';
$_['routing']['AddFollower']					= 'follow/add/{user_slug}/';
$_['routing']['RemoveFollower']					= 'follow/remove/{user_slug}/';

//Upload
$_['routing']['UploadFile'] 					= 'upload/';

// Data Value
$_['routing']['LocationAutoComplete']			= 'data/location/{keyword}/';
$_['routing']['IndustryAutoComplete']			= 'data/industry/{keyword}/';
$_['routing']['DegreeAutoComplete']				= 'data/degree/{keyword}/';
$_['routing']['SchoolAutoComplete']				= 'data/school/{keyword}/';
$_['routing']['FieldOfStudyAutoComplete']		= 'data/field-of-study/{keyword}/';

// Notification
$_['routing']['NotificationReadAll']			= 'notification/readAll/';
$_['routing']['NotificationPage']				= 'notification/page/';

// Avatar
$_['routing']['ChangeAvatar']					= 'avatar/change/';
$_['routing']['SaveAvatar']						= 'avatar/save/';

// Message
$_['routing']['MessagePage']					= 'message/page/';
$_['routing']['MessageSend']					= 'message/send/';
$_['routing']['MessageGetList']					= 'message/get-list/{user_slug}/';
$_['routing']['MessageGetLast']					= 'message/get-last/';
$_['routing']['MessageDeleteAll']				= 'message/delete/all/{user_slug}/';
$_['routing']['MessageDeleteOne']				= 'message/delete/one/{message_id}/';

// Ajax
$_['routing']['AjaxGetRouting']					= 'service/get/routing/';
$_['routing']['SetLanguage']					= 'service/push/language/';
?>
