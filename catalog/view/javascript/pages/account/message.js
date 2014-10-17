(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.MessageView = function(options, ele) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_MESSAGE_VIEWMODEL";		
		self.apiUrls = options.apiUrls || {};

		self.isLoadSuccess = ko.observable(false);
		self.isLoadingMore = ko.observable(false);
		self.isNewMessage = ko.observable(false);
		self.canLoadMore = ko.observable(options.canLoadMore || false);

		self.currentPage = ko.observable(1);
		self.roomList = ko.observableArray([]);
		self.totalRoom = ko.observable(0);
		self.activeRoom = ko.observable();

		self.messageTo = ko.observable("");
		self.messageContent = ko.observable("");
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.activeRoom.subscribe(function(item){
			if(item === null) return;			
			if(item.canLoadMore() && !self.isLoadingMore()){
				self.isLoadingMore(true);
				item.loadMessage(function(data){
					self.isLoadingMore(false);
					self.isLoadSuccess(false);
				});
			}
			self.isLoadSuccess(true);
		});

		self.loadMoreRoom = function(){
			if(!self.canLoadMore() || self.isLoadingMore()) return;

			self.isLoadingMore(true);
			self.currentPage(self.currentPage() + 1);
			_loadRoom(function(data){
				self.isLoadingMore(false);
			});
		};

		self.addMoreEvents = function(){			
		};

		self.clickRoomItem = function(item, event){
			self.activeRoom(item);			
		}

		self.toggleNewMessage = function(){
			self.isNewMessage(!self.isNewMessage());			
			if (self.activeRoom() != null)
				self.activeRoom(null);
			else
				_selectFirstRoom();
		};

		self.sendMessage = function(){
			if ( !self.messageContent() ) return;
			
			// send message to old user
			if ( self.messageTo() ){
				var userSlugs = self.messageTo().split(', ');
				var room = null;
				if ( userSlugs.length == 1 ){
					ko.utils.arrayForEach(self.roomList(), function(r){
						if ( r.user.slug == userSlugs[0] ) {
							room = r;
						}
					});
					
				}
				if (room !== null ){
					self.activeRoom(room);
					_sendMessageToOldRoom(room.id, self.messageContent(), function(data){
						_selectFirstRoom();
						self.isNewMessage(!self.isNewMessage());
						self.messageTo("");
					});
				}else{
					_sendMessageToNewRoom(userSlugs, self.messageContent(), function(data){
						self.isNewMessage(!self.isNewMessage());
						self.messageTo("");
					});
				}

			// send message to new user
			}else{
				_sendMessageToOldRoom(self.activeRoom().id, self.messageContent(), function(){					
				});
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
			if(self.roomList().length > 0){
				self.activeRoom(self.roomList()[0]);
			}
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
					if ( self.activeRoom().messageList().length > 0 ){
						self.activeRoom().addMessage(data.room, data.message);
					}else{
						self.activeRoom().addMessage(data.room, null);
					}
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
            _loadRoom(function(){
            	$(window).scrollTop(0);
            	_selectFirstRoom();
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));