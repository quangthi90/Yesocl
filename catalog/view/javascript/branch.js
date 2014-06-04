function NewsViewModel(options) {
	var self = this;
	self.id = ko.observable(options.Id);
	self.canLoadMore = ko.observable(options.canLoadMore || false);
	self.currentPage = ko.observable(1);
	self.newsList = ko.observableArray([]);
	self.isLoadSuccess = ko.observable(false);
	self.isLoadingMore = ko.observable(false);
	self.hasNewPost = ko.observable(options.hasNewPost || false);
	self.validate = options.validate || null;
	self.urls = options.urls || [];
	self.currentPost = ko.observable(null);
	var mainContent = $("#y-main-content");
	var root = $("#y-content");

	this.loadMore = function(){
		if(!self.canLoadMore() || self.isLoadingMore()) return;

		self.isLoadingMore(true);
		self.currentPage(self.currentPage() + 1);
		_loadNews(function(data){
			self.isLoadingMore(false);
			root.scrollLeft(root.scrollLeft() + 2*ConfigBlock.MIN_NEWS_WIDTH);
			if(data.canLoadMore !== undefined) {
				self.canLoadMore(data.canLoadMore);
			}
		});
	};

	this.addStatus = function(){
		var postData = _collectData(false);
		_addPost(postData, function(){
			_clearAfterAdding(false);
		});
	};

	this.saveAdvancePost = function() {
		if(self.currentPost() != null){
			self.updateAdvancePost();
		}else {
			self.addAdvancePost();
		}
	};

	this.addAdvancePost = function(){
		var postData = _collectData(true);
		_addPost(postData, function(data){
			_clearAfterAdding(true);
		});
	};

	this.updateAdvancePost = function() {
		var newData = _collectData(true);
		_savePost(newData, function(data){
			_clearAfterAdding(true);
		});
	};

	this.startEditPost = function(post) {
		self.currentPost(post);
		_openAdvancePost(function() {
			_fillInDataForEdit(post);
		});
	};

	this.deletePost = function(post) {
		bootbox.dialog({
            title: sConfirm,
            message: 'Are you sure you want to remove this post ?',
            buttons:
            {
                cancel: {
                    label: sCancel,
                    className: 'btn',
                    callback: function() {
                    }
                },
                oke: {
                    label: sOk,
                    className: 'btn-primary',
                    callback: function() {
                    	_deletePost(post, function(){  });
					}
                }
            }
        });
	};

	this.resetAdvancePost = function(){
		_clearAfterAdding(true);
	}

	this.openAdvancePost = function(){
		_clearAfterAdding(true);
		self.currentPost(null);
		_openAdvancePost();
	}

	this.closeAdvancePost = function(){
		_clearAfterAdding(true);
		$.magnificPopup.close();
	}

	//Private functions:
	function _adjustLayout(){
		var widthBlock = 0;
		var newsContainer = $("#" + self.id());
		var oldWidth = newsContainer.outerWidth();
		var oldMainWidth = mainContent.outerWidth();
		var heightContent = newsContainer.find(".block-content").height();
		var heightHeader  = newsContainer.find(".block-header").height();
		var newsItem = newsContainer.find(".news-item");
		var blockNew = newsContainer.find(".news-creating-container");
		if(blockNew.length > 0){
			blockNew.width(ConfigBlock.MIN_FIRST_COLUMN);
			blockNew.height(heightContent - heightHeader - 30);
			blockNew.css({
				'margin-right' : ConfigBlock.MARGIN_POST_PER_COLUMN + 'px',
				'opacity' : '1'
			});
		}
		if(newsItem.length === 0){
			widthBlock = 120;
		}else{
			newsItem.each(function(){
				var loaded = $(this).hasClass("loaded");
				if(!loaded) {
					$(this).addClass("loaded");
					$(this).addClass("adding");
					$(this).width(ConfigBlock.MIN_NEWS_WIDTH);
					$(this).height(heightContent - heightHeader - 30);
					var postHeader = $(this).children('.post_header');
					var postBody   = $(this).children('.post_body');
					var postTitle  = postBody.children('.post_title');
					var postImg    = postBody.children('.post_image');
					var postTextRaw = postBody.children('.news-short-content');
					var imgInTextRaw = postTextRaw.find('img');
					postBody.height($(this).height() - postHeader.height());
					if(postTitle.length > 0){
						postImg.height(postBody.height()*0.6);
					}else {
						postImg.height(postBody.height()*0.7);
					}
					var maxHeightText = postBody.height() - postTitle.height() - postImg.height() - 15;
					postTextRaw.height(Math.floor(maxHeightText/20)*20);
					if(imgInTextRaw.length > 0) {
						imgInTextRaw.hide(0);
					}
					postTextRaw.truncate({
					    width: 'auto',
					    token: '&hellip;',
					    side: 'right',
					    multiline: true
					});
					$(this).css({
						'margin-right': ConfigBlock.MARGIN_POST_PER_COLUMN + 'px',
						'margin-bottom' : '0px'
					});
				}
				widthBlock += $(this).outerWidth() + ConfigBlock.MARGIN_POST_PER_COLUMN;
			});
		}
		newsContainer.width(widthBlock + blockNew.outerWidth() + ConfigBlock.MARGIN_POST_PER_COLUMN);
		mainContent.width(oldMainWidth - oldWidth + newsContainer.outerWidth());
		mainContent.css("display", "block");
		root.getNiceScroll().onResize();

		//Add effect:
		setTimeout(function(){
			newsContainer.find(".adding").removeClass("adding");
		}, 1000);
	}

	function _addPost(post, callback){
		var msgs = self.validate(post);
		if(msgs.length > 0) {
			return;
		}
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.postNews.name, self.urls.postNews.params),
			data: post
		};
		var successCallback = function(data){
			if(data.success === "ok" && data.post !== null){
				var newPost = new PostModel(data.post);
				self.newsList.unshift(newPost);
				_adjustLayout();
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Close advance box:
		self.closeAdvancePost();

		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _savePost(post, callback){
		var msgs = self.validate(post);
		if(msgs.length > 0) {
			return;
		}
		var updateOptions = self.urls.updateNews.params;
		updateOptions.post_slug = self.currentPost().slug;
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.updateNews.name, updateOptions),
			data: post
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				self.currentPost().title(data.post.title);
				self.currentPost().thumb(data.post.thumb ? data.post.thumb + "?" + (new Date().getTime()) : data.post.thumb);
				self.currentPost().image(data.post.image ? data.post.image + "?" + (new Date().getTime()) : data.post.image);
				self.currentPost().content(data.post.content);
				self.currentPost().stockTags(post.stockTags);
				self.currentPost().userTags(post.userTags);
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Close advance box:
		self.closeAdvancePost();

		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _deletePost(post, callback) {
		var ajaxOptions = {
			url: window.yRouting.generate("ApiDeletePost", {
				post_type: post.type,
				post_slug : post.slug
			})
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				self.newsList.remove(post);
				_adjustLayout();
			}
			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _clearAfterAdding(isAdvance){
		var newsContainer = $("#" + self.id());
		var containerElement = null;

		if(isAdvance){
			containerElement = $("#news-advance-post");
			containerElement.find("input.img-url").val("");
			var imgContainer = containerElement.find(".img-previewer-container");
			imgContainer.find(".drop-zone-show").show(0);
			imgContainer.find(".post_image_item").remove();
			containerElement.find("input.post-title-input").val("");
			containerElement.find("#post-adv-editor").code("");
			containerElement.find("input.autocomplete-tag-input").select2("val", "");
		}else {
			containerElement = newsContainer.find(".form-status");
			containerElement.find("input.img-url").val("");
			containerElement.find(".img-previewer-container").html("");
			containerElement.find(".post_input").mentionsInput("reset");
		}
	}

	function _fillInDataForEdit(post) {
		var containerElement = $("#news-advance-post");
		var imgContainer = containerElement.find(".img-previewer-container");
		if(post.thumb()) {
			containerElement.find("input.img-url").val(post.thumb());
			imgContainer.find(".drop-zone-show").hide(0);
			var postImageItem = $("<div class='post_image_item'></div>");
			postImageItem.append('<img src="' + post.thumb() + '" class="img-uploaded"><span class="close"><i class="icon-remove"></i></span>');
			postImageItem.find("span.close").on("click", function(){
				$(this).parent().remove();
				containerElement.find("input.img-url").val("");
				imgContainer.find(".drop-zone-show").show(0);
			});
			imgContainer.append(postImageItem);
		} else {
			imgContainer.find(".drop-zone-show").show(0);
			imgContainer.find(".post_image_item").remove();
			containerElement.find("input.img-url").val("");
		}
		containerElement.find("input.post-title-input").val(post.title());
		containerElement.find("#post-adv-editor").code(post.content());
		containerElement.find("input.autocomplete-tag-input").select2("val", post.stockTags());
	}

	function _openAdvancePost (openCallback) {
		var form = $("#news-advance-post");
        $.magnificPopup.open({
			items: {
			    src: form,
			    type: 'inline'
			},
			modal: true,
			callbacks: {
				open: function(){
					setTimeout(function(){
						form.find(".post-title-input").focus();
					}, 200);
					if(openCallback && typeof openCallback === "function") {
						openCallback();
					}
				}
			}
		});
	}

	function _loadNews(callback){
		var loadOptions = self.urls.loadNews.params;
		loadOptions.page = self.currentPage();
		var ajaxOptions = {
			url: window.yRouting.generate(self.urls.loadNews.name, loadOptions),
			data : {
				limit : 5
			}
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.posts, function(p){
					var newsItem = new PostModel(p);
					self.newsList.push(newsItem);
				});
			}
			self.isLoadSuccess(true);
			_adjustLayout();

			if(callback && typeof callback === "function"){
				callback(data);
			}
		}
		//Call common ajax Call:
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}

	function _collectData(isAdvance){
		var post = {
			isAdvance : isAdvance,
			thumb: "",
			title : "",
			content: "",
			userTags: [],
			stockTags: []
		};
		var containerElement = null;

		var newsContainer = $("#" + self.id());
		if(isAdvance){
			containerElement = $("#news-advance-post");
			post.thumb = containerElement.find("input.img-url").val();
			post.title = containerElement.find("input.post-title-input").val();

			var editorCode = containerElement.find("#post-adv-editor");
			post.content = editorCode.code();
			post.userTags = editorCode.getTags();
			post.stockTags = containerElement.find("input.autocomplete-tag-input").select2("val");
		}else {
			containerElement = newsContainer.find(".form-status");
			post.thumb = containerElement.find("input.img-url").val();
			post.content = containerElement.find(".post_input").mentionsInput("getHtmlContent");

			var tagInfo = _getTagInfo(containerElement.find(".post_input"));
			post.userTags = tagInfo.userTags;
			post.stockTags = tagInfo.stockTags;
		}

		return post;
	}

	function _getTagInfo($ele){
		var tags = $ele.mentionsInput('getMentions');
		var userTags = [];
		var stockTags = [];

		ko.utils.arrayForEach(tags, function(t){
			if(t.type === "contact"){
				userTags.push(t.id);
			} else if(t.type === "stock") {
				stockTags.push(t.id);
			}
		});
		return {
			userTags: userTags,
			stockTags : stockTags
		};
	}

	function _initNews(){
		if(self.canLoadMore()){
			root.scroll(function(){
				var rootWidth = $(this).width();
				if(root.scrollLeft() + rootWidth === root[0].scrollWidth - 20){
					self.loadMore();
				}
			});
		}
		//Delay for loading news:
		setTimeout(function(){
			self.isLoadSuccess(false);
			_loadNews();
		}, 300);
	}

	_initNews();
};

