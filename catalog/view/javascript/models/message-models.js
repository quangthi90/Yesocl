YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.UserMessageModel = function (data) {
		var that = this;
		that.id = data.id || '';
		that.name = data.name || '';
		that.user = data.user || {};
		that.created = data.created || null;
		that.updated = data.updated || null;
		that.last_message = data.last_message || {};
		that.messages = [];

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
				name : ko.utils.unwrapObservable(that.name),
				created : ko.utils.unwrapObservable(that.created),
				updated : ko.utils.unwrapObservable(that.updated),
			};
		};
	}
})(jQuery, ko, YesGlobal);

(function($, ko, Y, undefined) {
	Y.Models.MessageModel = function (data) {
		var that = this;
		//Attribute
		
		//Methods
	}
})(jQuery, ko, YesGlobal);