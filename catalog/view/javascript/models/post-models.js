YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.PostModel = function (data) {
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
		that.comments = ko.observableArray(data.comments || []);
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
				url : Y.Routing.generate('ApiPutPostLike', {
					post_type: that.type,
					post_slug: that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.isLiked(!that.isLiked());
					that.likeCount( data.like_count);
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
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
})(jQuery, ko, YesGlobal);