function MarketModel(data) {
	'use strict';

	var that = this;

	that.id = ko.observable('');
	that.name = ko.observable('');
	that.code = ko.observable('');

	ko.mapping.fromJS(data, {}, this);
}

function PostModel(data) {
	var that = this;
	that.id = data.id || '';
	that.user = data.user || {};
	that.title = data.title || '';
	that.description = data.description || '';
	that.content = data.content || '';
	that.created = data.created || null;
	that.thumb = data.thumb || '';
	that.image = data.image || '';
	that.slug = data.slug || '';
	that.type = data.type || '';
	that.email = data.email || '';
	that.isOwner = data.is_owner || false;
	that.isEdit = data.can_edit || false;
	that.isDelete = data.can_delete || false;
	that.owner = data.owner || {};
	that.category = data !== undefined ? {
		id : data.category_id,
		slug: data.category_slug,
		name : data.category_name
	} : { };
	that.comments = [];	
	that.commentCount = ko.observable(data.comment_count || 0);
	that.currentCommentPage = ko.observable(1);
	that.likeCount = ko.observable(data.like_count || 0);
	that.likers = ko.observableArray(data.liker_ids || []);
	that.countViewer = ko.observable(data.count_viewer || 0);
	that.isLiked = ko.observable(data.isLiked || false);
	that.userTags = ko.observableArray(data.user_tags || []);
	that.stockTags = ko.observableArray(data.stock_tags || []);
	
	that.likePost = function() {
		var ajaxOptions = {
			url : window.yRouting.generate('ApiPutPostLike', {
				post_type: that.type,
				post_slug: that.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				that.isLiked(!that.isLiked());
				that.likeCount( data.like_count);
			}else {
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};
	that.showComment = function() {
		var context = YesGlobal.Utils.getKoContext();
		if(context !== null){
			context.$data.commentBoxModel.showCommentBox(that);
		}else {
			console.log("Ko content not found !");
		}
	};
	that.showLikers = function(){
		var context = YesGlobal.Utils.getKoContext();
		if(context !== null){
			var apiUrl = yRouting.generate("ApiGetPostLiker", {
				post_type: that.type,
				post_slug: that.slug
			})
			context.$data.userBoxModel.showUserList(apiUrl, function(count){
				if(count !== undefined){
					that.likeCount(count);	
				}
			});
		}else {
			console.log("Ko content not found !");
		}
	};
	that.toJson = function(){
		return {
			post_type: that.type,
			post_slug: that.slug
		};
	};
}

function UserModel(data) {
	var that = this;

	that.id = data.id || "";
	that.username = data.username || "";
	that.slug = data.slug || "";
	that.avatar = data.avatar || "";
	that.current = data.current || ""
	that.friendStatus = ko.observable(data.fr_status || 0);
	that.followStatus = ko.observable(data.fl_status || 0);

	that.makeFriend = function(){
		var ajaxOptions = {
			url : yRouting.generate("ApiPutMakeFriend", {
				user_slug: that.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				that.friendStatus(data.status);
			} else {
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};
	that.unFriend = function() {
		var ajaxOptions = {
			url : yRouting.generate("ApiPutUnfriend", {
				user_slug: that.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				that.friendStatus(data.status);
			} else {
			}				
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);	
	};
	that.cancelRequest = function(){
		var ajaxOptions = {
			url : yRouting.generate("ApiPutCancelRequest", {
				user_slug: that.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				that.friendStatus(data.status);
			} else {
			}			
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};
	that.follow = function(){
		var ajaxOptions = {
			url : yRouting.generate("ApiPutAddFollower", {
				user_slug: that.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				that.followStatus(data.status);
			} else {
			}			
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};
	that.unFollow = function(){
		var ajaxOptions = {
			url : yRouting.generate("ApiPutRemoveFollower", {
				user_slug: that.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				that.followStatus(data.status);
			} else {
			}				
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};
}