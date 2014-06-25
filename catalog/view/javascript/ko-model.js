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
	that.title = ko.observable(data.title || '');
	that.content = ko.observable(data.content || '');
	that.thumb = ko.observable(data.thumb || '');
	that.image = ko.observable(data.image || '');
	that.created = data.created || null;
	that.description = data.description || '';
	that.slug = data.slug || '';
	that.type = data.type || '';
	that.email = data.email || '';
	that.isOwner = data.is_owner || false;
	that.isEdit = data.can_edit || false;
	that.isDelete = data.can_delete || false;
	that.owner = data.owner || {};
	that.ownerName = ko.observable(that.owner.username || "");
	that.ownerHref = ko.observable(that.owner.href || "");
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
	that.fullyToJSON = function(){
		return {
			id : ko.utils.unwrapObservable(that.id),
			title : ko.utils.unwrapObservable(that.id),
			content : ko.utils.unwrapObservable(that.content),
			thumb : ko.utils.unwrapObservable(that.thumb),
			image : ko.utils.unwrapObservable(that.image),
			created : ko.utils.unwrapObservable(that.created),
			description : ko.utils.unwrapObservable(that.description),
			slug : ko.utils.unwrapObservable(that.slug),
			type : ko.utils.unwrapObservable(that.type),
			email : ko.utils.unwrapObservable(that.email),
			isOwner : ko.utils.unwrapObservable(that.isOwner),
			isEdit : ko.utils.unwrapObservable(that.isEdit),
			isDelete : ko.utils.unwrapObservable(that.isDelete),
			owner : ko.utils.unwrapObservable(that.owner),
			ownerName : ko.utils.unwrapObservable(that.ownerName),
			ownerHref : ko.utils.unwrapObservable(that.ownerHref),
			category : ko.utils.unwrapObservable(that.category),
			commentCount : ko.utils.unwrapObservable(that.commentCount),
			currentCommentPage : ko.utils.unwrapObservable(that.currentCommentPage),
			likeCount : ko.utils.unwrapObservable(that.likeCount),
			likers : ko.utils.unwrapObservable(that.likers),
			countViewer : ko.utils.unwrapObservable(that.countViewer),
			isLiked : ko.utils.unwrapObservable(that.isLiked)
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

function RefreshOptionModel(data) {
	var that = this;
	that.href = window.yRouting.generate('SetDisplayRefreshPage', {option: data.option});
	that.title = ko.observable(data.title || '');
	that.isEnabled = ko.observable(data.enabled || false);
	that.value = data.option;
}

function RefreshOptionConfigModel(options) {
	var that = this;
	that.id = options.id;
	that.items = ko.observableArray([]);

	that.handleClick = function(item, event){
		if(!item.isEnabled()){
			// ENABLE ITEM
			that.enable(item);

			// COPPLASE SUBMENU
			if(!$('#' + that.id).hasClass('hidden')) {
				$('#' + that.id).addClass('hidden');
			}

			// RELOAD POST IF WAS WHAT'S NEW PAGE
		}
		event.stopPropagation();
	};

	that.enable = function (item) {
		var ajaxOptions = {
			url: window.yRouting.generate('ApiSetPrivateSetting', {}),
			data: { option_key: 'config_display_whatsnew', option_value: item.value },
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				ko.utils.arrayForEach(that.items(), function(p){
					p.isEnabled(false);
				});
				item.isEnabled(true);
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _init () {
		var ajaxOptions = {
			url: window.yRouting.generate('ApiGetDisplayOption', {}),
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.items, function(p){
					var optionItem = new RefreshOptionModel(p);
					that.items.push(optionItem);
				});
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	_init();
}