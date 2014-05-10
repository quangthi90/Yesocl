
//Register ViewModel for Stock Page
function ChartViewModel (options) {
	'use strict';
	var self = this;

	self.markets = ko.observableArray(options.markets || []);
	self.currMarketId = ko.observable(options.currMarketId || '');
	self.stock = ko.observable(options.stock || {});
	self.isLoadSuccess = ko.observable(false);
	self.chartContainer = $('#y-chart-container');
	self.cacheExchanges = [];
	self.cacheVolumes = [];

	self.zoomChart = function(){
		_runChartAsZoomOut();		
	};

	//Private Functions:
	function _loadChart() {

		//Resize chart container:
	    var parentContentEle = self.chartContainer.parents('.tab-content').first();
	    var chartIndexEle = parentContentEle.find('.chart-indexs');
	    self.chartContainer.height(parentContentEle.height() - chartIndexEle.height());

		self.isLoadSuccess(false);
		$.ajax({
			type: 'POST',
			url: window.yRouting.generate('ApiGetStockExchanges', { stock_id : self.stock().id }),
			dataType: 'json',			
			success: function(data) {
				if ( data.success == 'ok' ){
					// Update Exchanges format for chart
					for ( var key in data.exchanges ){
						var exchange = data.exchanges[key];			
						self.cacheExchanges.push([
							exchange.created * 1000, // Change timestamp to UTC format
							exchange.open_price,
							exchange.high_price,
							exchange.low_price,
							exchange.close_price
						]);

						self.cacheVolumes.push([
							exchange.created*1000,
							exchange.volume
						]);
					}
					//Run chart:
					_runChart();

					//Completed loading:
					self.isLoadSuccess(true);
				}
			},
			complete : function(){
				self.isLoadSuccess(true);
			}
		});
	}

	function _runChart() {
		var options = {};
		options.rangeSelector = YesGlobal.Configs.chartOptions.defaultRangeSelector;
		options.tooltip = YesGlobal.Configs.chartOptions.defaultTooltip;
	    options.series = [
			{
				name :  self.stock().code,
				data : self.cacheExchanges,
				type : 'candlestick',
				dataGrouping: {
	                enabled: false,
	                dateTimeLabelFormats: {
						minute: ['%A, %b %e, %Y', '%A, %b %e', '-%A, %b %e, %Y']
					}
	            }
			}
	    ];
	    options.navigator = {
			enabled : false
		};
		options.scrollbar = {
			enabled : false
		};
	    options.title = {
	    	text: self.stock().name
	    };	    

	    //Run chart:
		self.chartContainer.highcharts('StockChart', options);
	};

	function _runChartAsZoomOut() {
		// Init chart:
		var options = {};
		options.rangeSelector = YesGlobal.Configs.chartOptions.defaultRangeSelector;
		options.tooltip = YesGlobal.Configs.chartOptions.defaultTooltip;
		options.yAxis = [
			{
		        title: {
		            text: self.stock().code
		        },
		        height: 200,
		        lineWidth: 2,			        
		    }
		    , {
		        title: {
		            text: "Volume"
		        },
		        top: 300,
		        height: 100,
		        offset: 0,
		        lineWidth: 2
		    }
	    ];
	    options.series = [
			{
				name :  self.stock().code,
				data : self.cacheExchanges,
				type : 'candlestick',
				dataGrouping: {
	                enabled: false,	                
	                dateTimeLabelFormats: {
						minute: ['%A, %b %e, %Y', '%A, %b %e', '-%A, %b %e, %Y']
					}
	            }
			}
			,{
		        type: "column",
		        data: self.cacheVolumes,
		        name: "Volume",						        
		        yAxis: 1,
		        dataGrouping: {
					enabled: false
		       }
		    }
	    ];
	    options.navigator = {
			enabled : true
		};
		options.scrollbar = {
			enabled : true
		};
	    options.title = {
	    	text: self.stock().name
	    };

	    //Resize chart container:
	    var zoomChartEle = $('<div id="zoomChart"></div>').css({
	    	'min-width' : '1100px',
	    	'min-height' : '550px',
	    	'z-index' : '1000',
	    	'margin' : 'auto',
	    	'background-color' : '#FFF',
	    	'opacity' : '0'
	    }).appendTo('body');

	    //Run chart:
		zoomChartEle.highcharts('StockChart', options);

		//Show popup:
		$.magnificPopup.open({
			items: {
			    src: zoomChartEle,
			    type: 'inline'
			},
			modal: false,
			callbacks: {
				open: function(){
					zoomChartEle.css('opacity', '1');
				},
				close: function(){
					zoomChartEle.remove();
				}
			}
		});
	};

	_loadChart();
}

