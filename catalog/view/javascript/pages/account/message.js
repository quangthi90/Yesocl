(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.MessageView = function(options, ele) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_MESSAGE_VIEWMODEL";
		self.canLoadMore = ko.observable(options.canLoadMore || false);
		self.apiUrls = options.apiUrls || {};

		self.isLoadSuccess = ko.observable(false);
		self.isLoadingMore = ko.observable(false);

		self.currentPage = ko.observable(1);
		self.roomList = ko.observableArray([]);
		self.messageList = ko.observableArray([]);
		self.totalRoom = ko.observable(0);
		self.activeRoomId = ko.observable();
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		this.loadMoreRoom = function(){
			if(!self.canLoadMore() || self.isLoadingMore()) return;

			self.isLoadingMore(true);
			self.currentPage(self.currentPage() + 1);
			_loadRoom(function(data){
				self.isLoadingMore(false);
			});
		};

		self.addMoreEvents = function(){
			_selectFirstRoom();
		};

		self.clickRoomItem = function(item, event){
			self.activeRoomId(item.id);
			if(item.canLoadMore() && !self.isLoadingMore()){
				self.isLoadingMore(true);
				item._loadMessage(function(data){
					self.isLoadingMore(false);
					self.isLoadSuccess(false);
				});
			}
			self.messageList([]);
			
			ko.utils.arrayForEach(item.messageList, function(m){
				self.messageList.push(m);
			});

			self.isLoadSuccess(true);
		}
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		function _loadRoom(callback){
			var loadOptions = self.apiUrls.loadRoomMessage.params || {},
				url = self.apiUrls.loadRoomMessage.name;
			loadOptions.page = self.currentPage();
			var ajaxOptions = {
				url: Y.Routing.generate(url, loadOptions),
				data : {
					limit : 10
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(data.rooms, function(r){
						var roomItem = new Y.Models.RoomModel(r);
						self.roomList.push(roomItem);
					});
					self.totalRoom( data.total_room );
					if(data.canLoadMore !== undefined) {
						self.canLoadMore(data.canLoadMore);
					}
				}
				self.isLoadSuccess(true);

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _selectFirstRoom() {
			$("#js-list-message > li:first-child").click();
		}

		function _init(){
            $(window).scroll(function(e) {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    self.loadMore();
                }
            });

            _loadRoom(function(){
            	$(window).scrollTop(0);
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));