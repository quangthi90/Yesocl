
(function($, ko, window, Y, undefined) {
	'use strict';

	Y.Widgets.PostList = function(options, ele){
		var self = this;

		/* ============= START PROPERTIES ================== */
		self.uniqueName = "YES_POST_LIST";
		self.canLoadMore = ko.observable(options.canLoadMore || false);
		self.canPostNew = ko.observable(options.canPostNew || false);
		self.apiUrls = options.apiUrls || {};
		self.needEffect = false;

		self.isLoadSuccess = ko.observable(false);
		self.isLoadingMore = ko.observable(false);

		self.currentPage = ko.observable(1);
		self.postList = ko.observableArray([]);

		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.loadMore = function(){
			if(!self.canLoadMore() || self.isLoadingMore()) return;

			self.isLoadingMore(true);
			self.currentPage(self.currentPage() + 1);
			_loadPost(function(data){
				self.isLoadingMore(false);
			});
		};		
		self.deletePost = function(post){
			Y.Utils.showConfirmMessage(Y.Constants.Messages.COMMON_CONFIRM, function(){
				_deletePost(post, function(){
					//Callback after delete post
				});
			}, function(){
				//Close or cancel event
			});
		}
		self.editPost = function(post){
		}
		self.loadMoreComment = function(){
			alert("alo ...");
		}
		self.afterRender = function(param1, param2){
			_handleEffects();
		}
		self.doDeleteEffect = function(element) {
			if (element.nodeType === 1) {
				if(self.needEffect){
					$(element).addClass("deleting");
					$(element).fadeOut(1000, function(){
						$(this).remove();
					});
				}else {
					$(element).remove();
				}
			}
		};
		self.doAddEffect = function(element) {
			if(element.nodeType === 1 && self.needEffect) {
				$(element).addClass("adding");
			}
		};

		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============= */
		function _loadPost(callback){
			var loadOptions = self.apiUrls.loadPost.params;
			loadOptions.page = self.currentPage();
			var ajaxOptions = {
				url: Y.Routing.generate(self.apiUrls.loadPost.name, loadOptions),
				data : {
					limit : 5
				}
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					ko.utils.arrayForEach(data.posts, function(p){
						var postComment = new Y.Models.CommentListModel({
							commentList: p.comments,
							postData: {
								id: p.id,
								slug : p.slug,
								type: p.type
							}
						});
						p.comment = postComment;
						var postItem = new Y.Models.PostModel(p);
						self.postList.push(postItem);
					});
					if(data.canLoadMore !== undefined) {
						self.canLoadMore(data.canLoadMore);
					}
				}
				self.isLoadSuccess(true);
				if(callback && typeof callback === "function"){
					callback(data);
				}				
			}
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _loadMoreComment(callback) {			
		}

		function _deletePost(post, callback) {
			var ajaxOptions = {
				url: Y.Routing.generate("ApiDeletePost", {
					post_type: post.type,
					post_slug : post.slug
				})
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					self.postList.remove(post);
				}
				if(callback && typeof callback === "function"){
					callback(data);
				}
			}
			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
		}

		function _handleEffects() {
			if(ele && ele.length > 0){
				setTimeout(function(){
					ele.find(".post-item.adding").removeClass("adding");
				}, 2000);				
			}
		}

		function _init(){
            $(window).scroll(function(e) {
            	if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    self.loadMore();
                }
            });

            _loadPost(function(){
            	$(window).scrollTop(0);
            	self.needEffect = true;
            });
		}

		_init();

		/* ============= END PRIVATE METHODS =============== */
	};

}(jQuery, ko, window, YesGlobal));