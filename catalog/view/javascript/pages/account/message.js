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
			item.loadMessage(function(data) {				
			});
		});

		self.loadMoreRoom = function(){
			if(!self.canLoadMore() || self.isLoadingMore()) return;

			self.isLoadingMore(true);
			self.currentPage(self.currentPage() + 1);
			_loadRoom(function(data){
				self.isLoadingMore(false);
			});
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

		self.addMsgListHandles = function(){
			var msgList = ele.find(".js-message-list");
			if(msgList.data("scroll-binded") == true) return;

			msgList.scroll(function() {
			    var pos = $(this).scrollTop();
			    if (pos == 0 && self.activeRoom() != null) {
			        self.activeRoom().loadMoreMessage();
			    }
			});
			msgList.data("scroll-binded", true);
		};
		
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
						r.newMessageCallback = _scrollToBottomMessageList;
						var roomItem = new Y.Models.RoomModel(r);
						self.roomList.push(roomItem);
					});
					self.totalRoom( data.total_room );
					if(data.canLoadMore !== undefined) {
						self.canLoadMore(data.canLoadMore);
					}					
				}
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