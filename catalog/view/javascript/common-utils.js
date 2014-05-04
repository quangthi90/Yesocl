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
        dataType: "json"
    },
    pagingOptions:{
        pageSize : 10
    },
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
                if(beforeCallback !== undefined && typeof beforeCallback === "function"){
                    beforeCallback();
                }
            },
            success: function (data) {
                if(successCallback !== undefined && typeof successCallback === "function"){
                    successCallback(data);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                if(failCallback !== undefined && typeof failCallback === "function"){
                    failCallback(errorThrown);
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
        var friendList = window.yListFriends || [];
        if(friendList.length > 0){
            callback(friendList);
        }else {
            var ajaxOptions = {
                url: window.yRouting.generate('GetAllFriends'),
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
    }
};

//KO custom handlers:
ko.bindingHandlers.select2 = {
    init: function(element, valueAccessor, allBindingsAccessor) {
        "use strict";
        var obj = valueAccessor(),
            allBindings = allBindingsAccessor(),
            lookupKey = allBindings.lookupKey;
        $(element).select2(obj);
        if (lookupKey) {
            var value = ko.utils.unwrapObservable(allBindings.value);
            $(element).select2("data", ko.utils.arrayFirst(obj.data.results, function(item) {
                return item[lookupKey] === value;
            }));
        }
 
        ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
            $(element).select2("destroy");
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
        } else {
            $(element).text('-');
        }
    },
    update: function (element, valueAccessor, allBindingsAccessor) {
        var value = valueAccessor();
        var timeValue = ko.utils.unwrapObservable(value);
        if (timeValue) {
            $(element).text(YesGlobal.Utils.convertToTimeAgo(timeValue));
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
        var value = valueAccessor();
        if(value().length === 0){
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
                  type: 'image',
                  verticalFit: true,
                  retina: {
                    ratio: 2
                  }
                });
            });
        });
    }
}