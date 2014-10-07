(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.FriendView = function(options, ele) {
		var self = this;
		
		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_FRIEND_VIEWMODEL";
		self.apiUrls = options.apiUrls || "";
		self.isLoadSuccess = ko.observable(false);

		self.user_slug = ko.observable || "";
		self.currentPage = ko.observable(1);
		self.friendList = ko.observableArray([]);

		self.canLoadMore = ko.observable(false);


		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.unFriend = function(selectingFriend) {
			selectingFriend.unFriend(function(){
				self.friendList.remove(selectingFriend);
			});
		};

		self.loadMore = function(){
			if(self.canLoadMore){
				self.currentPage(sefl.currentPage() + 1);
				_loadFriend();
			}
		};

		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */

		function _loadFriend(){
			var ajaxOptions = {
			url: Y.Routing.generate(self.apiUrls, self.currentPage()),
			data : {
				limit : 5
			}};

			var successCallback = function(data){
				if(data.success === "ok"){
					self.canLoadMore(data.canLoadMore);
					ko.utils.arrayForEach(data.friends, function(p){
						var friendItem = new Y.Models.FriendModel(p);
						self.friendList.push(friendItem);
					});
				}
				else 
					alert(data.success + "Load Friend hok dc rui");
				self.isLoadSuccess(true);
			};
			
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
			
		};
		_loadFriend();
		/* ============= END PRIVATE METHODS =============== */
	}
	
}(jQuery, ko, window, YesGlobal));