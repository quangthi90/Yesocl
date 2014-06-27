// -----------------------------------
//  COMMON VIEW MODELs
// Declare viewModels using in Knockout lib
// -----------------------------------

function NewsTicker(options) {
    var self = this;
    var defaultTemplate = "<div class='ticker-header hidden'><i class='icon-random' style='font-size: 12px;'></i>&nbsp;<h6 style='margin:0;' data-bind='text: title'>Hot news</h6><span class='buttons'><a data-bind='click: playNext'><i class='icon-step-forward'></i></a></span></div><ul class='news-ticker-container' data-bind='foreach: tickers'><li class='news-ticker'><span class='ticker-time' data-bind='timeAgo: created'></span><span class='ticker-info'><a data-bind=\"link: { text: title, title: title, route: \'PostPage\', params: { post_type : type, post_slug: slug } }\"></a></span></li></ul>";
    this.containerId = options.container || "#news-ticker-container";
    this.url = options.url;
    this.maxShow = options.maxShow || 10;
    this.interval = options.interval || 10*60*1000;
    this.title = options.title || "Hot news";
    this.isPaused = ko.observable(false);
    this.hasTitle = 1;

    this.tickers = ko.observableArray([]);

    this.playNext = function(){
    	doTicker("moveNext");
    };

    this.pause = function(){
    	doTicker("pause");
    	self.isPaused(true);
    };

    this.resume = function(){
    	doTicker("unpause");
    	self.isPaused(false);
    };

	//Private menthods:
    function loadNews(){
    	var ajaxOptions = {
			url : self.url,
			data:{
				limit: self.maxShow,
                hasTitle: self.hasTitle
			}
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				self.tickers(data.posts);
				makeTicker();
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
    }

    function makeTicker(){
    	$(self.containerId).find(".news-ticker-container").newsTicker({
		    row_height: 30,
		    max_rows: 1,
		    speed: 600,
		    direction: 'down',
		    duration: 5000,
		    autostart: 1,
		    pauseOnHover: 1
		});
		$(self.containerId).find(".ticker-header").removeClass("hidden");
    }

    function doTicker(action, params) {
    	var tickerEle = $(self.containerId).find(".news-ticker-container");
    	if(tickerEle.length > 0){
    		tickerEle.newsTicker(action);
    	}
    }

    function init(){

    	var container = $(self.containerId); 	
    	container.append(defaultTemplate);
    	ko.applyBindings(self, container[0]);

		loadNews();
    }

    init();
}