YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.FriendModel = function (data) {
		var that = this;
		
		/* ========= START PROPERTIES ======== */
		that.userid = data.userid || "";
		that.username = data.username || "";
		that.userslug = data.userslug || "";
		that.avatar = data.avatar || "";
		that.current = data.current || "";
		
		/* ========= END PROPERTIES ======== */

		/* ========= START PUBLIC METHODS ======== */
		/* ========= END PUBLIC METHODS ======== */

		/* ========= START PRIVATE METHODS ======== */
		/* ========= END PRIVATE METHODS ======== */

	}
})(jQuery, ko, YesGlobal);