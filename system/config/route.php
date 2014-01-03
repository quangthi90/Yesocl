<?php

// Branch
$_['route']['BranchPage'] 					= 'branch/categories';
$_['route']['CategoryPage']					= 'branch/category';

// Post
$_['route']['PostPage'] 					= 'post/detail';
$_['route']['PostLike']						= 'post/post/like';
$_['route']['PostAdd']						= 'post/post/addPost';
$_['route']['PostGetLiker']					= 'post/post/getLikers';
$_['route']['PostDelete']					= 'post/post/deletePost';
$_['route']['PostEdit']						= 'post/post/editPost';

// Comment
$_['route']['CommentList'] 					= 'post/comment/getComments';
$_['route']['CommentAdd']					= 'post/comment/addComment';
$_['route']['CommentLike']					= 'post/comment/like';
$_['route']['CommentGetLiker']				= 'post/comment/getLikers';
$_['route']['CommentDelete']				= 'post/comment/deleteComment';
$_['route']['CommentEdit']					= 'post/comment/editComment';

// Page
$_['route']['RefreshPage']					= 'common/refresh';
$_['route']['WelcomePage']					= '';
$_['route']['HomePage']						= 'common/home';
$_['route']['WallPage']						= 'account/wall';
$_['route']['ChangePassword']				= 'account/password';
$_['route']['Logout']						= 'account/logout';
$_['route']['SearchPage']					= 'common/search';
$_['route']['FriendTypeahead']				= 'common/search/friendTypeahead/';
$_['route']['PostTypeahead']				= 'common/search/postTypeahead/';
$_['route']['ChangeAvatar']					= 'account/avatar';
$_['route']['Login']						= 'account/login';
$_['route']['LostPass']						= 'account/forgotten';

// Ajax
$_['route']['AjaxLogin']					= 'account/login/login';
$_['route']['AjaxRegister']					= 'account/register/register';

// Profile
$_['route']['ProfilePage']					= 'account/profile/';
$_['route']['ProfileEditInfo']				= 'account/profiles/information/update/';
$_['route']['ProfileEditSummary']			= 'account/profiles/summary/update/';
$_['route']['ProfileRemoveEducation']		= 'account/profiles/education/remove/';
$_['route']['ProfileEditEducation']			= 'account/profiles/education/edit/';
$_['route']['ProfileAddEducation']			= 'account/profiles/education/add/';
$_['route']['ProfileRemoveExperience']		= 'account/profiles/experience/remove/';
$_['route']['ProfileEditExperience']		= 'account/profiles/experience/edit/';
$_['route']['ProfileAddExperience']			= 'account/profiles/experience/add/';
$_['route']['ProfileAddSkill']				= 'account/profiles/skill/add/';
$_['route']['ProfileRemoveSkill']			= 'account/profiles/skill/remove/';
$_['route']['FaceBookConnect']				= 'account/login/facebookConnect';
$_['route']['CompleteRegister']				= 'account/register';

// Friend
$_['route']['FriendPage']					= 'friend/friend';
$_['route']['GetAllFriends']				= 'friend/friend/getAllFriends';
$_['route']['RequestPage']					= 'friend/request';
$_['route']['MakeFriend']					= 'friend/request/makeFriend';
$_['route']['ConfirmFriend']				= 'friend/request/confirm';
$_['route']['UnFriend']						= 'friend/request/unFriend';
$_['route']['IgnoreFriend']					= 'friend/request/ignore';
$_['route']['SearchFriend']					= 'friend/friend/search/';

// Upload
$_['route']['UploadFile'] 					= 'file/upload';

// Data Value
$_['route']['LocationAutoComplete']			= 'data/value/locationAutoComplete';
$_['route']['IndustryAutoComplete']			= 'data/value/industryAutoComplete';
$_['route']['DegreeAutoComplete']			= 'data/value/degreeAutoComplete';
$_['route']['SchoolAutoComplete']			= 'data/value/schoolAutoComplete';
$_['route']['FieldOfStudyAutoComplete']		= 'data/value/fieldOfStudyAutoComplete';

// Notification
$_['route']['NotificationReadAll']			= 'common/notification/readAll/';

// Message
$_['route']['MessagePage']					= 'account/message';
?>
