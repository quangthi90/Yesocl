(function($, ko, document, undefined) {
	function QuickSearchViewModel(params) {
        var that = this;
        that.parentEle = params.parentEle;
        that.results = ko.observable({users: [],posts: [],stocks: []});
        that.throttledValue = ko.observable("");
        that.queryType = ko.observable("friend");
        that.searchInprocessing = ko.observable(false);

        that.query = ko.computed(that.throttledValue).extend({ throttle: 500 });

        that.query.subscribe(function(value) {
            that.search(value);
        });

        that.goSearchPage = function() {
        	var keyword = that.throttledValue();
			if(keyword.trim().length === 0) {
				return;
			}
			var url = yRouting.generate("SearchPage", {
				keyword : encodeURIComponent(keyword)
			});
			location.href = url;
        };

        that.handleEnter = function() {
        	var parentEle = $("#" + that.parentEle);
        	var selectingLink = parentEle.find(".result-column .result-data a.result-link.selecting").first();
        	if(selectingLink.length > 0) {
        		location.href = selectingLink.prop("href");
        	} else {
        		var keyword = that.throttledValue();
				if(keyword.trim().length === 0) {
					return;
				}
				var url = yRouting.generate("SearchPage", {
					keyword : encodeURIComponent(keyword)
				});
				location.href = url;
        	}	
        };

        that.search = function(queryString) {
            //Ignore if search in process:
            if(that.searchInprocessing() || queryString.trim().length === 0) return;
            
            getData(queryString, function(){
            	setTimeout(function(){
            		focusFirstResult();
            	}, 300);
            });
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
        	var lastResult = {
        		users: data.users,
    			posts: data.posts,
    			stocks: data.stocks
        	};
        	return lastResult;
        }
        function showLoading(){
            that.searchInprocessing(true);
        }
        function hideLoading(){
            that.searchInprocessing(false);
        }
        function focusFirstResult(){
        	var parentEle = $("#" + that.parentEle);
        	var links = parentEle.find(".result-column .result-data a.result-link");
        	var firstResult = parentEle.find(".result-column:first-child .result-data a.result-link:first-child").first();
        	if(firstResult.length > 0) {
        		links.removeClass("selecting");
        		firstResult.addClass("selecting");
        	}
        }
    };
	function QuickSearch (options) {
	    if(options.elementId === undefined || options.elementId === null || options.elementId.length === 0) return;
		
	    var self = this;
	    self.elementId = options.elementId;
	    self.invokeElement = options.invokeElement || "btn-search-invoke-on";
	    self.notIncluding = $('#y-header').find('.btn-header-not-search');

	    function init(){
	    	//Add events:
	    	$("#" + self.invokeElement).on("click", function(e) {
				e.preventDefault();
				if($(this).hasClass('active')) {
					closeSearch();
					$(this).removeClass('active');
				}else {
					openSearch();
					$(this).addClass('active');
				}
			});

			self.notIncluding.on("click", function(){
				closeSearch();
			});

			$(document).keyup(function(e) {
			  	if (e.keyCode === 27) { 
			  		closeSearch();
			  	}
			});

	        var viewModel = new QuickSearchViewModel({ parentEle : self.elementId });
	        ko.applyBindings(viewModel, document.getElementById(self.elementId));
	    };
	    function closeSearch(){
	    	var control = $("#" + self.elementId);
	    	control.slideUp(100, function()){
                
            };
	    }
	    function openSearch() {
	    	var control = $("#" + self.elementId);
	    	control.slideDown(function(){
                control.find(".input-search").focus();
            });
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

