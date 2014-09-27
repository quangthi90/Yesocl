(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.MessageView = function(options, ele) {
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_MESSAGE_VIEWMODEL";
		self.canLoadMore = ko.observable(options.canLoadMore || false);
		self.apiUrls = options.apiUrls || {};

		self.isLoadSuccess = ko.observable(false);

		self.currentPage = ko.observable(1);
		self.userMessageList = ko.observableArray([]);
		self.totalMessage = ko.observable(0);
		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		
		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		function _loadMessage(callback){
			var loadOptions = self.apiUrls.loadUserMessage.params || {},
				url = self.apiUrls.loadUserMessage.name;
			loadOptions.page = self.currentPage();
			var ajaxOptions = {
				url: Y.Routing.generate(url, loadOptions),
				data : {
					limit : 10
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(data.user_messages, function(um){
						var userMessageItem = new Y.Models.UserMessageModel(um);
						self.userMessageList.push(userMessageItem);
						self.totalMessage( data.total_message );
					});
					if(data.canLoadMore !== undefined) {
						self.canLoadMore(data.canLoadMore);
					}
				}
				self.isLoadSuccess(true);
				_handleEffects();

				if(callback && typeof callback === "function"){
					callback(data);
				}
			};
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _handleEffects() {
			$(window).trigger('gridalicious-loaded');
		}

		function _init(){
            $(window).scroll(function(e) {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    self.loadMore();
                }
            });

            _loadMessage(function(){
            	$(window).scrollTop(0);
            });
		}

		_init();
		/* ============= END PRIVATE METHODS =============== */
	};
	
}(jQuery, ko, window, YesGlobal));