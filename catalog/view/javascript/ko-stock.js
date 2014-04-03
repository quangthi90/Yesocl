
//Register ViewModel for Stock Page
function ChartViewModel (options) {
	var self = this;
};

function WatchListViewModel(options) {
	var self = this;

	self.API_Url = options.API_Url;
	self.isLoading = ko.observable(false);
	self.watchList = ko.observableArray([]);
	self.cacheStock = ko.observableArray([]);
	self.addedWatchList = ko.observableArray([]);
	self.suggestWatchList = ko.observableArray([]);
	self.query = ko.observable('');

	//Public functions:
	self.removeWatchList = function(wl){
		self.watchList.remove(wl);
	};

	self.removeAdd = function(wl) {

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
			modal: false
  		});
	};

	self.closeAddWL = function(){
		$.magnificPopup.close();
	};

	function _addSingleWatchList() {
		var newWL = new WatchListItem(wl);
		self.watchList.push(wl);
	};

	//Private functions:
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

		_loadWatchLists();

		//Add new item:
		self.watchList.push(new WatchListItem({isNew : true}));

		self.isLoading(false);
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

		ko.mapping.fromJS(data, {}, this);
	};

	_loadStartUp();
};

function NewsViewModel(options) {
	var self = this;
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