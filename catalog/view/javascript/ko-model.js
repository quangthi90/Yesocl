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
	that.category = data !== undefined ? {
		id : data.category_id,
		slug: data.category_slug,
		name : data.category_name
	} : { };
	that.commentCount = ko.observable(data.comment_count || 0);
	that.likeCount = ko.observable(data.like_count || 0);
	that.likers = ko.observableArray(data.liker_ids || []);
	that.countViewer = ko.observable(data.count_viewer || 0);
	that.isLiked = ko.observable(data.isLiked || false);

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
	that.toJson = function(){
		return {
			post_type: that.type,
			post_slug: that.slug
		};
	};

	function _submitLikePost(successCallback, failCallback, errorCallback) {

	};
}