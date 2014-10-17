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
		
		that.currentPage = ko.observable(1);
		that.canLoadMore = ko.observable(data.canLoadMore || true);
		that.totalRoom = ko.observable(0);
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============= */
		that.loadMessage = function(callback) {
			var ajaxOptions = {
				url: Y.Routing.generate("ApiGetMessages", {
					room_id: that.id,
					page: that.currentPage()
				}),
				data : {
					limit : 10
				}
			};
			var successCallback = function(data){
				if(data.success === "ok") {
					ko.utils.arrayForEach(data.messages, function(m){
						var messageItem = new Y.Models.MessageModel(m);
						that.messageList.push(messageItem);
					});
					if(data.canLoadMore !== undefined) {
						that.canLoadMore(data.canLoadMore);
					}
				}

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		};

		that.addMessage = function(roomData, lastMessage){
			that.updated(roomData.updated);
			that.lastMessage(roomData.last_message);
			if ( lastMessage !== null ){
				that.messageList.push(lastMessage);
			}
		};

		/* ============= END PUBLIC METHODS ============= */

		/* ============= START PRIVATE METHODS ============= */
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
		/* ============= END PRIVATE METHODS =============== */
	};

	Y.Models.MessageModel = function (data) {
		var that = this;
		
		/* ============= START PROPERTIES ================== */
		that.id = data.id || '';
		that.content = data.content || '';
		that.user = data.user || {};
		that.created = data.created || null;
		that.is_read = data.is_read || true;
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PRIVATE METHODS ============= */
		/* ============= END PRIVATE METHODS =============== */
	};
})(jQuery, ko, YesGlobal);