function CommentBoxViewModel(params){
	var self = this;

	self.controlId = ko.observable(params.Id || "comment-box");
	self.widthControl = ko.observable(params.width || 380);
	self.currentPage = ko.observable(1);
	self.canExpand = ko.observable(true);
	self.needEffect = ko.observable(false);
	self.enterToSend = ko.observable(true);
	self.isProcessing = ko.observable(false);
	self.isLoadingMore = ko.observable(false);
	self.commentList = ko.observableArray(params.commentList || []);
	self.postData = {};
	self.currentTotalComment = ko.observable(0);
	self.initComment = new CommentModel({});
	self.currentComment = ko.observable(null);

	//Public functions:
	self.showCommentBox = function(postData) {
		if(postData === undefined || postData === null){
			console.log("Post information is empty ...");
			return;
		}
		//Set init data:
		self.postData = postData;
		YesGlobal.Caches.CurrentPost = postData;
		YesGlobal.Caches.UsersCanTag = [];
		self.commentList.removeAll();
		self.needEffect(false);
		self.currentPage(1);
		self.currentTotalComment(0);

		//Check whether comment list already loaded:
		if(self.postData.comments.length > 0){
			ko.utils.arrayForEach(self.postData.comments, function(c){
				var com = new CommentModel(c);
				self.commentList.push(com);
			});
			self.currentPage(self.postData.currentCommentPage());
			self.currentTotalComment(self.postData.commentCount());

			_displayCommentBox();
			return;
		}

		var ajaxOptions = {
			url : window.yRouting.generate('ApiGetComments', {
				post_type: postData.type,
				post_slug: postData.slug,
				page: self.currentPage()
			}),
			data: {
				limit: YesGlobal.Configs.pagingOptions.pageSize
			}
		};
		var successCallback = function(data) {
			if(data.success === "ok"){
				ko.utils.arrayForEach(data.comments, function(c){
					var com = new CommentModel(c);
					self.commentList.push(com);
					self.postData.comments.push(c);
				});
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
				_displayCommentBox();
			}else {
				//Show message ...
			}
			self.needEffect(true);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};
	self.closeCommentBox = function(){
		self.initComment.content("");
		YesGlobal.Caches.CurrentPost = null;
		YesGlobal.Caches.UsersCanTag = [];
		_hideCommentBox();
	};
	self.expandCommentBox = function(){
		if(self.canExpand()){
			self.widthControl(self.widthControl()*2);
		} else {
			self.widthControl(self.widthControl()/2);
		}
		self.canExpand(!self.canExpand());
	};
	self.addCommentByEnter = function(){
		if(self.enterToSend()){
			self.addComment();
			return false;
		}
		return true;
	};
	self.addComment = function() {
		if(self.isProcessing()){
			console.log("In process");
			return;
		}
		var content = self.initComment.content();
		if(content.trim().length === 0){
			alert("Content is required !");
			return;
		}
		var tagInfo = getTagInfo();
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPostComment", {
				post_type: self.postData.type,
				post_slug: self.postData.slug
			}),
			data: {
				content: content,
				userTags: tagInfo.userTags,
				stockTags: tagInfo.stockTags
			}
		};
		var successCallback = function(data){
			if(data.success === "ok"){
				self.initComment.content("");
				var newComment = new CommentModel(data.comment);
				self.commentList.push(newComment);
				self.postData.comments.push(data.comment);
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
			}else{
				//Show message
			}
			self.isProcessing(false);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, function(){
			self.isProcessing(true);
		}, successCallback, function() {
			self.isProcessing(false);
		});
	};
	self.editComment = function(comment){
		self.currentComment(comment);
		_setCommentContent(comment.content());
		_displayAdvanceBox();
	};
	self.startAdvanceComment = function(){
		self.currentComment(null);
		_setCommentContent("");
		_displayAdvanceBox();
	};
	self.saveComment = function(){
		if(self.currentComment() === null){
			_saveNew();
		}else {
			_saveEditing();
		}
	};
	self.deleteComment = function(comment) {
		bootbox.dialog({
            title: sConfirm,
            message: 'Are you sure you want to remove this comment ?',
            buttons:
            {
                cancel: {
                    label: sCancel,
                    className: 'btn',
                    callback: function() {
                    }
                },
                oke: {
                    label: sOk,
                    className: 'btn-primary',
                    callback: function() {
                    	var ajaxOptions = {
							url : window.yRouting.generate("ApiDeleteComment", {
								post_type: self.postData.type,
								comment_id : comment.id
							})
						};
						var successCallback = function(data){
							if(data.success === "ok") {
								self.commentList.remove(comment);
								//Delete from cached data:
								var indexDeleted = -1;
								for (var i = self.postData.comments.length - 1; i >= 0; i--) {
									if(comment.id === self.postData.comments[i].id){
										indexDeleted = i;
										break;
									}
								};
								if(indexDeleted >= 0) {
									self.postData.comments.splice(indexDeleted, 1);
								}
								if(data.comment_count >= 0){
									self.postData.commentCount(data.comment_count);
									self.currentTotalComment(data.comment_count);
								}else {
									self.postData.commentCount(self.commentList().length + data.comment_count);
									self.currentTotalComment(self.commentList().length + data.comment_count);
								}
							} else {
							}
						};
						YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
					}
                }
            }
        });
	};
	self.likeComment = function(comment){
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPutCommentLike", {
				post_type: self.postData.type,
				comment_id : comment.id
			})
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				comment.isLiked(!comment.isLiked());
				comment.likeCount(data.like_count);
			} else {
				//Show message
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}
	self.showLikers = function(comment){
		var context = YesGlobal.Utils.getKoContext();
		if(context !== null){
			var apiUrl = yRouting.generate("ApiGetCommentLiker", {
				post_type: self.postData.type,
				comment_id: comment.id
			})
			context.$data.userBoxModel.showUserList(apiUrl, function(count){
				if(count !== undefined){
					comment.likeCount(count);
				}
			});
		}else {
			console.log("Ko content not found !");
		}
	};
	self.makeDeleteEffect = function(element) {
		if (element.nodeType === 1 && self.needEffect()) {
			$(element).addClass("deleting");
			$(element).fadeOut(1000, function(){
				$(this).remove();
			});
		}
	};
	self.makeAddEffect = function(element) {
		if(element.nodeType === 1 && self.needEffect()) {
			var control = $("#" + self.controlId());
			var heightCommentList = control.find(".comment-list").first().height();
			$(element).addClass("adding");
			control.find(".comment-body").animate({ scrollTop: heightCommentList + "px" }, 1000, function(){
				$(element).fadeIn(1000, function() {
					$(element).removeClass("adding");
				});
			});
		}
	};
	self.closeAdvanceBox = function(){
		_closeAdvanceBox();
	}

	//Private functions:
	function _loadMoreComment(callback){

		if(self.isLoadingMore() || self.postData.commentCount() <= self.commentList().length)
			return;

		self.currentPage(self.currentPage() + 1);
		self.postData.currentCommentPage(self.currentPage());
		self.isLoadingMore(true);
		self.needEffect(false);

		var ajaxOptions = {
			url : window.yRouting.generate('ApiGetComments', {
				post_type: self.postData.type,
				post_slug: self.postData.slug,
				page: self.currentPage()
			}),
			data: {
				limit: YesGlobal.Configs.pagingOptions.pageSize
			},
			showLoading: false
		};
		var successCallback = function(data) {
			if(data.success === "ok"){
				for (var index = data.comments.length - 1; index >= 0; index--) {
					var com = new CommentModel(data.comments[index]);
					self.commentList.unshift(com);
					self.postData.comments.unshift(data.comments[index]);
				};
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
				if(callback && typeof callback === "function"){
					callback();
				}
			}else {
				//Show message ...
			}
			self.needEffect(true);
			self.isLoadingMore(false);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	}
	function _saveEditing(){
		var content = _getCommentContent();
		content = content.replace(new RegExp("&nbsp;", 'g'), "");
        content = content.replace(new RegExp("<br>", 'g'), "");
        var temp = $("<div></div>");
        temp.html(content);
        if(temp.html().trim().length === 0) {
            return;
        }
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPutComment", {
				post_type: self.postData.type,
				comment_id : self.currentComment().id
			}),
			data:{
				content : content
			}
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				self.currentComment().content(data.comment.content);
				self.currentComment().likeCount(data.comment.like_count);
				//Update cached data:
				var existing = ko.utils.arrayFirst(self.postData.comments, function(item){
					return data.comment.id === item.id;
				});
				if(existing){
					existing.content = data.comment.content;
					existing.like_count = data.comment.like_count;
				}
			} else {
				//Show message
			}
			self.currentComment(null);
			_setCommentContent("");
			_closeAdvanceBox();
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, function(){
			self.currentComment(null);
		});
	}
	function _saveNew(){
		if(self.isProcessing()){
			console.log("In process");
			return;
		}
		var content = _getCommentContent();
		if(content.trim().length === 0) {
			return;
		}
		var ajaxOptions = {
			url : window.yRouting.generate("ApiPostComment", {
				post_type: self.postData.type,
				post_slug: self.postData.slug
			}),
			data: {
				content: content
			}
		};
		var successCallback = function(data){
			if(data.success === "ok") {
				var newComment = new CommentModel(data.comment);
				self.commentList.push(newComment);
				self.postData.comments.push(data.comment);
				if(data.comment_count >= 0){
					self.postData.commentCount(data.comment_count);
					self.currentTotalComment(data.comment_count);
				}
			}else{
				//Show message
			}
			self.isProcessing(false);
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, function(){
			self.isProcessing(true);
		}, successCallback, function() {
			self.isProcessing(false);
		});
		_closeAdvanceBox();
	}
	function _displayCommentBox() {
		var overlay = $("#overlay");
		var control = $("#" + self.controlId());
		overlay.fadeIn(300, function(){
			control.animate({ 'right' : '0px' }, 100, function(){
				var heightCommentList = $(this).find(".comment-list").first().height();
				var commentBody = $(this).find(".comment-body");
				commentBody.animate({ scrollTop: heightCommentList + "px" }, 0);
				commentBody.on("scroll", function() {
				    var pos = $(this).scrollTop();
				    if (pos === 0) {
				    	$(this).find(".comment-item").removeClass("mark-first");
				    	$(this).find(".comment-item:first-child").addClass("mark-first");
				        _loadMoreComment(function(){
				        	var newPos = commentBody.find(".comment-item.mark-first").position().top - 100;
				        	commentBody.animate({ scrollTop: newPos + "px" }, 0);
				        });
				    }
				});
			});
			$(this).on('click', function(){
				_hideCommentBox();
			});
		});
	}
	function _hideCommentBox() {
		var overlay = $("#overlay");
		var control = $("#" + self.controlId());
		var commentBody = control.find(".comment-body").off("scroll");
		control.animate({ 'right' : '-50000px' }, 200, function(){
			overlay.fadeOut(500);
		});
		control.find(".post_input").mentionsInput("reset");
	}
	function _displayAdvanceBox(){
		var form = $("#comment-advance-form");
        $.magnificPopup.open({
			items: {
			    src: form,
			    type: 'inline'
			},
			modal: false
		});
	}
	function _closeAdvanceBox(){
		$.magnificPopup.close();
	}
	function _getCommentContent(){
		var form = $("#comment-advance-form");
		return form.find(".y-editor").code();
	}
	function _setCommentContent(content){
		var form = $("#comment-advance-form");
		return form.find(".y-editor").code(content);
	}
	function getTagInfo(){
		var $ele = $("#" + self.controlId()).find('.post_input');
		var tags = $ele.mentionsInput('getMentions');
		var userTags = [];
		var stockTags = [];

		ko.utils.arrayForEach(tags, function(t){
			if(t.type === "contact"){
				userTags.push(t.id);
			} else if(t.type === "stock") {
				stockTags.push(t.id);
			}
		});
		return {
			userTags: userTags,
			stockTags : stockTags
		};
	}

	//CommentModel:
	function CommentModel(data){
		var that = this;

		that.id = data.id || '';
		that.created = data.created || '';
		that.user = data.user || {};
		that.isOwner = false;
		that.canDelete = data.can_delete || false;
		that.canEdit = data.can_edit || false;
		that.content = ko.observable(data.content || '');
		that.isLiked = ko.observable(data.like_count || false);
		that.likeCount = ko.observable(data.like_count || 0);
		that.isInit = ko.observable(true);
	}
};

function UserBoxViewModel(params){
	var self = this;

	self.controlId = ko.observable(params.Id || "user-list-box-wrapper");
	self.userList = ko.observableArray([]);

	self.showUserList = function(apiUrl, callback){
		var ajaxOptions = {
			url : apiUrl
		};
		self.userList.removeAll();
		var successCallback = function(data){
			if(data.success === "ok") {
				for(var key in data.users){
					var usrData = data.users[key];
					self.userList.push(new UserModel(usrData));
				}
				if(callback !== undefined && typeof callback === "function"){
					callback(self.userList().length);
				}
				_displayBox();
			}
		};
		YesGlobal.Utils.ajaxCall(ajaxOptions, null, successCallback, null);
	};

	function _displayBox(){
        $.magnificPopup.open({
			items: {
			    src: $("#" + self.controlId()),
			    type: 'inline'
			},
			modal: false
		});
	}
}