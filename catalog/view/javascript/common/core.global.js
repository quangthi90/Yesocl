var YesGlobal = YesGlobal || {};

(function($, ko, window, Y, undefined) {

	Y.Widgets = {};
	Y.GlobalKoModel = {};
	Y.CurrentUser = {};
	Y.Routing = {};

	Y.Caches = {
	    StockList: [],
	    UsersCanTag: [],
	    CurrentPost: null
	};

	Y.Constants = {
		Messages: {
			COMMON_CONFIRM : "Are you sure you want to do this selection ?"
		},
		Triggers: {
			MENU_VISIBILITY_CHANGED: "MENU_VISIBILITY_CHANGED",
			POST_LOADED: "POST_LOADED"
		},
		SettingKeys : {
			SHOW_LEFT_SIDEBAR : "SHOW_LEFT_SIDEBAR",
			SHOW_RIGHT_SIDEBAR : "SHOW_RIGHT_SIDEBAR"
		}
	};

	Y.Configs = {
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
	    defaultBindingElement : "y-content"
	};

	Y.Utils = {
	    ajaxCall : function(options, beforeCallback, successCallback, failCallback) {
	        "use strict";

	        var settings = $.extend( {}, Y.Configs.ajaxOptions, options);

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
	                    $("body").addClass("loading");
	                }
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
	            }, 
	            complete: function(){
	            	if(settings.showLoading){
	                    $("body").removeClass("loading");
	                }
	            }
	        });
	    },
	    getLocalCache: function(){
	    	var cacher = new Y.CacheManager(true);
	    	if(!cacher.isSupportStorage()){
	    		return null;
	    	}
	    	return cacher;
	    },
	    getSessionCache: function(){
	    	var cacher = new Y.CacheManager(false);
	    	if(!cacher.isSupportStorage()){
	    		return null;
	    	}
	    	return cacher;
	    },
	    getSetting: function(settingKey){
	    	var cacher = Y.Utils.getLocalCache();
	    	if(cacher == null)
	    		return undefined;
	    	var value = cacher.getItem(settingKey);
	    	return value ? value : false;
	    },
	    saveSetting: function(settingKey, value){
	    	var cacher = Y.Utils.getLocalCache();
	    	if(cacher == null)
	    		return;
	    	cacher.setItem(settingKey, value);
	    },
	    showInfoMessage: function(message, callback) {
	        if(message === undefined || message === null || message.length === 0){
	            return;
	        }
	        bootbox.dialog({
	            message: message,
	            title: "Info",
	            className: "y-modal",
	            backdrop: true,
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
	            },
	            onEscape: function(){
	            	if(callback && typeof callback === "function"){
                        callback();
                    }
	            }
	        });
	    },
	    showConfirmMessage: function(message, okCallback, cancelCalback) {
	        if(message === undefined || message === null || message.length === 0){
	            return;
	        }
	        bootbox.dialog({
	            message: message,
	            title: "Confirm",
	            backdrop: true,
	            buttons: {
	                ok: {
	                    label: "OK",
	                    className: "btn-primary",
	                    callback: function() {
	                        if(okCallback && typeof okCallback === "function"){
	                            okCallback();
	                        }
	                    }
	                },
	                cancel: {
	                    label: "Cancel",
	                    className: "btn-default",
	                    callback: function() {
	                        if(cancelCalback && typeof cancelCalback === "function"){
	                            cancelCalback();
	                        }
	                    }
	                }
	            },
	            onEscape: function(){
	            	if(cancelCalback && typeof cancelCalback === "function"){
                        cancelCalback();
                    }
	            }
	        });
	    },
	    initStockList: function(callback) {
	        if(Y.Caches.StockList && Y.Caches.StockList.length > 0){
	            callback(Y.Caches.StockList);
	        }else {
	            var ajaxOptions = {
	                url: Routing.generate('ApiGetAllStocks'),
	                async: false
	            };
	            var successCallback = function(data){
	                if(data.success === "ok"){
	                    Y.Caches.StockList = data.stocks;
	                    callback(data.stocks);    
	                }else {
	                    callback([]);
	                }
	            }
	            Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	        }
	    },
	    initFriendList: function(callback) {
	        if(window.yListFriends){
	            callback(window.yListFriends);
	        }else {
	            var ajaxOptions = {
	                url: Routing.generate('ApiGetAllFriends'),
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
	            Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	        }
	    },
	    initUserListForTag: function(callback) {
	        if(Y.Caches.UsersCanTag && Y.Caches.UsersCanTag.length > 0){
	            callback(Y.Caches.UsersCanTag);
	        }else {
	            var apiUrl = "";
	            if(Y.Caches.CurrentPost == null){
	                apiUrl = Routing.generate('ApiGetAllFriends');
	            }else {
	                apiUrl = Routing.generate("ApiGetCommentTags", {
	                    post_type : Y.Caches.CurrentPost ? Y.Caches.CurrentPost.type : "",
	                    post_slug: Y.Caches.CurrentPost ? Y.Caches.CurrentPost.slug : ""
	                });
	            }
	            var ajaxOptions = {
	                url: apiUrl,
	                async: false
	            };
	            var successCallback = function(data) {
	                if(data.success === "ok") {
	                    if(Y.Caches.CurrentPost == null){
	                        Y.Caches.UsersCanTag = data.friends;
	                    }else {
	                        Y.Caches.UsersCanTag = data.users;    
	                    }
	                    callback(Y.Caches.UsersCanTag);                    
	                } else {
	                    callback([]);
	                }
	            }
	            Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	        }
	    },
	    getKoContext: function(eleId){
	        if(eleId !== undefined){
	            return ko.contextFor(document.getElementById(eleId));
	        }
	        return ko.contextFor(document.getElementById(Y.Configs.defaultBindingElement));
	    },
	    getWidgetModel: function(widgetName) {
	    	for(var key in Y.GlobalKoModel) {
	    		var model = Y.GlobalKoModel[key];
	    		if(model.uniqueName && model.uniqueName === widgetName)
	    			return model;
	    	}
	    	return null;
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

	Y.CacheManager = function(isLocalMode){
	    var that = this;
	    that.cachePointer = isLocalMode ? localStorage : sessionStorage;

	    that.isSupportStorage = function(){
	        return typeof(Storage) !== "undefined";
	    };
	    that.getItem = function(key){
	        return that.cachePointer.getItem(key);
	    };
	    that.setItem = function(key, value){
	        that.cachePointer.setItem(key, value);
	    };
	    that.removeItem = function(key){
	        that.cachePointer.removeItem(key);
	    };
	    that.clearCache = function(){
	        that.cachePointer.clear();
	    };
	};

	Y.HashTable = function(obj) {
	    this.length = 0;
	    this.items = {};
	    for (var p in obj) {
	        if (obj.hasOwnProperty(p)) {
	            this.items[p] = obj[p];
	            this.length++;
	        }
	    }
	    //Add new item to hashtable
	    this.setItem = function(key, value)
	    {
	        var previous = undefined;
	        if (this.hasItem(key)) {
	            previous = this.items[key];
	        }
	        else {
	            this.length++;
	        }
	        this.items[key] = value;
	        return previous;
	    }
	    //Get existed item by key
	    this.getItem = function(key) {
	        return this.hasItem(key) ? this.items[key] : undefined;
	    }
	    //Check whether item has key existed 
	    this.hasItem = function(key)
	    {
	        return this.items.hasOwnProperty(key);
	    }   
	    //Remove existed item from hastable
	    this.removeItem = function(key)
	    {
	        if (this.hasItem(key)) {
	            previous = this.items[key];
	            this.length--;
	            delete this.items[key];
	            return previous;
	        }
	        else {
	            return undefined;
	        }
	    }
	    //Return list of keys of hashtable
	    this.keys = function()
	    {
	        var keys = [];
	        for (var k in this.items) {
	            if (this.hasItem(k)) {
	                keys.push(k);
	            }
	        }
	        return keys;
	    }
	    //Return list of values of hashtable
	    this.values = function()
	    {
	        var values = [];
	        for (var k in this.items) {
	            if (this.hasItem(k)) {
	                values.push(this.items[k]);
	            }
	        }
	        return values;
	    }
	    //Foreach implement
	    this.each = function(fn) {
	        for (var k in this.items) {
	            if (this.hasItem(k)) {
	                fn(k, this.items[k]);
	            }
	        }
	    }
	    //Clear hashtable
	    this.clear = function()
	    {
	        this.items = {}
	        this.length = 0;
	    }
	};

	Y.RoutingManager = function(routingData) {
	    var that = this;
	    this.routing = new Y.HashTable();
	    
	    for ( var key in routingData ){
	        that.routing.setItem( key, routingData[key] );
	    }
	    
	    // Generate url by name & params
	    this.generate = function(name, params, method)
	    {
	        if ( typeof method == 'undefined' ){
	            method = '';
	        }
	        var url = this.routing.getItem(name);
	        
	        for ( var key in params ){
	            if ( params[key] == '' ) continue;
	            url = url.replace( '{' + key + '}', params[key] );
	        }
	        url = url.replace( new RegExp("/{[A-Za-z0-9_]+}", "g"), "" );

	        return $('base').attr('href') + method + url;
	    };
	};
})(jQuery, ko, window, YesGlobal);