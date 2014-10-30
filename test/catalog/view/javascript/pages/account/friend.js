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
			if(self.canLoadMore()){
				self.currentPage(self.currentPage() + 1);
				_loadFriend();
			}
		};

		self.unFollow = function(selectingFriend){
			selectingFriend.unFollow(function(){
				
			});

		}
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */

		function _loadFriend(){
			var ajaxOptions = {
			url: Y.Routing.generate(self.apiUrls, {page: self.currentPage()}),
			data : {
				limit : 10
			}};

			var successCallback = function(data){
				if(data.success === "ok"){
					self.canLoadMore(data.canLoadMore);
					ko.utils.arrayForEach(data.friends, function(p){
						var friendItem = new Y.Models.FriendModel(p);
						self.friendList.push(friendItem);
					});
				}
				self.isLoadSuccess(true);
			};
			
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
			
		};

		function _init(){
            $(window).scroll(function(e) {
            	if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    self.loadMore();
                }
            });

            _loadFriend(function(){
            	$(window).scrollTop(0);
            });
		};

		_init();
		/* ============= END PRIVATE METHODS =============== */
	}
	
}(jQuery, ko, window, YesGlobal));