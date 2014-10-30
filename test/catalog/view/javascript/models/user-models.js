YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.UserModel = function (data) {
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
})(jQuery, ko, YesGlobal);