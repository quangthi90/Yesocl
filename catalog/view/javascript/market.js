
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
	var _isInitDatasource = false;

	//Public functions:
	self.removeWatchList = function(wl){
		bootbox.dialog({
            title: 'Remove watchList',
            message: 'Are you sure you want to remove this stock ?',
            buttons:
            {
                cancel: {
                    label: sCancel,
                    className: 'btn',
                    callback: function() {
                    }
                },
                oke: {
                    label: 'OK',
                    className: 'btn-primary',
                    callback: function() {
                    	self.watchList.remove(wl);
                        _submitRemoveWatchlist(wl);
                    }
                }
            }
        });
		
	};

	self.removeStock = function(wl) {
		self.addedWatchList.remove(wl);
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stock.code);
		if(temp){
			temp.isAdded(false);
		}
	};

	self.addStock = function(wl) {
		if(wl.isAdded()){
			return;
		}		
		self.addedWatchList.push(wl);
		var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stock.code);
		if(temp){
			temp.isAdded(true);
		}		
	};

	self.addStockEnter = function(){
		var wl = self.defaultSelectedStock();
		self.addStock(wl);
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
			stock_ids.push( st.stock.id);
		});
		self.addedWatchList.removeAll();
		//Add new item:
		self.watchList.unshift(new WatchListItem({isNew : true, stock: null}));
		$.magnificPopup.close();		

		_submitSaveWatchlist(stock_ids);
	};

	self.suggestWatchList = ko.computed(function(){
		var search = self.query().toLowerCase();
		
		if(search.length <= 0) {
			return [];
		}

		var result = ko.utils.arrayFilter(self.cacheStockDatasource(), function(st) {
            return  !st.isAdded() && (st.stock.code.toLowerCase().indexOf(search) >= 0 ||
					st.stock.name.toLowerCase().indexOf(search) >= 0 ||
					st.stock.market.name.toLowerCase().indexOf(search) >= 0);	            
        });

        if(result && result.length > 0){
			self.defaultSelectedStock(result[0]);
			//Take first 20 elements:
	        if(result.length > 20) {
	        	result = result.slice(0, 19);
	        }
        }
        return result;
	});

	self.dataSourceEmpty = ko.computed(function(){
		if(self.cacheStockDatasource().length === 0){
			return true;
		}
		var temp = ko.utils.arrayFirst(self.cacheStockDatasource(), function(st) {
			return !st.isAdded();
        });
        return (temp === null);
	});

	//Private functions:
	function _getFirstInArray(array, id) {
		return ko.utils.arrayFirst(array, function(st) {
			if ( st.stock === undefined || st.stock === null){
				return false;
			}
	        return st.stock.code.toLowerCase() === id.toLowerCase();
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
		if(_isInitDatasource){
			return;
		}
		_isInitDatasource = true;
		self.isLoading(true);
		if ( self.cacheStockDatasource.length === 0 ){
			$.ajax({
				type: 'POST',
				url: window.yRouting.generate('ApiGetAllStocks'),
				dataType: 'json',
				async: true,				
				success: function(data) {
					if ( data.success == 'ok' ){
						for ( var key in data.stocks ){
							self.cacheStockDatasource.push( new WatchListItem({
								stock: data.stocks[key]
							}));
						}
					}
					//Remove stock which already added:
					ko.utils.arrayForEach(self.cacheStockDatasource(), function(st){
						var temp = _getFirstInArray(self.watchList(), st.stock.code);
						if(temp){
							st.isAdded(true);
						}
					});

					//Completed:
					self.isLoading(false);
					$('#wl-query').focus();
				},
				complete : function(){
					self.isLoading(false);
				}
			});
		}		
	}

	function _submitRemoveWatchlist(wl){
		$.ajax({
			type: 'POST',
			url: window.yRouting.generate('ApiDeleteWatchListItem', {stock_id: wl.stock.id}),
			dataType: 'json',
			success: function(data) {
				if ( data.success == 'ok' ){					
					if(self.cacheStockDatasource().length === 0)
						return;
					var temp = _getFirstInArray(self.cacheStockDatasource(), wl.stock.code);
					if(temp){
						temp.isAdded(false);
					}
				}
			}
		});
	}

	function _submitSaveWatchlist(ids) {
		$.ajax({
			type: 'POST',
			url: window.yRouting.generate('ApiPushWatchList'),
			data: {stock_ids: ids},
			dataType: 'json',
			success: function(data) {
				if ( data.success == 'ok' ){
				}
			}
		});
	}

	function _addSingleWatchList() {
		var newWL = new WatchListItem(wl);
		self.watchList.push(wl);
	}

	function WatchListItem(data) {
		var that = this;

		that.isAdded = ko.observable(data.isAdded !== undefined ? data.isAdded : false);
		that.isNew = data.isNew !== undefined ? data.isNew : false;		
		that.stock = data.stock !== undefined ? data.stock : null;
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
ko.bindingHandlers.link = {
	init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		var options = valueAccessor();
        var href = window.yRouting.generate(options.route, options.params);
		$(element).attr('href', href);
		$(element).html(options.text);
		if(options.isNewTab){
			$(element).attr('target', '_blank');
		}
		if(options.title){
			$(element).attr('title', options.title);	
		}
	}
}

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