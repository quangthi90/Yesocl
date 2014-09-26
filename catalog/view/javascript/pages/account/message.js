(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.MessageView = function(options, ele) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_MESSAGE_VIEWMODEL";
		self.canLoadMore = ko.observable(options.canLoadMore || false);
		self.apiUrls = options.apiUrls || {};

		self.isLoadSuccess = ko.observable(false);

		self.currentPage = ko.observable(1);
		self.userList = ko.observableArray([]);
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		function _loadMessage(callback){
			var loadOptions = self.apiUrls.loadPost;
			loadOptions.page = self.currentPage();
			var ajaxOptions = {
				url: Y.Routing.generate(loadOptions.name, loadOptions.params),
				data : {
					limit : 10
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(data.users, function(u){
						var userMessageItem = new Y.Models.UserMessageModel(u);
						self.userList.push(userMessageItem);
					});
					if(data.canLoadMore !== undefined) {
						self.canLoadMore(data.canLoadMore);
					}
				}
				self.isLoadSuccess(true);
				_handleEffects();

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		_loadMessage();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));