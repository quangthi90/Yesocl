(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.MessageView = function(options, ele) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_MESSAGE_VIEWMODEL";		
		self.apiUrls = options.apiUrls || {};
		self.eventType = options.eventType || "";

		self.isLoadingMore = ko.observable(false);
		self.isNewMessage = ko.observable(false);
		self.isProcessNewMessage = ko.observable(false);
		self.canLoadMore = ko.observable(options.canLoadMore || false);

		self.roomQuery = ko.observable("");
		self.realRoomQuery = ko.computed(self.roomQuery).extend({ throttle: 300 });
		self.currentPage = ko.observable(1);
		self.roomList = ko.observableArray([]);
		self.totalRoom = ko.observable(0);
		self.activeRoom = ko.observable();
		self.globalNewMessage = ko.observable(new Y.Models.MessageModel({}));
		self.toTags = ko.observable([]);

		self.messageTo = ko.observable("");
		self.messageContent = ko.observable("");

		self.roomMemberManager = new Y.Widgets.RoomMembers({
			ele: $("#modal-msg-members")
		});
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.activeRoom.subscribe(function(item){
			if(item === null) return;
			if(item.messageList().length === 0){
				item.loadMessage();	
			}
		});
		self.realRoomQuery.subscribe(function(value){
			value = value.toLowerCase().trim();
			ko.utils.arrayForEach(self.roomList(), function(r) {
				r.visible(r.name().toLowerCase().indexOf(value) >= 0);
			});
		});		
		self.noRoomAvailable = ko.computed(function(){
			if(self.roomList().length === 0) return true;
			var temp = ko.utils.arrayFirst(self.roomList(), function(r){
				return r.visible();
			});
			return !temp;
		});

		self.loadMoreRoom = function(callback){
			if(!self.canLoadMore() || self.isLoadingMore()) return;

			self.currentPage(self.currentPage() + 1);
			_loadRoom();
		};

		self.clickRoomItem = function(item, event){
			self.isNewMessage(false);
			if(self.activeRoom() != null && self.activeRoom().id != item.id) {
				self.activeRoom(item);
			}
			self.activeRoom().updateReadStatus();
			_scrollToBottomMessageList();
		};

		self.toggleNewMessage = function(){
			self.isNewMessage(!self.isNewMessage());
		};

		self.addMsgScrollHandlers = function(){
			var msgList = ele.find(".js-message-list");
			if(msgList.length > 0 && !msgList.data("scroll-binded")) {
				msgList.scroll(function() {
				    if ($(this).scrollTop() === 0 && self.activeRoom() != null) {
				    	var me = $(this);
				    	me.find(".message-item").first().addClass("first-old-message");				    	
				        self.activeRoom().loadMoreMessage(function(data){
				        	if(data.messages && data.messages.length > 0){
				        		var firstOffsetTop = me.find(".first-old-message").first().offset().top;
				        		var offsetTop = me.offset().top;
				        		me.scrollTop(firstOffsetTop - offsetTop);
				        		me.find(".message-item").removeClass("first-old-message");
				        	}
				        });
				    }
				});
				msgList.data("scroll-binded", true);				
			}

			var roomList = ele.find(".room-list");
			if(roomList.length > 0 && !roomList.data("scroll-binded")){
				roomList.scroll(function() {
				    if ($(this).scrollTop() + $(this).height() === $(this)[0].scrollHeight) {				    	
				       	self.loadMoreRoom();
				    }
				});
				roomList.data("scroll-binded", true);
			}	
		};

		self.addGlobalMessage = function(){
			var toSlugs = self.toTags();
			var messageContent = self.globalNewMessage().content().trim();
			if(toSlugs.length === 0 || messageContent.length === 0){
				return;
			}
			var tags = Y.Utils.parseTagsInfo(messageContent);
			var messageData = {
				content: messageContent,
				userTags: tags.userTags,
				stockTags: tags.stockTags,
				user_slugs: toSlugs
			};

			self.isProcessNewMessage(true);
			_addMessageToRoom(messageData, function(data) {	
				_addMessageDataToRoom(data, function(){
					self.isProcessNewMessage(false);
					self.globalNewMessage().reset();
					self.toTags([]);
					self.isNewMessage(false);
				});
			}, function(data) {
				//Message
				self.isProcessNewMessage(false);
			});
		};
		
		self.openMembers = function(){
			self.roomMemberManager.setActiveRoom(self.activeRoom());
			self.roomMemberManager.open();
		};

		self.userDataRequest = function(query){
			var term = query.term.toLowerCase();
			var data = { results: [] };

			Y.Utils.initFriendList(function(returnData) {
				if(returnData){
					var temp = ko.utils.arrayFilter(returnData, function(item){
						return item.username.toLowerCase().indexOf(term) >= 0;
					});
					data.results = ko.utils.arrayMap(temp, function(item) {
						return {
							id : item.slug,
							text: item.username,
							avatar: item.avatar
						};
					})
				}
			});
			return data;
		};

		self.formatResult = function(item){
			var html = "<img height='30' width='30' style='float: left; margin-right: 10px;' src='" + item.avatar + "' alt='" + item.text + "'/>";
			html += item.text;
			return html;
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
				},
				showLoading: true
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(data.rooms, function(r){
						r.newMessageCallback =  _newMessageCallback;
						var roomItem = new Y.Models.RoomModel(r);
						self.roomList.push(roomItem);

						//Subscribe room chanel:
						Y.PusherManager.subscribeChanel(roomItem.id);
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

		function _addMessageToRoom(messageData, sucCallback, failCallback){
			var ajaxOptions = {
				url: Y.Routing.generate("ApiPostMessage"),
				data : messageData,
				showLoading: false
			};

			var successCallback = function(data){				
				if(data.success === "ok"){
					if(sucCallback && typeof sucCallback === "function"){
						sucCallback(data);
					}
				}else {
					if(failCallback && typeof failCallback === "function"){
						failCallback(data);
					}
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, failCallback);
		}

		function _addMessageDataToRoom(data, callback){
			if(!data.room || !data.message) return;

			var returnRoom = data.room;
			var returnMessage = data.message;
			var existingRoom = ko.utils.arrayFirst(self.roomList(), function(r) {
				return r.id == returnRoom.id;
			});

			var newMessage = new Y.Models.MessageModel(returnMessage);
			//Old room
			if(existingRoom){
				existingRoom.updated(returnRoom.updated);
				existingRoom.lastMessage(returnRoom.last_message);
				existingRoom.messageList.push(newMessage);
				if(returnMessage.user.id == Y.CurrentUser.id) {
					self.activeRoom(existingRoom);
					_newMessageCallback();
				}else {
					if(self.activeRoom() != null && self.activeRoom().id == returnRoom.id){
						_scrollToBottomMessageList();
					}else{
						existingRoom.unread(existingRoom.unread() + 1);
					}					
				}		
			} 
			// New room
			else { 
				var newRoom = new Y.Models.RoomModel(returnRoom);
				newRoom.messageList.push(newMessage);
				self.roomList.unshift(newRoom);

				//Subscribe room chanel:
				Y.PusherManager.subscribeChanel(newRoom.id);

				if(returnMessage.user.id == Y.CurrentUser.id) {
					self.activeRoom(newRoom);
					_newMessageCallback();
				}else {
					_updateOrderRoom();
					newRoom.unread(newRoom.unread() + 1);
				}
			}		

			if(callback && typeof callback === "function"){
				callback();
			}
		}

		function _selectFirstRoom() {
			if(self.roomList().length > 0){
				self.activeRoom(self.roomList()[0]);
			}
		}		

		function _subscribeMessageChanel(){
			$(window).on(Y.Constants.Triggers.PUSHER_NEW_MESSAGE, function(e) {
				_addMessageDataToRoom(e.response, function() {
					if(self.activeRoom() == null && self.roomList().length > 0) {
						self.activeRoom(self.roomList()[0]);
					}
				});
			});
		}

		function _updateOrderRoom(){
			if(self.roomList().length == 0)
				return;
			self.roomList.sort(function(left, right) { 
				return left.updated() == right.updated() ? 0 : (left.updated() < right.updated() ? 1 : -1);
			});
		}

		function _scrollToBottomMessageList() {
			var listContainer = ele.find(".js-message-list");
			if(listContainer.length > 0){
				listContainer.animate({ scrollTop: listContainer[0].scrollHeight }, 0);
			}
		}

		function _newMessageCallback(data){
			_scrollToBottomMessageList();
			_updateOrderRoom();
		}

		function _layout(){
			if(ele.length === 0) return;

			$(window).resize(function(){
				var maxHeight = $("html").height();
				if(ele.hasClass("widget-message-page")){
					var navHeight = $("#top-mavbar").height();
					var gap = 20;
					var marginTop = parseInt(ele.css("margin-top"));
					var marginBottom = parseInt(ele.css("margin-bottom"));
					ele.height(maxHeight - navHeight - (isNaN(marginTop) ? 0 : marginTop) - (isNaN(marginBottom) ? 0 : marginBottom) - 2*gap);
				}
			});
			$(window).trigger("resize");
		}

		function _init(){
			_layout();
			_subscribeMessageChanel();
            _loadRoom(function(){
            	_selectFirstRoom();            	
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	};

	Y.Widgets.RoomMembers = function(options) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		var modalEle = options.ele || undefined;
		self.activeRoom = ko.observable(options.activeRoom || null);

		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.members = ko.computed(function(){
			if(self.activeRoom() !== null && self.activeRoom().members){
				return self.activeRoom().members() || [];	
			}
			return [];
		});

		self.open = function(){
			if(self.activeRoom() === null){
				return;
			}
			if(self.activeRoom().members().length === 0){
				_loadMembers({ room_id : self.activeRoom().id }, function(data){
					self.activeRoom().members(data.users);
					_openModal();
				}, function(){
					//Message
				});
			}else{
				_openModal();
			}
		};

		self.close = function(){
			if(modalEle){
				modalEle.modal("hide");	
			}
		};

		self.setActiveRoom = function(room) {
			self.activeRoom(room);
		};

		self.removeMember = function(mem){
			var postData = {
				roomId : self.activeRoom().id,
				userSlug : mem.slug
			};

			Y.Utils.showConfirmMessage(Y.Constants.Messages.COMMON_CONFIRM, function(){
				_removeMemeber(postData, function(data){
					self.activeRoom().members.remove(mem);
					self.activeRoom().name(data.room.name);
				}, function(data){
					//Message
					alert("User was not removed !");
				});
			}, function(){
				//Close or cancel event
			});
		};

		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		function _loadMembers(postData, sucCallback, failCallback) {
			var ajaxOptions = {
				url: Y.Routing.generate("ApiGetRoomUsers", postData)
			};
			var successCallback = function(data){
				if(data.success === "ok"){					
					if(sucCallback && typeof sucCallback === "function"){
						sucCallback(data);
					}				
				}else {
					if(failCallback && typeof failCallback === "function"){
						failCallback(data);
					}
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, failCallback);
		}

		function _removeMemeber(postData, sucCallback, failCallback) {
			var ajaxOptions = {
				url: Y.Routing.generate("ApiDeleteRoomUser", { room_id : postData.roomId }),
				data: {
					user_slug : postData.userSlug
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){					
					if(sucCallback && typeof sucCallback === "function"){
						sucCallback(data);
					}				
				}else {
					if(failCallback && typeof failCallback === "function"){
						failCallback(data);
					}
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, failCallback);
		}

		function _openModal(){
			if(!modalEle){
				return;
			}
			modalEle.on("shown.bs.modal", function(){
				var niceEle = modalEle.find(".nice-scroll");
				if(niceEle){
					var messageWidgetHeight = $(".widget-message-page").height();
					niceEle.css("max-height", messageWidgetHeight > 200 ? messageWidgetHeight - 150: 150 + "px");
					window.makeNiceScroll(niceEle);
				}				
			});
			modalEle.modal("show");
		}
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));