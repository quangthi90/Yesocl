YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.RoomModel = function (data) {
		var that = this;
		that.id = data.id || '';
		that.name = data.name || '';
		that.user = data.user || {};
		that.created = data.created || null;
		that.updated = data.updated || null;
		that.last_message = data.last_message || {};
		that.messages = [];

		that.loadMessage = function(messageItem){
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
						self.totalRoom( data.total_room );
					});
					if(data.canLoadMore !== undefined) {
						self.canLoadMore(data.canLoadMore);
					}
				}
				self.isLoadSuccess(true);
				_handleEffects();

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}
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
	}
})(jQuery, ko, YesGlobal);

(function($, ko, Y, undefined) {
	Y.Models.MessageModel = function (data) {
		var that = this;
		//Attribute
		
		//Methods
	}
})(jQuery, ko, YesGlobal);