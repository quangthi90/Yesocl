
//Register ViewModel for Stock Page
function ChartViewModel (options) {
	'use strict';
	var self = this;

	self.markets = ko.observableArray();
	for ( var key in window.yMarkets ){
		self.markets.push( new MarketModel(window.yMarkets[key]) );
	}
	self.currMarketId = ko.observable(window.yCurrMarketId);
	self.stock = ko.observable( new StockModel(window.yStock) );
	// console.log(window.yStock);
}

function WatchListViewModel(options) {
	'use strict';

	var self = this;

	self.API_Url = options.API_Url;
	self.isLoading = ko.observable(false);
	self.watchList = ko.observableArray([]);
	self.cacheStockDatasource = ko.observableArray([]);
	self.addedWatchList = ko.observableArray([]);
	self.query = ko.observable('');
	self.defaultSelectedStock = ko.observable();
	self.isInitDatasource = ko.observable(false);

	//Public functions:
	self.removeWatchList = function(wl){
		self.watchList.remove(wl);

		if(self.cacheStockDatasource().length === 0)
			return;
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stock().code());
		if(temp){
			temp.isAdded(false);
		}
	};

	self.removeStock = function(wl) {
		self.addedWatchList.remove(wl);
		if(self.cacheStockDatasource().length === 0)
			return;
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stock().code());
		if(temp){
			temp.isAdded(false);
		}
	};

	self.addStock = function(wl) {
		self.addedWatchList.push(wl);
		if(self.cacheStockDatasource().length === 0)
			return;
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stock().code());
		if(temp){
			temp.isAdded(true);
		}
	};

	self.addStockEnter = function(){
	};

	self.clearQuery = function(){
		self.query('');
	};

	self.startAddWL = function(popupEle, data) {
		$.magnificPopup.open({
			items: {
			    src: $(popupEle),
			    type: 'inline'
			},
			modal: false,
			callbacks:{
				open: function(){
					_initStockDatasource();
				}
			}
		});
	};

	self.closeAddWL = function(){
		$.magnificPopup.close();
	};

	self.saveAddedStock = function() {
		if(self.addedWatchList().length === 0)
			return;

		// list Stock ID to save database
		var stock_ids = [];

		//If save successfully -> Add to current watchlist:
		self.watchList.shift();
		ko.utils.arrayForEach(self.addedWatchList(), function(st){
			self.watchList.unshift(st);
			stock_ids.push( st.stock().id() );
		});
		self.addedWatchList.removeAll();
		//Add new item:
		self.watchList.unshift(new WatchListItem({isNew : true, stock: null}));

		$.magnificPopup.close();

		$.ajax({
			type: 'POST',
			url: window.yRouting.generate('ApiPushWatchList'),
			data: {stock_ids: stock_ids},
			dataType: 'json',
			success: function(data) {
				if ( data.success == 'ok' ){
				}
			}
		});
	};

	self.suggestWatchList = ko.computed(function(){
		var search = self.query().toLowerCase();
		var result = null;
		
		if(search.length === 0) {
			result = ko.utils.arrayFilter(self.cacheStockDatasource(), function(st) {
	            return  !st.isAdded();
	        });
		}else {
			result = ko.utils.arrayFilter(self.cacheStockDatasource(), function(st) {
	            return  !st.isAdded() && (st.stock().code().toLowerCase().indexOf(search) >= 0 ||
						st.stock().name().toLowerCase().indexOf(search) >= 0 ||
						st.stock().market().name().toLowerCase().indexOf(search) >= 0);
	        });
		}

        if(result && result.length > 0){
			self.defaultSelectedStock(result[0]);
        }
        return result;
	});

	self.dataSourceEmpty = ko.computed(function(){
		if(self.cacheStockDatasource().length === 0){
			return true;
		}
		var temp = ko.utils.arrayFirst(self.cacheStockDatasource(), function(st) {
			return st.isAdded() === false;
        });
        return (temp === null);
	});

	//Private functions:
	function _getFirstInArray(array, id) {
		return ko.utils.arrayFirst(array, function(st) {
			if ( st.stock() === undefined || st.stock() === null){
				return false;
			}
	        return st.stock().code().toLowerCase() === id.toLowerCase();
        });
	}

	function _addCollectionWatchList(dataList) {
		if(dataList && dataList.length > 0){
			for (var i = 0; i < dataList.length; i++) {
				var newWL = new WatchListItem(dataList[i]);
				self.watchList.push(newWL);
			};
		}
	}

	function _loadWatchLists() {
		if(window.yWatchList && window.yWatchList.length > 0){
			for ( var key in window.yWatchList ){
				self.watchList.push( new WatchListItem({
						stock: window.yWatchList[key],
						isAdded: true
					})
				);
			}
		}
	}

	function _loadStartUp() {
		self.isLoading(true);		

		//Add new item:
		self.watchList.push(new WatchListItem({isNew : true, stock: null}));
		_loadWatchLists();

		self.isLoading(false);
	}

	function _initStockDatasource() {
		self.isInitDatasource(true);

		if ( self.cacheStockDatasource.length === 0 ){
			$.ajax({
				type: 'POST',
				url: window.yRouting.generate('ApiGetAllStocks'),
				dataType: 'json',
				async: false,
				success: function(data) {
					if ( data.success == 'ok' ){
						for ( var key in data.stocks ){
							self.cacheStockDatasource.push( new WatchListItem({
								stock: data.stocks[key]
							}));
						}
					}
				}
			});
		}

		//Remove stock which already added:
		ko.utils.arrayForEach(self.cacheStockDatasource(), function(st){
			var temp = _getFirstInArray(self.watchList(), st.stock().code());
			if(temp){
				st.isAdded(true);
			}
		});

		self.query('');
		self.isInitDatasource(false);
	}

	function _addSingleWatchList() {
		var newWL = new WatchListItem(wl);
		self.watchList.push(wl);
	}

	function WatchListItem(data) {
		var that = this;

		//that.isNew = ko.observable(data.isNew !== undefined ? data.isNew : false);
		//that.isAdded = ko.observable(data.isAdded !== undefined ? data.isAdded : false);
		//that.stock = ko.observable(data.stock !== undefined ? data.stock : null);

		that.isNew = ko.observable();
		that.isAdded = ko.observable();
		that.stock = ko.observable();
		ko.mapping.fromJS(data, {}, this);
	}

	_loadStartUp();
};

function NewsViewModel(options) {
	var self = this;
};

//Common custom handlers:
ko.bindingHandlers.executeOnEnter = {
    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
        var allBindings = allBindingsAccessor();
        $(element).keypress(function (event) {
            var keyCode = (event.which ? event.which : event.keyCode);
            if (keyCode === 13) {
                allBindings.executeOnEnter.call(viewModel, viewModel, valueAccessor, element);
                return false;
            }
            return true;
        });
    }
};

$(document).ready(function(){

	//Add options to view model:
	var chartOptions = {
		API_Url : ''
	};
	var watchListOptions = {
		API_Url : ''
	};
	var newsOptions = {
		API_Url : ''
	};

	var viewModel = {
		chartModel : new ChartViewModel(chartOptions),
		watchListModel : new WatchListViewModel(watchListOptions),
		newsModel : new NewsViewModel(newsOptions)
	};

	ko.applyBindings(viewModel, document.getElementById('y-main-content'));
});