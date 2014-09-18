<?php

// Branch
$_['routing']['BranchCategories'] 				= 'branch/categories/{branch_slug}/';
$_['routing']['BranchCategory']					= 'branch/category/{category_slug}/';
$_['routing']['BranchList']		 				= 'branch/list/';
$_['routing']['BranchDetail'] 					= 'branch/detail/{branch_slug}';

// Post
$_['routing']['PostPage'] 						= '{post_type}/post/{post_slug}/';
$_['routing']['PostLike'] 						= '{post_type}/post/{post_slug}/like/';
$_['routing']['PostAdd'] 						= '{post_type}/post/{user_slug}/add/';
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
$_['routing']['AboutPage']					    = 'about/';
$_['routing']['RefreshPage'] 					= 'what-s-new/';
$_['routing']['SetDisplayRefreshPage'] 			= 'what-s-new/setoption/{option}';
$_['routing']['WelcomePage']					= '';
$_['routing']['HomePage']	 					= 'home/';
$_['routing']['WallPage']	 					= 'wall-page/{user_slug}/';
$_['routing']['StatisticsPage']	 				= 'statistics-page/{user_slug}/';
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
$_['routing']['DataValueAutoComplete']			= 'data/value/{type}/{keyword}/';

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

// Stock
$_['routing']['StockMarketNone']				= 'stock/market/';
$_['routing']['StockMarket']					= 'stock/market/{market_code}/';
$_['routing']['StockPage']						= 'stock/page/{stock_code}/';
$_['routing']['StockNewsPage']					= 'stock/{stock_code}/news/page/';
$_['routing']['StockIdeaPage']					= 'stock/{stock_code}/ideas/page/';

//-- API --//
// Common
$_['routing']['AjaxGetRouting']					= 'services/get/routing/';
$_['routing']['SetLanguage']					= 'services/push/language/';
$_['routing']['ApiSearchByKeyword']				= 'services/get/search/{keyword}/';

// Stock
$_['routing']['ApiGetAllStocks']				= 'services/get/stock/all/';
$_['routing']['ApiPostWatchList']				= 'services/post/stock/watch-list/many/';
$_['routing']['ApiDeleteWatchListItem']			= 'services/delete/stock/watch-list/item/{stock_id}/';
$_['routing']['ApiGetStockExchanges']			= 'services/get/stock/{stock_id}/exchanges/';
$_['routing']['ApiGetLastStockNews']			= 'services/get/stock/{stock_code}/news/last/{page}/';
$_['routing']['ApiGetStockIdeas']				= 'services/get/stock/{stock_code}/ideas/{page}/';

// Branch
$_['routing']['ApiGetLastBranchNews']			= 'services/get/branch/{branch_slug}/news/last/{page}/';
$_['routing']['ApiGetBranchMember']				= 'services/get/branch/{branch_slug}/member/';

// Post
$_['routing']['ApiPutPostInfo']					= 'services/put/{post_type}/post/{post_slug}/';
$_['routing']['ApiPutPostLike']					= 'services/put/{post_type}/post/{post_slug}/like/';
$_['routing']['ApiGetPostLiker']				= 'services/get/{post_type}/post/{post_slug}/liker/';
$_['routing']['ApiPostPost']					= 'services/post/{post_type}/post/{slug}/';
$_['routing']['ApiPutPost']						= 'services/put/{post_type}/post/{post_slug}/';
$_['routing']['ApiDeletePost']					= 'services/delete/{post_type}/post/{post_slug}/';
$_['routing']['ApiGetLastestPost']				= 'services/get/post/lastest/{page}/';
$_['routing']['ApiGetPostStatisticTime']		= 'services/get/{post_type}/post/user/{user_slug}/statistic/time/';
$_['routing']['ApiGetPostStatistic']			= 'services/get/{post_type}/post/user/{user_slug}/statistic/{time}/list/page/{page}/';
$_['routing']['ApiGetLastAllNews']				= 'services/get/all/post/lastest/{page}';

// Comment
$_['routing']['ApiGetComments']					= 'services/get/{post_type}/post/{post_slug}/comments/{page}/';
$_['routing']['ApiGetCommentLiker']				= 'services/get/{post_type}/post/comment/{comment_id}/liker/';
$_['routing']['ApiGetCommentTags']				= 'services/get/{post_type}/post/{post_slug}/comment/getTags/';
$_['routing']['ApiPutComment']					= 'services/put/{post_type}/post/comment/{comment_id}/';
$_['routing']['ApiPutCommentLike']				= 'services/put/{post_type}/post/comment/{comment_id}/like/';
$_['routing']['ApiPostComment']					= 'services/post/{post_type}/post/{post_slug}/comment/';
$_['routing']['ApiDeleteComment']				= 'services/delete/{post_type}/post/comment/{comment_id}/';

// Friend
$_['routing']['ApiPutMakeFriend']				= 'services/put/friend/make-friend/{user_slug}/';
$_['routing']['ApiPutCancelRequest']			= 'services/put/friend/cancel-request/{user_slug}/';
$_['routing']['ApiPutConfirm']					= 'services/put/friend/confirm/{user_slug}/';
$_['routing']['ApiPutIgnore']					= 'services/put/friend/ignore/{user_slug}/';
$_['routing']['ApiPutUnfriend']					= 'services/put/friend/unfriend/{user_slug}/';
$_['routing']['ApiPutAddFollower']				= 'services/put/follower/add/{user_slug}/';
$_['routing']['ApiPutRemoveFollower']			= 'services/put/follower/remove/{user_slug}/';
$_['routing']['ApiGetAllFriends']				= 'services/get/friend/all/';

// User
$_['routing']['ApiGetUserPost']					= 'services/get/user/{user_slug}/posts/{page}/';
$_['routing']['ApiSetPrivateSetting']			= 'services/set/privateoption/';
$_['routing']['ApiGetDisplayOption']			= 'services/get/setting/what-s-new/display/option/';

//Salm
// Cover
$_['routing']['ChangeCover']					= 'cover/change/';
$_['routing']['SaveCover']						= 'cover/save/';
//End Salm

?>
