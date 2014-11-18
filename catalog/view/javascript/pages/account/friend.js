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
		self.loadMore = function(){
			if(self.canLoadMore()){
				self.currentPage(self.currentPage() + 1);
				_loadFriend();
			}
		};

		self.unFriend = function(selectingFriend) {
			Y.Utils.showConfirmMessage(Y.Constants.Messages.COMMON_CONFIRM, function(){
				selectingFriend.unFriend(function(data) {
					self.friendList.remove(selectingFriend);
				});
			});			
		};

		self.follow = function(selectingFriend){
			selectingFriend.follow(function(data) {});
		};

		self.unFollow = function(selectingFriend){
			Y.Utils.showConfirmMessage(Y.Constants.Messages.COMMON_CONFIRM, function(){
				selectingFriend.unFollow(function(data) {
				});
			});			
		};
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */

		function _loadFriend(){
			var ajaxOptions = {
			url: Y.Routing.generate(self.apiUrls, {page: self.currentPage()}),
			data : {
				limit : 100
			}};

			var successCallback = function(data){
				if(data.success === "ok"){
					self.canLoadMore(data.canLoadMore);
					ko.utils.arrayForEach(data.friends, function(p){
						var friendItem = new Y.Models.UserModel(p);
						self.friendList.push(friendItem);
					});
				}
				self.isLoadSuccess(true);
			};
			
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);			
		}

		function _init(){
            $(window).scroll(function(e) {
            	if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    self.loadMore();
                }
            });

            _loadFriend(function(){
            	$(window).scrollTop(0);
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	}
	
})(jQuery, ko, window, YesGlobal);