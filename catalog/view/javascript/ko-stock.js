
//Register ViewModel for Stock Page
function ChartViewModel (options) {
	var self = this;
};

function WatchListViewModel(options) {
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
			modal: true,
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
		if(self.addedWatchList().length == 0)
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
		
		if(search.length == 0) {
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
	        return st.IsAdded() == false;
        });
        return (temp === null);
	});

	//Private functions:
	function _getFirstInArray(array, id) {
		return ko.utils.arrayFirst(array, function(st) {
	        return st.stockCode().toLowerCase() === id.toLowerCase();
        });
	};

	function _addCollectionWatchList(dataList) {
		if(dataList && dataList.length > 0){
			for (var i = 0; i < dataList.length; i++) {
				var newWL = new WatchListItem(dataList[i]);
				self.watchList.push(newWL);
			};
		}
	};

	function _loadWatchLists() {
		
		//$.ajax({
		//	type: "POST",
		//	url: self.API_Url,
		//	data: { },
		//	success: function(response) {
		//		//Parse data and push to watch list array
		//	}
		//});
	
		for (var i = 0; i < 9; i++) {
			self.watchList.push(
				new WatchListItem({ 
					stockCode: 'MAD', 
					stockName: 'Demo', 
					stockIndexValue : 100, 
					stockBottomIndexValue: '0.3 %', 
					stockTopIndexValue: '+ 100',
					isNew: false
				})
			);
		};
	};

	function _loadStartUp() {
		self.isLoading(true);		

		//Add new item:
		self.watchList.push(new WatchListItem({isNew : true}));

		_loadWatchLists();

		self.isLoading(false);
	};

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
		self.cacheStockDatasource([
			new WatchListItem ({
				stockCode : 'MAD',
				stockName : 'Stock MAD',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'AUH',
				stockName : 'Stock AUH',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false,
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'DEF',
				stockName : 'Stock DEF',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'DFC',
				stockName : 'Stock DFC',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'EFA',
				stockName : 'Stock EFA',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'AFE',
				stockName : 'Stock AFE',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'PDF',
				stockName : 'Stock PDF',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'EFD',
				stockName : 'Stock EFA',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'RTR',
				stockName : 'Stock RTR',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			}),
			new WatchListItem ({
				stockCode : 'AFR',
				stockName : 'Stock AFR',
				typeName : 'Stock',
				marketName : 'VNIndex',
				stockIndexValue : 100, 
				stockBottomIndexValue: '0.3 %', 
				stockTopIndexValue: '+ 100',
				isNew: false
			})
		]);

		//Remove stock which already added:
		ko.utils.arrayForEach(self.cacheStockDatasource(), function(st){
			var temp = _getFirstInArray(self.watchList(), st.stockCode());
			if(temp){
				st.IsAdded(true);
			}
		});

		self.query('');
		self.isInitDatasource(false);
	};

	function _addSingleWatchList() {
		var newWL = new WatchListItem(wl);
		self.watchList.push(wl);
	};

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
	};

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