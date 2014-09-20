// -----------------------------------
//  COMMON VIEW MODELs
// Declare viewModels using in Knockout lib
// -----------------------------------

function NewsTicker(options) {
    var self = this;
    var defaultTemplate = "<ul class='news-ticker-container' data-bind='foreach: tickers'><li class='news-ticker'><span class='ticker-time' data-bind='dateTimeText: created, dateFormat:\"h:mm\"'></span><span class='ticker-info'><a data-bind=\"link: { text: title, title: title, route: \'PostPage\', params: { post_type : type, post_slug: slug } }\"></a></span></li></ul>";
    this.containerId = options.container || "#news-ticker-container";
    this.url = options.url;
    this.hasTitle = 1;
    this.tickers = ko.observableArray([]);

    //Test
    /*
    var item1 = { title: 'Test Test Test Test Test Test Test Test Test 1', slug:'test', type:'branch', created: 1402124813 };
    var item2 = { title: 'Test Test Test Test Test Test Test Test Test  2', slug:'test', type:'branch', created: 1402124813 };
    var item3 = { title: 'Test Test Test Test Test Test Test Test Test  3', slug:'test', type:'branch', created: 1402124813 };
    var item4 = { title: 'Test Test Test Test Test Test Test Test Test  4', slug:'test', type:'branch', created: 1402124813 };
    var item5 = { title: 'Test Test Test Test Test Test Test Test Test  5', slug:'test', type:'branch', created: 1402124813 };
    var item6 = { title: 'Test Test Test Test Test Test Test Test Test  6', slug:'test', type:'branch', created: 1402124813 };
    this.tickers.push(item1);
    this.tickers.push(item2);
    this.tickers.push(item3);
    this.tickers.push(item4);
    this.tickers.push(item5);
    this.tickers.push(item6);
    */

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