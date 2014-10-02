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
		that.friendStatus = ko.observable(data.fr_status || 0);
		that.followStatus = ko.observable(data.fl_status || 0);
		// this.changeValueToString = function(){
		// 	_ChangeValueStatus(data);
		// 	_ChangeValueFollow(data);	
		// }
		/* ========= END PROPERTIES ======== */
		/* ========= START PUBLIC METHODS ======== */
		that.unFriend = function(){
			alert(that.userslug);
			var ajaxOptions = {
            	url: Y.Routing.generate('ApiPutUnfriend', {user_slug: that.userslug})
            };
            var successCallback = function(data){
            	that.friendStatus = 4;
            }
            //Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}
		/* ========= END PUBLIC METHODS ======== */
		/* ========= START PRIVATE METHODS ======== */
		/**
		Change value friendStatus from int to string	
		*	1: me
		*	2: friend
		*	3: sent request make friend
		*	4: not relationship
		*	-1: not found User B
		*/
		function ChangeValueStatus(data)
		{
			if(that.friendStatus == 2)
				that.friendStatus = "Friend";
			else if(that.friendStatus == 3)
				that.friendStatus = "Sent request";
			else if(that.friendStatus == 4)
				that.friendStatus = "Make friend";
		}
		/**
		Change value followStatus from int to string
		 *		1: me
		 *		2: Following
		 *		3: not relationship
		 *		-1: not found User B
		 */
		function ChangeValueFollow(data)
		{
		 	if(that.followStatus == 2)
		 		that.followStatus = "Following";
		 	else if (that.followStatus == 3)
		 		that.followStatus = "Follow";
		}
		/* ========= END PRIVATE METHODS ======== */
	}
})(jQuery, ko, YesGlobal);