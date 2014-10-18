(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.MessageView = function(options, ele) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_MESSAGE_VIEWMODEL";		
		self.apiUrls = options.apiUrls || {};

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
			item.loadMessage();
		});

		self.loadMoreRoom = function(callback){
			if(!self.canLoadMore() || self.isLoadingMore()) return;

			self.currentPage(self.currentPage() + 1);
			_loadRoom(function(){
				if(callback && typeof callback === "function"){
					callback();
				}
			});
		};

		self.clickRoomItem = function(item, event){
			self.activeRoom(item);			
		};

		self.toggleNewMessage = function(){
			self.isNewMessage(!self.isNewMessage());			
			if (self.activeRoom() != null)
				self.activeRoom(null);
			else
				_selectFirstRoom();
		};

		self.addMsgScrollHandlers = function(){
			var msgList = ele.find(".js-message-list");
			if(msgList.length > 0){
				if(msgList.data("scroll-binded") == true) return;

				msgList.scroll(function() {
				    if ($(this).scrollTop() === 0 && self.activeRoom() != null) {
				        self.activeRoom().loadMoreMessage();
				    }
				});
				msgList.data("scroll-binded", true);
			}

			var roomList = ele.find(".room-list");
			if(roomList.length > 0){
				if(roomList.data("scroll-binded") == true) return;

				roomList.scroll(function() {   
				    if ($(this).scrollTop() + $(this).height() === $(this)[0].scrollHeight) {				    	
				       	self.loadMoreRoom(function(data){

				       	});
				    }
				});
				roomList.data("scroll-binded", true);
			}
		};
		
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		function _loadRoom(sucCallback, failCallback){
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
						r.newMessageCallback = _scrollToBottomMessageList;
						var roomItem = new Y.Models.RoomModel(r);
						self.roomList.push(roomItem);
					});
					self.totalRoom(data.total_room);
					self.canLoadMore(data.canLoadMore || false);
					if(sucCallback && typeof sucCallback === "function"){
						sucCallback(data);
					}				
				}else {
					if(failCallback && typeof failCallback === "function"){
						failCallback(data);
					}
				}
				self.isLoadingMore(false);
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, function(){
				self.isLoadingMore(true);
			}, successCallback, function(){
				self.isLoadingMore(false);
				if(failCallback && typeof failCallback === "function"){
					failCallback(data);
				}
			});
		}

		function _selectFirstRoom() {
			if(self.roomList().length > 0){
				self.activeRoom(self.roomList()[0]);
			}
		}		

		function _scrollToBottomMessageList() {
			var listContainer = ele.find(".js-message-list");
			if(listContainer.length > 0){
				listContainer.animate({ scrollTop: listContainer[0].scrollHeight }, 1000);
			}
		}

		function _init(){
            _loadRoom(function(){
            	_selectFirstRoom();
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));