function WatchListViewModel(options) {
	'use strict';

	var self = this;

	self.API_Url = options.API_Url;
	self.controlId = ko.observable(options.Id || "st-watch-list");
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
            title: sConfirm ,
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
                    label: sOk,
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
		if(options.watchList && options.watchList.length > 0) {
			for ( var key in options.watchList) {
				self.watchList.push( new WatchListItem({
						stock: options.watchList[key],
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

		//Make scroll for watchlist:
		$("#" + self.controlId()).find(".block-content").makeCustomScroll();

		self.isLoading(false);
	}

	function _initStockDatasource() {
		_isInitDatasource = true;
		self.isLoading(true);
		YesGlobal.Utils.initStockList(_loadInitStockList);
	}

	function _loadInitStockList(stockList) {
		if(stockList !== undefined && stockList !== null && stockList.length > 0){
			self.cacheStockDatasource.removeAll();
			for ( var key in stockList){
				var temp = _getFirstInArray(self.watchList(), stockList[key].code);
				self.cacheStockDatasource.push(new WatchListItem({
					stock: stockList[key],
					isAdded: temp !== null
				}));							
			}
		}
		//Completed:
		self.isLoading(false);
		$('#wl-query').focus();
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
			url: window.yRouting.generate('ApiPostWatchList'),
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
	self.id = ko.observable(options.Id);
	self.canLoadMore = ko.observable(options.canLoadMore || false);
	self.stockCode = ko.observable(options.stockCode || "DEMO");
	self.currentPage = ko.observable(1);
	self.newsList = ko.observableArray([]);
	self.isLoadSuccess = ko.observable(false);
	self.isLoadingMore = ko.observable(false);
	var mainContent = $("#y-main-content");	

	this.loadMore = function(){
		if(self.isLoadingMore()) return;

		self.isLoadingMore(true);
		self.currentPage(self.currentPage() + 1);
		_loadNews(function(){
			self.isLoadingMore(false);
		});
	};

	this.makeAddEffect = function(element) {
		if(element.nodeType === 1) {
			$(element).addClass("adding");
			$(element).fadeIn(800, function() {
				$(element).removeClass("adding");
			});
		}
	};

	//Private functions:
	function _adjustLayout(){
		var widthBlock = 0;
		var newsContainer = $("#" + self.id());
		var oldWidth = newsContainer.width();
		var heightContent = newsContainer.find('.block-content').height();
		var heightHeader  = newsContainer.find('.block-header').height();
		var newsItem = newsContainer.find('.news-item');
		console.log("newsItem " + newsItem.length);
		newsItem.each(function(){
			var loaded = $(this).hasClass("loaded");
			if(!loaded) {
				$(this).width(ConfigBlock.MIN_NEWS_WIDTH);
				$(this).height(heightContent - heightHeader);
				var heightImage = $(this).find('.news-link').first().outerHeight();
				var heightTitle = $(this).find('.news-title').first().outerHeight();
				var heightMeta = $(this).find('.news-meta').first().outerHeight();
				$(this).find('.news-short-content').height(heightContent - heightHeader - heightImage - heightTitle - heightMeta);
				$(this).css({ 
					'margin-right': ConfigBlock.MARGIN_POST_PER_COLUMN + 'px'
				});
				$(this).addClass("loaded");
			}
			widthBlock += ConfigBlock.MIN_NEWS_WIDTH + ConfigBlock.MARGIN_POST_PER_COLUMN;
		});
		newsContainer.width(widthBlock);
		mainContent.width(mainContent.outerWidth() - oldWidth + widthBlock);
		mainContent.parent("#y-content").getNiceScroll()[0].show().onResize();
	}

	function _loadNews(callback){
		var ajaxOptions = {
			url: window.yRouting.generate('ApiGetLastStockNews', {
				stock_code : self.stockCode(),
				page: self.currentPage()
			}),
			data : {
				limit : 5
			}
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.posts, function(p){
					var newsItem = new PostModel(p);
					self.newsList.push(newsItem);	
				});				
			}
			self.isLoadSuccess(true);			
			_adjustLayout();

			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	//Delay for loading news:
	setTimeout(function(){
		self.isLoadSuccess(false);
		_loadNews();
	}, 300);
};

function CommentBoxViewModel(params){
	var self = this;

	self.controlId = ko.observable(params.Id || "comment-box");
	self.widthControl = ko.observable(params.width || 380);
	self.currentPage = ko.observable(1);
	self.canExpand = ko.observable(true);
	self.needEffect = ko.observable(false);
	self.enterToSend = ko.observable(true);
	self.isProcessing = ko.observable(false);
	self.isLoadingMore = ko.observable(false);
	self.commentList = ko.observableArray(params.commentList || []);	
	self.postData = {};
	self.currentTotalComment = ko.observable(0);
	self.initComment = new CommentModel({});
	self.currentComment = ko.observable(null);

	//Public functions:
	self.showCommentBox = function(postData) {
		if(postData === undefined || postData === null){
			console.log("Post information is empty ...");
			return;
		}
		//Set init data:
		self.postData = postData;
		self.commentList.removeAll();
		self.needEffect(false);
		self.currentPage(1);
		self.currentTotalComment(0);

		//Check whether comment list already loaded:
		if(self.postData.comments.length > 0){
			ko.utils.arrayForEach(self.postData.comments, function(c){	
				var com = new CommentModel(c);
				self.commentList.push(com);
			});
			self.currentPage(self.postData.currentCommentPage());
			self.currentTotalComment(self.postData.commentCount());

			_displayCommentBox();
			return;
		}

		var ajaxOptions = {
			url : window.yRouting.generate('ApiGetComments', {
				post_type: postData.type,
				post_slug: postData.slug,
				page: self.currentPage()
			}),
			data: {
				limit: YesGlobal.Configs.pagingOptions.pageSize
			}
		};
		var successCallback = function(data) {
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.comments, function(c){	
					var com = new CommentModel(c);
					self.commentList.push(com);
					self.postData.comments.push(c);
				});
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}			
				_displayCommentBox();
			}else {
				//Show message ...
			}
			self.needEffect(true);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);		
	};
	self.closeCommentBox = function(){
		_hideCommentBox();
	};
	self.expandCommentBox = function(){
		if(self.canExpand()){
			self.widthControl(self.widthControl()*2);
		} else {
			self.widthControl(self.widthControl()/2);
		}
		self.canExpand(!self.canExpand());
	};
	self.addCommentByEnter = function(){
		if(self.enterToSend()){
			self.addComment();
			return false;
		}
		return true;
	};
	self.addComment = function() {
		if(self.isProcessing()){
			console.log("In process");
			return;
		}
		var content = self.initComment.content();
		if(content.trim().length === 0){
			alert("Content is required !");
			return;
		}
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPostComment", {
				post_type: self.postData.type,
				post_slug: self.postData.slug
			}),
			data: {
				content: content
			}
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				self.initComment.content("");
				var newComment = new CommentModel(data.comment);
				self.commentList.push(newComment);
				self.postData.comments.push(data.comment);
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
			}else{
				//Show message
			}
			self.isProcessing(false);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, function(){
			self.isProcessing(true);
		}, successCallback, function() {
			self.isProcessing(false);	
		});	
	};
	self.editComment = function(comment){
		self.currentComment(comment);
		_setCommentContent(comment.content());
		_displayAdvanceBox();
	};
	self.startAdvanceComment = function(){
		self.currentComment(null);
		_setCommentContent("");
		_displayAdvanceBox();
	};
	self.saveComment = function(){
		if(self.currentComment() === null){
			_saveNew();
		}else {
			_saveEditing();
		}
	};
	self.deleteComment = function(comment) {
		bootbox.dialog({
            title: sConfirm,
            message: 'Are you sure you want to remove this comment ?',
            buttons:
            {
                cancel: {
                    label: sCancel,
                    className: 'btn',
                    callback: function() {
                    }
                },
                oke: {
                    label: sOk,
                    className: 'btn-primary',
                    callback: function() {
                    	var ajaxOptions = {
							url : window.yRouting.generate("ApiDeleteComment", {
								post_type: self.postData.type,
								comment_id : comment.id
							})
						};
						var successCallback = function(data){
							if(data.success === "ok") {
								self.commentList.remove(comment);
								//Delete from cached data:								
								var indexDeleted = -1;
								for (var i = self.postData.comments.length - 1; i >= 0; i--) {
									if(comment.id === self.postData.comments[i].id){
										indexDeleted = i;
										break;
									}
								};
								if(indexDeleted >= 0) {
									self.postData.comments.splice(indexDeleted, 1);
								}					
								if(data.comment_count >= 0){
									self.postData.commentCount(data.comment_count);
									self.currentTotalComment(data.comment_count);
								}else {
									self.postData.commentCount(self.commentList().length + data.comment_count);
									self.currentTotalComment(self.commentList().length + data.comment_count);
								}
							} else {
							}					
						};
						YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
					}
                }
            }
        });
	};
	self.likeComment = function(comment){
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPutCommentLike", {
				post_type: self.postData.type,
				comment_id : comment.id
			})
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				comment.isLiked(!comment.isLiked());
				comment.likeCount(data.like_count);
			} else {
				//Show message
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}
	self.showLikers = function(comment){
		var context = YesGlobal.Utils.getKoContext();
		if(context !== null){
			var apiUrl = yRouting.generate("ApiGetCommentLiker", {
				post_type: self.postData.type,
				comment_id: comment.id
			})
			context.$data.userBoxModel.showUserList(apiUrl, function(count){
				if(count !== undefined){
					comment.likeCount(count);
				}
			});
		}else {
			console.log("Ko content not found !");
		}
	};
	self.makeDeleteEffect = function(element) {
		if (element.nodeType === 1 && self.needEffect()) {
			$(element).addClass("deleting");
			$(element).fadeOut(1000, function(){
				$(this).remove();
			});
		}
	};
	self.makeAddEffect = function(element) {
		if(element.nodeType === 1 && self.needEffect()) {
			var control = $("#" + self.controlId());
			var heightCommentList = control.find(".comment-list").first().height();
			$(element).addClass("adding");
			control.find(".comment-body").animate({ scrollTop: heightCommentList + "px" }, 1000, function(){
				$(element).fadeIn(1000, function() {
					$(element).removeClass("adding");
				});			
			});
		}
	};
	self.closeAdvanceBox = function(){
		_closeAdvanceBox();
	}

	//Private functions:
	function _loadMoreComment(callback){

		if(self.isLoadingMore() || self.postData.commentCount() <= self.commentList().length)
			return;

		self.currentPage(self.currentPage() + 1);
		self.postData.currentCommentPage(self.currentPage());
		self.isLoadingMore(true);
		self.needEffect(false);

		var ajaxOptions = {
			url : window.yRouting.generate('ApiGetComments', {
				post_type: self.postData.type,
				post_slug: self.postData.slug,
				page: self.currentPage()
			}),
			data: {
				limit: YesGlobal.Configs.pagingOptions.pageSize
			}
		};
		var successCallback = function(data) {
			if(data.success === "ok"){
				for (var index = data.comments.length - 1; index >= 0; index--) {
					var com = new CommentModel(data.comments[index]);
					self.commentList.unshift(com);
					self.postData.comments.unshift(data.comments[index]);
				};
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
				if(callback && typeof callback === "function"){
					callback();
				}
			}else {
				//Show message ...
			}
			self.needEffect(true);
			self.isLoadingMore(false);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}
	function _saveEditing(){
		var content = _getCommentContent();
		if(content.trim().length === 0) {
			alert("Content is required !");
			return;
		}
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPutComment", {
				post_type: self.postData.type,
				comment_id : self.currentComment().id
			}),
			data:{
				content : content
			}
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				self.currentComment().content(data.comment.content);
				self.currentComment().likeCount(data.comment.like_count);
				//Update cached data:
				var existing = ko.utils.arrayFirst(self.postData.comments, function(item){
					return data.comment.id === item.id;
				});
				if(existing){
					existing.content = data.comment.content;
					existing.like_count = data.comment.like_count;
				}
			} else {
				//Show message
			}
			self.currentComment(null);
			_setCommentContent("");
			_closeAdvanceBox();
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, function(){
			self.currentComment(null);
		});
	}
	function _saveNew(){
		if(self.isProcessing()){
			console.log("In process");
			return;
		}
		var content = _getCommentContent();
		if(content.trim().length === 0) {
			alert("Content is required !");
			return;
		}
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPostComment", {
				post_type: self.postData.type,
				post_slug: self.postData.slug
			}),
			data: {
				content: content
			}
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				var newComment = new CommentModel(data.comment);
				self.commentList.push(newComment);
				self.postData.comments.push(data.comment);
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
			}else{
				//Show message
			}
			self.isProcessing(false);			
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, function(){
			self.isProcessing(true);
		}, successCallback, function() {
			self.isProcessing(false);	
		});
		_closeAdvanceBox();
	}	
	function _displayCommentBox() {
		var overlay = $("#overlay");
		var control = $("#" + self.controlId());
		overlay.fadeIn(300, function(){
			control.animate({ 'right' : '0px' }, 100, function(){
				var heightCommentList = $(this).find(".comment-list").first().height();
				var commentBody = $(this).find(".comment-body");
				commentBody.animate({ scrollTop: heightCommentList + "px" }, 0);
				commentBody.on("scroll", function() {
				    var pos = $(this).scrollTop();
				    if (pos === 0) {
				    	$(this).find(".comment-item").removeClass("mark-first");
				    	$(this).find(".comment-item:first-child").addClass("mark-first");
				        _loadMoreComment(function(){
				        	var newPos = commentBody.find(".comment-item.mark-first").position().top - 100;
				        	commentBody.animate({ scrollTop: newPos + "px" }, 0);
				        });
				    }
				});
			});			
			$(this).on('click', function(){
				_hideCommentBox();
			});
		});
	}
	function _hideCommentBox() {
		var overlay = $("#overlay");
		var control = $("#" + self.controlId());
		var commentBody = control.find(".comment-body").off("scroll");
		control.animate({ 'right' : '-50000px' }, 200, function(){
			overlay.fadeOut(500);
		});
	}
	function _displayAdvanceBox(){
		var form = $("#comment-advance-form");
        $.magnificPopup.open({
			items: {
			    src: form,
			    type: 'inline'
			},
			modal: false
		});
	}
	function _closeAdvanceBox(){
		$.magnificPopup.close();
	}
	function _getCommentContent(){
		var form = $("#comment-advance-form");
		return form.find(".y-editor").code();
	}
	function _setCommentContent(content){
		var form = $("#comment-advance-form");
		return form.find(".y-editor").code(content);
	}

	//CommentModel:
	function CommentModel(data){
		var that = this;
		
		that.id = data.id || '';		
		that.created = data.created || '';
		that.user = data.user || {};
		that.isOwner = false;
		that.canDelete = data.can_delete || false;
		that.canEdit = data.can_edit || false;
		that.content = ko.observable(data.content || '');		
		that.isLiked = ko.observable(data.like_count || false);
		that.likeCount = ko.observable(data.like_count || 0);
		that.isInit = ko.observable(true);
	}
};

function UserBoxViewModel(params){
	var self = this;

	self.controlId = ko.observable(params.Id || "user-list-box-wrapper");
	self.userList = ko.observableArray([]);

	self.showUserList = function(apiUrl, callback){
		var ajaxOptions = {
			url : apiUrl
		};
		self.userList.removeAll();
		var successCallback = function(data){
			if(data.success === "ok") {
				for(var key in data.users){
					var usrData = data.users[key];
					self.userList.push(new UserModel(usrData));
				}				
				if(callback !== undefined && typeof callback === "function"){
					callback(self.userList().length);
				}
				_displayBox();
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};

	function _displayBox(){
        $.magnificPopup.open({
			items: {
			    src: $("#" + self.controlId()),
			    type: 'inline'
			},
			modal: false
		});
	}
}
