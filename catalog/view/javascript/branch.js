function NewsViewModel(options) {
	var self = this;
	self.id = ko.observable(options.Id);
	self.canLoadMore = ko.observable(options.canLoadMore || false);
	self.isLoadingMore = ko.observable(false);
	self.isLoadSuccess = ko.observable(false);
	self.newsList = ko.observableArray([]);
	self.currentPage = ko.observable(1);
	self.urls = options.urls || [];
	var mainContent = $("#y-main-content");
	var root = $("#y-content");

	this.loadMore = function(){
		if(!self.canLoadMore() || self.isLoadingMore()) return;

		self.isLoadingMore(true);
		self.currentPage(self.currentPage() + 1);
		_loadNews(function(data){
			self.isLoadingMore(false);
			root.scrollLeft(root.scrollLeft() + 2*ConfigBlock.MIN_NEWS_WIDTH);
			if(data.canLoadMore !== undefined) {
				self.canLoadMore(data.canLoadMore);
			}
		});
	};

	//Private functions:
	function _adjustLayout(){
		var widthBlock = 0;
		var newsContainer = $("#" + self.id());
		var oldWidth = newsContainer.outerWidth();
		var oldMainWidth = mainContent.outerWidth();
		var heightContent = newsContainer.find(".block-content").height();
		var heightHeader  = newsContainer.find(".block-header").height();
		var newsItem = newsContainer.find(".post-item");
		var blockNew = newsContainer.find(".branch-info");
		if(blockNew.length > 0){
			//blockNew.width(ConfigBlock.MIN_FIRST_COLUMN);
			blockNew.height(heightContent);
			blockNew.css({
				//'margin-right' : '15px',//ConfigBlock.MARGIN_POST_PER_COLUMN + 'px',
				'opacity' : '1'
			});
		}
		if(newsItem.length === 0){
			widthBlock = 120;
		}else{
			newsItem.each(function(){
				var loaded = $(this).hasClass("loaded");
				if(!loaded) {
					$(this).addClass("loaded");
					$(this).addClass("adding");
					//$(this).width(ConfigBlock.MIN_NEWS_WIDTH);
					$(this).height(heightContent - 30);
					var postHeader = $(this).children('.post_header');
					var postBody   = $(this).children('.post_body');
					var postTitle  = postBody.children('.post_title');
					var postImg    = postBody.children('.post_image');
					var postTextRaw = postBody.children('.post_text_raw');
					var imgInTextRaw = postTextRaw.find('img');
					postBody.height($(this).height() - postHeader.height());
					if(postTitle.length > 0){
						postImg.height(postBody.height()*0.6);
					}else {
						postImg.height(postBody.height()*0.7);
					}
					var maxHeightText = postBody.height() - postTitle.height() - postImg.height() - 15;
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
						//'margin-right': '15px',//ConfigBlock.MARGIN_POST_PER_COLUMN + 'px',
						'margin-bottom' : '0px'
					});
				}
				widthBlock += $(this).outerWidth() + 15;//ConfigBlock.MARGIN_POST_PER_COLUMN;
			});
		}
		newsContainer.width(widthBlock + blockNew.outerWidth() + 15);//ConfigBlock.MARGIN_POST_PER_COLUMN);
		mainContent.width(oldMainWidth - oldWidth + newsContainer.outerWidth());
		mainContent.css("display", "block");
		root.getNiceScroll().onResize();

		//Add effect:
		setTimeout(function(){
			newsContainer.find(".adding").removeClass("adding");
		}, 1000);
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
			console.log(data);
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