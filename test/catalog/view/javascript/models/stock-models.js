YesGlobal.Models = YesGlobal.Models || {};

(function($, ko, Y, undefined) {
	Y.Models.MarketModel = function (data) {
		'use strict';

		var that = this;

		that.id = ko.observable('');
		that.name = ko.observable('');
		that.code = ko.observable('');

		ko.mapping.fromJS(data, {}, this);
	}
})(jQuery, ko, YesGlobal);