// -----------------------------------
//  COMMON VIEW MODELs
// Declare viewModels using in Knockout lib
// -----------------------------------

function NewsTicker(options) {
    var self = this;
    var defaultTemplate = "<div class='row-fluid'><div class='span2 ticker-header hidden'><i class='icon-random' style='font-size: 12px;'></i>&nbsp;<h6 style='margin:0;' data-bind='text: title'>Hot news</h6></div><div class='span10'><ul class='news-ticker-container' data-bind='foreach: tickers'><li class='news-ticker'><span class='ticker-time' data-bind='timeAgo: created'></span><span class='ticker-info'><a data-bind=\"link: { text: title, title: title, route: \'PostPage\', params: { post_type : type, post_slug: slug } }\"></a></span></li></ul></div></div>";
    this.containerId = options.container || "#news-ticker-container";
    this.url = options.url;
    this.title = options.title || "Hot news";
    this.hasTitle = 1;
    this.tickers = ko.observableArray([]);

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
		$(self.containerId).find(".ticker-header").removeClass("hidden");
        $(self.containerId).find('.news-ticker-container').makeCustomScroll();
    }

    function init(){
    	var container = $(self.containerId); 	
    	container.append(defaultTemplate);
    	ko.applyBindings(self, container[0]);

		loadNews();
    }

    init();
}