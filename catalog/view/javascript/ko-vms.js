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

					//Revert data to re-sort:
					if(self.cacheExchanges.length > 1){
						if(self.cacheExchanges[0][0] > self.cacheExchanges[1][0]) {
							self.cacheExchanges.reverse();
						}
					}
					if(self.cacheVolumes.length > 1){
						if(self.cacheVolumes[0][0] > self.cacheVolumes[1][0]) {
							self.cacheVolumes.reverse();
						}
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
	    options.plotOptions = {
	    	candlestick: {
	    		color: "red",
	    		upColor: "green",
	    		upLineColor: "green",
	    		tooltip: {
	    			headerFormat : '<span style="font-size: 10px; font-weight: bold;">{point.key}</span><br/>'
	    		}
	    	}
	    };
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
	    options.plotOptions = {
	    	candlestick: {
	    		color: "red",
	    		upColor: "green",
	    		upLineColor: "green",
	    		tooltip: {
	    			headerFormat : '<span style="font-size: 10px; font-weight: bold;">{point.key}</span><br/>'
	    		}
	    	}
	    }
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
	self.currentPage = ko.observable(1);
	self.newsList = ko.observableArray([]);
	self.isLoadSuccess = ko.observable(false);
	self.isLoadingMore = ko.observable(false);
	self.hasNewPost = ko.observable(options.hasNewPost || false);
	self.validate = options.validate || null;
	self.getAdditionalInfo = options.getAdditionalInfo || null;
	self.clearData = options.clearData || null;
	self.fillData = options.fillData || null;
	self.urls = options.urls || [];
	self.currentPost = ko.observable(null);
	var mainContent = $("#y-main-content");
	var root = $("#y-content");

	this.loadMore = function(){
		if(!self.canLoadMore() || self.isLoadingMore()) return;

		self.isLoadingMore(true);
		self.currentPage(self.currentPage() + 1);
		_loadNews(function(data){
			self.isLoadingMore(false);
			root.scrollLeft(root.scrollLeft() + 2*ConfigBlock.MIN_NEWS_WIDTH);
		});
	};

	this.addStatus = function(){
		var postData = _collectData(false);
		_addPost(postData, function(){
			_clearAfterAdding(false);
		});
	};

	this.saveAdvancePost = function() {
		if(self.currentPost() != null){
			self.updateAdvancePost();
		}else {
			self.addAdvancePost();
		}
	};

	this.addAdvancePost = function(){
		var postData = _collectData(true);
		_addPost(postData, function(data){
			_clearAfterAdding(true);
		});
	};

	this.updateAdvancePost = function() {
		var newData = _collectData(true);
		_savePost(newData, function(data){
			_clearAfterAdding(true);
		});
	};

	this.startEditPost = function(post) {
		self.currentPost(post);
		_openAdvancePost(function() {
			_fillInDataForEdit(post);
		});
	};

	this.deletePost = function(post) {
		bootbox.dialog({
            title: sConfirm,
            message: 'Are you sure you want to remove this post ?',
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
                    	_deletePost(post, function(){  });
					}
                }
            }
        });
	};

	this.resetAdvancePost = function(){
		_clearAfterAdding(true);
	}

	this.openAdvancePost = function(){
		_clearAfterAdding(true);
		self.currentPost(null);
		_openAdvancePost();
	}

	this.closeAdvancePost = function(){
		_clearAfterAdding(true);
		$.magnificPopup.close();
	}

	this.resetPost = function() {
		_clearPost();
		_initNews();
	}

	//Private functions:
	function _adjustLayout(){
		var widthBlock = 0;
		var newsContainer = $("#" + self.id());
		var oldWidth = newsContainer.outerWidth();
		var oldMainWidth = mainContent.outerWidth();
		var heightContent = newsContainer.find(".block-content").height();
		var heightHeader  = newsContainer.find(".block-header").height();
		var newsItem = newsContainer.find(".news-item");
		var blockNew = newsContainer.find(".news-creating-container");
		if(blockNew.length > 0){
			blockNew.width(ConfigBlock.MIN_FIRST_COLUMN);
			blockNew.height(heightContent - heightHeader + 30);
			blockNew.css({
				'margin-right' : ConfigBlock.MARGIN_POST_PER_COLUMN + 'px',
				'opacity' : '1'
			});
			var input = blockNew.find(".post_input");
			input.css({ "max-height" : blockNew.height()*4/11 + "px", "padding-bottom" : "30px" });
		}
		if(newsItem.length === 0){
			widthBlock = 120;
		}else{
			newsItem.each(function(){
				var loaded = $(this).hasClass("loaded");
				if(!loaded) {
					$(this).addClass("loaded");
					$(this).addClass("adding");
					$(this).width(ConfigBlock.MIN_NEWS_WIDTH);
					$(this).height(heightContent - heightHeader);
					var postHeader = $(this).children('.post_header');
					var postBody   = $(this).children('.post_body');
					var postTitle  = postBody.children('.post_title');
					var postImg    = postBody.children('.post_image');
					var postTextRaw = postBody.children('.news-short-content');
					var imgInTextRaw = postTextRaw.find('img');
					postBody.height($(this).height() - postHeader.height());
					if(postTitle.length > 0){
						postImg.css("max-height", postBody.height()*0.6 + "px");
					}else {
						postImg.css("max-height", postBody.height()*0.7 + "px");
					}
					var maxHeightText = postBody.height() - (postTitle.length > 0 ? postTitle.height() : 30) - postImg.height();
					postTextRaw.height(Math.floor(maxHeightText/20)*20);
					if(imgInTextRaw.length > 0) {
						imgInTextRaw.hide(0);
					}
					postTextRaw.truncate({
					    width: 'auto',
					    token: '&hellip;',
					    side: 'right',
					    multiline: true
					});
					$(this).css({
						'margin-right': ConfigBlock.MARGIN_POST_PER_COLUMN + 'px',
						'margin-bottom' : '0px'
					});
				}
				widthBlock += $(this).outerWidth() + ConfigBlock.MARGIN_POST_PER_COLUMN;
			});
		}
		newsContainer.width(widthBlock + blockNew.outerWidth() + ConfigBlock.MARGIN_POST_PER_COLUMN);
		mainContent.width(oldMainWidth - oldWidth + newsContainer.outerWidth());
		mainContent.css("display", "block");
		root.getNiceScroll().onResize();

		//Add effect:
		setTimeout(function(){
			newsContainer.find(".adding").removeClass("adding");
		}, 1000);
	}

	function _addPost(post, callback){
		var msgs = self.validate(post);
		if(msgs.length > 0) {
			return;
		}
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.postNews.name, self.urls.postNews.params),
			data: post
		};
		var successCallback = function(data){
			if(data.success === "ok" && data.post !== null){
				var newPost = new PostModel(data.post);
				self.newsList.unshift(newPost);
				_adjustLayout();
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		};
		//Close advance box:
		self.closeAdvancePost();

		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _savePost(post, callback){
		var msgs = self.validate(post);
		if(msgs.length > 0) {
			return;
		}
		var updateOptions = self.urls.updateNews.params;
		updateOptions.post_slug = self.currentPost().slug;
		updateOptions.post_type = self.currentPost().type;
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.updateNews.name, updateOptions),
			data: post
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				self.currentPost().title(data.post.title);
				self.currentPost().thumb(data.post.thumb ? data.post.thumb + "?" + (new Date().getTime()) : data.post.thumb);
				self.currentPost().image(data.post.image ? data.post.image + "?" + (new Date().getTime()) : data.post.image);
				self.currentPost().content(data.post.content);
				if(!self.currentPost().isOwner){
					self.currentPost().ownerHref(data.post.owner.href);
					self.currentPost().ownerName(data.post.owner.username);
				}
				self.currentPost().category.slug = data.post.category_slug;
				self.currentPost().stockTags(post.stockTags);
				self.currentPost().userTags(post.userTags);
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Close advance box:
		self.closeAdvancePost();

		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _deletePost(post, callback) {
		var ajaxOptions = {
			url: window.yRouting.generate("ApiDeletePost", {
				post_type: post.type,
				post_slug : post.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				self.newsList.remove(post);
				_adjustLayout();
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _clearAfterAdding(isAdvance){
		var newsContainer = $("#" + self.id());
		var containerElement = null;

		if(isAdvance){
			containerElement = $("#news-advance-post");
			containerElement.find("input.img-url").val("");
			var imgContainer = containerElement.find(".img-previewer-container");
			imgContainer.find(".drop-zone-show").show(0);
			imgContainer.find(".post_image_item").remove();
			containerElement.find("input.post-title-input").val("");
			containerElement.find("#post-adv-editor").code("");

			var tagStockControl = containerElement.find("input.autocomplete-tag-input");
			if(tagStockControl.length > 0){
				tagStockControl.select2("val", "");
			}
		}else {
			containerElement = newsContainer.find(".form-status");
			containerElement.find("input.img-url").val("");
			containerElement.find(".img-previewer-container").html("");
			containerElement.find(".post_input").mentionsInput("reset");
		}

		//Additional option function:
		if(self.clearData && typeof self.clearData === "function"){
			self.clearData();
		}
	}

	function _fillInDataForEdit(post) {
		var containerElement = $("#news-advance-post");
		var imgContainer = containerElement.find(".img-previewer-container");
		if(post.thumb()) {
			containerElement.find("input.img-url").val(post.thumb());
			imgContainer.find(".drop-zone-show").hide(0);
			var postImageItem = $("<div class='post_image_item'></div>");
			postImageItem.append('<img src="' + post.thumb() + '" class="img-uploaded"><span class="close"><i class="icon-remove"></i></span>');
			postImageItem.find("span.close").on("click", function(){
				$(this).parent().remove();
				containerElement.find("input.img-url").val("");
				imgContainer.find(".drop-zone-show").show(0);
			});
			imgContainer.append(postImageItem);
		} else {
			imgContainer.find(".drop-zone-show").show(0);
			imgContainer.find(".post_image_item").remove();
			containerElement.find("input.img-url").val("");
		}
		containerElement.find("input.post-title-input").val(post.title());
		containerElement.find("#post-adv-editor").code(post.content());

		var tagStockControl = containerElement.find("input.autocomplete-tag-input");
		if(tagStockControl.length > 0){
			tagStockControl.select2("val", post.stockTags());
		}

		//Additional option function:
		if(self.fillData && typeof self.fillData === "function"){
			self.fillData(post);
		}
	}

	function _openAdvancePost (openCallback) {
		var form = $("#news-advance-post").first();console.log(form.html())
        $.magnificPopup.open({
			items: {
			    src: form,
			    type: 'inline'
			},
			modal: true,
			callbacks: {
				open: function(){
					setTimeout(function(){
						form.find(".post-title-input").focus();
					}, 200);
					if(openCallback && typeof openCallback === "function") {
						openCallback();
					}
				}
			}
		});
	}

	function _loadNews(callback){
		var loadOptions = self.urls.loadNews.params;
		loadOptions.page = self.currentPage();
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.loadNews.name, loadOptions),
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
				if(data.canLoadMore !== undefined) {
					self.canLoadMore(data.canLoadMore);
				}
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

	function _collectData(isAdvance){
		var post = {
			isAdvance : isAdvance,
			thumb: "",
			title : "",
			content: "",
			userTags: [],
			stockTags: []
		};
		var containerElement = null;

		var newsContainer = $("#" + self.id());
		if(isAdvance){
			containerElement = $("#news-advance-post");
			post.thumb = containerElement.find("input.img-url").val();
			post.title = containerElement.find("input.post-title-input").val();

			var editorCode = containerElement.find("#post-adv-editor");
			post.content = editorCode.code();
			post.userTags = editorCode.getTags();

			var tagStockControl = containerElement.find("input.autocomplete-tag-input");
			post.stockTags = tagStockControl.length > 0 ? tagStockControl.select2("val") : [];
		}else {
			containerElement = newsContainer.find(".form-status");
			post.thumb = containerElement.find("input.img-url").val();
			post.content = containerElement.find(".post_input").mentionsInput("getHtmlContent");

			var tagInfo = _getTagInfo(containerElement.find(".post_input"));
			post.userTags = tagInfo.userTags;
			post.stockTags = tagInfo.stockTags;
		}

		if(self.getAdditionalInfo && typeof self.getAdditionalInfo === "function"){
			var info = self.getAdditionalInfo();
			if(info){
				$.extend(post, info);
			}
		}

		return post;
	}

	function _getTagInfo($ele){
		var tags = $ele.mentionsInput('getMentions');
		var userTags = [];
		var stockTags = [];

		ko.utils.arrayForEach(tags, function(t){
			if(t.type === "contact"){
				userTags.push(t.id);
			} else if(t.type === "stock") {
				stockTags.push(t.id);
			}
		});
		return {
			userTags: userTags,
			stockTags : stockTags
		};
	}

	function _clearPost(callback) {
		self.canLoadMore(false);
		self.newsList([]);
		_adjustLayout();
		self.currentPage(1);
		root.scrollLeft(0);
	}

	function _initNews(){
		if(self.canLoadMore()){
			root.scroll(function(){
				var rootWidth = $(this).width();
				if(root.scrollLeft() + rootWidth === root[0].scrollWidth - 20){
					self.loadMore();
				}
			});
		}
		//Delay for loading news:
		setTimeout(function(){
			self.isLoadSuccess(false);
			_loadNews();
		}, 300);
	}

	_initNews();
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
		YesGlobal.Caches.CurrentPost = postData;
		YesGlobal.Caches.UsersCanTag = [];
		self.commentList([]);
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
		self.needEffect(false);
		self.initComment.content("");
		self.commentList.removeAll();
		YesGlobal.Caches.CurrentPost = null;
		YesGlobal.Caches.UsersCanTag = [];
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
		var tagInfo = getTagInfo();
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPostComment", {
				post_type: self.postData.type,
				post_slug: self.postData.slug
			}),
			data: {
				content: content,
				userTags: tagInfo.userTags,
				stockTags: tagInfo.stockTags
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
		if (element.nodeType === 1) {
			if(self.needEffect()){
				$(element).addClass("deleting");
				$(element).fadeOut(1000, function(){
					$(this).remove();
				});
			}else {
				$(element).remove();
			}
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
			},
			showLoading: false
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
		content = content.replace(new RegExp("&nbsp;", 'g'), "");
        content = content.replace(new RegExp("<br>", 'g'), "");
        var temp = $("<div></div>");
        temp.html(content);
        if(temp.html().trim().length === 0) {
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
				self.closeCommentBox();
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
		control.find(".post_input").mentionsInput("reset");
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
	function getTagInfo(){
		var $ele = $("#" + self.controlId()).find('.post_input');
		var tags = $ele.mentionsInput('getMentions');
		var userTags = [];
		var stockTags = [];

		ko.utils.arrayForEach(tags, function(t){
			if(t.type === "contact"){
				userTags.push(t.id);
			} else if(t.type === "stock") {
				stockTags.push(t.id);
			}
		});
		return {
			userTags: userTags,
			stockTags : stockTags
		};
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

	self.title = ko.observable(params.title || '');
	self.defaultTitle = params.defaultTitle;
	self.controlId = ko.observable(params.Id || "user-list-box-wrapper");
	self.userList = ko.observableArray([]);

	self.showUserList = function(apiUrl, callback, title){
		var ajaxOptions = {
			url : apiUrl
		};
		self.userList.removeAll();
		if (title != '' && title != null && title != undefined) {
			self.title(title);
		}else {
			self.title(self.defaultTitle);
		}
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

function UserInfoColumnViewModel(params) {
	var self = this;

	this.isLogined = window.yUser != undefined ? true : false;
	this.isCurrentUser = this.isLogined ? params.wallUser.id === window.yUser.id : false ;
	this.wallUser = new UserModel(params.wallUser);

	setTimeout(function(){
		$("#wall-user-info-column").css({
			'opacity' : '1'
		})
	}, 1000);
}

function BranchInforModel(params){
	var self = this;
	self.userBoxTitle = params.userBoxTitle;
	self.branchSlug = ko.observable(params.branchSlug || '');
	self.memberCount = ko.observable(params.memberCount || 0);

	self.showMemberList = function(){
		var context = YesGlobal.Utils.getKoContext();
		if(context !== null){
			var apiUrl = yRouting.generate("ApiGetBranchMember", {
				branch_slug: self.branchSlug()
			});
			context.$root.userBoxModel.showUserList(apiUrl, function(count){
				if(count !== undefined){
					self.memberCount(count);
				}
			}, self.userBoxTitle);
		}else {
			console.log("Ko content not found !");
		}
	};
}

function PostStatisticsModel(options) {
	var self = this;
	self.id = options.id;
	self.width = ko.observable(options.width);
	self.currentPage = ko.observable(1);
	self.postList = ko.observableArray([]);
	self.urls = options.urls || [];
	self.currentPost = ko.observable(null);	
	self.isLoadSuccess = ko.observable(false);
	self.isLoadingMore = ko.observable(false);
	self.canLoadMore = ko.observable(true);
	self.times = ko.observableArray([]);
	self.types = ["user", "branch", "stock"];
	self.currentType = ko.observable("user");
	self.currentTime = ko.observable(0);
	self.totalPopularPost = ko.observable(0);
	self.userCaching = ko.observable(options.userCaching || false);

	var cacheManager = new YesGlobal.CacheManager(false);
	if(options.clearCacheWhenReload){
		cacheManager.clearCache();
	}

	self.times.subscribe(function(value){
		self.totalPopularPost(0);
		if(value){
			var total = 0;
			ko.utils.arrayForEach(self.times(), function(item){
				total += item.count;
			});
			self.totalPopularPost(total);
		}
	});
	
	self.loadMore = function() {
		if(!self.canLoadMore() || self.isLoadingMore()) return;

		self.isLoadingMore(true);
		self.currentPage(self.currentPage() + 1);
		_loadPosts(function(data){
			self.isLoadingMore(false);
		});
	};

	self.loadPosts = function(dataTime) {
		self.currentPage(1);
		self.currentTime(dataTime.time);
		_loadPosts(function(data){
		});
	};

	self.loadPopularPost = function(){
		self.currentPage(1);
		self.currentTime(0);
		_loadPosts(function(data){

		});
	};

	self.updateType = function(type){
		self.currentType(type);
		self.currentPage(1);
		_loadTimes(function(){
			self.currentTime(0);
			_loadPosts(function(data) {});
		});
	};

	//Private functions:
	function _adjustLayout(){
		var widthBlock = 0;
		var postContainer = $("#" + self.id).find(".post-container");
		var masonryHorizontal = postContainer.find(".masonry-horizontal");
		var postItems = postContainer.find(".post");
		
		if(postItems.length === 0){
			return;
		}

		//Layout:
		var heightPostItem = postItems.first().outerHeight();
		var widthPostItem = postItems.first().outerWidth();
		var numberRow = Math.floor(postContainer.height()/(heightPostItem + 15));
		var numberCol = Math.floor(postItems.length/numberRow) + 1;
		masonryHorizontal.width(numberCol * (widthPostItem + 15));
		
		//postContainer.scrollLeft(postContainer.scrollLeft() + 2*ConfigBlock.MIN_NEWS_WIDTH);
		var niceScrollInstance = postContainer.getNiceScroll();
		if(niceScrollInstance.length > 0){
			niceScrollInstance.onResize();
		}else {
			postContainer.niceScroll();	
		}
		
		postContainer.on("scroll", function() {
			var rootWidth = $(this).width();
			if(postContainer.scrollLeft() + rootWidth >= postContainer[0].scrollWidth - 30) {
				self.loadMore();
			}
		});
	}

	function _loadPosts(callback){
		//Turn off scroll event:
		 $("#" + self.id).find(".post-container").off("scroll");

		if(self.userCaching()){
			//Load from cache first:
			var cachedObject = _getPostFromCache();
			if(cachedObject != null) {
				self.currentPage(cachedObject.currentPage);
				self.canLoadMore(cachedObject.canLoadMore);
				self.postList.removeAll();
				ko.utils.arrayForEach(cachedObject.postList, function(p){
					var postItem = new PostModel(p);
					self.postList.push(postItem);
				});

				//End loading:
				_defaulAfterPostLoaded(callback, cachedObject.postList);
				return;
			}
		}

		var loadOptions = self.urls.loadNews.params;
		loadOptions.time = self.currentTime();
		loadOptions.page = self.currentPage();
		loadOptions.post_type = self.currentType();
		
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.loadNews.name, loadOptions),
			data : {
				limit : 10
			}
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.posts, function(p){
					var postItem = new PostModel(p);
					self.postList.push(postItem);
				});
				self.canLoadMore(data.canLoadMore || false);

				if(self.userCaching()) {
					//Save to cache:
					var cachedObject = _formatToCache(data.posts);
					cacheManager.setItem(cachedObject.key, JSON.stringify(cachedObject.value));	
				}
			}

			//End loading:
			_defaulAfterPostLoaded(callback, data);
		}

		//Reset params:
		self.isLoadSuccess(false);
		self.postList.removeAll();

		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _defaulAfterPostLoaded(callback, data){
		self.isLoadSuccess(true);
		_adjustLayout();

		if(callback && typeof callback === "function"){
			callback(data);
		}
	}

	function _loadTimes(callback) {
		if(self.userCaching()){
			//Load from cache first:
			var cachedObject = _getTimeFromCache();
			if(cachedObject != null) {
				self.times.removeAll();
				self.times(cachedObject);

				if(callback && typeof callback === "function"){
					callback(cachedObject);
				}

				return;
			}
		}

		var params = self.urls.loadTimes.params;
		params.post_type = self.currentType();

		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.loadTimes.name, params)
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				self.times(data.times);

				if(self.userCaching()){
					//Save to cache:
					var cachedObject = _formatTimeToCache(data.times);
					cacheManager.setItem(cachedObject.key, JSON.stringify(cachedObject.value));
				}
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _getPostFromCache(){
		var key = _getCachedKey();
		var value = cacheManager.getItem(key);
		if(value != null){
			return JSON.parse(value);
		}
		return null;
	}

	function _getTimeFromCache(){
		var value = cacheManager.getItem(_getTimeCachedKey());
		if(value != null)
			return JSON.parse(value);
		return null;
	}

	function _formatToCache(posts){
		return {
			key: _getCachedKey(),
			value: {
				postList : posts,
				currentPage : self.currentPage(),
				canLoadMore : self.canLoadMore()
			}
		};
	}

	function _formatTimeToCache(times){
		return {
			key: _getTimeCachedKey(),
			value : times
		};
	}

	function _getCachedKey() {
		return "st-" + self.currentType() + "-" + self.currentTime();
	}

	function _getTimeCachedKey(){
		return "st-" + self.currentType();
	}

	function _initNews() {
		//Delay for loading news:
		setTimeout(function(){
			self.isLoadSuccess(false);
			self.updateType("user");
			$(".post-filters").css("opacity", 1);
		}, 100);
	}

	_initNews();
};
