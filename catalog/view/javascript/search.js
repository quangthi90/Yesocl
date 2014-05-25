(function($, ko, document, undefined) {
	function QuickSearchViewModel(params) {
        var that = this;
        that.results = ko.observable({users: [],posts: [],stocks: []});
        that.throttledValue = ko.observable("");
        that.queryType = ko.observable("friend");
        that.searchInprocessing = ko.observable(false);

        that.query = ko.computed(that.throttledValue).extend({ throttle: 500 });

        that.query.subscribe(function(value) {
            that.search(value);
        });

        that.search = function(queryString){
            //Ignore if search in process:
            if(that.searchInprocessing() || queryString.trim().length === 0) return;
            
            getData(queryString, function(){});
        };

        //Private:
        function getData(queryString, callback){
            var searchUrl = yRouting.generate("ApiSearchByKeyword", {
                keyword : queryString
            });
            var ajaxOptions = {
                url : searchUrl
            }
            var beforeCallback = function(){
                showLoading();
                that.results(formatResult(null));
            }
            var failCallback = function() {
                hideLoading();
            }
            var successCallback = function(data) {
            	if(data.success === "ok") {
            		that.results(formatResult(data.results));
            	}
                hideLoading();

                if(callback && typeof callback === "function") {
                    callback(data);
                }
            }
            YesGlobal.Utils.ajaxCall(ajaxOptions, beforeCallback, successCallback, failCallback);
        }
        function formatResult(data) {
        	if(data === null) {
        		return {
        			users: [],
        			posts: [],
        			stocks: []
        		}
        	}
        	return {
        		users: data.users,
    			posts: data.posts,
    			stocks: data.stocks
        	};
        }
        function showLoading(){
            that.searchInprocessing(true);
        }
        function hideLoading(){
            that.searchInprocessing(false);
        }
    };
	function QuickSearch (options) {
	    if(options.elementId === undefined || options.elementId === null || options.elementId.length === 0) return;
		
	    var self = this;
	    self.defaultTemplate = options.template || "quick-search-autocomplete";
	    self.elementId = options.elementId;
	    self.invokeElement = options.invokeElement || "#btn-search-invoke-on";
	    self.notIncluding = $('#y-header').find('.btn-header-not-search');

	    function init(){
	    	//Add events:
	    	$(self.invokeElement).on("click", function(e) {
				e.preventDefault();
				if($(this).hasClass('active')) {
					closeSearch();
					$(this).removeClass('active');
				}else {
					openSearch();
				}
			});
			self.notIncluding.on("click", function(){
				closeSearch();	
			});			
	        var viewModel = new QuickSearchViewModel({});
	        ko.applyBindings(viewModel, document.getElementById(self.elementId));
	    };
	    function closeSearch(){

	    }
	    function openSearch() {
	    }

	    init();
	}

	$(document).ready(function(){
		var options  = {
			elementId : "search-panel"
		};		
		window.QuickSearch = new QuickSearch(options);
	});
}(jQuery, ko, document));

