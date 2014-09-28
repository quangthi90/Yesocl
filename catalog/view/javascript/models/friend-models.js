YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.FriendModel = function (data) {
		var that = this;
		that.UserID = ko.observable(data.UserID || "");
		that.UserName = ko.observable(data.UserName || "");
		
		/* ========= START PROPERTIES ======== */
		/* ========= END PROPERTIES ======== */

		/* ========= START PUBLIC METHODS ======== */
		/* ========= END PUBLIC METHODS ======== */

		/* ========= START PRIVATE METHODS ======== */
		/* ========= END PRIVATE METHODS ======== */

	}
})(jQuery, ko, YesGlobal);