
//Register ViewModel for Stock Page
function ChartViewModel (options) {
	'use strict';
	var self = this;

	self.markets = ko.observableArray(window.yMarkets);
	self.currMarketId = ko.observable(window.yCurrMarketId);
	self.stock = ko.observable(window.yStock);
	self.timeFilter = ko.observable('day');
	self.isLoadSuccess = ko.observable(false);
	var cacheGroupStock = {
		'day' : window.yStock,
		'week' : null,
		'month': null,
		'year': null
	};

	self.changeTimeFilter = function(timeFilter){
		self.timeFilter(timeFilter);
		if(cacheGroupStock[timeFilter] === undefined || cacheGroupStock[timeFilter] === null) {
			_getStockByTimeFilter(timeFilter, function(isSuccess, data){
				self.isLoadSuccess(isSuccess);
				if(isSuccess){
					cacheGroupStock[timeFilter] = data.stock;
					self.stock(data.stock);					
				}
			});
		}else {
			self.stock(cacheGroupStock[timeFilter]);
		}
	};

	//Private Functions:
	function _getStockByTimeFilter(timeFilter, callback) {
		//Gọi ajax để lấy thông tin stock theo tham số timeFilter trên:
		//Trả về callback kèm theo thông tin: Thành Công hay Thất bại, dữ liệu trả về
		
		//$.ajax({
		//	type: 'POST',
		//	url: URL,
		//	dataType: 'json',
		//	success: function(data) {
		//		if(callback !== undefined && typeof callback === 'function'){
		//			callback(data.success === 'oke', data);
		//		}
		//	}
		//});

		//Demo:
		var demoData = {
			success : 'oke',
			stock: {
				id:"534d8523a7c0e9880a000828",
				name:"VNINDEX",
				code:"VNINDEX",
				is_down:true,
				exchange_price:-0.723,
				exchange_percent:-0.1013,
				pre_last_exchange:{
						"id":"534d8609a7c0e9880a004360",
						"open_price":543.25,
						"close_price":232.33,
						"high_price":211.89,
						"low_price":232.43,
						"volume":1213424,
						"created":{
							"date":"2014-04-10 02:18:25",
							"timezone_type":3,
							"timezone":"Asia\/Bangkok"
						}
				},
				last_exchange:{
					"id":"53514aa6a7c0e9081d00008a",
					"open_price":537.87,
					"close_price":200.57,
					"high_price":632.01,
					"low_price":595.96,
					"volume":1040454010,
					"created":
					{
						"date":"2014-04-11 22:54:14",
						"timezone_type":3,
						"timezone":"Asia\/Bangkok"
					}
				},
				market:{
					"id":"532144f4a7c0e93c0a000000",
					"name":"HOSE",
					"code":"HOSE",
					"order":1
				},
				range_price:{
					"84":{
						"max_price":809.46,
						"min_price":147.65
					},
					"364":{
						"max_price":809.46,
						"min_price":903.04
					}
				}
			}
		};
		callback(demoData.success === 'oke', demoData);	
	}
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
					if(!_isInitDatasource) {	
						_initStockDatasource();
					}else {
						setTimeout(function(){
							$('#wl-query').focus();
						}, 100);
					}					
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
		_isInitDatasource = true;
		self.isLoading(true);
		if ( self.cacheStockDatasource().length === 0 ){
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