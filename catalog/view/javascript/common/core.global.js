var YesGlobal = YesGlobal || {};

(function($, ko, window, Y, undefined) {

	Y.Widgets = {};
	Y.GlobalKoModel = {};
	Y.CurrentUser = {};
	Y.Routing = {};

	Y.Caches = {
	    StockList: [],
	    UsersCanTag: [],
	    FriendList: [],
	    CurrentPost: null
	};

	Y.Enums = {
		MessageStatus : {
			NONE: 0,
			SENDING: 1,
			SENT: 2,
			SEEN: 3,
			ERROR: 4
		}
	};

	Y.Constants = {
		Regexs: {
			TAG_REGEX: /@\[([^\]]+)\]\(([^:]+):([^:]+)\)/g
		},
		Messages: {
			COMMON_CONFIRM : "Are you sure you want to do this selection ?",
			DELETE_UPLOAD_FILE_CONFIRM : "Are you sure you want to remove uploaded files ?"
		},
		Triggers: {
			MENU_VISIBILITY_CHANGED : "MENU_VISIBILITY_CHANGED",
			INPUT_CONTENT_CHANGED : "INPUT_CONTENT_CHANGED",
			POST_LOADED : "POST_LOADED",
			NEW_MESSAGE_LOADED: "NEW_MESSAGE_LOADED",
			PUSHER_RECONNECTED: "PUSHER_RECONNECTED",
			CURRENT_USER_CHANGED: "CURRENT_USER_CHANGED",
			ELEMENT_REMOVED_BY_KO: "ELEMENT_REMOVED_BY_KO"
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
		setCurrentUser: function(user){
			Y.CurrentUser = user;
			$(window).trigger(Y.Constants.Triggers.CURRENT_USER_CHANGED);
		},
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
	                url: Y.Routing.generate('ApiGetAllStocks'),
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
	        if(Y.Caches.FriendList && Y.Caches.FriendList.length > 0){
	            callback(Y.Caches.FriendList);
	        }else {
	            var ajaxOptions = {
	                url: Y.Routing.generate('ApiGetAllTags'),
	                async: false
	            };
	            var successCallback = function(data){
	                if(data.success === "ok"){
	                    Y.Caches.FriendList = data.friends;                  
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
	                apiUrl = Y.Routing.generate("ApiGetAllTags");
	            }else {
	                apiUrl = Y.Routing.generate("ApiGetCommentTags", {
	                    post_type : Y.Caches.CurrentPost ? Y.Caches.CurrentPost.type : "",
	                    post_slug: Y.Caches.CurrentPost ? Y.Caches.CurrentPost.slug : ""
	                });
	            }
	            if(apiUrl.length === 0) {
	            	console.log("Route is invavlid !");
	            	return [];
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
	    parseTaggedText: function(text) {
	        var mentionItemRegex = /@\[([^\]]+)\]\(([^:]+):([^:]+)\)/;
			var match;
			var replaceText = "", link="";
			while(match = mentionItemRegex.exec(text)){
				var matchedText = match[0];
		        var value = match[1];
		        var type = match[2];
		        var id = match[3];
		        if(type == "contact") {
		        	link = Y.Routing.generate("WallPage", { user_slug : id });
	                replaceText = '<a class="tag-link wall-link" href="' + link + '">@' + value + '</a>';
		        }
		        else if(type == "stock") {
		        	link = Y.Routing.generate("StockPage", { stock_code : id });        
	                replaceText = '<a class="tag-link stock-link" href="' + link + '">$' + value + '</a>';  
		        }     
		        text = text.replace(matchedText, replaceText);
			}

			return text;
	    },
	    parseTagsInfo: function(text) {
	        var mentionItemRegex = /@\[([^\]]+)\]\(([^:]+):([^:]+)\)/;
			var match;
			var result = {
				userTags: [],
				stockTags: []
			};
			while(match = mentionItemRegex.exec(text)){
				var matchedText = match[0];
		        var value = match[1];
		        var type = match[2];
		        var id = match[3];
		        if(type == "contact") {
		        	result.userTags.push(id);
		        }
		        else if(type == "stock") {
		        	result.stockTags.push(id); 
		        }
		        text = text.replace(matchedText, "");
			}

			return result;
	    },
	    extractTextLink: function(text) {
	    	var urlRegex = /(https?:\/\/[^\s]+)/g;
	    	return text.replace(urlRegex, function(url) {
	    		if(url.toLowerCase().indexOf(Y.Routing.BaseUrl) === 0) {
	    			return '<a href="' + url + '">' + url + '</a>';	
	    		}
		        return '<a target="_blank" href="' + url + '">' + url + '</a>';
		    });
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
	    	if(dateFormat){
	        	return dayWrapper.format(dateFormat);	
	    	}

	        var diffY = moment().diff(dayWrapper, "years");
	        if(diffY > 0){
	            return dayWrapper.format("MMM Do YYYY");
	        }
	        var diffM = moment().diff(dayWrapper, "months");
	        if(diffM <= 12 && diffM > 0){
	            if(dayWrapper.toDate().getFullYear() === moment().toDate().getFullYear()){
	            	return dayWrapper.format("MMM Do");
	            }else{
	            	return dayWrapper.format("MMM Do YYYY");
	            }
	        }
	        var diffD = moment().diff(dayWrapper, "days");
	        if(diffD <= 31 && diffD > 7){
	        	return dayWrapper.format("Do h:mm a");
	        }
	        if(diffD <= 7 && diffD > 1){
	        	return dayWrapper.format("ddd h:mm a");
	        }
	        return dayWrapper.format("h:mm a");
	    },	    
	    random : function(){
	    	var argc = arguments.length;
			if (argc === 0) {
				min = 0;
				max = 2147483647;
			}
			else if (argc === 1) {
				throw new Error('Warning: mt_rand() expects exactly 2 parameters, 1 given');
			}
			else {
				min = parseInt(min, 10);
				max = parseInt(max, 10);
			}
			return Math.floor(Math.random() * (max - min + 1)) + min;
	    },
	    log: function(obj){
	    	if(window.console && window.console.log){
	    		window.console.log(obj);
	    	}
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
	        if(url === undefined)
	        	return "";

	        for ( var key in params ){
	            if ( params[key] == '' ) continue;
	            url = url.replace( '{' + key + '}', params[key] );
	        }
	        url = url.replace( new RegExp("/{[A-Za-z0-9_]+}", "g"), "" );

	        return $('base').attr('href') + method + url;
	    };
	};

	Y.Uploader = function() {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.DropzoneInstance = null;
		self.uploadOptions = null;
		/* ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.init = function(element, valueAccessor, allBindingsAccessor) {
			if(Dropzone === undefined){
				throw 'Dropzone is not loaded !';
			}
			var valueAssigner = valueAccessor(), allBindings = allBindingsAccessor(); 
			var uploadOptions = allBindings.uploadOptions.options;
			uploadOptions.paramName = "files";			
			var callbacks = allBindings.uploadOptions.callbacks;
			
			Dropzone.autoDiscover = false;
			self.DropzoneInstance = new Dropzone("#" + element.id, uploadOptions);

			self.DropzoneInstance.on("success", function(file, response) {
				if(response === undefined || response === null || 
					response.files === undefined || response.files.length === 0) {
					return;
				}
				var uploadedFile = response.files[0];
				if(uploadedFile.error === undefined) {
					valueAssigner.push(uploadedFile);
					file.id = uploadedFile.name;
				}else {
					if(file.previewElement) {
						var jPreview = $(file.previewElement);
						jPreview.removeClass("dz-success").addClass("dz-error");
						jPreview.find("span[dz-error-message]").html(uploadedFile.error);
					}
				}
			});
			self.DropzoneInstance.on("maxfilesexceeded", function(file) {
				self.DropzoneInstance.removeFile(file);				
			});
			self.DropzoneInstance.on("processing", function(file) {
				if(callbacks.processing && typeof callbacks.processing === "function"){
					callbacks.processing(file);
				}
			});
			self.DropzoneInstance.on("queuecomplete", function() {
				if(callbacks.completedAll && typeof callbacks.completedAll === "function"){
					callbacks.completedAll();
				}
			});
			self.DropzoneInstance.on("removedfile", function(file) {
				valueAssigner.remove(function(item) {
					return item.name === file.id;
				});
			});
		};
		self.update = function(element, valueAccessor, allBindingsAccessor) {
			var valueAssigner = valueAccessor();
			if(valueAssigner() === null || valueAssigner().length === 0) {
				self.DropzoneInstance.removeAllFiles(true);
			}
		};
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		/* ============= END PRIVATE METHODS =============== */
	};

	/*===== START PUSHER ===== */
	var _PusherManager = function(options) {
		var self = this;

		var debugMode = options.debugMode || true;
		var pusherKey = "22dc8822a1badda84d02";		
		var defaultOptions = {
		};
		
		self.options = $.extend({}, defaultOptions, options);		
		self.GlobalChanel = undefined;
		self.IsGlobalChanelEnabled = false;

		//Public handling
		window.onbeforeunload = function(){
			_turnOffPusher();
			return undefined;
		};
		$(window).on(Y.Constants.Triggers.CURRENT_USER_CHANGED, function(){
			if(!self.Instance){
				_initPusher();
			}
			if(!Y.CurrentUser.live_token) return;
			
			self.GlobalChanel = self.Instance.subscribe(Y.CurrentUser.live_token);
			if(self.GlobalChanel) {
				self.GlobalChanel.bind('pusher:subscription_succeeded', function() {
					self.IsGlobalChanelEnabled = true;
				});

				self.GlobalChanel.bind('pusher:subscription_error', function(status) {
					self.IsGlobalChanelEnabled = false;
				});
			}			
		});

		//Private handling	
		function _initPusher()	{
			self.Instance = new Pusher(pusherKey, this.options);

			//Add eventlisteners
			self.Instance.connection.bind("error", function( err ) { 
				_handleError(err);
			});
			self.Instance.connection.bind("state_change", function(state) {
				_handleConnectionState(state);
			});
			self.Instance.connection.bind("connecting_in", function(delay) {
				_debug("The connection came again");
			});
		}
		function _handleError(err) {
			if(err.data.code === 4004 ) {
			    _debug("Detected limit error");
		  	}else {
		  		_debug(err);
		  	}
		}
		function _handleConnectionState(state){
			_debug("The connection state changed: " + state.previous + " => " + state.current);
			var current = state.current;
			switch(current){
				case "initialized":
					break;
				case "connecting":
					break;
				case "connected":
					if(state.previous === "unavailable"){
						$(window).trigger(Y.Constants.Triggers.PUSHER_RECONNECTED);
					}
					break;
				case "unavailable":
					break;
				case "disconnected":
					break;
			}
		}
		function _turnOffPusher() {
			if(self.Instance) {
				self.Instance.disconnect();
				_debug("Disconnected Pusher !")
			}
		}
		function _debug(obj){
			if(debugMode){
				Y.Utils.log(obj);
			}
		}
		
		_initPusher();
	};
	Y.PusherManager = new _PusherManager({});
	/*===== END PUSHER ===== */

	/ ========================== START COMMON INIT ============================ /
	function _initGlobal() {
		
		if (!String.prototype.trim) {
		   	String.prototype.trim = function(){
		   		return this.replace(/^\s+|\s+$/g, '');
		   	};
		}
		String.prototype.keepNewLine = function(){
			return this.replace(/(?:\r\n|\r|\n)/g, '<br />');
		};
		String.prototype.extractTextLink = function(){
			return Y.Utils.extractTextLink(this);
		};
		String.prototype.extractTextEmoticon = function(){
			if($.emoticons){
				return $.emoticons.replace(this);
			}
			return this;
		};

		//Refresh after 1 minute
		setInterval(function(){
			$(".ago").each(function(i) {
				var ele = $(this);
				var time = ele.data("timeValue");
				if(time){
					ele.text(Y.Utils.convertToTimeAgo(time));
				}
			});
		}, 60*1000);
	}
	_initGlobal();
	/ ========================== END COMMON INIT ============================== /
})(jQuery, ko, window, YesGlobal);