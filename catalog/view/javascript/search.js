(function($, ko, document, undefined) {
	function QuickSearchViewModel(params) {
        var that = this;
        that.results = ko.observableArray([]);
        that.query = ko.observable("");
        that.queryType = ko.observable("friend");
        that.minimumInputLength = ko.observable(1);
        that.searchInprocessing = ko.observable(false);

        that.query.subscribe(function(){
            that.search();
        });
        that.search = function(){
            //Ignore if search in process:
            if(that.searchInprocessing()) return;
            
            var queryString = that.query();
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
                results.removeAll();
            }
            var failCallback = function() {
                hideLoading();
            }
            var successCallback = function(data) {
                var formatedData = formatResult(data);
                that.results(formatedData);
                hideLoading();

                if(callback && typeof callback === "function") {
                    callback(data);
                }
            }
            YesGlobal.Utils.ajaxCall(ajaxOptions, beforeCallback, successCallback, failCallback);
        }
        function formatResult(data) {
            return data;
        }
        function showLoading(){
            that.searchInprocessing(true);
        }
        function hideLoading(){
            that.searchInprocessing(false);
        }
    };
	function QuickSearch (options) {
	    if(options.element === undefined || options.element === null || options.element.length === 0) return;

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
		window.quickSearch = new QuickSearch(options);
	});
}(jQuery, ko, document));

