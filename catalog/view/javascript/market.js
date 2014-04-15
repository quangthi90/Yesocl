
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
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stockCode());
		if(temp){
			temp.IsAdded(false);
		}
	};

	self.removeStock = function(wl) {
		self.addedWatchList.remove(wl);
		if(self.cacheStockDatasource().length === 0)
			return;
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stockCode());
		if(temp){
			temp.IsAdded(false);
		}
	};

	self.addStock = function(wl) {
		self.addedWatchList.push(wl);
		if(self.cacheStockDatasource().length === 0)
			return;
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stockCode());
		if(temp){
			temp.IsAdded(true);
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
		//Call ajax to save selected stock to Watch List

		//If save successfully -> Add to current watchlist:
		self.watchList.shift();
		ko.utils.arrayForEach(self.addedWatchList(), function(st){
			self.watchList.unshift(st);
		});
		self.addedWatchList.removeAll();
		//Add new item:
		self.watchList.unshift(new WatchListItem({isNew : true}));

		$.magnificPopup.close();
	};

	self.suggestWatchList = ko.computed(function(){
		var search = self.query().toLowerCase();
		var result = null;
		
		if(search.length === 0) {
			result = ko.utils.arrayFilter(self.cacheStockDatasource(), function(st) {
	            return  !st.IsAdded();
	        });
		}else {
			result = ko.utils.arrayFilter(self.cacheStockDatasource(), function(st) {
	            return  !st.IsAdded() && (st.stockCode().toLowerCase().indexOf(search) >= 0 ||
						st.stockName().toLowerCase().indexOf(search) >= 0 ||
						st.marketName().toLowerCase().indexOf(search) >= 0);
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
			return st.IsAdded() === false;
        });
        return (temp === null);
	});

	//Private functions:
	function _getFirstInArray(array, id) {
		return ko.utils.arrayFirst(array, function(st) {
	        return st.stockCode().toLowerCase() === id.toLowerCase();
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
		
		//$.ajax({
		//	type: "POST",
		//	url: self.API_Url,
		//	data: { },
		//	success: function(response) {
		//		//Parse data and push to watch list array
		//	}
		//});

		for ( var key in window.yWatchList ){
			self.watchList.push( new StockModel(window.yWatchList[key]) );
		}
	}

	function _loadStartUp() {
		self.isLoading(true);		

		//Add new item:
		self.watchList.push(new WatchListItem({isNew : true}));

		_loadWatchLists();

		self.isLoading(false);
	}

	console.log(window.yStocks.length);

	function _initStockDatasource() {
		self.isInitDatasource(true);

		//$.ajax({
		//	type: "POST",
		//	url: self.API_Url,
		//	data: { },
		//	success: function(response) {
		//		//Parse data and push to watch list array
		//	}
		//});

		//Samples:
		for ( var key in window.yStocks ){
			self.cacheStockDatasource.push( new StockModel(window.yStocks[key]) );
		}

		//Remove stock which already added:
		ko.utils.arrayForEach(self.cacheStockDatasource(), function(st){
			var temp = _getFirstInArray(self.watchList(), st.stockCode());
			if(temp){
				st.IsAdded(true);
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

		that.isNew = ko.observable(false);
		that.stockCode = ko.observable('');
		that.stockName = ko.observable('');
		that.typeName = ko.observable('');
		that.marketName = ko.observable('');
		that.stockIndexValue = ko.observable(0);
		that.stockTopIndexValue = ko.observable('');
		that.stockBottomIndexValue = ko.observable('');
		that.IsAdded = ko.observable(false);

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