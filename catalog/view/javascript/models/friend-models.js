YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.FriendModel = function (data) {
		var that = this;
		/* ========= START PROPERTIES ======== */
		that.userid = data.id || "";
		that.username = data.username || "";
		that.userslug = data.slug || "";
		that.avatar = data.avatar || "";
		that.current = data.current || "";

		/**
		Change value friendStatus:
		*	1: me
		*	2: friend
		*	3: sent request make friend
		*	4: not relationship
		*	-1: not found User B
		*/
		that.friendStatus = ko.observable(data.fr_status || 0);
		/**
		Change value followStatus
		 *		1: me
		 *		2: Following
		 *		3: not relationship
		 *		-1: not found User B
		 */
		that.followStatus = ko.observable(data.fl_status || 0);
		
		/* ========= END PROPERTIES ======== */
		/* ========= START PUBLIC METHODS ======== */
		that.unFriend = function(){
			
			var ajaxOptions = {
            	url: Y.Routing.generate('ApiPutUnfriend', {user_slug: that.userslug})
            };
            var successCallback = function(data){
            	if(data.success == "ok")
            		that.friendStatus (4);
            }
            //Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		that.clickFollow = function(){
			if(that.followStatus() == 3)
				_addFollow();
			else
				_unFollow();
		}

		/* ========= END PUBLIC METHODS ======== */
		/* ========= START PRIVATE METHODS ======== */
		function _unFollow(){
			var ajaxOptions = {
            	url: Y.Routing.generate('ApiPutRemoveFollower', {user_slug: that.userslug})
            };
            var successCallback = function(data){
            	if(data.success == "ok")
            		that.followStatus (3);
            }
            //Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}
		
		function _addFollow(){
			var ajaxOptions = {
            	url: Y.Routing.generate('ApiPutAddFollower', {user_slug: that.userslug})
            };
            var successCallback = function(data){
            	if(data.success == "ok")
            		that.followStatus (2);
            }
            //Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}
		
		
		/* ========= END PRIVATE METHODS ======== */
	}
})(jQuery, ko, YesGlobal);