var YesGlobal = YesGlobal || {};
YesGlobal.Caches = {
    StockList: []
};

YesGlobal.Configs = {
    ajaxOptions : {
        url : "",
        type: "POST",
        cache: false,
        async : true,
        data: {},
        dataType: "json",
        showLoading : true
    },
    chartOptions: {
        defaultRangeSelector: {
            buttons: [{
                type: 'week',
                count: 1,
                text: '1w'
            }, {
                type: 'month',
                count: 1,
                text: '1m'
            }, {
                type: 'month',
                count: 3,
                text: '3m'
            }, {
                type: 'month',
                count: 6,
                text: '6m'
            }, {
                type: 'year',
                count: 1,
                text: '1y'
            }, {
                type: 'all',
                text: 'All'
            }],
            selected: 1,
            inputEnabled : true
        },
        defaultTooltip: {
            backgroundColor: "#F0F0F0",
            borderColor: "#DDDDDD",
            borderRadius: 0,
            borderWidth: 1,
            useHTML : true
        }
    },
    pagingOptions:{
        pageSize : 10
    },
    loadingElement : "#yes-loading-more",
    defaultBindingElement : "y-main-content"
};

YesGlobal.Utils = {
    ajaxCall : function(options, beforeCallback, successCallback, failCallback) {
        "use strict";

        var settings = $.extend( {}, YesGlobal.Configs.ajaxOptions, options);

        //Make ajax call:
        $.ajax({
            url: settings.url,
            type: settings.type,
            dataType: settings.dataType,
            data: settings.data,
            cache: settings.cache,
            async: settings.async,
            beforeSend: function () {
                if(settings.showLoading){
                    var ele = $(YesGlobal.Configs.loadingElement);
                    if(ele.hasClass("hidden")){
                        ele.removeClass("hidden");
                    }
                }
                if(beforeCallback !== undefined && typeof beforeCallback === "function"){
                    beforeCallback();
                }
            },
            success: function (data) {
                if(settings.showLoading){
                    var ele = $(YesGlobal.Configs.loadingElement);
                    ele.addClass("hidden");
                }
                if(successCallback !== undefined && typeof successCallback === "function"){
                    successCallback(data);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                if(settings.showLoading){
                    var ele = $(YesGlobal.Configs.loadingElement);
                    ele.addClass("hidden");
                }
                if(failCallback !== undefined && typeof failCallback === "function"){
                    failCallback(errorThrown);
                }
            }
        });
    },
    showMessage: function(data, callback) {
        var message = "";
        if(typeof data === "string") {
            message = data;
        }else if(typeof data === "object"){
            message = data.join("\n");
        }

        if(message.length === 0){
            return;
        }
        bootbox.dialog({
            message: message,
            title: "Information",
            buttons: {
                main: {
                    label: "Close",
                    className: "btn-primary",
                    callback: function() {
                        if(callback && typeof callback === "function"){
                            callback();
                        }
                    }
                }
            }
        });
    },
    initStockList: function(callback) {
        if(YesGlobal.Caches.StockList.length > 0){
            callback(YesGlobal.Caches.StockList);
        }else {
            var ajaxOptions = {
                url: window.yRouting.generate('ApiGetAllStocks'),
                async: false
            };
            var successCallback = function(data){
                if(data.success === "ok"){
                    YesGlobal.Caches.StockList = data.stocks;
                    callback(data.stocks);    
                }else {
                    callback([]);
                }
            }
            YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
        }
    },
    initFriendList: function(callback) {
        if(window.yListFriends){
            callback(window.yListFriends);
        }else {
            var ajaxOptions = {
                url: window.yRouting.generate('ApiGetAllFriends'),
                async: false
            };
            var successCallback = function(data){
                if(data.success === "ok"){
                    window.yListFriends = data.friends;                    
                    callback(data.friends);
                }else {
                    callback([]);
                }
            }
            YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
        }
    },
    getKoContext: function(eleId){
        if(eleId !== undefined){
            return ko.contextFor(document.getElementById(eleId));
        }
        return ko.contextFor(document.getElementById(YesGlobal.Configs.defaultBindingElement));
    },
    convertToTimeAgo: function(timeStamp){
        var dayWrapper = moment(new Date(timeStamp*1000));
        var diffY = moment().diff(dayWrapper, "years");
        if(diffY > 0){
            return dayWrapper.format("MMM Do YYYY");
        }
        var diffM = moment().diff(dayWrapper, "months");
        if(diffM <= 2){
            return dayWrapper.fromNow(true);
        }
        if(diffM > 2 && diffM < 12 && dayWrapper.toDate().getFullYear() === moment().toDate().getFullYear()) {
            return dayWrapper.format("MMM Do");
        }
        return dayWrapper.format("MMM Do YYYY");
    },
    convertDateToString: function(timeStamp, dateFormat){
        var dayWrapper = moment(new Date(timeStamp*1000));
        return dayWrapper.format(dateFormat);
    }
};

//KO custom handlers:
ko.bindingHandlers.autoCompleteTag = {
    init: function(element, valueAccessor, allBindingsAccessor) {
        "use strict";
        $(element).select2({
            multiple: true,
            minimumInputLength: 1,
            query: function (query) {
                YesGlobal.Utils.initStockList(function(queryData) {
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
        $(element).keypress(function (event) {
            var keyCode = (event.which ? event.which : event.keyCode);
            if (keyCode === 13) {
                return allBindings.executeOnEnter.call(viewModel, viewModel, valueAccessor, element);
            }
            return true;
        });
    }
};
ko.bindingHandlers.link = {
    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
        var options = valueAccessor();
        var href = window.yRouting.generate(options.route, options.params);
        $(element).attr('href', href);
        if(options.text){
            $(element).html(options.text);  
        }
        if(options.isNewTab){
            $(element).attr('target', '_blank');
        }
        if(options.title){
            $(element).attr('title', options.title);    
        }
    }
}
ko.bindingHandlers.timeAgo = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        var value = valueAccessor();
        var timeValue = ko.utils.unwrapObservable(value);
        if (timeValue) {
            $(element).text(YesGlobal.Utils.convertToTimeAgo(timeValue));
            $(element).attr('title', YesGlobal.Utils.convertDateToString(timeValue, "LLLL"));
        } else {
            $(element).text('-');
        }
    },
    update: function (element, valueAccessor, allBindingsAccessor) {
        var value = valueAccessor();
        var timeValue = ko.utils.unwrapObservable(value);
        if (timeValue) {
            $(element).text(YesGlobal.Utils.convertToTimeAgo(timeValue));
            $(element).attr('title', YesGlobal.Utils.convertDateToString(timeValue, "LLLL"));
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
            $(element).text(YesGlobal.Utils.convertDateToString(dateValue, dateFormat));
            $(element).attr("title", YesGlobal.Utils.convertDateToString(dateValue, dateFormat));
        } else {
            $(element).text('-');
        }
    },
    update: function (element, valueAccessor, allBindingsAccessor) {
        var value = valueAccessor(), allBindings = allBindingsAccessor();
        var dateFormat = allBindings.dateFormat || "LLLL";
        var dateValue = ko.utils.unwrapObservable(value);
        if (dateValue) {
            $(element).text(YesGlobal.Utils.convertDateToString(dateValue, dateFormat));
        } else {
            $(element).text('-');
        }
    }
};
ko.bindingHandlers.seeMore = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        $(element).expander({
            slicePoint: 100,
            widow: 2,
            expandSpeed: 100,
            expandText: '[...]',
            expandPrefix: ' ',
            userCollapseText: '[^^^]',
            userCollapsePrefix: ' ', 
            afterExpand: function(){
                $(element).find(".details").css("display", "inline");
            }
        });
    },
    update: function (element, valueAccessor, allBindingsAccessor) {
        $(element).expander({
            slicePoint: 100,
            widow: 2,
            expandSpeed: 100,
            expandText: '[...]',
            expandPrefix: ' ',
            userCollapseText: '[^^^]',
            userCollapsePrefix: ' ', 
            afterExpand: function(){
                $(element).find(".details").css("display", "inline");
            }
        });
    }
}
ko.bindingHandlers.mention = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        var observableAttr = valueAccessor();
        $(element).mentionsInput({
            onDataRequest: function (mode,currentMentionCollection,queryObj,callback) {
                var query = queryObj.queryString;
                var firstCharacter = queryObj.firstCharacter;
                if(firstCharacter === "@") {
                    YesGlobal.Utils.initFriendList(function(queryData){
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
                    YesGlobal.Utils.initStockList(function(queryData){
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
                observableAttr($(element).mentionsInput("getHtmlContent"));
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
}
ko.bindingHandlers.zoomImage = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        var imgList = $(element).find("img");
        imgList.each(function(){
            var src = $(this).attr("src");
            $(this).on("click", function(){
                $.magnificPopup.open({
                  items: {
                    src: src
                  },
                  type: 'image'
                });
            });
        });
    },
    update: function (element, valueAccessor, allBindingsAccessor) {
        var value = ko.utils.unwrapObservable(valueAccessor());
        var imgList = $(element).find("img");
        imgList.each(function(){
            var src = $(this).attr("src");
            $(this).on("click", function(){
                $.magnificPopup.open({
                  items: {
                    src: src
                  },
                  type: 'image'
                });
            });
        });
    }
}
ko.bindingHandlers.zoomInitImage = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        var image = ko.utils.unwrapObservable(valueAccessor());
        $(element).on("click", function(){
            $.magnificPopup.open({
              items: {
                src: image
              },
              type: 'image'
            });
        });
    },
    update: function (element, valueAccessor, allBindingsAccessor) {
        var image = ko.utils.unwrapObservable(valueAccessor());
        $(element).on("click", function(){
            $.magnificPopup.open({
              items: {
                src: image
              },
              type: 'image'
            });
        });
    }
}