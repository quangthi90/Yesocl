YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.FriendModel = function (data) {
		var that = this;
		
		/* ========= START PROPERTIES ======== */
		that.userid = data.user_id || "";
		that.username = data.user_name || "";
		that.userslug = data.slug || "";
		that.avatar = data.avatar || "";
		/* ========= END PROPERTIES ======== */

		/* ========= START PUBLIC METHODS ======== */
		/* ========= END PUBLIC METHODS ======== */

		/* ========= START PRIVATE METHODS ======== */
		/* ========= END PRIVATE METHODS ======== */

	}
})(jQuery, ko, YesGlobal);