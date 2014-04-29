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
	that.author = data.author || '';
	that.authorId = data.user_id || '';
	that.authorSlug = data.user_slug || '';
	that.username = data.username || '';
	that.avatar = data.avatar || '';
	that.title = data.title || '';
	that.description = data.description || '';
	that.content = data.content || '';
	that.created = data.created || null;
	that.thumb = data.thumb || '';
	that.image = data.image || '';
	that.slug = data.slug || '';
	that.type = data.type || '';
	that.email = data.email || '';
	that.category = data !== undefined ? {
		id : data.category_id,
		slug: data.category_slug,
		name : data.category_name
	} : { };
	that.commentCount = ko.observable(data.comment_count || 0);
	that.likeCount = ko.observable(data.like_count || 0);
	that.likers = ko.observableArray(data.liker_ids || []);
	that.countViewer = ko.observable(data.count_viewer || 0);
	that.isLiked = ko.observable(data.isUserLiked || false);
	that.comments = ko.observableArray([]);

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
		var ajaxOptions = {
			url : window.yRouting.generate('ApiGetComments', {
				post_type: that.type,
				post_slug: that.slug
			})
		};
		var successCallback = function(){
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.comments, function(c){					
					var com = new CommentModel(c);
					that.comments.push(com);					
				});
			}else {
				that.comments([]);
			}
			var context = YesGlobal.Utils.getKoContext();
			if(context !== null){
				context.$root.commentBoxModel.showComment(that.comments());
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};

	function _submitLikePost(successCallback, failCallback, errorCallback) {

	};
}

function CommentModel(data){
	var that = this;
	
	that.id = data.id || '';
	that.content = ko.observable(data.content || '');
	that.likeCount = ko.observable(data.like_count || '');
	that.created = data.created || '';
	that.author = data.author || '';
	that.authorId = data.user_id || '';
	that.authorSlug = data.user_slug || '';
	that.authorAvatar = '';

	if(data.user_id){
		var user = data.users[c.user_id];
		that.authorAvatar = user.avatar;
	}
}