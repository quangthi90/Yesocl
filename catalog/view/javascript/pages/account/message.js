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
		self.isNewMessage = ko.observable(false);

		self.currentPage = ko.observable(1);
		self.roomList = ko.observableArray([]);
		self.lastMessage = ko.observable();
		self.totalRoom = ko.observable(0);
		self.activeRoom = ko.observable();

		self.messageTo = ko.observable("");
		self.messageContent = ko.observable("");
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
			self.activeRoom(item);
			self.lastMessage( item.lastMessage );
			if(item.canLoadMore() && !self.isLoadingMore()){
				self.isLoadingMore(true);
				item.loadMessage(function(data){
					self.isLoadingMore(false);
					self.isLoadSuccess(false);
				});
			}
			self.isLoadSuccess(true);
		}

		self.clickNewMessage = function(){
			self.isNewMessage(!self.isNewMessage());			
			if (self.activeRoom() != null)
				self.activeRoom(null);
			else
				_selectFirstRoom();
		}

		self.clickSendMessage = function(callback){
			if ( !self.messageContent() ) return;
			
			// send message to old user
			if ( !self.messageTo() ){
				_sendMessageToOldRoom(self.activeRoom().id, self.messageContent(), callback);

			// send message to new user
			}else{
				var userSlugs = !self.messageTo().split(', ');
				_sendMessageToNewRoom(userSlugs, self.messageContent(), callback);				
			}
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

		function _sendMessageToOldRoom(room_id, content, callback){
			var ajaxOptions = {
				url: Y.Routing.generate("ApiPostMessage"),
				data : {
					room_id : room_id,
					content: content
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					self.activeRoom().addMessage(data.room, data.message);
					self.roomList.sort(function(r1, r2){
						return r1.updated() == r2.updated() ? 0 : (r1.updated() < r2.updated() ? 1 : -1)
					});
					self.messageContent("");
				}
				self.isLoadSuccess(true);

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _sendMessageToNewRoom(userSlugs, content, callback){
			var ajaxOptions = {
				url: Y.Routing.generate("ApiPostMessage"),
				data : {
					user_slugs : userSlugs,
					content: content
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					var roomItem = new Y.Models.RoomModel(data.room);
					self.roomList.unshift(roomItem);
					self.messageContent("");
					_selectFirstRoom();
				}
				self.isLoadSuccess(true);

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _init(){
            // $(window).scroll(function(e) {
            //     if ($(window).scrollTop() + $(window).height() == $(document).height()) {
            //         self.loadMore();
            //     }
            // });

            _loadRoom(function(){
            	$(window).scrollTop(0);
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));