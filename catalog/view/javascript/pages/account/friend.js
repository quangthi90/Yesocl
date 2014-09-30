(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.FriendView = function(options, ele) {
		var self = this;
		
		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_FRIEND_VIEWMODEL";
		self.apiUrls = options.apiUrls || "";
		self.isLoadSuccess = ko.observable(false);

		self.friendList = ko.observableArray([]);
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */

		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */

		function _loadFriend(){
			var ajaxOptions = {
				url: Y.Routing.generate(self.apiUrls),
				data : {
					limit : 5
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(data.friends, function(p){
						var friendItem = new Y.Models.FriendModel(p);
						self.friendList.push(friendItem);
						console.log(p);
					});
				}
				self.isLoadSuccess(true);
			}
			
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null)
		}
		_loadFriend();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));