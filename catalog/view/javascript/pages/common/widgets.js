
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

		self.isProcessing = ko.observable(false);
		self.isLoadSuccess = ko.observable(false);
		self.isLoadingMore = ko.observable(false);

		self.currentPage = ko.observable(1);
		self.postList = ko.observableArray([]);
		self.currentEditingPost = ko.observable();
		self.currentPost = ko.observable();
		self.hasEditFocus = ko.observable(undefined);

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
		self.addPost = function(post) {
			if(post) {
				var postComment = new Y.Models.CommentListModel({
					commentList: [],
					totalComments: 0,
					postData: {
						id: post.id,
						slug : post.slug,
						type: post.type
					}
				});
				post.comment = postComment;
				var newPost = new Y.Models.PostModel(post);
				self.postList.unshift(newPost);
			}			
		};		
		self.deletePost = function(post){
			Y.Utils.showConfirmMessage(Y.Constants.Messages.COMMON_CONFIRM, function(){
				_deletePost(post, function(){
					//Callback after delete post
				});
			}, function(){
				//Close or cancel event
			});
		};
		self.editPost = function(post) {
			self.currentPost(post);
			var rawPost = post.toEditJson();
			self.currentEditingPost(new Y.Models.PostModel(rawPost));
			self.hasEditFocus(true);
		};

		self.cancelEdit = function(item) {
			self.currentEditingPost(null);
			self.hasEditFocus(undefined);
		};

		self.submitEdit = function(item) {
			var postData = _returnEditData();
			if(self.isProcessing() || postData.content.length === 0) {
				return;
			}
			_savePost(postData, function(data){
				self.currentEditingPost(null);
				self.hasEditFocus(undefined);
				self.currentPost().content(data.content || "");
				self.currentPost().title(data.title || "");
			}, function(errorInfo) {
				//Show message fail
			});
		};

		self.canSubmitEdit = ko.computed(function(){
			if(self.currentEditingPost() == null)
				return false;
			var content = self.currentEditingPost().content();	
			return (content && content.trim().length > 0 && !self.isProcessing());
		});

		self.afterRender = function(param1, param2){
			_handleEffects();
		};
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
							totalComments: p.comment_count,
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

		function _savePost(post, sucCallback, failCallback) {
			var apiSavePost = self.apiUrls.savePost;
			apiSavePost.params.post_slug = post.slug;
			apiSavePost.params.post_type = post.type;
			var ajaxOptions = {
				url: Y.Routing.generate(apiSavePost.name, apiSavePost.params),
				data: post
			};
			var successCallback = function(data){
				if(data.success === "ok"){
					if(sucCallback && typeof sucCallback === "function") {
						sucCallback(data.post);
					}					
				} else {
					if (failCallback && typeof failCallback == "function") {
						failCallback(data.error);
					};
				}
				self.isProcessing(false);
			};

			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, 
				function() { self.isProcessing(true); }, successCallback, 
				function() { self.isProcessing(false); }
			);
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

		function _returnEditData(){
			var content = ko.utils.unwrapObservable(self.currentEditingPost().content);
			var title = ko.utils.unwrapObservable(self.currentEditingPost().title);
			var slug = ko.utils.unwrapObservable(self.currentEditingPost().slug);
			var type = ko.utils.unwrapObservable(self.currentEditingPost().type);
			var tags = Y.Utils.parseTagsInfo(content);
			return {
				isAdvance : title && title.length > 0,
				title : title ? title.trim(): "",
				slug: slug,
				type: type,
				content: content ? content.trim(): "",
				userTags: tags.userTags,
				stockTags: tags.stockTags
			};
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

	Y.Widgets.PostNew = function(options, ele) {
		var self = this;
		
		/* ============= START PROPERTIES ================== */
		self.newPost = ko.observable(new Y.Models.PostModel({}));
		self.apiUrl = options.apiUrl || {};
		self.targetPostList = options.targetPostList || "";
		self.isPosting = ko.observable(false);
		self.uniqueName = "YES_POST_NEW";
		self.images = ko.observableArray([]);
		self.isUploading = ko.observable(false);
		self.hasImage = ko.observable(false);
		self.hasTitle = ko.observable(false);
		self.isFocusingTitle = ko.observable(true);
		self.uploadOptions = {
			options: {
				url: Y.Routing.generate("UploadFile"),
	            maxFilesize: 5,
	            parallelUploads: 2,
	            uploadMultiple: false,
	            addRemoveLinks: true,
	            maxFiles: 5,
	            dictRemoveFile: "X",
	            dictCancelUpload: "X",
	            thumbnailWidth: 100,
	            thumbnailHeight: 100,
	            acceptedFiles: "image/*"
			},
			callbacks: {
				processing: function(){
					self.isUploading(true);
				},
				completedAll: function() {
					self.isUploading(false);
				}
			}
        };

		/*  ============= END PROPERTIES ==================== */

		/* ============= START PUBLIC METHODS ============== */
		self.canPost = ko.computed(function(){
			return (!self.isPosting() && self.newPost().content().trim().length != 0 && !self.isUploading());
		}, this);

		self.activeImageUploading = ko.computed(function(){
			if(self.isUploading() || self.hasImage())
				return true;
			return false;
		});

		self.toggleImage = function(){
			if(self.images().length > 0) {
				Y.Utils.showConfirmMessage(Y.Constants.Messages.DELETE_UPLOAD_FILE_CONFIRM, function(){
					self.hasImage(!self.hasImage());
				}, function(){
					//Close or cancel event
				});
			}else {
				self.hasImage(!self.hasImage());
			}
		};

		self.toggleTitle = function(){
			if(self.hasTitle()){
				self.newPost().title("");
			}
			self.hasTitle(!self.hasTitle());
			self.isFocusingTitle(self.hasTitle());
		};

		self.addPost = function() {
			var postData = _returnPostData();
			if(self.isPosting() || postData.content.length === 0) {
				return;
			}
			_addPost(postData, function(data){
				var postListWidget = Y.Utils.getWidgetModel(self.targetPostList);
				if(postListWidget != null) {					
					postListWidget.addPost(data);
				}
				if(self.hasImage()){
					self.hasImage(false);
				}
			}, function(errorInfo) {
				//Show message fail
			});
		};

		/* ============= END PUBLIC METHODS ================ */

		/* ============= START PRIVATE METHODS ============== */
		function _addPost(post, sucCallback, failCallback) {
			var ajaxOptions = {
				url: Y.Routing.generate(self.apiUrl.name, self.apiUrl.params),
				data: post
			};
			var successCallback = function(data){
				if(data.success === "ok" && data.post !== null){
					_reset();
					if(sucCallback && typeof sucCallback === "function") {
						sucCallback(data.post);
					}					
				} else {
					if (failCallback && typeof failCallback == "function") {
						failCallback(data.error);
					};
				}
				self.isPosting(false);
			};

			//Call common ajax Call:
			Y.Utils.ajaxCall(ajaxOptions, 
				function() { self.isPosting(true); }, successCallback, 
				function() { self.isPosting(false); });
		}

		function _returnPostData(){
			var content = ko.utils.unwrapObservable(self.newPost().content);
			var title = ko.utils.unwrapObservable(self.newPost().title);
			var postImgs = self.hasImage() ? ko.utils.arrayMap(self.images(), function(file){
				return file.url;
			}) : [];
			var tags = Y.Utils.parseTagsInfo(content);
			return {
				isAdvance : self.hasTitle() && title.length > 0,
				thumbs: postImgs,
				title : title ? title.trim(): "",
				content: content ? content.trim(): "",
				userTags: tags.userTags,
				stockTags: tags.stockTags
			};
		}

		function _reset(){
			self.newPost().title("");
			self.newPost().content("");
			self.images([]);
			ele.find(".new-post-content").trigger(Y.Constants.Triggers.INPUT_CONTENT_CHANGED);
		}
		/* ============= END PRIVATE METHODS ================ */
	};

}(jQuery, ko, window, YesGlobal));