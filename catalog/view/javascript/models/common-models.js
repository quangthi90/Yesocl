YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.RefreshOptionModel = function (data) {
		var that = this;
		that.href = Y.Routing.generate('SetDisplayRefreshPage', {option: data.option});
		that.title = ko.observable(data.title || '');
		that.isEnabled = ko.observable(data.enabled || false);
		that.value = data.option;

		that.titleText = ko.computed(function(){
			var value = ko.utils.unwrapObservable(that.title);
			return $("<div>").html(value).text();
		});
	};

	Y.Models.RefreshOptionConfigModel = function (options) {
		var that = this;
		that.id = options.id;
		that.items = ko.observableArray([]);

		that.handleClick = function(item, event){
			if(!item.isEnabled()){

				// COPPLASE SUBMENU
				var switchEle = $('#' + that.id).parent("li.menu-item").find(".toogle-submenu").first();
				if(switchEle){
					switchEle.trigger("click");
				}

				// ENABLE ITEM
				that.enable(item, function() {
					// RELOAD POST IF CURRENT PAGE IS WHAT'S NEW PAGE
					var context = YesGlobal.Utils.getKoContext();
					if(context !== null){
						if (context.$root.newsModel.id() === 'whats-new') {
							context.$root.newsModel.resetPost();
						}
					}else {
						console.log("Ko content not found !");
					}
					// var paths = window.location.pathname.split('/');
					// if(paths.indexOf("what-s-new") >= 0) {
					// 	window.location.reload();
					// }
				});

			}
			event.stopPropagation();
		};

		that.enable = function (item, callback) {
			var ajaxOptions = {
				url: Y.Routing.generate('ApiSetPrivateSetting', {}),
				data: { option_key: 'config_display_whatsnew', option_value: item.value },
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(that.items(), function(p){
						p.isEnabled(false);
					});
					item.isEnabled(true);

					if(callback && typeof callback === "function"){
						callback(item);
					}
				}
			}
			//Call common ajax Call:
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _init () {
			var ajaxOptions = {
				url: Y.Routing.generate('ApiGetDisplayOption', {}),
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
	};

	Y.Models.UserModel = function (data) {
		var that = this;

		that.id = data.id || "";
		that.username = data.username || "";
		that.slug = data.slug || "";
		that.avatar = data.avatar || "";
		that.current = data.current || ""
		that.friendStatus = ko.observable(data.fr_status || 0);
		that.followStatus = ko.observable(data.fl_status || 0);

		that.makeFriend = function(success, fail){
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutMakeFriend", {
					user_slug: that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.friendStatus(data.status);
					if(success && typeof success == "function"){
						success(data);
					}
				} else {
					if(fail && typeof fail == "function"){
						fail(data);
					}
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, fail);
		};

		that.unFriend = function(success, fail) {
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutUnfriend", {
					user_slug : that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.friendStatus(data.status);
					if(success && typeof success == "function"){
						success(data);
					}
				} else {
					if(fail && typeof fail == "function"){
						fail(data);
					}
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, fail);
		};

		that.cancelRequest = function(success, fail){
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutCancelRequest", {
					user_slug: that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.friendStatus(data.status);
					if(success && typeof success == "function"){
						success(data);
					}
				} else {
					if(fail && typeof fail == "function"){
						fail(data);
					}
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, fail);
		};

		that.follow = function(success, fail){
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutAddFollower", {
					user_slug: that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.followStatus(data.status);
					if(success && typeof success == "function"){
						success(data);
					}
				} else {
					if(fail && typeof fail == "function"){
						fail(data);
					}
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, fail);
		};

		that.unFollow = function(success, fail){
			var ajaxOptions = {
				url : Y.Routing.generate("ApiPutRemoveFollower", {
					user_slug: that.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					that.followStatus(data.status);
					if(success && typeof success == "function"){
						success(data);
					}
				} else {
					if(fail && typeof fail == "function"){
						fail(data);
					}
				}
			};
			YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, fail);
		};
	};
})(jQuery, ko, YesGlobal);