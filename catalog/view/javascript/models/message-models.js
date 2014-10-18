YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.RoomModel = function (data) {
		var that = this;

		/* ============= START PROPERTIES ================== */
		that.id = data.id || '';
		that.name = data.name || '';
		that.user = data.user || {};
		that.created = data.created || null;
		that.updated = ko.observable(data.updated || null);
		that.lastMessage = ko.observable(data.last_message || {});
		that.messageList = ko.observableArray([]);
		that.newMessage = ko.observable(new Y.Models.MessageModel({}));
		
		that.currentPage = ko.observable(1);
		that.canLoadMore = ko.observable(data.canLoadMore || false);
		that.isLoadingMore = ko.observable(false);
		that.newMessageCallback = data.newMessageCallback || undefined;
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============= */
		that.lastMessageContent = ko.computed(function(){
			var message = that.lastMessage();
			if(message && message.content){
				var rawContent = message.content.keepNewLine().extractTextLink();
				return Y.Utils.parseTaggedText(rawContent);
			}
			return "";
		});

		that.loadMessage = function(sucCallback, failCallback) {
			_loadMessage(
				function(data) {
					ko.utils.arrayForEach(data.messages, function(m){
						var messageItem = new Y.Models.MessageModel(m);
						that.messageList.push(messageItem);
					});					
					if(that.newMessageCallback && typeof that.newMessageCallback === "function"){
						that.newMessageCallback();
					}				
					if(sucCallback && typeof sucCallback === "function"){
						sucCallback(data);
					}
				}, function(data) {
					if(failCallback && typeof failCallback === "function"){
						failCallback(data);
					}
				}
			);
		};

		that.loadMoreMessage = function(sucCallback, failCallback) {
			if(that.isLoadingMore() || !that.canLoadMore()) return;

			that.currentPage(that.currentPage() + 1);
			_loadMessage(
				function(data) {
					ko.utils.arrayForEach(data.messages, function(m){
						var messageItem = new Y.Models.MessageModel(m);
						that.messageList.unshift(messageItem);
					});		
					if(sucCallback && typeof sucCallback === "function"){
						sucCallback(data);
					}
				}, function(data) {
					if(failCallback && typeof failCallback === "function"){
						failCallback(data);
					}
				}
			);
		};

		that.addMessage = function(){
			var messageContent = that.newMessage().content().trim();
			if (messageContent.length === 0) return;

			//Add to message list first
			var initNewMessage = new Y.Models.MessageModel({
				id: that.newMessage().id,
				content: messageContent,
				user: Y.CurrentUser,
				created: new Date().getTime()/1000,
				status: Y.Enums.MessageStatus.SENDING
			});
			that.messageList.push(initNewMessage);
			that.newMessage().reset();
			if(that.newMessageCallback && typeof that.newMessageCallback === "function"){
				that.newMessageCallback();
			}

			var tags = Y.Utils.parseTagsInfo(messageContent);
			var messageData = {
				content: messageContent,
				userTags: tags.userTags,
				stockTags: tags.stockTags,
				room_id: that.id
			};
			_addMessageToRoom(messageData, function(data) {
				initNewMessage.status(Y.Enums.MessageStatus.SENT);
				initNewMessage.id = data.message.id;			
				that.lastMessage(data.room.last_message);				
				that.updated(data.room.updated);
			}, function(data) {
				initNewMessage.status(Y.Enums.MessageStatus.ERROR);
				//Message
			});
		};

		that.toJson = function(){
			return {
				post_type: that.type,
				post_slug: that.slug
			};
		};
		that.fullyToJSON = function(){
			return {
				id : ko.utils.unwrapObservable(that.id),
				name : ko.utils.unwrapObservable(that.name),
				created : ko.utils.unwrapObservable(that.created),
				updated : ko.utils.unwrapObservable(that.updated),
			};
		};

		/* ============= END PUBLIC METHODS ============= */

		/* ============= START PRIVATE METHODS ============= */	
		function _loadMessage(sucCallback, failCallback) {			
			var ajaxOptions = {
				url: Y.Routing.generate("ApiGetMessages", {
					room_id: that.id,
					page: that.currentPage()
				}),
				data : {
					limit : 10
				},
				showLoading: false
			};			
			var successCallback = function(data){
				that.isLoadingMore(false);
				if(data.success === "ok") {
					that.canLoadMore(data.canLoadMore || false);
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
			Y.Utils.ajaxCall(ajaxOptions, function(){
				that.isLoadingMore(true);
			}, successCallback, function(){
				that.isLoadingMore(false);
				if(failCallback && typeof failCallback === "function"){
					failCallback(data);
				}
			});
		};

		function _addMessageToRoom(messageData, sucCallback, failCallback){
			var ajaxOptions = {
				url: Y.Routing.generate("ApiPostMessage"),
				data : messageData
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
	};


	Y.Models.MessageModel = function (data) {
		var that = this;		
		/* ============= START PROPERTIES ================== */
		that.id = data.id || new Date().getTime() + "";
		that.content = ko.observable(data.content || "");
		that.status = ko.observable(data.status || Y.Enums.MessageStatus.NONE);
		that.user = data.user || {};
		that.created = data.created || null;
		that.is_read = data.is_read || true;
		
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============= */
		that.contentDisplay = ko.computed(function(){
			var rawContent = that.content();
			if(rawContent){
				rawContent = rawContent.keepNewLine().extractTextLink();
				return Y.Utils.parseTaggedText(rawContent);
			}
			return "";
		});

		that.reset = function(){
			that.id = "",
			that.content("");			
		};
		/* ============= END PUBLIC METHODS =============== */
	};
})(jQuery, ko, YesGlobal);