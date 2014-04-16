function MarketModel(data) {
	'use strict';

	var that = this;

	that.id = ko.observable('');
	that.name = ko.observable('');
	that.code = ko.observable('');

	ko.mapping.fromJS(data, {}, this);

	this.marketDetailClick = function(){
		var href = window.yRouting.generate('StockMarket', {market_code: that.code()});
		window.location.href = href;
	};
}

function StockModel(data) {
	'use strict';

	var that = this;

	that.id = ko.observable('');
	that.name = ko.observable('');
	that.code = ko.observable('');
	that.is_down = ko.observable(false);
	that.exchange_price = ko.observable('');
	that.exchange_percent = ko.observable('');
	that.range_price = {
		84: {
			min_price: ko.observable(''),
			max_price: ko.observable('')
		},
		364: {
			min_price: ko.observable(''),
			max_price: ko.observable('')
		}
	};
	that.pre_last_exchange = new ExchangeModel(data.pre_last_exchange);
	that.last_exchange = new ExchangeModel(data.last_exchange);
	that.market = new MarketModel(data.market);

	ko.mapping.fromJS(data, {}, this);
}

function ExchangeModel(data){
	'use strict';

	var that = this;

	that.id = ko.observable('');
	that.open_price = ko.observable('');
	that.close_price = ko.observable('');
	that.high_price = ko.observable('');
	that.low_price = ko.observable('');
	that.volume = ko.observable('');
	// that.created = ko.observable('');

	ko.mapping.fromJS(data, {}, this);
}