var YesGlobal = YesGlobal || {};

(function($, ko, window, Y, undefined) {	

	function initZoomImageEvent(el){
		var src = el.data("zoom-image") ? el.data("zoom-image"): el.attr("src");
		var title = el.attr("title");
		var alt = el.attr("alt");

        el.on("click", function(){
            $.magnificPopup.open({
              items: {
                src: src
              },
              type: 'image'
            });
        });
	}
	function loadImage(imgsrc){
        el.on("click", function(){
            $.magnificPopup.open({
              items: {
                src: imgsrc
              },
              type: 'image'
            });
        });
	}

	function initSeemore(ele) {
		ele.expander({
            slicePoint: 150,
            widow: 2,
            expandSpeed: 100,
            expandText: '[...]',
            expandPrefix: ' ',
            userCollapseText: '[^^^]',
            userCollapsePrefix: ' ', 
            afterExpand: function(){
                ele.find(".readmore-details").css( { "display" : "inline" });
            }
        });
	}

	/*
	Custom KO Handlers
	*/
	function initBindingHanler(){
		ko.bindingHandlers.autoCompleteTag = {
		    init: function(element, valueAccessor, allBindingsAccessor) {
		        "use strict";
		        $(element).select2({
		            multiple: true,
		            minimumInputLength: 1,
		            query: function (query) {
		                Y.Utils.initStockList(function(queryData) {
		                    var data = { results : [] };
		                    ko.utils.arrayForEach(queryData, function(t) {
		                        if(t.code.toUpperCase().indexOf(query.term.toUpperCase()) >= 0){
		                            data.results.push({ id: t.code, text: t.code });
		                        }
		                    });
		                    query.callback(data);
		                });                
		            },
		            formatResult: function(item) { return item.text },
		            formatSelection: function(item) { return item.text },
		            initSelection : function (element, callback) {
		                var data = [];
		                var value = $(element).val();
		                if(value){
		                    var tags = value.split(",");
		                    ko.utils.arrayForEach(tags, function(t){
		                        data.push({ id : t, text: t });
		                    });
		                }
		                callback(data);
		            }
		        });

		    },
		    update: function(element) {
		        "use strict";
		        $(element).trigger("change");
		    }
		};
		ko.bindingHandlers.executeOnEnter = {
		    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var allBindings = allBindingsAccessor();
		        $(element).keypress(function (e) {
		            var keyCode = (e.which ? e.which : e.keyCode);
		            if (keyCode === 13) {
		            	e.preventDefault();
		                return allBindings.executeOnEnter.call(viewModel, viewModel, element);
		            }
		            return true;
		        });
		    }
		};
		ko.bindingHandlers.link = {
		    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var options = valueAccessor();
		        var href = Y.Routing.generate(options.route, options.params);
		        $(element).attr('href', href);
		        var textValue = ko.utils.unwrapObservable(options.text);
		        var titleValue = ko.utils.unwrapObservable(options.title);
		        if(textValue){
		            $(element).html(textValue);
		        }
		        if(titleValue){
		            $(element).attr('title', titleValue);    
		        }
		        if(options.isNewTab){
		            $(element).attr('target', '_blank');
		        }
		    },
		    update: function (element, valueAccessor, allBindingsAccessor, viewModel) {
		        var options = valueAccessor();
		        var textValue = ko.utils.unwrapObservable(options.text);
		        var titleValue = ko.utils.unwrapObservable(options.title);
		        if(textValue){
		            $(element).html(textValue);
		        }
		        if(titleValue){
		            $(element).attr('title', titleValue);    
		        }        
		    }
		}
		ko.bindingHandlers.timeAgo = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor();
		        var timeValue = ko.utils.unwrapObservable(value);
		        if (timeValue) {
		            $(element).text(Y.Utils.convertToTimeAgo(timeValue));
		            $(element).attr('title', Y.Utils.convertDateToString(timeValue, "LLLL"));
		        } else {
		            $(element).text('-');
		        }
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor();
		        var timeValue = ko.utils.unwrapObservable(value);
		        if (timeValue) {
		            $(element).text(Y.Utils.convertToTimeAgo(timeValue));
		            $(element).attr('title', Y.Utils.convertDateToString(timeValue, "LLLL"));
		        } else {
		            $(element).text('-');
		        }
		    }
		};
		ko.bindingHandlers.dateTimeText = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor(), allBindings = allBindingsAccessor();
		        var dateFormat = allBindings.dateFormat || "LLLL";
		        var dateValue = ko.utils.unwrapObservable(value);
		        if (dateValue) {
		            $(element).text(Y.Utils.convertDateToString(dateValue, dateFormat));
		            $(element).attr("title", Y.Utils.convertDateToString(dateValue, dateFormat));
		        } else {
		            $(element).text('-');
		        }
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var value = valueAccessor(), allBindings = allBindingsAccessor();
		        var dateFormat = allBindings.dateFormat || "LLLL";
		        var dateValue = ko.utils.unwrapObservable(value);
		        if (dateValue) {
		            $(element).text(Y.Utils.convertDateToString(dateValue, dateFormat));
		        } else {
		            $(element).text('-');
		        }
		    }
		};
		ko.bindingHandlers.seeMore = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        initSeemore($(element));
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        initSeemore($(element));
		    }
		};
		ko.bindingHandlers.autoSize = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        $(element).autosize();
		        $(element).on(Y.Constants.Triggers.INPUT_CONTENT_CHANGED, function() {
		        	$(element).trigger("autosize.resize");
		        });
		    }
		};
		ko.bindingHandlers.mention = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var observableAttr = valueAccessor();
		        $(element).mentionsInput({
		            onDataRequest: function (mode,currentMentionCollection,queryObj,callback) {
		                var query = queryObj.queryString;
		                var firstCharacter = queryObj.firstCharacter;
		                if(firstCharacter === "@") {
		                    Y.Utils.initUserListForTag(function(queryData){
		                        result = _.filter(queryData, function(item) {
		                            if(currentMentionCollection !== null && currentMentionCollection.length > 0) {
		                                var checkExisted = _.find(currentMentionCollection, function(tempItem){
		                                    return (item.id === tempItem.id);
		                                });
		                                if(checkExisted)
		                                    return false;
		                            }                   
		                            return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1;
		                        });
		                        callback.call(this, _.first(result, 5));
		                    });
		                    return;
		                } 
		                if(firstCharacter === "$") {
		                    Y.Utils.initStockList(function(queryData){
		                        result = _.filter(queryData, function(item) {
		                            if(currentMentionCollection !== null && currentMentionCollection.length > 0) {
		                                var checkExisted = _.find(currentMentionCollection, function(tempItem){
		                                    return (item.code === tempItem.id);
		                                });
		                                if(checkExisted)
		                                    return false;
		                            }                   
		                            return item.code.toLowerCase().indexOf(query.toLowerCase()) > -1;
		                        });
		                        var lastResult = _.map(_.first(result, 5), function(obj) {
		                            return {
		                                id : obj.code,
		                                name: obj.code,
		                                wall: yRouting.generate("StockPage", { stock_code : obj.code }),
		                                type: "stock",
		                                avatar : "image/stock_icon.png"
		                            }
		                        });
		                        callback.call(this, lastResult);
		                    });
		                    return;
		                }        
		            },
		            onMentionChanged: function(){
		                var content = $(element).mentionsInput("getHtmlContent");
		                observableAttr(content);
		            },
		            fullNameTrigger: false
		        });
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var observableAttr = valueAccessor();
		        if(observableAttr().length === 0){
		            $(element).mentionsInput("reset");
		            $(element).height(35).focus();
		        }
		    }
		};
		ko.bindingHandlers.zoomImageInContent = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var imgList = $(element).find("img");
		        imgList.each(function(){
		            initZoomImageEvent($(this));
		        });
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var value = ko.utils.unwrapObservable(valueAccessor());
		        var imgList = $(element).find("img");
		        imgList.each(function(){
		            initZoomImageEvent($(this));
		        });
		    }
		};
		ko.bindingHandlers.loadImage = {
		    init: function (element, valueAccessor, allBindingsAccessor) {
		        var image = ko.utils.unwrapObservable(valueAccessor());
		        loadImage(image);
		    },
		    update: function (element, valueAccessor, allBindingsAccessor) {
		        var image = ko.utils.unwrapObservable(valueAccessor());
		        loadImage(image);
		    }
		};
		ko.bindingHandlers.uploader = new Y.Uploader();
	}
	
	initBindingHanler();
	//End KO custom handlers	
	
})(jQuery, ko, window, YesGlobal);