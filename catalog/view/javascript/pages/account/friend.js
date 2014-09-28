(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.FriendView = function(options, ele) {
		var self = this;

		self.Hello = ko.observable(options.Hello || "NULL");
		self.UserList = ko.observableArray(options.UserList || []);

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_FRIEND_VIEWMODEL";
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));