<?php

// Branch
$_['route']['BranchCategories'] 			= 'branch/categories';
$_['route']['BranchCategory']				= 'branch/category';
$_['route']['BranchList']					= 'branch/list';
$_['route']['BranchDetail']					= 'branch/detail';

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
$_['route']['AboutPage']					= 'common/about';
$_['route']['RefreshPage']					= 'common/refresh';
$_['route']['SetDisplayRefreshPage']		= 'common/refresh/setOption';
$_['route']['WelcomePage']					= '';
$_['route']['HomePage']						= 'common/home';
$_['route']['WallPage']						= 'account/wall';
$_['route']['StatisticsPage']				= 'account/statistics';
$_['route']['ChangePassword']				= 'account/password';
$_['route']['Logout']						= 'account/logout';
$_['route']['SearchPage']					= 'common/search';
$_['route']['FriendTypeahead']				= 'common/search/friendTypeahead/';
$_['route']['PostTypeahead']				= 'common/search/postTypeahead/';
$_['route']['Login']						= 'account/login';
$_['route']['LostPass']						= 'account/forgotten';
$_['route']['ActiveAccount']				= 'account/active';
$_['route']['ReActiveAccount']				= 'account/active/resendActiveLink';
$_['route']['AjaxLogin']					= 'account/login/login';
$_['route']['AjaxRegister']					= 'account/register/register';

// Profile
$_['route']['ProfilePage']					= 'account/profile/view/';
$_['route']['ProfileEdit']					= 'account/profile/';
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

// Follow
$_['route']['FollowPage']					= 'friend/follow';
$_['route']['FollowPost']					= 'friend/follow/listPosts';
$_['route']['AddFollower']					= 'friend/request/addFollower/';
$_['route']['RemoveFollower']				= 'friend/request/removeFollower/';

// Upload
$_['route']['UploadFile'] 					= 'file/upload';

// Data Value
$_['route']['LocationAutoComplete']			= 'data/value/locationAutoComplete';
$_['route']['DataValueAutoComplete']		= 'data/value/search';

// Notification
$_['route']['NotificationReadAll']			= 'common/notification/readAll/';
$_['route']['NotificationPage']				= 'common/notification/';

// Avatar
$_['route']['ChangeAvatar']					= 'account/avatar';
$_['route']['SaveAvatar']					= 'account/avatar/save';

// Message
$_['route']['MessagePage']					= 'account/message';
$_['route']['MessageSend']					= 'account/message/send/';
$_['route']['MessageGetList']				= 'account/message/getMessageListByUser/';
$_['route']['MessageGetLast']				= 'account/message/getLastMessages/';
$_['route']['MessageDeleteAll']				= 'account/message/deleteUserMessages/';
$_['route']['MessageDeleteOne']				= 'account/message/deleteMessage/';

// Stock
$_['route']['StockMarket']					= 'stock/market/';
$_['route']['StockMarketNone']				= 'stock/market/';
$_['route']['StockPage']					= 'stock/stock/';
$_['route']['StockNewsPage']				= 'stock/news/';
$_['route']['StockIdeaPage']				= 'stock/ideas/';

//-- API --//
// Common
$_['route']['AjaxGetRouting']				= 'api/config/getRoutings/';
$_['route']['SetLanguage']					= 'api/language/setLanguage/';
$_['route']['ApiSearchByKeyword']			= 'api/search/searchAll/';

// Stock
$_['route']['ApiGetAllStocks']				= 'api/stock/getAllStocks/';
$_['route']['ApiPostWatchList']				= 'api/stock/addStocksToWatchList/';
$_['route']['ApiDeleteWatchListItem']		= 'api/stock/removeStockFromWatchList/';
$_['route']['ApiGetStockExchanges']			= 'api/stock/getStockExchanges/';
$_['route']['ApiGetLastStockNews']			= 'api/stock/getNews/';
$_['route']['ApiGetStockIdeas']				= 'api/stock/getIdeas/';

// Branch
$_['route']['ApiGetLastBranchNews']			= 'api/branch/getNews/';
$_['route']['ApiGetBranchMember']			= 'api/branch/getMembers/';

// Post
$_['route']['ApiPutPostLike']				= 'api/post/like/';
$_['route']['ApiPutPostInfo']				= 'api/post/edit/';
$_['route']['ApiGetPostLiker']				= 'api/post/getLikers/';
$_['route']['ApiPostPost']					= 'api/post/add/';
$_['route']['ApiPutPost']					= 'api/post/edit/';
$_['route']['ApiDeletePost']				= 'api/post/delete/';
$_['route']['ApiGetLastestPost']			= 'api/post/getLastest/';
$_['route']['ApiGetPostStatisticTime']		= 'api/post/getStatisticTime/';
$_['route']['ApiGetPostStatistic']			= 'api/post/getStatisticPosts/';
$_['route']['ApiGetLastAllNews']			= 'api/post/getLastNews/';

// Comment
$_['route']['ApiGetComments']				= 'api/comment/getComments/';
$_['route']['ApiGetCommentLiker']			= 'api/comment/getLikers/';
$_['route']['ApiGetCommentTags']			= 'api/comment/getUserTags/';
$_['route']['ApiPutCommentLike']			= 'api/comment/like/';
$_['route']['ApiPutComment']				= 'api/comment/edit/';
$_['route']['ApiPostComment']				= 'api/comment/add/';
$_['route']['ApiDeleteComment']				= 'api/comment/delete/';

// Friend
$_['route']['ApiPutMakeFriend']				= 'api/user/makeFriend/';
$_['route']['ApiPutCancelRequest']			= 'api/user/cancelRequest/';
$_['route']['ApiPutConfirm']				= 'api/user/confirm/';
$_['route']['ApiPutIgnore']					= 'api/user/ignore/';
$_['route']['ApiPutUnfriend']				= 'api/user/unfriend/';
$_['route']['ApiPutAddFollower']			= 'api/user/addFollower/';
$_['route']['ApiPutRemoveFollower']			= 'api/user/removeFollower/';
$_['route']['ApiGetAllTags']				= 'api/user/getAllTags/';
$_['route']['ApiGetAllFriends']				= 'api/user/getAllFriends/';

// User
$_['route']['ApiGetUserPost']				= 'api/user/getPosts/';
$_['route']['ApiSetPrivateSetting']			= 'api/user/setPrivateOption/';
$_['route']['ApiGetDisplayOption']			= 'api/user/getDisplayoption/';

// Message
$_['route']['ApiGetRooms']					= 'api/message/getLastRooms/';
$_['route']['ApiGetMessages']				= 'api/message/getLastMessages/';
?>
